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
        User::firstOrCreate(
            ['email' => 'admin@blog.test'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Create editor user
        User::firstOrCreate(
            ['email' => 'editor@blog.test'],
            [
                'name' => 'Editor Blog',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Create author user
        User::firstOrCreate(
            ['email' => 'author@blog.test'],
            [
                'name' => 'Penulis Artikel',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Create regular users who will be commenters
        User::firstOrCreate(
            ['email' => 'ahmad@example.com'],
            [
                'name' => 'Ahmad Santoso',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'siti@example.com'],
            [
                'name' => 'Siti Nurhaliza',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'budi@example.com'],
            [
                'name' => 'Budi Setiawan',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'maya@example.com'],
            [
                'name' => 'Maya Sari',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Note: Only using specific user definitions, no random factory data
    }
}
