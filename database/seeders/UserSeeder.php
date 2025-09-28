<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@testing.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Create editor user
        User::factory()->create([
            'name' => 'Editor Blog',
            'email' => 'editor@testing.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Create author user
        User::factory()->create([
            'name' => 'Penulis Artikel',
            'email' => 'author@testing.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Create regular users who will be commenters
        User::factory()->create([
            'name' => 'Ahmad Santoso',
            'email' => 'ahmad@testing.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti@testing.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Budi Setiawan',
            'email' => 'budi@testing.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Maya Sari',
            'email' => 'maya@testing.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Note: Only using specific user definitions, no random factory data
    }
}
