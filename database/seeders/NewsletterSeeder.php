<?php

namespace Database\Seeders;

use App\Models\Newsletter;
use Illuminate\Database\Seeder;

class NewsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing newsletter subscribers to avoid duplicates
        Newsletter::truncate();

        // Create some specific newsletter subscribers
        $subscribers = [
            'admin@blog.test',
            'editor@blog.test',
            'author@blog.test',
            'user1@example.com',
            'user2@example.com',
            'user3@example.com',
            'developer@company.com',
            'manager@startup.com',
            'freelancer@remote.com',
            'student@university.ac.id',
        ];

        foreach ($subscribers as $email) {
            Newsletter::firstOrCreate(
                ['email' => $email],
                ['subscribed' => true]
            );
        }

        $this->command->info('Created ' . Newsletter::count() . ' newsletter subscribers');
    }
}
