<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $users = User::all();

        if ($posts->isEmpty() || $users->isEmpty()) {
            $this->command->warn('Posts or users not found. Please run PostSeeder and UserSeeder first.');

            return;
        }

        $this->command->info('Fetching comments from public APIs...');

        // Fetch comments from JSONPlaceholder
        try {
            $jsonPlaceholderComments = Http::timeout(10)->get('https://jsonplaceholder.typicode.com/comments')->json();
        } catch (\Exception $e) {
            $this->command->warn('Failed to fetch from JSONPlaceholder API. Using factory data instead.');
            $jsonPlaceholderComments = [];
        }

        $commentsCreated = 0;

        // Use API data if available
        if (! empty($jsonPlaceholderComments)) {
            foreach (array_slice($jsonPlaceholderComments, 0, 100) as $apiComment) {
                // Find a post that matches the API post ID (modulo to fit our post count)
                $post = $posts->first() ?? $posts->random();

                // Find a user or use random
                $user = $users->random();

                Comment::create([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                    'comment' => $this->formatComment($apiComment['body']),
                    'approved' => rand(1, 100) <= 85, // 85% approved
                    'approved_at' => rand(1, 100) <= 85 ? now()->subDays(rand(0, 30)) : null,
                ]);

                $commentsCreated++;
            }
        }

        // Create additional comments using factory if we need more
        $remainingComments = 150 - $commentsCreated;
        if ($remainingComments > 0) {
            Comment::factory($remainingComments)->create([
                'post_id' => $posts->random()->id,
                'user_id' => $users->random()->id,
            ]);
        }

        $this->command->info('Created '.Comment::count().' comments');
    }

    /**
     * Format API comment text.
     */
    private function formatComment(string $comment): string
    {
        // Clean up and format the comment text
        $comment = trim($comment);
        $comment = ucfirst(strtolower($comment));

        // Ensure minimum length
        if (strlen($comment) < 10) {
            $comment .= ' Terima kasih atas artikel yang sangat informatif!';
        }

        return $comment;
    }
}
