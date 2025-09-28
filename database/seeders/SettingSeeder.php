<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'title' => 'Blog Teknologi Modern',
            'description' => 'Platform berbagi pengetahuan tentang teknologi, programming, dan inovasi digital terkini. Temukan artikel-artikel berkualitas tentang web development, mobile development, AI, machine learning, dan masih banyak lagi.',
            'logo' => '/images/logo.png',
            'favicon' => '/images/favicon.ico',
            'organization_name' => 'Tech Blog Indonesia',
            'google_console_code' => null,
            'google_analytic_code' => 'GA-XXXXXXXXX',
            'google_adsense_code' => null,
            'quick_links' => [
                [
                    'title' => 'Laravel',
                    'url' => '/categories/laravel',
                    'icon' => 'fab fa-laravel',
                ],
                [
                    'title' => 'React',
                    'url' => '/categories/react',
                    'icon' => 'fab fa-react',
                ],
                [
                    'title' => 'Vue.js',
                    'url' => '/categories/vuejs',
                    'icon' => 'fab fa-vuejs',
                ],
                [
                    'title' => 'Python',
                    'url' => '/categories/python',
                    'icon' => 'fab fa-python',
                ],
                [
                    'title' => 'JavaScript',
                    'url' => '/categories/javascript',
                    'icon' => 'fab fa-js-square',
                ],
                [
                    'title' => 'PHP',
                    'url' => '/categories/php',
                    'icon' => 'fab fa-php',
                ],
            ],
        ]);

        $this->command->info('Created blog settings');
    }
}
