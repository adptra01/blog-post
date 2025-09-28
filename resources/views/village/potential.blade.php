@extends('layouts.blog')

@section('title', 'Potensi Desa Tangkit - UMKM & Produk Unggulan')
@section('description', 'Potensi ekonomi, UMKM, dan produk unggulan Desa Tangkit sebagai sentra produksi nanas')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-primary via-secondary to-accent">
        <div class="absolute inset-0 bg-black/30"></div>
        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto text-white">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Potensi Desa Tangkit
            </h1>
            <p class="text-xl sm:text-2xl lg:text-3xl font-light leading-relaxed mb-8">
                Sentra Produksi Nanas & UMKM Unggulan
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#produk" class="btn-primary">
                    Lihat Produk Unggulan
                </a>
                <a href="#wisata" class="btn-secondary">
                    Wisata Desa
                </a>
            </div>
        </div>
    </section>

    <!-- Produk Unggulan Section -->
    <section id="produk" class="py-16 bg-white dark:bg-gray-900">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    Produk Unggulan Desa Tangkit
                </h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Produk olahan nanas dan hasil pertanian berkualitas tinggi dari petani lokal Desa Tangkit
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Nanas Segar -->
                <div class="bg-gradient-to-br from-primary to-secondary rounded-xl p-8 text-white card-hover">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-apple-alt text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">Nanas Segar</h3>
                            <p class="text-white/90">Komoditas utama desa</p>
                        </div>
                    </div>
                    <p class="mb-6 text-white/90">
                        Nanas Tangkit dikenal dengan rasa manis dan tekstur yang lembut. Dipanen langsung dari kebun petani lokal dengan kualitas terbaik.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold">Rp 15.000/kg</span>
                        <button class="bg-white text-primary px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                            Beli Sekarang
                        </button>
                    </div>
                </div>

                <!-- Keripik Nanas -->
                <div class="bg-white dark:bg-gray-700 rounded-xl p-8 shadow-lg card-hover">
                    <div class="relative mb-6">
                        <img src="https://picsum.photos/300/200?random=1" alt="Keripik Nanas" class="w-full h-32 object-cover rounded-lg">
                        <div class="absolute top-3 right-3 bg-primary text-white px-2 py-1 rounded text-xs font-medium">
                            Terlaris
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Keripik Nanas</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Olahan nanas kering dengan cita rasa autentik khas Desa Tangkit. Dibuat dari nanas pilihan tanpa pengawet.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-semibold text-primary">Rp 25.000/pack</span>
                        <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-600 transition-colors">
                            Beli Sekarang
                        </button>
                    </div>
                </div>

                <!-- Selai Nanas -->
                <div class="bg-white dark:bg-gray-700 rounded-xl p-8 shadow-lg card-hover">
                    <div class="relative mb-6">
                        <img src="https://picsum.photos/300/200?random=2" alt="Selai Nanas" class="w-full h-32 object-cover rounded-lg">
                        <div class="absolute top-3 right-3 bg-secondary text-white px-2 py-1 rounded text-xs font-medium">
                            Baru
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Selai Nanas</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Selai nanas homemade dengan rasa alami. Cocok untuk roti, kue, atau sebagai bahan masakan.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-semibold text-secondary">Rp 30.000/jar</span>
                        <button class="bg-secondary text-white px-4 py-2 rounded-lg hover:bg-secondary-600 transition-colors">
                            Beli Sekarang
                        </button>
                    </div>
                </div>

                <!-- Jus Nanas -->
                <div class="bg-white dark:bg-gray-700 rounded-xl p-8 shadow-lg card-hover">
                    <div class="relative mb-6">
                        <img src="https://picsum.photos/300/200?random=3" alt="Jus Nanas" class="w-full h-32 object-cover rounded-lg">
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Jus Nanas Segar</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Jus nanas murni tanpa campuran pemanis buatan. Dipress langsung dari nanas segar pilihan.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-semibold text-primary">Rp 12.000/bottle</span>
                        <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-600 transition-colors">
                            Beli Sekarang
                        </button>
                    </div>
                </div>

                <!-- Manisan Nanas -->
                <div class="bg-white dark:bg-gray-700 rounded-xl p-8 shadow-lg card-hover">
                    <div class="relative mb-6">
                        <img src="https://picsum.photos/300/200?random=4" alt="Manisan Nanas" class="w-full h-32 object-cover rounded-lg">
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Manisan Nanas</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Manisan nanas tradisional dengan cita rasa manis alami. Dibuat dengan resep turun temurun.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-semibold text-secondary">Rp 20.000/pack</span>
                        <button class="bg-secondary text-white px-4 py-2 rounded-lg hover:bg-secondary-600 transition-colors">
                            Beli Sekarang
                        </button>
                    </div>
                </div>

                <!-- Nanas Kering -->
                <div class="bg-white dark:bg-gray-700 rounded-xl p-8 shadow-lg card-hover">
                    <div class="relative mb-6">
                        <img src="https://picsum.photos/300/200?random=5" alt="Nanas Kering" class="w-full h-32 object-cover rounded-lg">
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Nanas Kering</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Nanas kering berkualitas dengan rasa manis alami. Cocok sebagai camilan sehat dan bergizi.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-semibold text-primary">Rp 18.000/pack</span>
                        <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-600 transition-colors">
                            Beli Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Wisata Section -->
    <section id="wisata" class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    Wisata Desa Tangkit
                </h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Jelajahi keindahan alam, kebun nanas, dan budaya lokal Desa Tangkit
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                        Wisata Agro Edukasi
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Belajar langsung tentang proses budidaya nanas modern, dari penanaman hingga panen.
                        Pengunjung dapat melihat teknologi pertanian terkini yang diterapkan di Desa Tangkit.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check text-primary mr-3"></i>
                            Tour kebun nanas interaktif
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check text-primary mr-3"></i>
                            Workshop pengolahan nanas
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check text-primary mr-3"></i>
                            Pengenalan teknologi pertanian
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check text-primary mr-3"></i>
                            Pengalaman memetik nanas sendiri
                        </li>
                    </ul>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-2xl font-bold text-primary">Rp 50.000</span>
                            <span class="text-gray-500 dark:text-gray-400">/orang</span>
                        </div>
                        <button class="btn-primary">
                            Pesan Tour
                        </button>
                    </div>
                </div>

                <div class="relative">
                    <img src="https://picsum.photos/600/400?random=6" alt="Wisata Agro Desa Tangkit"
                         class="w-full h-96 object-cover rounded-xl shadow-lg">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-xl"></div>
                    <div class="absolute bottom-6 left-6 text-white">
                        <h4 class="text-xl font-bold mb-2">Kebun Nanas Tangkit</h4>
                        <p class="text-white/90">Luas 50 hektar dengan berbagai varietas nanas</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- UMKM Section -->
    <section class="py-16 bg-white dark:bg-gray-800">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    UMKM Desa Tangkit
                </h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Usaha mikro kecil menengah yang berkembang di Desa Tangkit, mendukung perekonomian masyarakat
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-store text-primary text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Toko Olahan Nanas</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Menyediakan berbagai produk olahan nanas dengan harga terjangkau
                    </p>
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Pusat Desa Tangkit
                    </div>
                </div>

                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6">
                    <div class="w-12 h-12 bg-secondary/10 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-tractor text-secondary text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Kelompok Tani Nanas</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Kelompok petani nanas yang mengelola lahan pertanian bersama
                    </p>
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <i class="fas fa-users mr-2"></i>
                        50+ anggota aktif
                    </div>
                </div>

                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6">
                    <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-utensils text-accent text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Warung Makan Desa</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Restoran yang menyajikan menu khas dengan bahan baku lokal
                    </p>
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <i class="fas fa-clock mr-2"></i>
                        Buka 08:00 - 20:00
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-primary">
        <div class="container-custom text-center">
            <h2 class="text-3xl font-bold text-white mb-4">
                Dukung Produk Lokal Desa Tangkit
            </h2>
            <p class="text-white/90 mb-8 max-w-2xl mx-auto">
                Dengan membeli produk lokal, Anda turut mendukung perekonomian masyarakat Desa Tangkit
                dan melestarikan produk unggulan daerah kami.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#produk" class="btn-secondary">
                    Lihat Produk
                </a>
                <a href="{{ route('village.contact') }}" class="bg-white text-primary px-6 py-3 rounded-lg hover:bg-gray-100 transition-colors font-medium">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>
@endsection
