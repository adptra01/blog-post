<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="fi-theme-system">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $settings->title ?? 'Blog Teknologi')</title>
    <meta name="description" content="@yield('description', $settings->description ?? 'Platform berbagi pengetahuan tentang teknologi, programming, dan inovasi digital terkini.')">
    <meta name="keywords" content="@yield('keywords', 'teknologi, programming, development, tutorial, tips, panduan')">
    <meta name="author" content="{{ $settings->organization_name ?? 'Tech Blog Indonesia' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="@yield('title', $settings->title ?? 'Blog Teknologi')">
    <meta property="og:description" content="@yield('description', $settings->description ?? 'Platform berbagi pengetahuan tentang teknologi, programming, dan inovasi digital terkini.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.png'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ request()->url() }}">
    <meta property="twitter:title" content="@yield('title', $settings->title ?? 'Blog Teknologi')">
    <meta property="twitter:description" content="@yield('description', $settings->description ?? 'Platform berbagi pengetahuan tentang teknologi, programming, dan inovasi digital terkini.')">
    <meta property="twitter:image" content="@yield('og_image', asset('images/og-default.png'))">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset($settings->favicon ?? 'favicon.ico') }}">

    <!-- Custom Styles -->
    @vite(['resources/css/filament/public/theme.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="fi-body min-h-screen bg-gray-50 font-normal text-gray-950 antialiased dark:bg-gray-950 dark:text-white">
    <!-- Navigation -->
    <nav class="fi-topbar sticky top-0 z-10 border-b border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
        <div class="flex h-16 items-center px-4 sm:px-6 lg:px-8">
            <div class="flex flex-1 items-center">
                <!-- Logo -->
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('blog.index') }}" class="flex items-center space-x-2">
                        @if($settings->logo)
                            <img class="h-8 w-auto" src="{{ asset($settings->logo) }}" alt="{{ $settings->title }}">
                        @else
                            <div class="h-8 w-8 rounded-lg bg-green-600 flex items-center justify-center">
                                <i class="fas fa-leaf text-white text-lg"></i>
                            </div>
                        @endif
                        <div class="flex flex-col">
                            <span class="font-bold text-lg text-gray-900 dark:text-white leading-tight">{{ $settings->title ?? 'Portal Desa Tangkit' }}</span>
                            <span class="text-xs text-green-600 dark:text-green-400 font-medium">Sentra Produksi Nanas</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ route('blog.index') }}" class="fi-topbar-link {{ request()->routeIs('blog.index') ? 'fi-active' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('village.profile') }}" class="fi-topbar-link {{ request()->routeIs('village.profile') ? 'fi-active' : '' }}">
                        Profil Desa
                    </a>
                    <a href="{{ route('village.potential') }}" class="fi-topbar-link {{ request()->routeIs('village.potential') ? 'fi-active' : '' }}">
                        Potensi
                    </a>
                    <div class="relative group">
                        <button class="fi-topbar-link flex items-center">
                            Berita
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-1">
                                @foreach($categories->take(6) as $category)
                                    <a href="{{ route('blog.category', $category->slug) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        {{ $category->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('village.announcements') }}" class="fi-topbar-link {{ request()->routeIs('village.announcements') ? 'fi-active' : '' }}">
                        Pengumuman
                    </a>
                </div>
            </div>

            <!-- Right side -->
            <div class="flex items-center space-x-4">
                <!-- Search -->
                <form action="{{ route('blog.search') }}" method="GET" class="flex">
                    <input type="text" name="q" placeholder="Cari artikel..."
                           class="fi-input h-9 px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm">
                    <button type="submit" class="h-9 px-4 py-2 bg-blue-600 text-white rounded-r-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-search"></i>
                    </button>
                </form>

                <!-- Theme Toggle -->
                <x-filament-panels::theme-switcher />
            </div>

            <!-- Mobile menu button -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button type="button" onclick="toggleMobileMenu()" class="fi-button fi-size-sm fi-variant-gray fi-color-gray inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('blog.index') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700">
                    Beranda
                </a>
                @foreach($categories->take(5) as $category)
                    <a href="{{ route('blog.category', $category->slug) }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
            <div class="pt-4 pb-3 border-t border-gray-200 dark:border-gray-600">
                <div class="flex items-center px-4">
                    <form action="{{ route('blog.search') }}" method="GET" class="flex w-full">
                        <input type="text" name="q" placeholder="Cari artikel..." class="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white text-sm">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-r-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="fi-main flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="fi-footer bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="space-y-8 xl:col-span-1">
                    <div class="flex items-center space-x-2">
                        @if($settings->logo)
                            <img class="h-8 w-auto" src="{{ asset($settings->logo) }}" alt="{{ $settings->title }}">
                        @else
                            <div class="h-8 w-8 bg-green-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-leaf text-white text-lg"></i>
                            </div>
                        @endif
                        <div class="flex flex-col">
                            <span class="font-bold text-xl text-gray-900 dark:text-white">{{ $settings->title ?? 'Portal Desa Tangkit' }}</span>
                            <span class="text-sm text-green-600 dark:text-green-400">Sentra Produksi Nanas</span>
                        </div>
                    </div>
                    <p class="text-gray-500 dark:text-gray-400 text-base">
                        {{ $settings->description ?? 'Portal informasi dan berita Desa Tangkit sebagai sentra produksi nanas terkemuka.' }}
                    </p>
                    <div class="space-y-4">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Kontak</h4>
                            <div class="mt-2 space-y-2">
                                <p class="text-gray-500 dark:text-gray-400 text-sm flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2 text-green-600"></i>
                                    Kantor Desa Tangkit
                                </p>
                                <p class="text-gray-500 dark:text-gray-400 text-sm flex items-center">
                                    <i class="fas fa-phone mr-2 text-green-600"></i>
                                    (021) 1234-5678
                                </p>
                                <p class="text-gray-500 dark:text-gray-400 text-sm flex items-center">
                                    <i class="fas fa-envelope mr-2 text-green-600"></i>
                                    info@desatangkit.go.id
                                </p>
                            </div>
                        </div>
                        <div class="flex space-x-6">
                            <a href="#" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                                <i class="fab fa-facebook-f text-lg"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                                <i class="fab fa-instagram text-lg"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                                <i class="fab fa-whatsapp text-lg"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                                <i class="fab fa-youtube text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Kategori</h3>
                            <ul role="list" class="mt-4 space-y-4">
                                @foreach($categories->take(6) as $category)
                                    <li>
                                        <a href="{{ route('blog.category', $category->slug) }}" class="text-base text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Tag Populer</h3>
                            <div class="mt-4 flex flex-wrap gap-2">
                                @php
                                    $popularTags = \App\Models\Tag::withCount('posts')->orderBy('posts_count', 'desc')->limit(8)->get();
                                @endphp
                                @foreach($popularTags as $tag)
                                    <a href="{{ route('blog.tag', $tag->slug) }}" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-200 dark:border-gray-700 pt-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <p class="text-base text-gray-400">
                            &copy; {{ date('Y') }} {{ $settings->organization_name ?? 'Pemerintah Desa Tangkit' }}. All rights reserved.
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-500 mt-2">
                            Didukung oleh Sistem Informasi Desa Modern
                        </p>
                    </div>
                    <div class="md:text-right">
                        <div class="flex flex-wrap gap-4 text-sm">
                            <a href="{{ route('village.documents') }}" class="text-gray-400 hover:text-gray-300">Dokumen</a>
                            <a href="{{ route('village.contact') }}" class="text-gray-400 hover:text-gray-300">Kontak</a>
                            <a href="{{ route('village.announcements') }}" class="text-gray-400 hover:text-gray-300">Pengumuman</a>
                            <a href="{{ route('village.gallery') }}" class="text-gray-400 hover:text-gray-300">Galeri</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile menu script -->
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>

    <!-- Filament Scripts -->
    @filamentScripts

    @stack('scripts')
</body>
</html>
