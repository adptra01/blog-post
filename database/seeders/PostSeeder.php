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
                    'title' => 'Panen Nanas Raya di Desa Tangkit 2024',
                    'sub_title' => 'Petani Desa Tangkit berhasil panen nanas dengan hasil melimpah',
                    'body' => '<p>Desa Tangkit kembali menunjukkan keunggulannya sebagai sentra produksi nanas di wilayah ini. Pada panen raya tahun 2024, petani desa berhasil mengumpulkan ribuan kilogram nanas berkualitas tinggi.</p><p>Kegiatan panen ini melibatkan seluruh warga dan menjadi momentum untuk memperkuat solidaritas antarwarga. Nanas-nanas ini akan diolah menjadi berbagai produk olahan yang menjadi ciri khas Desa Tangkit.</p>',
                    'status' => 'published',
                    'published_at' => now()->subDays(rand(0, 30)),
                ],
                [
                    'title' => 'UMKM Keripik Nanas Tangkit Raih Penghargaan',
                    'sub_title' => 'Produk olahan nanas dari Desa Tangkit mendapat pengakuan nasional',
                    'body' => '<p>Salah satu UMKM di Desa Tangkit yang mengolah nanas menjadi keripik berhasil meraih penghargaan dalam kompetisi produk olahan pangan tingkat nasional. Produk keripik nanas dengan rasa autentik khas Desa Tangkit ini mendapat sambutan positif dari juri.</p><p>Keberhasilan ini membuktikan bahwa potensi pertanian Desa Tangkit tidak hanya berhenti di produksi nanas mentah, tetapi juga bisa dikembangkan menjadi produk bernilai tambah tinggi.</p>',
                    'status' => 'published',
                    'published_at' => now()->subDays(rand(0, 30)),
                ],
                [
                    'title' => 'Wisata Agrowisata Nanas Tangkit Dibuka untuk Umum',
                    'sub_title' => 'Desa Tangkit kembangkan wisata edukasi pertanian nanas',
                    'body' => '<p>Desa Tangkit resmi membuka wisata agrowisata nanas untuk masyarakat umum. Pengunjung dapat belajar langsung tentang proses budidaya nanas, dari penanaman hingga panen. Wisata ini juga menampilkan berbagai produk olahan nanas yang menjadi unggulan desa.</p><p>Diharapkan wisata ini dapat meningkatkan pendapatan desa sekaligus menjadi sarana edukasi tentang pertanian modern.</p>',
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
                'title' => 'Festival Nanas Tangkit 2025',
                'sub_title' => 'Perayaan panen nanas dengan berbagai kegiatan budaya',
                'body' => '<p>Desa Tangkit akan menggelar Festival Nanas sebagai bentuk syukur atas hasil panen yang melimpah. Festival ini akan menampilkan berbagai kegiatan seperti lomba olahan nanas, pertunjukan budaya, dan bazaar produk lokal.</p><p>Acara ini diharapkan dapat meningkatkan citra Desa Tangkit sebagai sentra produksi nanas sekaligus memperkenalkan potensi wisata desa kepada masyarakat luas.</p>',
                'scheduled_for' => now()->addDays(rand(1, 30)),
            ],
            [
                'title' => 'Pelatihan Pengolahan Nanas untuk Warga',
                'sub_title' => 'Kegiatan pemberdayaan UMKM pengolahan nanas',
                'body' => '<p>Pemerintah Desa Tangkit akan menyelenggarakan pelatihan pengolahan nanas menjadi berbagai produk bernilai tambah. Pelatihan ini bertujuan untuk meningkatkan keterampilan warga dalam mengembangkan usaha berbasis nanas.</p><p>Materi yang akan disampaikan meliputi teknik pengolahan, packaging, dan pemasaran produk olahan nanas.</p>',
                'scheduled_for' => now()->addDays(rand(1, 30)),
            ],
            [
                'title' => 'Rapat Musyawarah Desa Tangkit',
                'sub_title' => 'Pembahasan program pembangunan desa tahun 2025',
                'body' => '<p>Akan diselenggarakan rapat musyawarah desa untuk membahas program pembangunan Desa Tangkit tahun 2025. Rapat ini akan melibatkan seluruh perangkat desa dan tokoh masyarakat.</p><p>Agenda utama adalah penyusunan APBDes dan program prioritas pembangunan infrastruktur desa.</p>',
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
                'title' => 'Potensi Wisata Desa Tangkit',
                'sub_title' => 'Menjelajahi keindahan alam dan budaya Desa Tangkit',
                'body' => '<p>Desa Tangkit tidak hanya dikenal sebagai sentra produksi nanas, tetapi juga memiliki potensi wisata yang menarik. Wisatawan dapat menikmati keindahan perkebunan nanas yang hijau, mengunjungi tempat pengolahan nanas, dan belajar tentang budaya lokal.</p><p>Pemerintah desa sedang mengembangkan paket wisata yang mencakup agrowisata, kuliner khas, dan pengenalan budaya masyarakat Tangkit.</p>',
            ],
            [
                'title' => 'Program Kesehatan Masyarakat Desa Tangkit',
                'sub_title' => 'Pelayanan kesehatan untuk warga Desa Tangkit',
                'body' => '<p>Desa Tangkit memiliki program kesehatan masyarakat yang komprehensif, termasuk posyandu rutin, pemeriksaan kesehatan gratis, dan penyuluhan kesehatan. Program ini bertujuan untuk meningkatkan derajat kesehatan warga desa.</p><p>Kegiatan posyandu dilaksanakan setiap bulan dengan melibatkan kader kesehatan dan tenaga medis dari puskesmas setempat.</p>',
            ],
            [
                'title' => 'Infrastruktur Jalan Desa Tangkit',
                'sub_title' => 'Pembangunan dan perbaikan jalan untuk kemajuan desa',
                'body' => '<p>Pemerintah Desa Tangkit terus berupaya meningkatkan infrastruktur jalan untuk memudahkan akses warga dan mendukung kegiatan ekonomi. Beberapa ruas jalan desa telah diperbaiki dengan bantuan dari pemerintah kabupaten.</p><p>Pembangunan infrastruktur ini diharapkan dapat meningkatkan konektivitas dan mendukung pengembangan UMKM di desa.</p>',
            ],
            [
                'title' => 'Pendidikan di Desa Tangkit',
                'sub_title' => 'Fasilitas pendidikan dan program peningkatan mutu',
                'body' => '<p>Desa Tangkit memiliki komitmen tinggi terhadap pendidikan warga. Terdapat beberapa sekolah dasar dan program pendidikan non-formal yang diselenggarakan oleh pemerintah desa dan masyarakat.</p><p>Program bimbingan belajar dan kegiatan ekstrakurikuler rutin diselenggarakan untuk mendukung perkembangan anak-anak desa.</p>',
            ],
            [
                'title' => 'Pelestarian Lingkungan Desa Tangkit',
                'sub_title' => 'Program kebersihan dan pelestarian alam',
                'body' => '<p>Desa Tangkit aktif dalam program pelestarian lingkungan dengan kegiatan bersih-bersih rutin, penanaman pohon, dan pengelolaan sampah. Kesadaran masyarakat terhadap pentingnya lingkungan hidup terus ditingkatkan.</p><p>Program ini tidak hanya menjaga kebersihan desa, tetapi juga mendukung keberlanjutan pertanian nanas sebagai komoditas utama.</p>',
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
