<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Blog Teknologi Modern',
            'description' => 'Platform berbagi pengetahuan tentang teknologi, programming, dan inovasi digital terkini.',
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
            ],
        ];
    }
}
