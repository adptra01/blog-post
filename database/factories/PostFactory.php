<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->randomElement([
            'Mengenal Framework Laravel untuk Pengembangan Web Modern',
            'Tips dan Trik Programming untuk Developer Pemula',
            'Membangun Aplikasi Mobile dengan React Native',
            'Strategi Digital Marketing untuk UMKM',
            'Machine Learning: Revolusi Industri 4.0',
            'Cyber Security: Melindungi Data di Era Digital',
            'Blockchain Technology dan Masa Depan Keuangan',
            'Cloud Computing: Solusi IT untuk Bisnis Modern',
            'UI/UX Design: Meningkatkan Pengalaman Pengguna',
            'DevOps: Mempercepat Siklus Pengembangan Software',
            'Internet of Things (IoT) dan Smart Home',
            'Artificial Intelligence dalam Kehidupan Sehari-hari',
            'E-commerce Trends di Indonesia',
            'Startup Ecosystem di Asia Tenggara',
            'Data Science untuk Pengambilan Keputusan Bisnis',
        ]);

        $statuses = ['published', 'scheduled', 'pending'];
        $status = fake()->randomElement($statuses);

        $published_at = null;
        $scheduled_for = null;

        if ($status === 'published') {
            $published_at = fake()->dateTimeBetween('-3 months', 'now');
        } elseif ($status === 'scheduled') {
            $scheduled_for = fake()->dateTimeBetween('now', '+1 month');
        }

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'sub_title' => fake()->sentence(10),
            'body' => $this->generateArticleBody(),
            'status' => $status,
            'published_at' => $published_at,
            'scheduled_for' => $scheduled_for,
            'cover_photo_path' => 'https://picsum.photos/800/400?random='.fake()->numberBetween(1, 1000),
            'photo_alt_text' => 'Gambar untuk artikel: '.$title,
            'user_id' => User::factory(),
        ];
    }

    /**
     * Generate a realistic article body.
     */
    private function generateArticleBody(): string
    {
        $paragraphs = [];

        // Introduction paragraph
        $paragraphs[] = fake()->paragraph(3);

        // Body paragraphs
        for ($i = 0; $i < fake()->numberBetween(3, 6); $i++) {
            $paragraphs[] = fake()->paragraph(fake()->numberBetween(3, 6));
        }

        // Conclusion paragraph
        $paragraphs[] = fake()->paragraph(2);

        return implode("\n\n", $paragraphs);
    }

    /**
     * Indicate that the post should be published.
     */
    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'published',
            'published_at' => fake()->dateTimeBetween('-3 months', 'now'),
            'scheduled_for' => null,
        ]);
    }

    /**
     * Indicate that the post should be scheduled.
     */
    public function scheduled(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'scheduled',
            'published_at' => null,
            'scheduled_for' => fake()->dateTimeBetween('now', '+1 month'),
        ]);
    }

    /**
     * Indicate that the post should be pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
            'published_at' => null,
            'scheduled_for' => null,
        ]);
    }
}
