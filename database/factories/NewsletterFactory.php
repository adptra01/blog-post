<?php

namespace Database\Factories;

use App\Models\Newsletter;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsletterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Newsletter::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'subscribed' => fake()->boolean(85), // 85% chance of being subscribed
        ];
    }

    /**
     * Indicate that the subscriber should be subscribed.
     */
    public function subscribed(): static
    {
        return $this->state(fn (array $attributes) => [
            'subscribed' => true,
        ]);
    }

    /**
     * Indicate that the subscriber should be unsubscribed.
     */
    public function unsubscribed(): static
    {
        return $this->state(fn (array $attributes) => [
            'subscribed' => false,
        ]);
    }
}
