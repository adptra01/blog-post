<x-blog-layout>
    <!-- Hero Section -->
    <section class="relative h-[400px] overflow-hidden bg-gradient-to-br from-[var(--color-primary-500)] to-[var(--color-secondary-500)]">
        <div class="absolute inset-0 opacity-20">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <pattern id="pattern-gallery" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="1" fill="white"/>
                </pattern>
                <rect x="0" y="0" width="100%" height="100%" fill="url(#pattern-gallery)"/>
            </svg>
        </div>

        <div class="relative container mx-auto px-4 h-full flex items-center">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-slide-up">Galeri Desa</h1>
                <p class="text-lg text-white/90 animate-fade-in">Dokumentasi kegiatan dan momen berharga di Desa Tangkit</p>
            </div>
        </div>
    </section>

    <!-- Filter Tabs -->
    <section class="py-8 bg-white border-b border-[var(--color-neutral-200)] sticky top-0 z-40 backdrop-blur-sm bg-white/95">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap gap-3 justify-center">
                <a href="{{ route('gallery.index') }}"
                   class="px-6 py-2.5 rounded-full font-semibold transition-all {{ !$category ? 'bg-[var(--color-primary-500)] text-white shadow-lg' : 'bg-[var(--color-neutral-100)] text-[var(--color-neutral-700)] hover:bg-[var(--color-neutral-200)]' }}">
                    Semua
                </a>
                @foreach($categories as $key => $label)
                    <a href="{{ route('gallery.index', ['category' => $key]) }}"
                       class="px-6 py-2.5 rounded-full font-semibold transition-all {{ $category === $key ? 'bg-[var(--color-primary-500)] text-white shadow-lg' : 'bg-[var(--color-neutral-100)] text-[var(--color-neutral-700)] hover:bg-[var(--color-neutral-200)]' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-16 bg-[var(--color-neutral-50)]">
        <div class="container mx-auto px-4">
            @if($galleries->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($galleries as $gallery)
                        <div class="group relative overflow-hidden rounded-xl bg-white shadow-md hover:shadow-2xl transition-all duration-500 cursor-pointer"
                             onclick="openLightbox({{ $gallery->id }})">
                            <!-- Image/Video Thumbnail -->
                            <div class="aspect-square overflow-hidden bg-[var(--color-neutral-200)]">
                                @if($gallery->type === 'video')
                                    <div class="relative w-full h-full">
                                        <img src="{{ Storage::url($gallery->thumbnail_path ?? $gallery->media_path) }}"
                                             alt="{{ $gallery->title }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                        <!-- Play Button Overlay -->
                                        <div class="absolute inset-0 flex items-center justify-center bg-black/30 group-hover:bg-black/40 transition-colors">
                                            <div class="w-16 h-16 bg-white/90 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                                <svg class="w-8 h-8 text-[var(--color-primary-500)] ml-1" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <img src="{{ Storage::url($gallery->thumbnail_path ?? $gallery->media_path) }}"
                                         alt="{{ $gallery->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @endif

                                <!-- Overlay Info -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="absolute bottom-0 left-0 right-0 p-4">
                                        <h3 class="text-white font-semibold mb-1 line-clamp-2">{{ $gallery->title }}</h3>
                                        @if($gallery->description)
                                            <p class="text-white/80 text-sm line-clamp-2">{{ $gallery->description }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="p-4">
                                <h3 class="font-semibold text-[var(--color-neutral-dark)] mb-1 line-clamp-1 group-hover:text-[var(--color-primary-500)] transition-colors">
                                    {{ $gallery->title }}
                                </h3>
                                @if($gallery->category)
                                    <span class="inline-block px-2 py-1 bg-[var(--color-primary-100)] text-[var(--color-primary-600)] text-xs font-medium rounded">
                                        {{ $categories[$gallery->category] ?? ucwords($gallery->category) }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $galleries->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <svg class="w-24 h-24 mx-auto text-[var(--color-neutral-300)] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-[var(--color-neutral-600)] mb-2">Belum Ada Galeri</h3>
                    <p class="text-[var(--color-neutral-500)]">Galeri untuk kategori ini belum tersedia</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 z-50 hidden bg-black/95 backdrop-blur-sm">
        <div class="relative h-full flex flex-col">
            <!-- Header -->
            <div class="flex items-center justify-between p-4 border-b border-white/10">
                <div class="flex items-center gap-4">
                    <h3 id="lightbox-title" class="text-white font-semibold text-lg"></h3>
                    <span id="lightbox-category" class="px-3 py-1 bg-[var(--color-primary-500)] text-white text-sm rounded-full"></span>
                </div>
                <button onclick="closeLightbox()" class="w-10 h-10 flex items-center justify-center bg-white/10 hover:bg-white/20 rounded-full transition-colors">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Main Content -->
            <div class="flex-1 flex items-center justify-center p-4">
                <div class="relative max-w-6xl w-full">
                    <!-- Loading -->
                    <div id="lightbox-loading" class="absolute inset-0 flex items-center justify-center">
                        <div class="animate-spin rounded-full h-12 w-12 border-4 border-white/30 border-t-white"></div>
                    </div>

                    <!-- Media Container -->
                    <div id="lightbox-media" class="hidden">
                        <img id="lightbox-image" class="max-w-full max-h-[calc(100vh-200px)] mx-auto rounded-lg shadow-2xl" alt="">
                        <div id="lightbox-video" class="aspect-video max-w-4xl mx-auto"></div>
                    </div>

                    <!-- Navigation Arrows -->
                    <button onclick="previousImage()" class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 flex items-center justify-center bg-white/10 hover:bg-white/20 backdrop-blur-sm rounded-full transition-colors">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button onclick="nextImage()" class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 flex items-center justify-center bg-white/10 hover:bg-white/20 backdrop-blur-sm rounded-full transition-colors">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Description -->
            <div id="lightbox-description" class="p-4 border-t border-white/10 bg-black/50">
                <p class="text-white/80 text-center max-w-4xl mx-auto"></p>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const galleries = @json($galleries->items());
        let currentIndex = 0;

        function openLightbox(galleryId) {
            currentIndex = galleries.findIndex(g => g.id === galleryId);
            if (currentIndex !== -1) {
                showGallery(currentIndex);
                document.getElementById('lightbox').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.add('hidden');
            document.body.style.overflow = '';
            document.getElementById('lightbox-media').classList.add('hidden');
            document.getElementById('lightbox-image').src = '';
            document.getElementById('lightbox-video').innerHTML = '';
        }

        function showGallery(index) {
            const gallery = galleries[index];
            document.getElementById('lightbox-loading').classList.remove('hidden');
            document.getElementById('lightbox-media').classList.add('hidden');

            // Set title and category
            document.getElementById('lightbox-title').textContent = gallery.title;
            document.getElementById('lightbox-category').textContent = getCategoryLabel(gallery.category);
            document.getElementById('lightbox-description').querySelector('p').textContent = gallery.description || '';

            if (gallery.type === 'video') {
                // Load video
                const videoContainer = document.getElementById('lightbox-video');
                videoContainer.innerHTML = `
                    <video controls class="w-full rounded-lg shadow-2xl">
                        <source src="/storage/${gallery.media_path}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                `;
                document.getElementById('lightbox-image').classList.add('hidden');
                document.getElementById('lightbox-video').classList.remove('hidden');
                document.getElementById('lightbox-loading').classList.add('hidden');
                document.getElementById('lightbox-media').classList.remove('hidden');
            } else {
                // Load image
                const img = document.getElementById('lightbox-image');
                img.onload = function() {
                    document.getElementById('lightbox-loading').classList.add('hidden');
                    document.getElementById('lightbox-media').classList.remove('hidden');
                };
                img.src = `/storage/${gallery.media_path}`;
                img.alt = gallery.title;
                document.getElementById('lightbox-image').classList.remove('hidden');
                document.getElementById('lightbox-video').classList.add('hidden');
            }
        }

        function previousImage() {
            currentIndex = (currentIndex - 1 + galleries.length) % galleries.length;
            showGallery(currentIndex);
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % galleries.length;
            showGallery(currentIndex);
        }

        function getCategoryLabel(category) {
            const categories = {
                'kegiatan': 'Kegiatan',
                'alam': 'Alam',
                'budaya': 'Budaya',
                'produk_lokal': 'Produk Lokal'
            };
            return categories[category] || category;
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (!document.getElementById('lightbox').classList.contains('hidden')) {
                if (e.key === 'Escape') closeLightbox();
                if (e.key === 'ArrowLeft') previousImage();
                if (e.key === 'ArrowRight') nextImage();
            }
        });

        // Close on backdrop click
        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this) closeLightbox();
        });
    </script>
    @endpush
</x-blog-layout>
