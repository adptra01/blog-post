<x-blog-layout>
    <div class="bg-white">

        <!-- Hero Section -->
        <section class="relative py-16 md:py-24 px-4">
            <div class="container mx-auto text-center max-w-5xl">
                <!-- Subtitle Badge -->
                <span class="px-4 py-2 mb-4 inline-block bg-[var(--color-primary-50)] text-[var(--color-primary-600)] text-sm font-semibold rounded-full">
                    Portal Berita & Informasi Resmi Desa Tangkit
                </span>

                <!-- Main Heading -->
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[var(--color-neutral-dark)] mb-6 leading-tight">
                    Membangun Desa Tangkit yang Maju<br class="hidden md:block">dan Sejahtera Bersama-sama
                </h1>

                <!-- Description -->
                <p class="text-lg md:text-xl text-[var(--color-neutral-600)] max-w-3xl mx-auto mb-10">
                    Melalui pemberdayaan masyarakat, pengembangan UMKM, dan tata kelola yang transparan,
                    kami memastikan Desa Tangkit siap menghadapi tantangan dan meraih peluang masa depan.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-12">
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
                    <div class="flex flex-wrap justify-center gap-4 md:gap-8 opacity-70 mb-12">
                        @foreach ($categories->take(5) as $category)
                            <a href="{{ route('filamentblog.category.post', ['category' => $category->slug]) }}"
                                class="text-[var(--color-neutral-500)] hover:text-[var(--color-primary-500)] transition-colors text-sm font-medium">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                @endif

                <!-- Featured Post -->
                @if ($featuredPost && $featuredPost->featurePhoto)
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl bg-[var(--color-neutral-100)]">
                        <img src="{{ $featuredPost->featurePhoto }}" alt="{{ $featuredPost->title }}"
                            class="w-full h-[400px] md:h-[500px] object-cover">
                        <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                            <a href="{{ route('filamentblog.post.show', ['post' => $featuredPost->slug]) }}"
                                class="w-16 h-16 md:w-20 md:h-20 bg-[var(--color-primary-500)] rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 md:w-8 md:h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </a>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8 bg-gradient-to-t from-black/80 to-transparent text-white">
                            <h3 class="text-xl md:text-2xl font-bold mb-2">{{ $featuredPost->title }}</h3>
                            <p class="text-white/90 line-clamp-2 md:line-clamp-3">{{ $featuredPost->excerpt }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <!-- About Section + Statistics -->
        <section class="py-16 md:py-24 bg-[var(--color-neutral-50)]">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto text-center mb-12">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-normal text-[var(--color-neutral-dark)] leading-tight">
                        Desa Tangkit terus berkembang melalui pemberdayaan masyarakat
                        dan pengelolaan sumber daya berkelanjutan untuk kesejahteraan warga.
                    </h2>
                </div>

                <!-- Responsive Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
                    <div class="bg-white border rounded-xl p-6 flex gap-4 items-center shadow-md hover:shadow-lg transition-all">
                        <div class="w-12 h-12 bg-gradient-to-br from-[var(--color-primary-500)] to-[var(--color-accent-500)] rounded-full flex items-center justify-center text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M15 7a3 3 0 11-6 0 3 3 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[var(--color-neutral-dark)] text-base">Dikelola oleh Perangkat Desa</h3>
                            <p class="text-sm text-[var(--color-neutral-600)]">Berpengalaman dengan Mandat Masyarakat</p>
                        </div>
                    </div>

                    <div class="relative rounded-xl overflow-hidden shadow-lg">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400" alt="Nature"
                            class="w-full h-64 object-cover">
                        <div class="absolute bottom-4 left-4 bg-white rounded-lg p-4 shadow-md">
                            <div class="text-3xl font-bold text-[var(--color-neutral-dark)]">100%</div>
                            <div class="text-sm text-[var(--color-neutral-600)]">Transparansi</div>
                        </div>
                    </div>

                    <div class="relative rounded-xl overflow-hidden shadow-lg">
                        <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=400" alt="Mountain"
                            class="w-full h-64 object-cover">
                        <div class="absolute bottom-4 left-4 bg-white rounded-lg p-4 shadow-md">
                            <div class="text-3xl font-bold text-[var(--color-neutral-dark)]">
                                {{ $statistics->data['Jumlah_Penduduk'] ?? '3,245' }}
                            </div>
                            <div class="text-sm text-[var(--color-neutral-600)]">Total Penduduk Desa Tangkit</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- (lanjutan untuk Program, News, Galeri, Testimonial bisa saya rapikan juga dengan pola grid/flex yang sama agar tidak absolute) -->

    </div>
</x-blog-layout>
