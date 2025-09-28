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
                'name' => 'Kegiatan Desa',
                'slug' => 'kegiatan-desa',
                'icon' => 'users',
            ],
            [
                'name' => 'UMKM & Produk Lokal',
                'slug' => 'umkm-produk-lokal',
                'icon' => 'shopping-bag',
            ],
            [
                'name' => 'Wisata & Budaya',
                'slug' => 'wisata-budaya',
                'icon' => 'camera',
            ],
            [
                'name' => 'Pengumuman Resmi',
                'slug' => 'pengumuman-resmi',
                'icon' => 'bullhorn',
            ],
            [
                'name' => 'Pertanian & Perkebunan',
                'slug' => 'pertanian-perkebunan',
                'icon' => 'leaf',
            ],
            [
                'name' => 'Pemerintah Desa',
                'slug' => 'pemerintah-desa',
                'icon' => 'landmark',
            ],
            [
                'name' => 'Kesehatan & Sosial',
                'slug' => 'kesehatan-sosial',
                'icon' => 'heartbeat',
            ],
            [
                'name' => 'Pendidikan',
                'slug' => 'pendidikan',
                'icon' => 'graduation-cap',
            ],
            [
                'name' => 'Infrastruktur',
                'slug' => 'infrastruktur',
                'icon' => 'road',
            ],
            [
                'name' => 'Profil Warga',
                'slug' => 'profil-warga',
                'icon' => 'user',
            ],
            [
                'name' => 'Berita Warga',
                'slug' => 'berita-warga',
                'icon' => 'newspaper',
            ],
            [
                'name' => 'Agenda & Event',
                'slug' => 'agenda-event',
                'icon' => 'calendar-alt',
            ],
            [
                'name' => 'Potensi Desa',
                'slug' => 'potensi-desa',
                'icon' => 'chart-line',
            ],
            [
                'name' => 'Sejarah & Budaya',
                'slug' => 'sejarah-budaya',
                'icon' => 'book',
            ],
            [
                'name' => 'Lingkungan',
                'slug' => 'lingkungan',
                'icon' => 'tree',
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
