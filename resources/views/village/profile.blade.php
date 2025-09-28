@extends('layouts.blog')

@section('title', 'Profil Desa Tangkit')
@section('description', 'Sejarah, visi misi, dan struktur pemerintahan Desa Tangkit')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-primary via-secondary to-accent">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto text-white">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Profil Desa Tangkit
            </h1>
            <p class="text-xl sm:text-2xl lg:text-3xl font-light leading-relaxed">
                Desa Maju Berbasis Pertanian & Wisata
            </p>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="py-12 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
        <div class="container-custom">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-3xl font-bold text-primary mb-2">2,847</div>
                    <div class="text-gray-600 dark:text-gray-300">Jumlah Penduduk</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-secondary mb-2">850</div>
                    <div class="text-gray-600 dark:text-gray-300">Kepala Keluarga</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-accent mb-2">1,247</div>
                    <div class="text-gray-600 dark:text-gray-300">Luas Wilayah (Ha)</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-primary mb-2">8</div>
                    <div class="text-gray-600 dark:text-gray-300">Dusun/RW</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Sidebar Navigation -->
                <div class="lg:col-span-1">
                    <div class="sticky top-8">
                        <nav class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Navigasi</h3>
                            <ul class="space-y-2">
                                <li><a href="#sejarah" class="nav-link active">Sejarah Desa</a></li>
                                <li><a href="#geografis" class="nav-link">Letak Geografis</a></li>
                                <li><a href="#visi-misi" class="nav-link">Visi & Misi</a></li>
                                <li><a href="#struktur" class="nav-link">Struktur Pemerintahan</a></li>
                                <li><a href="#potensi" class="nav-link">Potensi & Sumber Daya</a></li>
                                <li><a href="#program" class="nav-link">Program Unggulan</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Content -->
                <div class="lg:col-span-2 space-y-16">
                    <!-- Sejarah Desa -->
                    <div id="sejarah" class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Sejarah Desa Tangkit</h2>

                        <div class="prose prose-lg dark:prose-invert max-w-none">
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                                Desa Tangkit merupakan salah satu desa tertua di Kabupaten Bogor yang memiliki sejarah panjang dalam bidang pertanian. Nama "Tangkit" sendiri berasal dari kata "tangkil" dalam bahasa Sunda yang berarti "mengangkat" atau "menopang", yang menggambarkan kondisi geografis desa yang berada di dataran tinggi dengan tanah yang subur.
                            </p>

                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                                Pada masa kolonial Belanda, Desa Tangkit dikenal sebagai penghasil buah-buahan berkualitas tinggi, terutama nanas yang menjadi komoditas unggulan hingga saat ini. Tradisi pertanian yang kuat telah diwariskan dari generasi ke generasi, menjadikan Desa Tangkit sebagai contoh desa mandiri di bidang pertanian.
                            </p>

                            <div class="bg-primary/5 dark:bg-primary/10 border-l-4 border-primary p-6 my-8">
                                <h4 class="text-lg font-semibold text-primary mb-2">Fakta Menarik</h4>
                                <ul class="text-gray-600 dark:text-gray-300 space-y-1">
                                    <li>• Desa Tangkit sudah berdiri sejak tahun 1800-an</li>
                                    <li>• Merupakan salah satu desa penghasil nanas terbaik di Jawa Barat</li>
                                    <li>• Memiliki tradisi budaya Sunda yang masih terjaga hingga kini</li>
                                    <li>• Berhasil meraih penghargaan Desa Mandiri kategori Pertanian tahun 2023</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Letak Geografis -->
                    <div id="geografis" class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Letak Geografis</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Batas Wilayah</h3>
                                <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                    <li class="flex items-center">
                                        <i class="fas fa-arrow-up text-primary mr-3"></i>
                                        <span><strong>Utara:</strong> Desa Sukamaju</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-arrow-right text-secondary mr-3"></i>
                                        <span><strong>Timur:</strong> Desa Cibodas</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-arrow-down text-accent mr-3"></i>
                                        <span><strong>Selatan:</strong> Desa Cisarua</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-arrow-left text-primary mr-3"></i>
                                        <span><strong>Barat:</strong> Desa Megamendung</span>
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Topografi & Iklim</h3>
                                <div class="space-y-4">
                                    <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <span class="font-medium text-gray-900 dark:text-white">Ketinggian</span>
                                        <span class="text-gray-600 dark:text-gray-300">800 - 1,200 mdpl</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <span class="font-medium text-gray-900 dark:text-white">Suhu Rata-rata</span>
                                        <span class="text-gray-600 dark:text-gray-300">18°C - 24°C</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <span class="font-medium text-gray-900 dark:text-white">Curah Hujan</span>
                                        <span class="text-gray-600 dark:text-gray-300">2,500 - 3,000 mm/tahun</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <span class="font-medium text-gray-900 dark:text-white">Jenis Tanah</span>
                                        <span class="text-gray-600 dark:text-gray-300">Andosol & Latosol</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Map Placeholder -->
                        <div class="mt-8 bg-gray-200 dark:bg-gray-700 rounded-xl h-64 flex items-center justify-center">
                            <div class="text-center">
                                <i class="fas fa-map-marked-alt text-4xl text-gray-400 dark:text-gray-500 mb-4"></i>
                                <p class="text-gray-500 dark:text-gray-400">Peta Lokasi Desa Tangkit</p>
                                <p class="text-sm text-gray-400 dark:text-gray-500 mt-2">
                                    (Peta interaktif akan ditampilkan di sini)
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Visi & Misi -->
                    <div id="visi-misi" class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Visi & Misi</h2>

                        <div class="space-y-8">
                            <!-- Visi -->
                            <div>
                                <h3 class="text-2xl font-bold text-primary mb-4">Visi</h3>
                                <div class="bg-primary/5 dark:bg-primary/10 border-l-4 border-primary p-6">
                                    <p class="text-lg text-gray-700 dark:text-gray-300 font-medium italic">
                                        "Terwujudnya Desa Tangkit sebagai Desa Mandiri Berbasis Pertanian Berkelanjutan dan Wisata Alam yang Maju, Sejahtera, dan Berbudaya"
                                    </p>
                                </div>
                            </div>

                            <!-- Misi -->
                            <div>
                                <h3 class="text-2xl font-bold text-secondary mb-4">Misi</h3>
                                <div class="space-y-4">
                                    <div class="flex items-start space-x-4">
                                        <div class="w-8 h-8 bg-secondary/10 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                            <span class="text-secondary font-bold text-sm">1</span>
                                        </div>
                                        <div>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                Meningkatkan produktivitas pertanian melalui modernisasi sistem irigasi dan penerapan teknologi pertanian berkelanjutan
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-start space-x-4">
                                        <div class="w-8 h-8 bg-secondary/10 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                            <span class="text-secondary font-bold text-sm">2</span>
                                        </div>
                                        <div>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                Mengembangkan potensi wisata alam dan budaya sebagai sumber pendapatan alternatif masyarakat
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-start space-x-4">
                                        <div class="w-8 h-8 bg-secondary/10 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                            <span class="text-secondary font-bold text-sm">3</span>
                                        </div>
                                        <div>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan berkelanjutan
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-start space-x-4">
                                        <div class="w-8 h-8 bg-secondary/10 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                            <span class="text-secondary font-bold text-sm">4</span>
                                        </div>
                                        <div>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                Melestarikan dan mengembangkan budaya Sunda sebagai identitas dan kekuatan desa
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-start space-x-4">
                                        <div class="w-8 h-8 bg-secondary/10 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                            <span class="text-secondary font-bold text-sm">5</span>
                                        </div>
                                        <div>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                Membangun infrastruktur desa yang berkualitas untuk mendukung pembangunan berkelanjutan
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Struktur Pemerintahan -->
                    <div id="struktur" class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Struktur Pemerintahan</h2>

                        <div class="space-y-8">
                            <!-- Kepala Desa -->
                            <div class="text-center">
                                <div class="w-32 h-32 bg-gray-200 dark:bg-gray-700 rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <i class="fas fa-user-tie text-4xl text-gray-400 dark:text-gray-500"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">H. Ahmad Surya, S.Pd</h3>
                                <p class="text-primary font-medium">Kepala Desa Tangkit</p>
                                <p class="text-gray-600 dark:text-gray-300">Periode 2021 - 2027</p>
                            </div>

                            <!-- Sekretaris Desa -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="text-center p-6 bg-gray-50 dark:bg-gray-700 rounded-xl">
                                    <div class="w-20 h-20 bg-secondary/10 rounded-full mx-auto mb-3 flex items-center justify-center">
                                        <i class="fas fa-user text-secondary text-2xl"></i>
                                    </div>
                                    <h4 class="font-bold text-gray-900 dark:text-white">Siti Aminah, S.E</h4>
                                    <p class="text-secondary font-medium">Sekretaris Desa</p>
                                </div>

                                <div class="text-center p-6 bg-gray-50 dark:bg-gray-700 rounded-xl">
                                    <div class="w-20 h-20 bg-accent/10 rounded-full mx-auto mb-3 flex items-center justify-center">
                                        <i class="fas fa-calculator text-accent text-2xl"></i>
                                    </div>
                                    <h4 class="font-bold text-gray-900 dark:text-white">Budi Santoso</h4>
                                    <p class="text-accent font-medium">Kaur Keuangan</p>
                                </div>
                            </div>

                            <!-- Kepala Dusun -->
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Kepala Dusun</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                                            <i class="fas fa-home text-primary"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900 dark:text-white">Dusun Tangkit Indah</h4>
                                            <p class="text-gray-600 dark:text-gray-300">Kepala Dusun: Ujang Rahman</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <div class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center">
                                            <i class="fas fa-home text-secondary"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900 dark:text-white">Dusun Tangkit Jaya</h4>
                                            <p class="text-gray-600 dark:text-gray-300">Kepala Dusun: Siti Nurhaliza</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <div class="w-12 h-12 bg-accent/10 rounded-full flex items-center justify-center">
                                            <i class="fas fa-home text-accent"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900 dark:text-white">Dusun Tangkit Makmur</h4>
                                            <p class="text-gray-600 dark:text-gray-300">Kepala Dusun: Ahmad Yani</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                                            <i class="fas fa-home text-primary"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900 dark:text-white">Dusun Tangkit Sejahtera</h4>
                                            <p class="text-gray-600 dark:text-gray-300">Kepala Dusun: Dewi Sartika</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Potensi & Sumber Daya -->
                    <div id="potensi" class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Potensi & Sumber Daya</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Pertanian -->
                            <div>
                                <h3 class="text-xl font-semibold text-primary mb-4 flex items-center">
                                    <i class="fas fa-seedling mr-3"></i>
                                    Pertanian
                                </h3>
                                <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                                    <li>• Nanas MD-2 (komoditas unggulan)</li>
                                    <li>• Sayuran hidroponik</li>
                                    <li>• Kopi arabika</li>
                                    <li>• Buah-buahan tropis</li>
                                    <li>• Tanaman obat keluarga (TOGA)</li>
                                </ul>
                            </div>

                            <!-- Wisata -->
                            <div>
                                <h3 class="text-xl font-semibold text-secondary mb-4 flex items-center">
                                    <i class="fas fa-mountain mr-3"></i>
                                    Wisata Alam
                                </h3>
                                <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                                    <li>• Air Terjun Tangkit</li>
                                    <li>• Kebun Nanas Eduwisata</li>
                                    <li>• Trekking Gunung Salak</li>
                                    <li>• Camping ground</li>
                                    <li>• Spot foto landscape</li>
                                </ul>
                            </div>

                            <!-- UMKM -->
                            <div>
                                <h3 class="text-xl font-semibold text-accent mb-4 flex items-center">
                                    <i class="fas fa-store mr-3"></i>
                                    UMKM
                                </h3>
                                <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                                    <li>• Olahan nanas (selai, dodol, manisan)</li>
                                    <li>• Kerajinan anyaman bambu</li>
                                    <li>• Tenun ikat tradisional</li>
                                    <li>• Kopi spesial Tangkit</li>
                                    <li>• Madu hutan</li>
                                </ul>
                            </div>

                            <!-- Sumber Daya Manusia -->
                            <div>
                                <h3 class="text-xl font-semibold text-primary mb-4 flex items-center">
                                    <i class="fas fa-users mr-3"></i>
                                    SDM
                                </h3>
                                <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                                    <li>• Petani milenial: 150 orang</li>
                                    <li>• Pengrajin UMKM: 75 orang</li>
                                    <li>• Guide wisata: 25 orang</li>
                                    <li>• Tenaga kesehatan: 8 orang</li>
                                    <li>• Pendidik PAUD: 12 orang</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Program Unggulan -->
                    <div id="program" class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Program Unggulan</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-6">
                                <div class="p-6 bg-primary/5 dark:bg-primary/10 rounded-xl border-l-4 border-primary">
                                    <h4 class="text-lg font-bold text-primary mb-2">Tangkit Pineapple Center</h4>
                                    <p class="text-gray-600 dark:text-gray-300 mb-3">
                                        Pusat pengembangan nanas MD-2 dengan teknologi pertanian modern dan sistem irigasi cerdas.
                                    </p>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        <strong>Target:</strong> Produksi 500 ton nanas per tahun<br>
                                        <strong>Manfaat:</strong> Peningkatan pendapatan petani 40%
                                    </div>
                                </div>

                                <div class="p-6 bg-secondary/5 dark:bg-secondary/10 rounded-xl border-l-4 border-secondary">
                                    <h4 class="text-lg font-bold text-secondary mb-2">Wisata Edukasi</h4>
                                    <p class="text-gray-600 dark:text-gray-300 mb-3">
                                        Pengembangan wisata edukasi pertanian dan budaya dengan paket wisata terintegrasi.
                                    </p>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        <strong>Target:</strong> 10,000 wisatawan per tahun<br>
                                        <strong>Manfaat:</strong> Pendapatan desa dari wisata
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div class="p-6 bg-accent/5 dark:bg-accent/10 rounded-xl border-l-4 border-accent">
                                    <h4 class="text-lg font-bold text-accent mb-2">UMKM Tangkit</h4>
                                    <p class="text-gray-600 dark:text-gray-300 mb-3">
                                        Pengembangan usaha mikro kecil menengah melalui pendampingan, pelatihan, dan pemasaran digital.
                                    </p>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        <strong>Target:</strong> 100 UMKM baru<br>
                                        <strong>Manfaat:</strong> Pengurangan pengangguran 30%
                                    </div>
                                </div>

                                <div class="p-6 bg-primary/5 dark:bg-primary/10 rounded-xl border-l-4 border-primary">
                                    <h4 class="text-lg font-bold text-primary mb-2">Digital Village</h4>
                                    <p class="text-gray-600 dark:text-gray-300 mb-3">
                                        Transformasi digital desa melalui website, aplikasi, dan layanan online untuk kemudahan masyarakat.
                                    </p>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        <strong>Target:</strong> 80% layanan terdigitalisasi<br>
                                        <strong>Manfaat:</strong> Efisiensi pelayanan publik
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
.nav-link {
    @apply block px-4 py-2 rounded-lg transition-colors duration-200;
    @apply text-gray-600 dark:text-gray-300 hover:bg-primary hover:text-white;
}

.nav-link.active {
    @apply bg-primary text-white;
}

.prose {
    color: inherit;
}

.prose-invert {
    color: inherit;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');

    // Smooth scrolling for navigation
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            navLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');

            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);

            if (targetSection) {
                const offsetTop = targetSection.offsetTop - 100;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Highlight active section on scroll
    window.addEventListener('scroll', function() {
        const sections = document.querySelectorAll('div[id]');
        const scrollPosition = window.scrollY + 200;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');

            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + sectionId) {
                        link.classList.add('active');
                    }
                });
            }
        });
    });
});
</script>
