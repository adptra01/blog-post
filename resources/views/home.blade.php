<x-blog-layout>
    <div class="bg-white">
        <!-- Hero Section -->
        <section class="relative py-16 md:py-24 px-4">
            <div class="container mx-auto">
                <div class="max-w-5xl mx-auto text-center">
                    <!-- Subtitle Badge -->
                    <div class="inline-block mb-4">
                        <span
                            class="px-4 py-2 bg-[var(--color-primary-50)] text-[var(--color-primary-600)] text-sm font-semibold rounded-full">
                            Portal Berita & Informasi Resmi Desa Tangkit
                        </span>
                    </div>

                    <!-- Main Heading -->
                    <h1
                        class="text-4xl md:text-5xl lg:text-6xl font-bold text-[var(--color-neutral-dark)] mb-6 leading-tight">
                        Membangun Desa Tangkit yang Maju<br class="hidden md:block">dan Sejahtera Bersama-sama
                    </h1>

                    <!-- Description -->
                    <p class="text-lg md:text-xl text-[var(--color-neutral-600)] max-w-3xl mx-auto mb-10">
                        Melalui pemberdayaan masyarakat, pengembangan UMKM, dan tata kelola yang transparan,<br
                            class="hidden lg:block">
                        kami memastikan Desa Tangkit siap menghadapi tantangan dan meraih peluang masa depan.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                        <a href="{{ route('village-profile') }}"
                            class="px-8 py-4 bg-[var(--color-primary-500)] text-white text-lg font-semibold rounded-lg hover:bg-[var(--color-primary-600)] transition-all hover:scale-105 shadow-lg">
                            Pelajari Lebih Lanjut
                        </a>
                        <a href="{{ route('announcement.index') }}"
                            class="px-8 py-4 bg-white border-2 border-[var(--color-neutral-300)] text-[var(--color-neutral-700)] text-lg font-semibold rounded-lg hover:border-[var(--color-primary-500)] hover:text-[var(--color-primary-500)] transition-all">
                            Lihat Program Kami
                        </a>
                    </div>

                    <!-- Category Links -->
                    @if ($categories->isNotEmpty())
                        <div class="flex flex-wrap items-center justify-center gap-6 md:gap-10 opacity-60 mb-12">
                            @foreach ($categories->take(5) as $category)
                                <a href="{{ route('filamentblog.category.post', ['category' => $category->slug]) }}"
                                    class="text-[var(--color-neutral-500)] hover:text-[var(--color-primary-500)] transition-colors text-sm font-medium">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    @endif

                    <!-- Featured Video/Image Section -->
                    @if ($featuredPost && $featuredPost->featurePhoto)
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl bg-[var(--color-neutral-100)]">
                            <img src="{{ $featuredPost->featurePhoto }}" alt="{{ $featuredPost->title }}"
                                class="w-full h-[500px] object-cover">
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                                <a href="{{ route('filamentblog.post.show', ['post' => $featuredPost->slug]) }}"
                                    class="w-20 h-20 bg-[var(--color-primary-500)] rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                                    <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z" />
                                    </svg>
                                </a>
                            </div>
                            <div
                                class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/80 to-transparent text-white">
                                <h3 class="text-2xl font-bold mb-2">{{ $featuredPost->title }}</h3>
                                <p class="text-white/90">{{ $featuredPost->excerpt }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- About Section dengan Key Statistics -->
        <section class="py-16 md:py-24 bg-[var(--color-neutral-50)]">
            <div class="container mx-auto px-4">
                <div class="max-w-5xl mx-auto text-center mb-16">
                    <h2
                        class="text-3xl md:text-4xl lg:text-5xl font-normal text-[var(--color-neutral-dark)] mb-6 leading-tight">
                        Desa Tangkit adalah desa yang terus berkembang melalui<br class="hidden lg:block">
                        pemberdayaan masyarakat dan pengelolaan sumber daya<br class="hidden lg:block">
                        yang berkelanjutan untuk kesejahteraan warga.
                    </h2>
                </div>

                <!-- Statistics Cards Grid -->
                <div class="relative h-[500px] max-w-6xl mx-auto">
                    <!-- Card 1: Tim Profesional -->
                    <div class="absolute top-0 left-0 w-[350px] flex flex-col gap-6">
                        <div
                            class="bg-white border border-[var(--color-neutral-200)] rounded-xl p-6 flex gap-4 items-center shadow-md hover:shadow-lg transition-all">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-[var(--color-primary-500)] to-[var(--color-accent-500)] rounded-full flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-[var(--color-neutral-dark)] text-base">Dikelola oleh Perangkat
                                    Desa</h3>
                                <p class="text-sm text-[var(--color-neutral-600)]">Berpengalaman dengan Mandat
                                    Masyarakat</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg h-[382px]">
                            <img src="https://images.unsplash.com/photo-1590650153855-d9e808231d41?w=400"
                                alt="Modern village" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Card 2: Tata Kelola -->
                    <div class="absolute top-0 left-[381px] w-[350px]">
                        <div class="relative h-[450px] rounded-xl overflow-hidden shadow-xl">
                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400" alt="Nature"
                                class="w-full h-full object-cover">
                            <div class="absolute bottom-5 left-5 bg-white rounded-lg p-4 shadow-lg">
                                <div class="text-4xl font-bold text-[var(--color-neutral-dark)] mb-1">100%</div>
                                <div class="text-sm text-[var(--color-neutral-600)]">Transparansi</div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Total Aset -->
                    <div class="absolute top-0 right-0 w-[350px]">
                        <div class="relative h-[450px] rounded-xl overflow-hidden shadow-xl">
                            <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=400" alt="Mountain"
                                class="w-full h-full object-cover">
                            <div class="absolute bottom-5 left-5 bg-white rounded-lg p-4 shadow-lg">
                                @if ($statistics && isset($statistics->data['Jumlah_Penduduk']))
                                    <div class="text-4xl font-bold text-[var(--color-neutral-dark)] mb-1">
                                        {{ number_format($statistics->data['Jumlah_Penduduk']) }}</div>
                                    <div class="text-sm text-[var(--color-neutral-600)]">Total Penduduk<br>Desa Tangkit
                                    </div>
                                @else
                                    <div class="text-4xl font-bold text-[var(--color-neutral-dark)] mb-1">3,245</div>
                                    <div class="text-sm text-[var(--color-neutral-600)]">Total Penduduk</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Strategy & Program Section -->
        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4">
                <!-- Section Header -->
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-8 mb-12">
                    <div class="max-w-2xl">
                        <h2 class="text-3xl md:text-4xl lg:text-5xl text-[var(--color-neutral-dark)] mb-2">
                            Potensi & Program
                        </h2>
                        <p class="text-2xl md:text-3xl font-bold text-[var(--color-neutral-dark)]">Desa Tangkit</p>
                    </div>
                    <div class="max-w-md text-left lg:text-right">
                        <p class="text-[var(--color-neutral-600)]">
                            Mengembangkan potensi unggulan dan program pemberdayaan<br class="hidden lg:block">
                            untuk masa depan desa yang lebih maju dan sejahtera.
                        </p>
                    </div>
                </div>

                <!-- Program Cards Grid -->
                <div class="relative h-[730px] max-w-6xl mx-auto">
                    <!-- Card 1: UMKM -->
                    <div
                        class="absolute top-0 left-[160px] w-[384px] h-[222px] bg-white border border-[var(--color-neutral-200)] rounded-xl p-6 hover:shadow-xl transition-all">
                        <div
                            class="w-12 h-12 bg-[var(--color-primary-100)] rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-[var(--color-primary-500)]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[var(--color-neutral-dark)] mb-2">UMKM & Produk Lokal</h3>
                        <p class="text-[var(--color-neutral-600)]">
                            Memberdayakan pelaku UMKM dan mengembangkan produk olahan nanas berkualitas tinggi.
                        </p>
                    </div>

                    <!-- Card 2: Wisata -->
                    <div
                        class="absolute top-0 right-[160px] w-[384px] h-[222px] bg-white border border-[var(--color-neutral-200)] rounded-xl p-6 hover:shadow-xl transition-all">
                        <div
                            class="w-12 h-12 bg-[var(--color-primary-100)] rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-[var(--color-primary-500)]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[var(--color-neutral-dark)] mb-2">Wisata & Budaya</h3>
                        <p class="text-[var(--color-neutral-600)]">
                            Mengembangkan wisata agro dan melestarikan budaya serta kearifan lokal masyarakat.
                        </p>
                    </div>

                    <!-- Card 3: Pertanian -->
                    <div
                        class="absolute top-[254px] left-[160px] w-[384px] h-[222px] bg-white border border-[var(--color-neutral-200)] rounded-xl p-6 hover:shadow-xl transition-all">
                        <div
                            class="w-12 h-12 bg-[var(--color-primary-100)] rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-[var(--color-primary-500)]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[var(--color-neutral-dark)] mb-2">Pertanian Berkelanjutan
                        </h3>
                        <p class="text-[var(--color-neutral-600)]">
                            Mendorong pertanian ramah lingkungan dan teknologi modern untuk meningkatkan hasil panen.
                        </p>
                    </div>

                    <!-- Card 4: Infrastruktur -->
                    <div
                        class="absolute top-[254px] right-[160px] w-[384px] h-[222px] bg-white border border-[var(--color-neutral-200)] rounded-xl p-6 hover:shadow-xl transition-all">
                        <div
                            class="w-12 h-12 bg-[var(--color-primary-100)] rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-[var(--color-primary-500)]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[var(--color-neutral-dark)] mb-2">Infrastruktur Desa</h3>
                        <p class="text-[var(--color-neutral-600)]">
                            Meningkatkan kualitas infrastruktur dan fasilitas publik untuk kenyamanan warga.
                        </p>
                    </div>

                    <!-- Card 5: Pemberdayaan -->
                    <div
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[384px] h-[222px] bg-white border border-[var(--color-neutral-200)] rounded-xl p-6 hover:shadow-xl transition-all">
                        <div
                            class="w-12 h-12 bg-[var(--color-primary-100)] rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-[var(--color-primary-500)]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[var(--color-neutral-dark)] mb-2">Pemberdayaan Masyarakat
                        </h3>
                        <p class="text-[var(--color-neutral-600)]">
                            Meningkatkan kapasitas dan keterampilan warga melalui pelatihan dan pendampingan.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonial Section (Kepala Desa) -->
        @if ($visionMission)
            <section class="py-16 md:py-20">
                <div class="container mx-auto px-4">
                    <div class="max-w-6xl mx-auto bg-[var(--color-neutral-50)] rounded-2xl p-8 md:p-16">
                        <div class="flex flex-col lg:flex-row items-center gap-12 md:gap-16">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-56 h-56 bg-gradient-to-br from-[var(--color-primary-500)] to-[var(--color-accent-500)] rounded-full shadow-xl flex items-center justify-center">
                                    <svg class="w-32 h-32 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="relative">
                                    <span
                                        class="absolute -top-8 -left-4 text-[#E5E7EB] text-8xl font-serif leading-none">"</span>
                                    <blockquote
                                        class="text-2xl md:text-3xl text-[var(--color-neutral-dark)] mb-6 relative z-10">
                                        {!! $visionMission->content !!}
                                    </blockquote>
                                </div>
                                <cite class="not-italic">
                                    <div class="font-bold text-[var(--color-neutral-dark)] text-lg">H. Ahmad Syahrin
                                    </div>
                                    <div class="text-[var(--color-neutral-600)]">Kepala Desa Tangkit</div>
                                </cite>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- News Section -->
        @if ($latestPosts->isNotEmpty())
            <section class="py-16 md:py-24 bg-[var(--color-neutral-50)]">
                <div class="container mx-auto px-4">
                    <!-- Section Header -->
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-8 mb-12">
                        <div>
                            <h2 class="text-3xl md:text-4xl font-bold text-[var(--color-neutral-dark)] mb-2">
                                Update Berita &<br>Informasi Terkini
                            </h2>
                        </div>
                        <div class="max-w-md text-left lg:text-right">
                            <p class="text-[var(--color-neutral-600)] mb-2">
                                Menyajikan berita faktual dan informasi mendalam untuk<br class="hidden lg:block">
                                mendukung transparansi dan partisipasi masyarakat.
                            </p>
                            <a href="/"
                                class="inline-flex items-center gap-2 text-[var(--color-primary-500)] hover:text-[var(--color-primary-600)] font-semibold">
                                Jelajahi Berita Lainnya
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- News Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($latestPosts->take(3) as $index => $post)
                            @if ($index === 1)
                                <!-- Featured/Highlighted Article -->
                                <article
                                    class="bg-white border-2 border-[var(--color-primary-500)] rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all">
                                    <div class="bg-[var(--color-primary-500)] p-6">
                                        <div
                                            class="w-20 h-10 bg-white/20 mb-6 rounded flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">UNGGULAN</span>
                                        </div>
                                        <h3 class="text-xl font-bold text-white mb-4 line-clamp-3">
                                            {{ $post->title }}
                                        </h3>
                                        <p class="text-white/90 mb-6 line-clamp-4">
                                            {{ $post->excerpt }}
                                        </p>
                                    </div>
                                    <div class="p-6 bg-white">
                                        <a href="{{ route('filamentblog.post.show', ['post' => $post->slug]) }}"
                                            class="flex items-center justify-center w-full px-4 py-3 border-2 border-[var(--color-neutral-900)] text-[var(--color-neutral-900)] font-semibold rounded-lg hover:bg-[var(--color-neutral-900)] hover:text-white transition-all">
                                            Baca Selengkapnya
                                        </a>
                                    </div>
                                </article>
                            @else
                                <!-- Regular Article -->
                                <article
                                    class="bg-white border border-[var(--color-neutral-200)] rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all">
                                    @if ($post->featurePhoto)
                                        <div class="h-48 overflow-hidden">
                                            <img src="{{ $post->featurePhoto }}" alt="{{ $post->title }}"
                                                class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                                        </div>
                                    @endif
                                    <div class="p-6">
                                        <h3
                                            class="text-lg font-bold text-[var(--color-neutral-dark)] mb-3 line-clamp-3">
                                            {{ $post->title }}
                                        </h3>
                                        <p class="text-[var(--color-neutral-600)] mb-6 line-clamp-3">
                                            {{ $post->excerpt }}
                                        </p>
                                        <a href="{{ route('filamentblog.post.show', ['post' => $post->slug]) }}"
                                            class="inline-flex items-center justify-center w-full px-4 py-3 border border-[var(--color-neutral-300)] text-[var(--color-neutral-700)] font-semibold rounded-lg hover:border-[var(--color-primary-500)] hover:text-[var(--color-primary-500)] transition-all">
                                            Baca Selengkapnya
                                        </a>
                                    </div>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Galeri Preview Section -->
        @if ($galleryPreview->isNotEmpty())
            <section class="py-16 bg-white">
                <div class="container mx-auto px-4">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold text-[var(--color-neutral-dark)] mb-3">Galeri Desa
                        </h2>
                        <p class="text-[var(--color-neutral-600)] max-w-2xl mx-auto">
                            Dokumentasi kegiatan dan momen berharga di Desa Tangkit
                        </p>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                        @foreach ($galleryPreview->take(8) as $gallery)
                            <div
                                class="group relative aspect-square overflow-hidden rounded-xl cursor-pointer shadow-md hover:shadow-xl transition-all">
                                <img src="{{ Storage::url($gallery->thumbnail_path ?? $gallery->media_path) }}"
                                    alt="{{ $gallery->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                                    <div class="absolute bottom-0 left-0 right-0 p-4">
                                        <p class="text-white font-semibold text-sm line-clamp-2">{{ $gallery->title }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center">
                        <a href="{{ route('gallery.index') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-white border-2 border-[var(--color-primary-500)] text-[var(--color-primary-500)] font-semibold rounded-lg hover:bg-[var(--color-primary-500)] hover:text-white transition-all">
                            Lihat Semua Galeri
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </section>
        @endif
    </div>
</x-blog-layout>
