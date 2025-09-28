@extends('layouts.blog')

@section('title', 'Galeri Desa Tangkit')
@section('description', 'Koleksi foto kegiatan dan potensi Desa Tangkit')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-primary via-secondary to-accent">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto text-white">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Galeri Desa Tangkit
            </h1>
            <p class="text-xl sm:text-2xl lg:text-3xl font-light leading-relaxed">
                Potret Kehidupan & Kemajuan Desa
            </p>
        </div>
    </section>

    <!-- Gallery Navigation -->
    <section class="py-8 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
        <div class="container-custom">
            <div class="flex flex-wrap justify-center space-x-4">
                <button class="gallery-filter active" data-filter="all">Semua</button>
                <button class="gallery-filter" data-filter="kegiatan">Kegiatan Desa</button>
                <button class="gallery-filter" data-filter="potensi">Potensi Desa</button>
                <button class="gallery-filter" data-filter="budaya">Budaya & Tradisi</button>
                <button class="gallery-filter" data-filter="infrastruktur">Infrastruktur</button>
                <button class="gallery-filter" data-filter="umkm">UMKM</button>
            </div>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container-custom">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="gallery-grid">
                <!-- Kegiatan Desa -->
                <div class="gallery-item kegiatan group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl shadow-lg">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=300&fit=crop" alt="Upacara Hari Kemerdekaan" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="text-center text-white">
                                <i class="fas fa-search-plus text-2xl mb-2"></i>
                                <p class="text-sm">Lihat Detail</p>
                            </div>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="badge-kegiatan">Kegiatan Desa</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Upacara Hari Kemerdekaan</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">17 Agustus 2025</p>
                    </div>
                </div>

                <div class="gallery-item kegiatan group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl shadow-lg">
                        <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=400&h=300&fit=crop" alt="Gotong Royong Bersih Desa" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="text-center text-white">
                                <i class="fas fa-search-plus text-2xl mb-2"></i>
                                <p class="text-sm">Lihat Detail</p>
                            </div>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="badge-kegiatan">Kegiatan Desa</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Gotong Royong Bersih Desa</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">15 September 2025</p>
                    </div>
                </div>

                <!-- Potensi Desa -->
                <div class="gallery-item potensi group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl shadow-lg">
                        <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=400&h=300&fit=crop" alt="Kebun Nanas Organik" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="text-center text-white">
                                <i class="fas fa-search-plus text-2xl mb-2"></i>
                                <p class="text-sm">Lihat Detail</p>
                            </div>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="badge-potensi">Potensi Desa</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Kebun Nanas Organik</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Panen September 2025</p>
                    </div>
                </div>

                <div class="gallery-item potensi group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl shadow-lg">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=300&fit=crop" alt="Wisata Air Terjun Tangkit" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="text-center text-white">
                                <i class="fas fa-search-plus text-2xl mb-2"></i>
                                <p class="text-sm">Lihat Detail</p>
                            </div>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="badge-potensi">Potensi Desa</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Wisata Air Terjun Tangkit</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Musim Hujan 2025</p>
                    </div>
                </div>

                <!-- Budaya & Tradisi -->
                <div class="gallery-item budaya group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl shadow-lg">
                        <img src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=400&h=300&fit=crop" alt="Tari Tradisional Sunda" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="text-center text-white">
                                <i class="fas fa-search-plus text-2xl mb-2"></i>
                                <p class="text-sm">Lihat Detail</p>
                            </div>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="badge-budaya">Budaya & Tradisi</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Tari Tradisional Sunda</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Festival Budaya 2025</p>
                    </div>
                </div>

                <div class="gallery-item budaya group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl shadow-lg">
                        <img src="https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?w=400&h=300&fit=crop" alt="Upacara Adat Ngaben" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="text-center text-white">
                                <i class="fas fa-search-plus text-2xl mb-2"></i>
                                <p class="text-sm">Lihat Detail</p>
                            </div>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="badge-budaya">Budaya & Tradisi</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Upacara Adat Ngaben</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Juli 2025</p>
                    </div>
                </div>

                <!-- Infrastruktur -->
                <div class="gallery-item infrastruktur group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl shadow-lg">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=400&h=300&fit=crop" alt="Jalan Desa Baru" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="text-center text-white">
                                <i class="fas fa-search-plus text-2xl mb-2"></i>
                                <p class="text-sm">Lihat Detail</p>
                            </div>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="badge-infrastruktur">Infrastruktur</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Jalan Desa Baru</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Pembangunan 2025</p>
                    </div>
                </div>

                <div class="gallery-item infrastruktur group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl shadow-lg">
                        <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=400&h=300&fit=crop" alt="Balai Desa Modern" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="text-center text-white">
                                <i class="fas fa-search-plus text-2xl mb-2"></i>
                                <p class="text-sm">Lihat Detail</p>
                            </div>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="badge-infrastruktur">Infrastruktur</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Balai Desa Modern</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Renovasi 2024</p>
                    </div>
                </div>

                <!-- UMKM -->
                <div class="gallery-item umkm group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl shadow-lg">
                        <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=400&h=300&fit=crop" alt="Produk Olahan Nanas" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="text-center text-white">
                                <i class="fas fa-search-plus text-2xl mb-2"></i>
                                <p class="text-sm">Lihat Detail</p>
                            </div>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="badge-umkm">UMKM</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Produk Olahan Nanas</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">UMKM Ibu Siti</p>
                    </div>
                </div>

                <div class="gallery-item umkm group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl shadow-lg">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=300&fit=crop" alt="Kerajinan Tangan" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="text-center text-white">
                                <i class="fas fa-search-plus text-2xl mb-2"></i>
                                <p class="text-sm">Lihat Detail</p>
                            </div>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="badge-umkm">UMKM</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Kerajinan Tangan</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Anyaman Bambu</p>
                    </div>
                </div>

                <!-- More items -->
                <div class="gallery-item kegiatan group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl shadow-lg">
                        <img src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?w=400&h=300&fit=crop" alt="Posyandu Desa" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="text-center text-white">
                                <i class="fas fa-search-plus text-2xl mb-2"></i>
                                <p class="text-sm">Lihat Detail</p>
                            </div>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="badge-kegiatan">Kegiatan Desa</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Posyandu Desa</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">September 2025</p>
                    </div>
                </div>

                <div class="gallery-item potensi group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl shadow-lg">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=300&fit=crop" alt="Pertanian Terpadu" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="text-center text-white">
                                <i class="fas fa-search-plus text-2xl mb-2"></i>
                                <p class="text-sm">Lihat Detail</p>
                            </div>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="badge-potensi">Potensi Desa</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Pertanian Terpadu</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Sistem Irigasi Modern</p>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button class="btn-secondary" id="load-more">
                    Muat Lebih Banyak
                </button>
            </div>
        </div>
    </section>

    <!-- Photo Contest Section -->
    <section class="py-16 bg-primary text-white">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">
                    Ajak Dokumentasi Desa Tangkit
                </h2>
                <p class="text-xl mb-8 opacity-90">
                    Bagikan momen-momen indah Desa Tangkit melalui foto Anda
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-camera text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Foto Kegiatan</h3>
                    <p class="opacity-90">Dokumentasikan kegiatan desa, upacara adat, dan momen berharga lainnya</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Foto Komunitas</h3>
                    <p class="opacity-90">Tangkap kebersamaan warga, gotong royong, dan kegiatan sosial</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-trophy text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Foto Terbaik</h3>
                    <p class="opacity-90">Foto terbaik akan dipamerkan di galeri desa dan mendapat penghargaan</p>
                </div>
            </div>

            <div class="text-center mt-12">
                <button class="btn-secondary">
                    Kirim Foto Anda
                </button>
            </div>
        </div>
    </section>

    <!-- Modal for Image Detail -->
    <div id="image-modal" class="fixed inset-0 bg-black/90 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="relative max-w-4xl max-h-full">
                <button id="close-modal" class="absolute -top-12 right-0 text-white text-2xl hover:text-gray-300">
                    <i class="fas fa-times"></i>
                </button>
                <img id="modal-image" src="" alt="" class="max-w-full max-h-full object-contain">
                <div class="absolute bottom-0 left-0 right-0 bg-black/70 text-white p-4">
                    <h3 id="modal-title" class="text-xl font-bold mb-2"></h3>
                    <p id="modal-description" class="text-sm opacity-90"></p>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
