<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Laravel',
            'PHP',
            'JavaScript',
            'React',
            'Vue.js',
            'Node.js',
            'Python',
            'Machine Learning',
            'AI',
            'Blockchain',
            'Cyber Security',
            'Cloud Computing',
            'DevOps',
            'Mobile Development',
            'Web Development',
            'Database',
            'API',
            'Microservices',
            'Agile',
            'Startup',
            'Digital Marketing',
            'E-commerce',
            'Fintech',
            'Healthtech',
            'Edtech',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
