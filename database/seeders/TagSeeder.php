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
                'name' => 'Desa Tangkit',
                'slug' => 'desa-tangkit',
            ],
            [
                'name' => 'Nanas',
                'slug' => 'nanas',
            ],
            [
                'name' => 'Pertanian',
                'slug' => 'pertanian',
            ],
            [
                'name' => 'UMKM',
                'slug' => 'umkm',
            ],
            [
                'name' => 'Wisata Desa',
                'slug' => 'wisata-desa',
            ],
            [
                'name' => 'Kegiatan Warga',
                'slug' => 'kegiatan-warga',
            ],
            [
                'name' => 'Pengumuman',
                'slug' => 'pengumuman',
            ],
            [
                'name' => 'Pemerintah Desa',
                'slug' => 'pemerintah-desa',
            ],
            [
                'name' => 'Produk Lokal',
                'slug' => 'produk-lokal',
            ],
            [
                'name' => 'Keripik Nanas',
                'slug' => 'keripik-nanas',
            ],
            [
                'name' => 'Sale Nanas',
                'slug' => 'sale-nanas',
            ],
            [
                'name' => 'Dodol Nanas',
                'slug' => 'dodol-nanas',
            ],
            [
                'name' => 'Agrowisata',
                'slug' => 'agrowisata',
            ],
            [
                'name' => 'Kebun Nanas',
                'slug' => 'kebun-nanas',
            ],
            [
                'name' => 'Panen Nanas',
                'slug' => 'panen-nanas',
            ],
            [
                'name' => 'Petani',
                'slug' => 'petani',
            ],
            [
                'name' => 'Koperasi',
                'slug' => 'koperasi',
            ],
            [
                'name' => 'Infrastruktur',
                'slug' => 'infrastruktur',
            ],
            [
                'name' => 'Pendidikan',
                'slug' => 'pendidikan',
            ],
            [
                'name' => 'Kesehatan',
                'slug' => 'kesehatan',
            ],
            [
                'name' => 'Budaya Lokal',
                'slug' => 'budaya-lokal',
            ],
            [
                'name' => 'Festival Desa',
                'slug' => 'festival-desa',
            ],
            [
                'name' => 'Gotong Royong',
                'slug' => 'gotong-royong',
            ],
            [
                'name' => 'Lingkungan',
                'slug' => 'lingkungan',
            ],
            [
                'name' => 'Pembangunan',
                'slug' => 'pembangunan',
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
