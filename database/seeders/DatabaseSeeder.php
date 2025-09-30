<?php

namespace Database\Seeders;

use App\Models\User;
use Firefly\FilamentBlog\Models\Category;
use Firefly\FilamentBlog\Models\Comment;
use Firefly\FilamentBlog\Models\Post;
use Firefly\FilamentBlog\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Users
        $users = User::factory(10)->create();

        $admin = User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@testing.com',
        ]);

        // Seed Categories
        $categories = Category::factory(8)->create();

        // Seed Tags
        $tags = Tag::factory(15)->create();

        // Seed Posts dengan relasi
        $posts = Post::factory(30)
            ->recycle($users)
            ->published()
            ->create()
            ->each(function ($post) use ($categories, $tags) {
                // Attach random categories (1-3 categories per post)
                $post->categories()->attach(
                    $categories->random(rand(1, 3))->pluck('id')->toArray()
                );

                // Attach random tags (2-5 tags per post)
                $post->tags()->attach(
                    $tags->random(rand(2, 5))->pluck('id')->toArray()
                );
            });

        // Seed Comments untuk setiap post
        $posts->each(function ($post) use ($users) {
            Comment::factory(rand(2, 8))
                ->recycle($users)
                ->create([
                    'post_id' => $post->id,
                    'approved' => rand(0, 1) === 1, // Random approved status
                ]);
        });
    }
}
