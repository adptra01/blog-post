<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\SeoDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeoDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SeoDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => Post::factory(),
            'title' => $this->faker->sentence(6).' - Blog Teknologi',
            'keywords' => $this->generateKeywords(),
            'description' => $this->faker->text(160),
        ];
    }

    /**
     * Generate realistic keywords for tech blog.
     */
    private function generateKeywords(): array
    {
        $techKeywords = [
            'teknologi', 'programming', 'development', 'tutorial', 'tips', 'panduan',
            'laravel', 'php', 'javascript', 'react', 'vuejs', 'nodejs', 'python',
            'machine learning', 'ai', 'blockchain', 'cyber security', 'devops',
            'web development', 'mobile development', 'database', 'api',
        ];

        // Return random 5-8 keywords
        return $this->faker->randomElements($techKeywords, rand(5, 8));
    }
}
