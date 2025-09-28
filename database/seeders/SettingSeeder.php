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
            'title' => 'Portal Berita Desa Tangkit',
            'description' => 'Selamat datang di Portal Berita Desa Tangkit - sentra produksi nanas terkemuka. Temukan informasi terkini tentang kegiatan desa, potensi UMKM, wisata lokal, dan berbagai program pembangunan untuk kemajuan bersama.',
            'logo' => '/images/logo-tangkit.png',
            'favicon' => '/images/favicon-tangkit.ico',
            'organization_name' => 'Pemerintah Desa Tangkit',
            'google_console_code' => null,
            'google_analytic_code' => 'GA-TANGKIT-2024',
            'google_adsense_code' => null,
            'quick_links' => [
                [
                    'title' => 'UMKM Nanas',
                    'url' => '/kategori/umkm-produk-lokal',
                    'icon' => 'fas fa-store',
                ],
                [
                    'title' => 'Wisata Desa',
                    'url' => '/kategori/wisata-budaya',
                    'icon' => 'fas fa-tree',
                ],
                [
                    'title' => 'Pengumuman',
                    'url' => '/kategori/pengumuman-resmi',
                    'icon' => 'fas fa-bullhorn',
                ],
                [
                    'title' => 'Kegiatan',
                    'url' => '/kategori/kegiatan-desa',
                    'icon' => 'fas fa-users',
                ],
                [
                    'title' => 'Pertanian',
                    'url' => '/kategori/pertanian-perkebunan',
                    'icon' => 'fas fa-seedling',
                ],
                [
                    'title' => 'Profil Desa',
                    'url' => '/profil-desa',
                    'icon' => 'fas fa-info-circle',
                ],
            ],
        ]);

        $this->command->info('Created village settings for Desa Tangkit');
    }
}
