@props(['title' => 'Desa Tangkit', 'logo' => null])
<header x-data="{ mobileMenuOpen: false, showSearchModal: false }"
    class="sticky top-0 z-50 bg-white/95 backdrop-blur-sm border-b border-[var(--color-neutral-200)] shadow-sm">
    <!-- Top Bar -->
    <div class="py-2 border-b border-[var(--color-neutral-200)] bg-white">
        <div class="container mx-auto">
            <div class="flex justify-between items-center text-sm">
                <div class="flex items-center gap-4 text-[var(--color-neutral-600)]">
                    <a href="mailto:info@desatangkit.id"
                        class="flex items-center gap-1 hover:text-[var(--color-primary-500)] transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        info@desatangkit.id
                    </a>
                    <span class="hidden md:flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        (0761) 123-4567
                    </span>
                </div>
                <div class="flex items-center gap-3">
                    <a href="#" class="hover:text-[var(--color-primary-500)] transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                    <a href="#" class="hover:text-[var(--color-primary-500)] transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <a href="#" class="hover:text-[var(--color-primary-500)] transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="py-4 bg-white">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    @if ($logo)
                        <img src="{{ $logo }}" alt="{{ $title }}" class="max-h-[60px]" />
                    @else
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-[var(--color-primary-500)] to-[var(--color-accent-500)] rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h1
                                class="text-xl font-bold text-[var(--color-neutral-dark)] group-hover:text-[var(--color-primary-500)] transition-colors">
                                {{ $title }}</h1>
                            <p class="text-xs text-[var(--color-neutral-600)]">Kab. Pelalawan</p>
                        </div>
                    @endif
                </a>

                <!-- Desktop Menu -->
                <nav class="hidden lg:flex items-center gap-1">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all {{ request()->routeIs('home') ? 'text-[var(--color-primary-500)] bg-[var(--color-neutral-100)]' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('village-profile') }}"
                        class="px-4 py-2 text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all {{ request()->routeIs('village-profile') ? 'text-[var(--color-primary-500)] bg-[var(--color-neutral-100)]' : '' }}">
                        Profil Desa
                    </a>

                    <!-- Berita Dropdown -->
                    <div class="relative group">
                        <button
                            class="px-4 py-2 text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all flex items-center gap-1">
                            Berita
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 top-full pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                            <div
                                class="bg-white rounded-lg shadow-xl border border-[var(--color-neutral-200)] py-2 min-w-[200px]">
                                <a href="/"
                                    class="block px-4 py-2 text-sm text-[var(--color-neutral-700)] hover:bg-[var(--color-neutral-100)] hover:text-[var(--color-primary-500)] transition-colors">
                                    Semua Berita
                                </a>
                                <x-blog-header-category />
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('announcement.index') }}"
                        class="px-4 py-2 text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all {{ request()->routeIs('announcement.*') ? 'text-[var(--color-primary-500)] bg-[var(--color-neutral-100)]' : '' }}">
                        Pengumuman
                    </a>
                    <a href="{{ route('gallery.index') }}"
                        class="px-4 py-2 text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all {{ request()->routeIs('gallery.*') ? 'text-[var(--color-primary-500)] bg-[var(--color-neutral-100)]' : '' }}">
                        Galeri
                    </a>
                    <a href="{{ route('document.index') }}"
                        class="px-4 py-2 text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all {{ request()->routeIs('document.*') ? 'text-[var(--color-primary-500)] bg-[var(--color-neutral-100)]' : '' }}">
                        Dokumen
                    </a>
                    <a href="{{ route('contact') }}"
                        class="px-4 py-2 text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all {{ request()->routeIs('contact') ? 'text-[var(--color-primary-500)] bg-[var(--color-neutral-100)]' : '' }}">
                        Kontak
                    </a>
                </nav>

                <!-- Search & Mobile Menu -->
                <div class="flex items-center gap-2">
                    <button @click="showSearchModal = !showSearchModal"
                        class="p-2 text-[var(--color-neutral-600)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="lg:hidden p-2 text-[var(--color-neutral-600)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                class="lg:hidden mt-4 py-4 border-t border-[var(--color-neutral-200)]">
                <div class="flex flex-col gap-1">
                    <a href="{{ route('home') }}"
                        class="px-4 py-3 text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all">Beranda</a>
                    <a href="{{ route('village-profile') }}"
                        class="px-4 py-3 text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all">Profil
                        Desa</a>
                    <a href="/"
                        class="px-4 py-3 text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all">Berita</a>
                    <a href="{{ route('announcement.index') }}"
                        class="px-4 py-3 text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all">Pengumuman</a>
                    <a href="{{ route('gallery.index') }}"
                        class="px-4 py-3 text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all">Galeri</a>
                    <a href="{{ route('document.index') }}"
                        class="px-4 py-3 text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all">Dokumen</a>
                    <a href="{{ route('contact') }}"
                        class="px-4 py-3 text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] hover:bg-[var(--color-neutral-100)] rounded-lg transition-all">Kontak</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Modal -->
    <div x-show="showSearchModal" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click="showSearchModal = false"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-start justify-center pt-20 px-4">
        <div @click.stop class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full p-6">
            <form action="{{ route('filamentblog.post.search') }}" method="GET">
                <div class="relative">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[var(--color-neutral-400)]"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" name="query" value="{{ request()->get('query') }}"
                        placeholder="Cari berita, pengumuman, dokumen..." autofocus
                        class="w-full pl-12 pr-4 py-4 border-2 border-[var(--color-neutral-300)] rounded-xl focus:outline-none focus:ring-2 focus:ring-[var(--color-primary-500)] focus:border-transparent">
                </div>
                @error('query')
                    <span class="text-xs text-red-500 mt-2 block">{{ $message }}</span>
                @enderror
            </form>
        </div>
    </div>
</header>
