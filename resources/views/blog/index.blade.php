@extends('layouts.blog')

@section('title', $settings->title ?? 'Portal Berita & Profil Desa Tangkit')
@section('description', $settings->description ?? 'Berita terkini, profil, dan informasi resmi Desa Tangkit - Sentra Produksi Nanas')

@section('content')
    <!-- Hero Banner -->
    <x-hero-banner
        title="Berita & Informasi Resmi Desa Tangkit"
        subtitle="Suara Warga, Kabar Terbaru"
        :primary-button="['text' => 'Berita Terbaru', 'url' => '#berita']"
        :secondary-button="['text' => 'Pengumuman Penting', 'url' => route('village.announcements')]"
    />

    <!-- Featured News Section -->
    <section class="py-16 bg-white dark:bg-gray-900" id="berita">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    Berita Unggulan
                </h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Berita terbaru dan informasi penting dari kegiatan Desa Tangkit
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Large Featured Post -->
                @if($featuredPosts->count() > 0)
                    <x-featured-post-card
                        :post="$featuredPosts->first()"
                        is-large="true"
                        class="lg:col-span-2"
                    />
                @endif

                <!-- Sidebar with Recent Posts -->
                <div class="space-y-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Berita Terbaru</h3>
                    @foreach($featuredPosts->skip(1)->take(3) as $post)
                        <div class="flex space-x-4 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                            @if($post->cover_photo_path)
                                <img class="w-16 h-16 object-cover rounded-lg" src="{{ $post->cover_photo_path }}" alt="{{ $post->photo_alt_text }}">
                            @else
                                <div class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center">
                                    <i class="fas fa-newspaper text-white"></i>
                                </div>
                            @endif
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-900 dark:text-white text-sm mb-1 line-clamp-2">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-primary transition-colors">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $post->published_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- News Grid Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    Berita Terbaru
                </h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Tetap update dengan kegiatan dan perkembangan terbaru di Desa Tangkit
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($recentPosts->take(6) as $post)
                    <x-post-grid-card :post="$post" />
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('blog.index') }}?page=2" class="btn-secondary">
                    Lihat Berita Lainnya
                </a>
            </div>
        </div>
    </section>

    <!-- Category Preview -->
    <x-category-preview :categories="$categories->take(5)" />

    <!-- Village Potential -->
    <x-village-potential />

    <!-- Announcements Preview -->
    <section class="py-16 bg-white dark:bg-gray-800">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    Pengumuman & Agenda
                </h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Informasi penting dan jadwal kegiatan mendatang di Desa Tangkit
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Sample announcements - in real app, this would come from database -->
                <div class="bg-gradient-to-br from-accent to-primary p-6 rounded-xl text-white">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-calendar-alt text-2xl mr-3"></i>
                        <div>
                            <h3 class="font-bold text-lg">Rapat Desa</h3>
                            <p class="text-white/90">15 Oktober 2024</p>
                        </div>
                    </div>
                    <p class="text-white/90 mb-4">Rapat koordinasi program pembangunan desa tahun 2024</p>
                    <a href="{{ route('village.announcements') }}" class="text-white underline hover:no-underline">
                        Lihat Detail →
                    </a>
                </div>

                <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-users text-primary text-2xl mr-3"></i>
                        <div>
                            <h3 class="font-bold text-gray-900 dark:text-white text-lg">Kegiatan Posyandu</h3>
                            <p class="text-gray-600 dark:text-gray-300">Setiap Kamis</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Pelayanan kesehatan ibu dan anak gratis</p>
                    <a href="{{ route('village.announcements') }}" class="text-primary hover:underline">
                        Lihat Jadwal →
                    </a>
                </div>

                <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-graduation-cap text-secondary text-2xl mr-3"></i>
                        <div>
                            <h3 class="font-bold text-gray-900 dark:text-white text-lg">Bantuan Pendidikan</h3>
                            <p class="text-gray-600 dark:text-gray-300">Pendaftaran Dibuka</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Program beasiswa untuk siswa berprestasi</p>
                    <a href="{{ route('village.announcements') }}" class="text-secondary hover:underline">
                        Daftar Sekarang →
                    </a>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('village.announcements') }}" class="btn-primary">
                    Lihat Semua Pengumuman
                </a>
            </div>
        </div>
    </section>

    <!-- Gallery Preview -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    Galeri Desa Tangkit
                </h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Dokumentasi kegiatan, keindahan alam, dan potensi Desa Tangkit
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                @for($i = 1; $i <= 8; $i++)
                    <div class="aspect-square bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden">
                        <img src="https://picsum.photos/300/300?random={{ $i }}" alt="Galeri {{ $i }}"
                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-300 cursor-pointer">
                    </div>
                @endfor
            </div>

            <div class="text-center">
                <a href="{{ route('village.gallery') }}" class="btn-secondary">
                    Lihat Galeri Lengkap
                </a>
            </div>
        </div>
    </section>

    <!-- Newsletter Subscription -->
    <section class="py-16 bg-primary">
        <div class="container-custom text-center">
            <h2 class="text-3xl font-bold text-white mb-4">
                Tetap Terhubung dengan Desa Tangkit
            </h2>
            <p class="text-white/90 mb-8 max-w-2xl mx-auto">
                Dapatkan update berita terbaru, pengumuman penting, dan informasi kegiatan langsung ke email Anda
            </p>

            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="max-w-md mx-auto">
                @csrf
                <div class="flex gap-4">
                    <input type="email" name="email" placeholder="Masukkan email Anda"
                           class="flex-1 px-4 py-3 rounded-lg border-0 focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary"
                           required>
                    <button type="submit" class="bg-white text-primary px-6 py-3 rounded-lg hover:bg-gray-100 transition-colors font-medium">
                        Daftar
                    </button>
                </div>
                @if(session('success'))
                    <p class="text-green-200 mt-4">{{ session('success') }}</p>
                @endif
            </form>
        </div>
    </section>
@endsection
