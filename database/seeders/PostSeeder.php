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
            $this->command->warn('Failed to fetch from JSONPlaceholder API. Using factory data instead.');
            $jsonPlaceholderPosts = [];
            $jsonPlaceholderComments = [];
            $jsonPlaceholderUsers = [];
        }

        // Create posts using API data and factory fallback
        $postsCreated = 0;

        // Use API data if available
        if (! empty($jsonPlaceholderPosts)) {
            foreach (array_slice($jsonPlaceholderPosts, 0, 20) as $apiPost) {
                $post = $this->createPostFromAPI($apiPost, $categories, $tags, $users);
                if ($post) {
                    $postsCreated++;

                    // Create SEO details
                    SeoDetail::factory()->create([
                        'post_id' => $post->id,
                        'title' => $post->title.' - Blog Teknologi',
                        'description' => substr(strip_tags($post->body), 0, 160).'...',
                        'keywords' => $this->generateKeywords($post->title, $post->categories, $post->tags),
                    ]);
                }
            }
        }

        // Create additional posts using factory if we need more
        $remainingPosts = 25 - $postsCreated;
        if ($remainingPosts > 0) {
            for ($i = 0; $i < $remainingPosts; $i++) {
                $post = Post::factory()->published()->create([
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

                // Create SEO details for the post
                SeoDetail::factory()->create([
                    'post_id' => $post->id,
                ]);

                $postsCreated++;
            }
        }

        // Create scheduled and pending posts
        $this->createScheduledPosts($categories, $tags, $users, 5);
        $this->createPendingPosts($categories, $tags, $users, 8);

        $this->command->info("Created {$postsCreated} published posts, 5 scheduled posts, and 8 pending posts");
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
        for ($i = 0; $i < $count; $i++) {
            $post = Post::factory()->scheduled()->create([
                'user_id' => $users->random()->id,
            ]);

            $post->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );

            $post->tags()->attach(
                $tags->random(rand(2, 5))->pluck('id')->toArray()
            );

            SeoDetail::factory()->create([
                'post_id' => $post->id,
            ]);
        }
    }

    /**
     * Create pending posts.
     */
    private function createPendingPosts($categories, $tags, $users, int $count): void
    {
        for ($i = 0; $i < $count; $i++) {
            $post = Post::factory()->pending()->create([
                'user_id' => $users->random()->id,
            ]);

            $post->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );

            $post->tags()->attach(
                $tags->random(rand(2, 5))->pluck('id')->toArray()
            );

            SeoDetail::factory()->create([
                'post_id' => $post->id,
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
