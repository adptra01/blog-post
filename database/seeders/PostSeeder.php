<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\SeoDetail;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create('id_ID');
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all categories and tags for relationships
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();

        if ($categories->isEmpty() || $tags->isEmpty() || $users->count() < 3) {
            $this->command->warn('Categories, tags, or users not found. Please run CategorySeeder, TagSeeder, and UserSeeder first.');

            return;
        }

        $this->command->info('Fetching content from public APIs...');

        // Fetch posts from JSONPlaceholder
        try {
            $jsonPlaceholderPosts = Http::timeout(10)->get('https://jsonplaceholder.typicode.com/posts')->json();
            $jsonPlaceholderComments = Http::timeout(10)->get('https://jsonplaceholder.typicode.com/comments')->json();
            $jsonPlaceholderUsers = Http::timeout(10)->get('https://jsonplaceholder.typicode.com/users')->json();
        } catch (\Exception $e) {
            $this->command->warn('Failed to fetch from JSONPlaceholder API. Using fallback data instead.');
            $jsonPlaceholderPosts = [];
            $jsonPlaceholderComments = [];
            $jsonPlaceholderUsers = [];
        }

        // Create posts using API data
        $postsCreated = 0;

        // Use API data if available
        if (! empty($jsonPlaceholderPosts)) {
            foreach (array_slice($jsonPlaceholderPosts, 0, 20) as $apiPost) {
                $post = $this->createPostFromAPI($apiPost, $categories, $tags, $users);
                if ($post) {
                    $postsCreated++;

                    // Create SEO details
                    SeoDetail::create([
                        'post_id' => $post->id,
                        'title' => $post->title.' - Blog Teknologi',
                        'description' => substr(strip_tags($post->body), 0, 160).'...',
                        'keywords' => $this->generateKeywords($post->title, $post->categories, $post->tags),
                    ]);
                }
            }
        }

        // Create additional specific posts if we need more
        $remainingPosts = 10 - $postsCreated;
        if ($remainingPosts > 0) {
            for ($i = 0; $i < $remainingPosts; $i++) {
                $post = $this->createSpecificPost($categories, $tags, $users);
                if ($post) {
                    $postsCreated++;

                    // Create SEO details
                    SeoDetail::create([
                        'post_id' => $post->id,
                        'title' => $post->title.' - Blog Teknologi',
                        'description' => substr(strip_tags($post->body), 0, 160).'...',
                        'keywords' => $this->generateKeywords($post->title, $post->categories, $post->tags),
                    ]);
                }
            }
        }

        // Create scheduled and pending posts
        $this->createScheduledPosts($categories, $tags, $users, 3);
        $this->createPendingPosts($categories, $tags, $users, 5);

        $this->command->info("Created {$postsCreated} published posts, 3 scheduled posts, and 5 pending posts");
    }

    /**
     * Create a post from JSONPlaceholder API data.
     */
    private function createPostFromAPI(array $apiPost, $categories, $tags, $users): ?Post
    {
        try {
            // Get API user data
            $apiUser = collect($GLOBALS['jsonPlaceholderUsers'] ?? [])->firstWhere('id', $apiPost['userId']);

            // Find corresponding local user or use random
            $localUser = $users->first(function ($user) use ($apiUser) {
                return str_contains(strtolower($user->email), strtolower($apiUser['username'] ?? ''));
            }) ?? $users->random();

            // Create the post
            $post = Post::create([
                'title' => ucwords(strtolower($apiPost['title'])),
                'slug' => Str::slug($apiPost['title']),
                'sub_title' => 'Artikel menarik tentang '.strtolower(explode(' ', $apiPost['title'])[0] ?? 'teknologi'),
                'body' => $this->formatArticleBody($apiPost['body']),
                'status' => 'published',
                'published_at' => now()->subDays(rand(0, 90)),
                'cover_photo_path' => 'https://picsum.photos/800/400?random='.rand(1, 1000),
                'photo_alt_text' => 'Gambar untuk artikel: '.$apiPost['title'],
                'user_id' => $localUser->id,
            ]);

            // Attach random categories (1-3 categories per post)
            $post->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );

            // Attach random tags (2-5 tags per post)
            $post->tags()->attach(
                $tags->random(rand(2, 5))->pluck('id')->toArray()
            );

            return $post;
        } catch (\Exception $e) {
            $this->command->warn('Failed to create post from API data: '.$e->getMessage());

            return null;
        }
    }

    /**
     * Create a specific post with predefined content.
     */
    private function createSpecificPost($categories, $tags, $users): ?Post
    {
        try {
            $posts = [
                [
                    'title' => 'Mengenal Framework Laravel untuk Pengembangan Web Modern',
                    'sub_title' => 'Panduan lengkap memulai dengan Laravel',
                    'body' => '<p>Laravel adalah framework PHP yang powerful untuk pengembangan web modern. Framework ini menyediakan berbagai fitur siap pakai yang memudahkan developer dalam membangun aplikasi web.</p><p>Dengan Laravel, Anda dapat fokus pada logika bisnis aplikasi tanpa perlu khawatir dengan hal-hal teknis yang repetitif.</p>',
                    'status' => 'published',
                    'published_at' => now()->subDays(rand(0, 30)),
                ],
                [
                    'title' => 'Tips dan Trik Programming untuk Developer Pemula',
                    'sub_title' => 'Rahasia sukses dalam dunia programming',
                    'body' => '<p>Programming bukan hanya tentang menulis kode, tetapi juga tentang problem solving dan logical thinking. Sebagai developer pemula, ada beberapa tips yang perlu diperhatikan.</p><p>Konsistensi dalam belajar dan praktek adalah kunci utama kesuksesan di bidang programming.</p>',
                    'status' => 'published',
                    'published_at' => now()->subDays(rand(0, 30)),
                ],
                [
                    'title' => 'Membangun Aplikasi Mobile dengan React Native',
                    'sub_title' => 'Cross-platform development untuk iOS dan Android',
                    'body' => '<p>React Native memungkinkan developer untuk membangun aplikasi mobile menggunakan JavaScript dan React. Framework ini mendukung cross-platform development untuk iOS dan Android.</p><p>Dengan React Native, Anda dapat menulis satu codebase untuk dua platform berbeda.</p>',
                    'status' => 'published',
                    'published_at' => now()->subDays(rand(0, 30)),
                ],
            ];

            $postData = $this->faker->randomElement($posts);

            $post = Post::create([
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']),
                'sub_title' => $postData['sub_title'],
                'body' => $postData['body'],
                'status' => $postData['status'],
                'published_at' => $postData['published_at'],
                'cover_photo_path' => 'https://picsum.photos/800/400?random='.rand(1, 1000),
                'photo_alt_text' => 'Gambar untuk artikel: '.$postData['title'],
                'user_id' => $users->random()->id,
            ]);

            // Attach random categories (1-3 categories per post)
            $post->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );

            // Attach random tags (2-5 tags per post)
            $post->tags()->attach(
                $tags->random(rand(2, 5))->pluck('id')->toArray()
            );

            return $post;
        } catch (\Exception $e) {
            $this->command->warn('Failed to create specific post: '.$e->getMessage());

            return null;
        }
    }

    /**
     * Format API body text into article format.
     */
    private function formatArticleBody(string $body): string
    {
        // Add some structure to the plain text
        $paragraphs = str_split($body, rand(150, 300));

        $formattedBody = '';
        foreach ($paragraphs as $index => $paragraph) {
            $paragraph = trim($paragraph);
            if (empty($paragraph)) {
                continue;
            }

            if ($index === 0) {
                $formattedBody .= "<h2>Pengenalan</h2>\n<p>{$paragraph}</p>\n\n";
            } elseif ($index === count($paragraphs) - 1) {
                $formattedBody .= "<h2>Kesimpulan</h2>\n<p>{$paragraph}</p>";
            } else {
                $formattedBody .= "<p>{$paragraph}</p>\n\n";
            }
        }

        return $formattedBody;
    }

    /**
     * Create scheduled posts.
     */
    private function createScheduledPosts($categories, $tags, $users, int $count): void
    {
        $scheduledPosts = [
            [
                'title' => 'Tren Teknologi di Tahun 2025',
                'sub_title' => 'Prediksi perkembangan teknologi tahun depan',
                'body' => '<p>Tahun 2025 diprediksi akan menjadi tahun yang menarik untuk perkembangan teknologi. Beberapa tren seperti AI, blockchain, dan IoT akan semakin matang dan diterapkan secara luas.</p><p>Para developer perlu mempersiapkan diri dengan mempelajari teknologi-teknologi terbaru ini.</p>',
                'scheduled_for' => now()->addDays(rand(1, 30)),
            ],
            [
                'title' => 'Machine Learning untuk Bisnis',
                'sub_title' => 'Penerapan ML dalam dunia bisnis modern',
                'body' => '<p>Machine Learning bukan lagi teknologi masa depan, melainkan teknologi yang sudah bisa diterapkan sekarang. Banyak perusahaan yang sudah memanfaatkan ML untuk meningkatkan efisiensi operasional mereka.</p><p>Dalam artikel ini kita akan membahas bagaimana bisnis dapat memanfaatkan machine learning.</p>',
                'scheduled_for' => now()->addDays(rand(1, 30)),
            ],
            [
                'title' => 'Cyber Security di Era Digital',
                'sub_title' => 'Melindungi data di tengah ancaman digital',
                'body' => '<p>Di era digital ini, keamanan data menjadi prioritas utama bagi setiap organisasi. Ancaman cyber crime semakin canggih dan sering terjadi.</p><p>Penting bagi setiap perusahaan untuk memiliki strategi cyber security yang komprehensif.</p>',
                'scheduled_for' => now()->addDays(rand(1, 30)),
            ],
        ];

        for ($i = 0; $i < $count && $i < count($scheduledPosts); $i++) {
            $postData = $scheduledPosts[$i];

            $post = Post::create([
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']),
                'sub_title' => $postData['sub_title'],
                'body' => $postData['body'],
                'status' => 'scheduled',
                'scheduled_for' => $postData['scheduled_for'],
                'cover_photo_path' => 'https://picsum.photos/800/400?random='.rand(1, 1000),
                'photo_alt_text' => 'Gambar untuk artikel: '.$postData['title'],
                'user_id' => $users->random()->id,
            ]);

            $post->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );

            $post->tags()->attach(
                $tags->random(rand(2, 5))->pluck('id')->toArray()
            );

            SeoDetail::create([
                'post_id' => $post->id,
                'title' => $postData['title'].' - Blog Teknologi',
                'description' => substr(strip_tags($postData['body']), 0, 160).'...',
                'keywords' => $this->generateKeywords($postData['title'], $post->categories, $post->tags),
            ]);
        }
    }

    /**
     * Create pending posts.
     */
    private function createPendingPosts($categories, $tags, $users, int $count): void
    {
        $pendingPosts = [
            [
                'title' => 'Blockchain Technology dan Masa Depan Keuangan',
                'sub_title' => 'Revolusi sistem keuangan dengan blockchain',
                'body' => '<p>Blockchain technology bukan hanya tentang cryptocurrency, tetapi juga tentang revolusi sistem keuangan secara keseluruhan. Teknologi ini menawarkan transparansi, keamanan, dan efisiensi yang lebih baik.</p><p>Masa depan keuangan diprediksi akan banyak dipengaruhi oleh perkembangan blockchain technology.</p>',
            ],
            [
                'title' => 'Cloud Computing: Solusi IT untuk Bisnis Modern',
                'sub_title' => 'Memanfaatkan cloud untuk skalabilitas bisnis',
                'body' => '<p>Cloud computing telah menjadi tulang punggung infrastruktur IT modern. Banyak perusahaan yang beralih ke cloud untuk mendapatkan skalabilitas, fleksibilitas, dan efisiensi biaya.</p><p>Dalam artikel ini kita akan membahas berbagai aspek cloud computing untuk bisnis.</p>',
            ],
            [
                'title' => 'UI/UX Design: Meningkatkan Pengalaman Pengguna',
                'sub_title' => 'Prinsip-prinsip desain yang user-friendly',
                'body' => '<p>UI/UX Design memainkan peran penting dalam kesuksesan sebuah aplikasi atau website. Desain yang baik dapat meningkatkan user engagement dan satisfaction.</p><p>Penting bagi designer untuk memahami prinsip-prinsip UX yang baik.</p>',
            ],
            [
                'title' => 'DevOps: Mempercepat Siklus Pengembangan Software',
                'sub_title' => 'Integrasi development dan operations',
                'body' => '<p>DevOps adalah praktik yang menggabungkan software development dan IT operations. Tujuannya adalah untuk mempersingkat siklus pengembangan sistem sambil meningkatkan kualitas produk.</p><p>Banyak perusahaan teknologi yang sudah mengadopsi budaya DevOps.</p>',
            ],
            [
                'title' => 'Internet of Things (IoT) dan Smart Home',
                'sub_title' => 'Teknologi rumah pintar untuk kehidupan modern',
                'body' => '<p>Internet of Things (IoT) memungkinkan berbagai perangkat untuk terhubung dan berkomunikasi satu sama lain. Teknologi ini membawa konsep smart home ke dalam kehidupan sehari-hari.</p><p>Masa depan rumah tangga akan semakin dipengaruhi oleh perkembangan IoT.</p>',
            ],
        ];

        for ($i = 0; $i < $count && $i < count($pendingPosts); $i++) {
            $postData = $pendingPosts[$i];

            $post = Post::create([
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']),
                'sub_title' => $postData['sub_title'],
                'body' => $postData['body'],
                'status' => 'pending',
                'cover_photo_path' => 'https://picsum.photos/800/400?random='.rand(1, 1000),
                'photo_alt_text' => 'Gambar untuk artikel: '.$postData['title'],
                'user_id' => $users->random()->id,
            ]);

            $post->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );

            $post->tags()->attach(
                $tags->random(rand(2, 5))->pluck('id')->toArray()
            );

            SeoDetail::create([
                'post_id' => $post->id,
                'title' => $postData['title'].' - Blog Teknologi',
                'description' => substr(strip_tags($postData['body']), 0, 160).'...',
                'keywords' => $this->generateKeywords($postData['title'], $post->categories, $post->tags),
            ]);
        }
    }

    /**
     * Generate relevant keywords for the post.
     */
    private function generateKeywords(string $title, $categories, $tags): array
    {
        $keywords = [];

        // Add words from title
        $titleWords = explode(' ', strtolower($title));
        $keywords = array_merge($keywords, array_slice($titleWords, 0, 3));

        // Add category names
        foreach ($categories as $category) {
            $keywords[] = strtolower($category->name);
        }

        // Add tag names
        foreach ($tags as $tag) {
            $keywords[] = strtolower($tag->name);
        }

        // Add some general tech keywords
        $generalKeywords = ['teknologi', 'programming', 'development', 'tutorial', 'tips', 'panduan'];
        $keywords = array_merge($keywords, array_slice($generalKeywords, 0, rand(2, 4)));

        // Remove duplicates and limit to 10 keywords
        return array_slice(array_unique($keywords), 0, 10);
    }
}
