@props([
    'products' => []
])

<section class="py-16 bg-white dark:bg-gray-800">
    <div class="container-custom">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                Potensi Desa Tangkit
            </h2>
            <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Produk unggulan dan potensi ekonomi kreatif Desa Tangkit yang siap bersaing di pasar modern
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Nanas Products -->
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
                    Nanas Tangkit dikenal dengan rasa manis dan tekstur yang lembut. Dipanen langsung dari kebun petani lokal.
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-2xl font-bold">Rp 15.000/kg</span>
                    <a href="{{ route('village.potential') }}" class="bg-white text-primary px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                        Lihat Detail
                    </a>
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
                    Olahan nanas kering dengan cita rasa autentik khas Desa Tangkit.
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-semibold text-primary">Rp 25.000/pack</span>
                    <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-600 transition-colors">
                        Beli Sekarang
                    </button>
                </div>
            </div>

            <!-- Wisata -->
            <div class="bg-white dark:bg-gray-700 rounded-xl p-8 shadow-lg card-hover">
                <div class="relative mb-6">
                    <img src="https://picsum.photos/300/200?random=2" alt="Wisata Desa" class="w-full h-32 object-cover rounded-lg">
                    <div class="absolute top-3 right-3 bg-secondary text-white px-2 py-1 rounded text-xs font-medium">
                        Populer
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Wisata Agro</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Jelajahi kebun nanas dan pelajari proses budidaya modern.
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-semibold text-secondary">Rp 50.000/pax</span>
                    <a href="{{ route('village.potential') }}" class="bg-secondary text-white px-4 py-2 rounded-lg hover:bg-secondary-600 transition-colors">
                        Pesan Tour
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('village.potential') }}" class="btn-primary">
                Lihat Semua Potensi Desa
            </a>
        </div>
    </div>
</section>
