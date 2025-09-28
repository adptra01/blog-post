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
            $this->command->warn('Failed to fetch from JSONPlaceholder API. Using fallback data instead.');
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

        // Create additional specific comments if we need more
        $remainingComments = 50 - $commentsCreated;
        if ($remainingComments > 0) {
            $commentTexts = [
                'Artikel yang sangat informatif! Terima kasih atas sharingnya.',
                'Penjelasan yang sangat mudah dipahami. Bagus sekali!',
                'Saya setuju dengan poin-poin yang disampaikan.',
                'Ini sangat membantu untuk project saya. Thanks!',
                'Kapan dilanjut dengan part berikutnya?',
                'Apakah ada referensi tambahan yang bisa dipelajari?',
                'Saya baru belajar tentang ini, sangat bermanfaat.',
                'Bagus! Sudah bookmark untuk dibaca lagi nanti.',
                'Penjelasan detail dan mudah diikuti.',
                'Materi yang sangat berguna untuk developer pemula.',
                'Saya rasa masih ada yang kurang di bagian implementasi.',
                'Apakah bisa dijelaskan lebih detail lagi?',
                'Mantap! Sudah langsung saya praktekkan.',
                'Artikel ini sangat recommended untuk dibaca.',
                'Thanks atas tutorialnya, sangat membantu!',
                'Pertanyaan yang bagus, saya juga penasaran dengan hal yang sama.',
                'Sudah coba implementasi dan berhasil! Terima kasih banyak.',
                'Explanation is clear and concise. Well done!',
                'Looking forward to more advanced topics.',
                'This really helped me understand the concept better.',
            ];

            for ($i = 0; $i < $remainingComments; $i++) {
                Comment::create([
                    'user_id' => $users->random()->id,
                    'post_id' => $posts->random()->id,
                    'comment' => $commentTexts[$i % count($commentTexts)],
                    'approved' => rand(1, 100) <= 85,
                    'approved_at' => rand(1, 100) <= 85 ? now()->subDays(rand(0, 30)) : null,
                ]);
            }
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
