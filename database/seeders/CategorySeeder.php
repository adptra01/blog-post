<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing categories to avoid duplicates
        Category::truncate();

        $categories = [
            [
                'name' => 'Teknologi',
                'slug' => 'teknologi',
            ],
            [
                'name' => 'Programming',
                'slug' => 'programming',
            ],
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
            ],
            [
                'name' => 'Mobile Development',
                'slug' => 'mobile-development',
            ],
            [
                'name' => 'Data Science',
                'slug' => 'data-science',
            ],
            [
                'name' => 'Artificial Intelligence',
                'slug' => 'artificial-intelligence',
            ],
            [
                'name' => 'Cyber Security',
                'slug' => 'cyber-security',
            ],
            [
                'name' => 'DevOps',
                'slug' => 'devops',
            ],
            [
                'name' => 'Cloud Computing',
                'slug' => 'cloud-computing',
            ],
            [
                'name' => 'Blockchain',
                'slug' => 'blockchain',
            ],
            [
                'name' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
            ],
            [
                'name' => 'Digital Marketing',
                'slug' => 'digital-marketing',
            ],
            [
                'name' => 'Startup',
                'slug' => 'startup',
            ],
            [
                'name' => 'Tutorial',
                'slug' => 'tutorial',
            ],
            [
                'name' => 'Review',
                'slug' => 'review',
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }

        // Note: Not using factory to avoid conflicts with API data
        // Categories are now only from specific seeder definitions

        $this->command->info('Created '.Category::count().' categories');
    }
}