.gallery-filter {
    @apply px-6 py-2 mx-2 mb-4 rounded-full font-medium transition-colors duration-200;
    @apply bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-primary hover:text-white;
}

.gallery-filter.active {
    @apply bg-primary text-white;
}

.gallery-item {
    @apply transition-all duration-300;
}

.badge-kegiatan {
    @apply px-3 py-1 text-xs font-bold rounded-full bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200;
}

.badge-potensi {
    @apply px-3 py-1 text-xs font-bold rounded-full bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200;
}

.badge-budaya {
    @apply px-3 py-1 text-xs font-bold rounded-full bg-purple-100 dark:bg-purple-800 text-purple-800 dark:text-purple-200;
}

.badge-infrastruktur {
    @apply px-3 py-1 text-xs font-bold rounded-full bg-orange-100 dark:bg-orange-800 text-orange-800 dark:text-orange-200;
}

.badge-umkm {
    @apply px-3 py-1 text-xs font-bold rounded-full bg-pink-100 dark:bg-pink-800 text-pink-800 dark:text-pink-200;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.gallery-filter');
    const galleryItems = document.querySelectorAll('.gallery-item');
    const modal = document.getElementById('image-modal');
    const modalImage = document.getElementById('modal-image');
    const modalTitle = document.getElementById('modal-title');
    const modalDescription = document.getElementById('modal-description');
    const closeModal = document.getElementById('close-modal');

    // Filter functionality
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const filter = button.dataset.filter;

            galleryItems.forEach(item => {
                if (filter === 'all' || item.classList.contains(filter)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Modal functionality
    galleryItems.forEach(item => {
        item.addEventListener('click', () => {
            const img = item.querySelector('img');
            const title = item.querySelector('h3').textContent;
            const description = item.querySelector('p').textContent;

            modalImage.src = img.src;
            modalImage.alt = img.alt;
            modalTitle.textContent = title;
            modalDescription.textContent = description;

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });
    });

    closeModal.addEventListener('click', () => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    });

    // Load more functionality
    let currentItemCount = 12;
    const loadMoreBtn = document.getElementById('load-more');

    loadMoreBtn.addEventListener('click', () => {
        // In a real application, this would load more items from the server
        // For now, we'll just show a message
        loadMoreBtn.textContent = 'Semua Foto Sudah Dimuat';
        loadMoreBtn.disabled = true;
    });
});
</script>
