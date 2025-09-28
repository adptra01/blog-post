<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $approved = fake()->boolean(70); // 70% chance of being approved

        return [
            'user_id' => User::factory(),
            'post_id' => Post::factory(),
            'comment' => fake()->randomElement([
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
            ]),
            'approved' => $approved,
            'approved_at' => $approved ? fake()->dateTimeBetween('-1 month', 'now') : null,
        ];
    }

    /**
     * Indicate that the comment should be approved.
     */
    public function approved(): static
    {
        return $this->state(fn (array $attributes) => [
            'approved' => true,
            'approved_at' => fake()->dateTimeBetween('-1 month', 'now'),
        ]);
    }

    /**
     * Indicate that the comment should be unapproved.
     */
    public function unapproved(): static
    {
        return $this->state(fn (array $attributes) => [
            'approved' => false,
            'approved_at' => null,
        ]);
    }
}
