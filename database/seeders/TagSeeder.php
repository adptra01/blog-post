<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing tags to avoid duplicates
        Tag::truncate();

        $tags = [
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
            ],
            [
                'name' => 'PHP',
                'slug' => 'php',
            ],
            [
                'name' => 'JavaScript',
                'slug' => 'javascript',
            ],
            [
                'name' => 'React',
                'slug' => 'react',
            ],
            [
                'name' => 'Vue.js',
                'slug' => 'vuejs',
            ],
            [
                'name' => 'Node.js',
                'slug' => 'nodejs',
            ],
            [
                'name' => 'Python',
                'slug' => 'python',
            ],
            [
                'name' => 'Machine Learning',
                'slug' => 'machine-learning',
            ],
            [
                'name' => 'AI',
                'slug' => 'ai',
            ],
            [
                'name' => 'Blockchain',
                'slug' => 'blockchain',
            ],
            [
                'name' => 'Cyber Security',
                'slug' => 'cyber-security',
            ],
            [
                'name' => 'Cloud Computing',
                'slug' => 'cloud-computing',
            ],
            [
                'name' => 'DevOps',
                'slug' => 'devops',
            ],
            [
                'name' => 'Mobile Development',
                'slug' => 'mobile-development',
            ],
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
            ],
            [
                'name' => 'Database',
                'slug' => 'database',
            ],
            [
                'name' => 'API',
                'slug' => 'api',
            ],
            [
                'name' => 'Microservices',
                'slug' => 'microservices',
            ],
            [
                'name' => 'Agile',
                'slug' => 'agile',
            ],
            [
                'name' => 'Startup',
                'slug' => 'startup',
            ],
            [
                'name' => 'Digital Marketing',
                'slug' => 'digital-marketing',
            ],
            [
                'name' => 'E-commerce',
                'slug' => 'e-commerce',
            ],
            [
                'name' => 'Fintech',
                'slug' => 'fintech',
            ],
            [
                'name' => 'Healthtech',
                'slug' => 'healthtech',
            ],
            [
                'name' => 'Edtech',
                'slug' => 'edtech',
            ],
        ];

        foreach ($tags as $tag) {
            Tag::firstOrCreate(
                ['slug' => $tag['slug']],
                $tag
            );
        }

        // Note: Not using factory to avoid conflicts with API data
        // Tags are now only from specific seeder definitions

        $this->command->info('Created '.Tag::count().' tags');
    }
}
