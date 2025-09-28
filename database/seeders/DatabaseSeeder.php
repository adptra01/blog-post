<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('🌱 Menyiapkan database dengan data seeder...');
        $this->command->info('================================================');

        // 1. Create users first (required for posts)
        $this->command->info('1️⃣ Membuat data users...');
        $this->call(UserSeeder::class);

        // 2. Create categories and tags
        $this->command->info('2️⃣ Membuat data categories...');
        $this->call(CategorySeeder::class);

        $this->command->info('3️⃣ Membuat data tags...');
        $this->call(TagSeeder::class);

        // 3. Create settings
        $this->command->info('4️⃣ Membuat data settings...');
        $this->call(SettingSeeder::class);

        // 4. Create posts with relationships
        $this->command->info('5️⃣ Membuat data posts dengan API integration...');
        $this->call(PostSeeder::class);

        // 5. Create comments
        $this->command->info('6️⃣ Membuat data comments...');
        $this->call(CommentSeeder::class);

        // 6. Create newsletter subscribers
        $this->command->info('7️⃣ Membuat data newsletter subscribers...');
        $this->call(NewsletterSeeder::class);

        // 7. Create share snippets
        $this->command->info('8️⃣ Membuat data share snippets...');
        $this->call(ShareSnippetSeeder::class);

        $this->command->info('================================================');
        $this->command->info('✅ Database seeding selesai!');
        $this->command->info('📊 Data yang telah dibuat:');
        $this->command->info('   • Users: '.\App\Models\User::count());
        $this->command->info('   • Categories: '.\App\Models\Category::count());
        $this->command->info('   • Tags: '.\App\Models\Tag::count());
        $this->command->info('   • Posts: '.\App\Models\Post::count());
        $this->command->info('   • Comments: '.\App\Models\Comment::count());
        $this->command->info('   • Newsletter Subscribers: '.\App\Models\Newsletter::count());
        $this->command->info('   • Share Snippets: '.\App\Models\ShareSnippet::count());
        $this->command->info('   • Settings: '.\App\Models\Setting::count());
    }
}
