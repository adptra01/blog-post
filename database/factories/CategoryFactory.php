<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Teknologi',
            'Bisnis',
            'Kesehatan',
            'Pendidikan',
            'Olahraga',
            'Hiburan',
            'Politik',
            'Ekonomi',
            'Sains',
            'Lifestyle',
            'Travel',
            'Kuliner',
            'Fashion',
            'Otomotif',
            'Properti',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
