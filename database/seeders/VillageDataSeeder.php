<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Document;
use App\Models\Gallery;
use App\Models\VillageProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VillageDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding Village Profile data...');
        // Village Profile Data
        VillageProfile::updateOrCreate(['section' => 'intro'], [
            'title' => 'Selamat Datang di Desa Tangkit',
            'content' => '<p>Desa Tangkit adalah sebuah desa yang terletak di Kecamatan Pangkalan Kuras, Kabupaten Pelalawan, Provinsi Riau. Desa kami dikenal sebagai penghasil nanas berkualitas tinggi dengan berbagai produk olahan yang menjadi kebanggaan masyarakat.</p><p>Dengan luas wilayah sekitar 2.500 hektar dan populasi lebih dari 3.000 jiwa, Desa Tangkit terus berkembang menjadi desa yang mandiri, sejahtera, dan modern.</p>',
            'order' => 1,
            'is_active' => true,
        ]);

        VillageProfile::updateOrCreate(['section' => 'history'], [
            'title' => 'Sejarah Desa Tangkit',
            'content' => '<p>Desa Tangkit didirikan pada tahun 1965 oleh para perintis yang membuka hutan untuk dijadikan lahan pertanian. Nama "Tangkit" diambil dari nama pohon khas yang banyak tumbuh di wilayah ini.</p><p>Seiring waktu, desa ini berkembang pesat dengan fokus pada pertanian nanas yang menjadi komoditas utama. Pada tahun 1980-an, Desa Tangkit mulai dikenal sebagai sentra nanas di Kabupaten Pelalawan.</p><p>Kini, Desa Tangkit tidak hanya unggul dalam pertanian, tetapi juga mengembangkan UMKM, wisata agro, dan berbagai inovasi untuk meningkatkan kesejahteraan masyarakat.</p>',
            'order' => 2,
            'is_active' => true,
        ]);

        VillageProfile::updateOrCreate(['section' => 'vision_mission'], [
            'title' => 'Visi & Misi Desa',
            'content' => '<h3>Visi</h3><p>Mewujudkan Desa Tangkit sebagai desa yang mandiri, sejahtera, dan berdaya saing melalui pengembangan pertanian berkelanjutan dan pemberdayaan masyarakat.</p>',
            'data' => [
                'misi' => '<h3>Misi</h3><ol><li>Meningkatkan kesejahteraan masyarakat melalui pemberdayaan ekonomi lokal</li><li>Mengembangkan pertanian nanas dan produk olahan sebagai komoditas unggulan</li><li>Meningkatkan kualitas pelayanan publik dan infrastruktur desa</li><li>Melestarikan budaya dan kearifan lokal masyarakat</li><li>Menciptakan tata kelola pemerintahan desa yang transparan dan akuntabel</li></ol>',
            ],
            'order' => 3,
            'is_active' => true,
        ]);

        VillageProfile::updateOrCreate(['section' => 'structure'], [
            'title' => 'Struktur Perangkat Desa',
            'data' => [
                ['name' => 'H. Ahmad Syahrin', 'position' => 'Kepala Desa', 'photo' => null],
                ['name' => 'Budi Santoso, S.Sos', 'position' => 'Sekretaris Desa', 'photo' => null],
                ['name' => 'Sri Wahyuni, SE', 'position' => 'Kaur Keuangan', 'photo' => null],
                ['name' => 'Muhammad Rizal', 'position' => 'Kaur Umum', 'photo' => null],
                ['name' => 'Siti Aminah', 'position' => 'Kaur Pembangunan', 'photo' => null],
                ['name' => 'Joko Widodo', 'position' => 'Kepala Dusun I', 'photo' => null],
                ['name' => 'Rudi Hartono', 'position' => 'Kepala Dusun II', 'photo' => null],
                ['name' => 'Dewi Lestari', 'position' => 'Kepala Dusun III', 'photo' => null],
            ],
            'order' => 4,
            'is_active' => true,
        ]);

        VillageProfile::updateOrCreate(['section' => 'statistics'], [
            'title' => 'Data Statistik Desa',
            'data' => [
                'Jumlah_Penduduk' => 3245,
                'Jumlah_KK' => 892,
                'Luas_Wilayah' => '2.500 Ha',
                'Jumlah_Dusun' => 3,
                'Sekolah' => 4,
                'Masjid' => 5,
                'Posyandu' => 3,
                'UMKM' => 45,
            ],
            'order' => 5,
            'is_active' => true,
        ]);
        $this->command->info('Village Profile data seeded.');

        $this->command->info('Seeding Gallery data...');
        // Gallery Data
        Storage::disk('public')->deleteDirectory('gallery');
        Storage::disk('public')->makeDirectory('gallery');

        $galleryCategories = ['kegiatan', 'alam', 'budaya', 'produk_lokal'];
        for ($i = 1; $i <= 12; $i++) {
            $imageUrl = "https://source.unsplash.com/random/800x800?sig={\$i}";
            $imageContents = Http::get($imageUrl)->body();
            $imageName = Str::random(40) . '.jpg';
            $path = 'gallery/' . $imageName;
            Storage::disk('public')->put($path, $imageContents);

            Gallery::updateOrCreate(['title' => 'Galeri Desa '.$i], [
                'description' => 'Dokumentasi kegiatan dan momen berharga di Desa Tangkit',
                'type' => $i % 4 === 0 ? 'video' : 'image',
                'media_path' => $path,
                'thumbnail_path' => $path,
                'category' => $galleryCategories[array_rand($galleryCategories)],
                'order' => $i,
                'is_featured' => $i <= 4,
                'is_active' => true,
            ]);
        }
        $this->command->info('Gallery data seeded.');

        $this->command->info('Seeding Announcement data...');
        // Announcements Data
        Announcement::updateOrCreate(['slug' => 'rapat-koordinasi-perangkat-desa-oktober-2025'], [
            'title' => 'Rapat Koordinasi Perangkat Desa Bulan Oktober 2025',
            'content' => '<p>Diberitahukan kepada seluruh Perangkat Desa untuk menghadiri Rapat Koordinasi pada:</p><p><strong>Hari/Tanggal:</strong> Senin, 15 Oktober 2025<br><strong>Waktu:</strong> 09.00 WIB<br><strong>Tempat:</strong> Aula Kantor Desa Tangkit</p><p>Agenda rapat meliputi evaluasi program kerja, pembahasan kegiatan mendatang, dan koordinasi tugas.</p><p>Kehadiran sangat diharapkan. Terima kasih.</p>',
            'type' => 'event',
            'event_date' => now()->addDays(14),
            'location' => 'Aula Kantor Desa Tangkit',
            'contact_person' => 'Sekretaris Desa',
            'contact_phone' => '0812-3456-7890',
            'is_featured' => true,
            'is_active' => true,
            'published_at' => now(),
        ]);

        Announcement::updateOrCreate(['slug' => 'festival-nanas-tangkit-2025'], [
            'title' => 'Festival Nanas Tangkit 2025',
            'content' => '<p>Masyarakat Desa Tangkit dengan bangga mengumumkan akan diselenggarakannya Festival Nanas Tangkit 2025, sebuah acara tahunan yang menampilkan berbagai produk olahan nanas dan budaya lokal.</p><p><strong>Tanggal:</strong> 25-27 Oktober 2025<br><strong>Lokasi:</strong> Lapangan Desa Tangkit<br><strong>Acara:</strong></p><ul><li>Pameran produk nanas</li><li>Lomba kuliner olahan nanas</li><li>Pentas seni budaya</li><li>Bazaar UMKM</li></ul><p>Mari ramaikan acara ini! Gratis untuk umum.</p>',
            'type' => 'event',
            'event_date' => now()->addDays(24),
            'location' => 'Lapangan Desa Tangkit',
            'contact_person' => 'Panitia Festival',
            'contact_phone' => '0813-2345-6789',
            'is_featured' => true,
            'is_active' => true,
            'published_at' => now(),
        ]);

        Announcement::updateOrCreate(['slug' => 'pengumuman-pembayaran-pbb-2025'], [
            'title' => 'Pengumuman Pembayaran PBB Tahun 2025',
            'content' => '<p>Kepada seluruh wajib pajak Desa Tangkit, diberitahukan bahwa pembayaran Pajak Bumi dan Bangunan (PBB) tahun 2025 telah dibuka.</p><p><strong>Periode Pembayaran:</strong> 1 Oktober - 30 November 2025<br><strong>Lokasi:</strong> Kantor Desa Tangkit / Bank yang ditunjuk<br><strong>Jam Layanan:</strong> Senin-Jumat, 08.00-15.00 WIB</p><p>Bagi yang membayar sebelum 31 Oktober 2025 akan mendapat diskon 10%.</p><p>Untuk informasi lebih lanjut, hubungi Kaur Keuangan.</p>',
            'type' => 'announcement',
            'is_featured' => true,
            'is_active' => true,
            'published_at' => now()->subDays(2),
        ]);

        Announcement::updateOrCreate(['slug' => 'gotong-royong-pembersihan-lingkungan'], [
            'title' => 'Gotong Royong Pembersihan Lingkungan',
            'content' => '<p>Mengajak seluruh warga untuk berpartisipasi dalam kegiatan gotong royong pembersihan lingkungan desa.</p><p><strong>Waktu:</strong> Minggu, 8 Oktober 2025, Pukul 07.00 WIB<br><strong>Titik Kumpul:</strong> Balai Desa masing-masing RT</p><p>Silakan membawa peralatan kebersihan sendiri. Mari bersama-sama menjaga kebersihan desa kita!</p>',
            'type' => 'event',
            'event_date' => now()->addDays(7),
            'location' => 'Seluruh Wilayah Desa Tangkit',
            'is_active' => true,
            'published_at' => now()->subDays(1),
        ]);
        $this->command->info('Announcement data seeded.');

        $this->command->info('Seeding Document data...');
        // Documents Data
        Storage::disk('public')->deleteDirectory('documents');
        Storage::disk('public')->makeDirectory('documents');

        $this->seedDocument('peraturan-desa-1-2025-apbdes', 'Peraturan Desa Nomor 1 Tahun 2025 tentang APBDes', 'peraturan');
        $this->seedDocument('sk-penetapan-perangkat-desa', 'Surat Keputusan Kepala Desa tentang Penetapan Perangkat Desa', 'sk');
        $this->seedDocument('formulir-sktm', 'Formulir Pengajuan Surat Keterangan Tidak Mampu (SKTM)', 'formulir');
        $this->seedDocument('laporan-keuangan-semester-1-2025', 'Laporan Keuangan Desa Semester I Tahun 2025', 'laporan');
        $this->command->info('Document data seeded.');

        $this->command->info('Village data seeded successfully!');
    }

    private function seedDocument(string $slug, string $title, string $type): void
    {
        $fileName = $slug . '.pdf';
        $path = 'documents/' . $fileName;
        $pdfContent = "Ini adalah dokumen dummy untuk {$title}";
        Storage::disk('public')->put($path, $pdfContent);

        Document::updateOrCreate(['slug' => $slug], [
            'title' => $title,
            'description' => "Deskripsi untuk {$title}",
            'type' => $type,
            'file_path' => $path,
            'file_type' => 'pdf',
            'file_size' => strlen($pdfContent),
            'document_date' => now(),
            'is_active' => true,
            'published_at' => now(),
        ]);
    }
}