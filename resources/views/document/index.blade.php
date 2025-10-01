<x-blog-layout>
    <!-- Hero Section -->
    <section class="relative h-[400px] overflow-hidden bg-gradient-to-br from-[var(--color-accent-500)] via-[var(--color-neutral-dark)] to-[var(--color-primary-500)]">
        <div class="absolute inset-0 opacity-20">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <pattern id="pattern-document" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="1" fill="white"/>
                </pattern>
                <rect x="0" y="0" width="100%" height="100%" fill="url(#pattern-document)"/>
            </svg>
        </div>

        <div class="relative container mx-auto px-4 h-full flex items-center">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-slide-up">Dokumen & Peraturan</h1>
                <p class="text-lg text-white/90 animate-fade-in">Akses dokumen resmi dan peraturan Desa Tangkit</p>
            </div>
        </div>
    </section>

    <!-- Search & Filter Section -->
    <section class="py-8 bg-white border-b border-[var(--color-neutral-200)]">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Search Bar -->
                <form method="GET" action="{{ route('document.index') }}" class="mb-6">
                    <div class="relative">
                        <input type="text"
                               name="search"
                               value="{{ $search }}"
                               placeholder="Cari dokumen berdasarkan judul atau nomor..."
                               class="w-full px-5 py-4 pr-12 border-2 border-[var(--color-neutral-300)] rounded-xl focus:outline-none focus:ring-2 focus:ring-[var(--color-primary-500)] focus:border-transparent">
                        <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-[var(--color-neutral-500)] hover:text-[var(--color-primary-500)] transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Filter Tabs -->
                <div class="flex flex-wrap gap-3 justify-center">
                    <a href="{{ route('document.index') }}"
                       class="px-5 py-2.5 rounded-full font-semibold transition-all {{ !$type ? 'bg-[var(--color-primary-500)] text-white shadow-lg' : 'bg-[var(--color-neutral-100)] text-[var(--color-neutral-700)] hover:bg-[var(--color-neutral-200)]' }}">
                        Semua Dokumen
                    </a>
                    @foreach($types as $key => $label)
                        <a href="{{ route('document.index', ['type' => $key]) }}"
                           class="px-5 py-2.5 rounded-full font-semibold transition-all {{ $type === $key ? 'bg-[var(--color-primary-500)] text-white shadow-lg' : 'bg-[var(--color-neutral-100)] text-[var(--color-neutral-700)] hover:bg-[var(--color-neutral-200)]' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Documents List -->
    <section class="py-16 bg-[var(--color-neutral-50)]">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                @if($documents->isNotEmpty())
                <div class="grid gap-4">
                    @foreach($documents as $document)
                    <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300">
                        <div class="flex flex-col md:flex-row gap-6">
                            <!-- File Icon -->
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br from-[var(--color-primary-500)] to-[var(--color-accent-500)] rounded-xl flex items-center justify-center">
                                    @if(in_array($document->file_type, ['pdf']))
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    @elseif(in_array($document->file_type, ['doc', 'docx']))
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    @else
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    @endif
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-wrap items-center gap-3 mb-3">
                                    <span class="px-3 py-1 bg-[var(--color-secondary-100)] text-[var(--color-secondary-700)] text-xs font-semibold rounded-full">
                                        {{ $types[$document->type] ?? ucfirst($document->type) }}
                                    </span>
                                    @if($document->document_number)
                                    <span class="text-xs text-[var(--color-neutral-500)]">
                                        No: {{ $document->document_number }}
                                    </span>
                                    @endif
                                    @if($document->document_date)
                                    <span class="text-xs text-[var(--color-neutral-500)]">
                                        {{ $document->document_date->format('d F Y') }}
                                    </span>
                                    @endif
                                </div>

                                <a href="{{ route('document.show', $document->slug) }}"
                                   class="block mb-2 group-hover:text-[var(--color-primary-500)] transition-colors">
                                    <h3 class="text-lg font-bold text-[var(--color-neutral-dark)] line-clamp-2">
                                        {{ $document->title }}
                                    </h3>
                                </a>

                                @if($document->description)
                                <p class="text-sm text-[var(--color-neutral-600)] line-clamp-2 mb-3">
                                    {{ $document->description }}
                                </p>
                                @endif

                                <div class="flex flex-wrap items-center gap-4 text-xs text-[var(--color-neutral-500)]">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ strtoupper($document->file_type) }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                                        </svg>
                                        {{ $document->formatted_file_size }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        {{ number_format($document->download_count) }} downloads
                                    </span>
                                </div>
                            </div>

                            <!-- Download Button -->
                            <div class="flex-shrink-0 flex items-center">
                                <a href="{{ route('document.download', $document->slug) }}"
                                   class="px-6 py-3 bg-[var(--color-primary-500)] text-white font-semibold rounded-lg hover:bg-[var(--color-primary-600)] transition-all hover:scale-105 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $documents->links() }}
                </div>
                @else
                <!-- Empty State -->
                <div class="text-center py-16 bg-white rounded-xl">
                    <svg class="w-24 h-24 mx-auto text-[var(--color-neutral-300)] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-[var(--color-neutral-600)] mb-2">Belum Ada Dokumen</h3>
                    <p class="text-[var(--color-neutral-500)]">
                        @if($search)
                            Tidak ditemukan dokumen dengan kata kunci "{{ $search }}"
                        @else
                            Saat ini belum ada dokumen untuk ditampilkan
                        @endif
                    </p>
                </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Info Banner -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="p-8 bg-gradient-to-br from-[var(--color-primary-50)] to-[var(--color-secondary-50)] rounded-2xl border border-[var(--color-primary-200)]">
                    <div class="flex flex-col md:flex-row gap-6 items-center">
                        <div class="flex-shrink-0">
                            <div class="w-20 h-20 bg-gradient-to-br from-[var(--color-primary-500)] to-[var(--color-accent-500)] rounded-2xl flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h3 class="text-xl font-bold text-[var(--color-neutral-dark)] mb-2">Informasi Penting</h3>
                            <p class="text-[var(--color-neutral-700)]">
                                Dokumen-dokumen ini merupakan arsip resmi Desa Tangkit. Untuk informasi lebih lanjut atau bantuan mengakses dokumen, silakan hubungi kantor desa.
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('contact') }}"
                               class="px-6 py-3 bg-[var(--color-primary-500)] text-white font-semibold rounded-lg hover:bg-[var(--color-primary-600)] transition-colors inline-flex items-center gap-2">
                                Hubungi Kami
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-blog-layout>
