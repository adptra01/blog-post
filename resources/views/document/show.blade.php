<x-blog-layout>
    <!-- Breadcrumb -->
    <div class="py-6 bg-white border-b border-[var(--color-neutral-200)]">
        <div class="container mx-auto px-4">
            <nav class="flex items-center gap-2 text-sm">
                <a href="{{ route('home') }}" class="text-[var(--color-neutral-600)] hover:text-[var(--color-primary-500)] transition-colors">Beranda</a>
                <svg class="w-4 h-4 text-[var(--color-neutral-400)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="{{ route('document.index') }}" class="text-[var(--color-neutral-600)] hover:text-[var(--color-primary-500)] transition-colors">Dokumen</a>
                <svg class="w-4 h-4 text-[var(--color-neutral-400)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-[var(--color-neutral-800)] font-medium">{{ Str::limit($document->title, 50) }}</span>
            </nav>
        </div>
    </div>

    <div class="py-12 bg-[var(--color-neutral-50)]">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Main Card -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                    <!-- Header -->
                    <div class="p-8 border-b border-[var(--color-neutral-200)]">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-[var(--color-secondary-100)] text-[var(--color-secondary-700)] text-sm font-semibold rounded-full">
                                {{ $document->type }}
                            </span>
                            @if($document->document_number)
                            <span class="px-3 py-1 bg-[var(--color-neutral-100)] text-[var(--color-neutral-700)] text-sm font-medium rounded-full">
                                No: {{ $document->document_number }}
                            </span>
                            @endif
                        </div>

                        <h1 class="text-3xl md:text-4xl font-bold text-[var(--color-neutral-dark)] mb-6">{{ $document->title }}</h1>

                        <!-- Document Meta -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="flex gap-4 p-4 bg-[var(--color-neutral-50)] rounded-lg">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-[var(--color-primary-500)] to-[var(--color-accent-500)] rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs text-[var(--color-neutral-500)] mb-1">Tanggal Dokumen</div>
                                    <div class="font-semibold text-[var(--color-neutral-dark)]">
                                        {{ $document->document_date ? $document->document_date->format('d F Y') : '-' }}
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-4 p-4 bg-[var(--color-neutral-50)] rounded-lg">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-[var(--color-secondary-500)] to-[var(--color-primary-500)] rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs text-[var(--color-neutral-500)] mb-1">Tipe File</div>
                                    <div class="font-semibold text-[var(--color-neutral-dark)]">
                                        {{ strtoupper($document->file_type) }} - {{ $document->formatted_file_size }}
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-4 p-4 bg-[var(--color-neutral-50)] rounded-lg">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-[var(--color-accent-500)] to-[var(--color-secondary-500)] rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs text-[var(--color-neutral-500)] mb-1">Total Download</div>
                                    <div class="font-semibold text-[var(--color-neutral-dark)]">
                                        {{ number_format($document->download_count) }} kali
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-4 p-4 bg-[var(--color-neutral-50)] rounded-lg">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-[var(--color-primary-500)] to-[var(--color-secondary-500)] rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs text-[var(--color-neutral-500)] mb-1">Dipublikasi</div>
                                    <div class="font-semibold text-[var(--color-neutral-dark)]">
                                        {{ $document->published_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    @if($document->description)
                    <div class="p-8 border-b border-[var(--color-neutral-200)]">
                        <h3 class="text-lg font-bold text-[var(--color-neutral-dark)] mb-3">Deskripsi</h3>
                        <p class="text-[var(--color-neutral-700)] leading-relaxed">{{ $document->description }}</p>
                    </div>
                    @endif

                    <!-- Download CTA -->
                    <div class="p-8 bg-gradient-to-br from-[var(--color-neutral-50)] to-white">
                        <div class="text-center">
                            <p class="text-[var(--color-neutral-600)] mb-6">Klik tombol di bawah untuk mengunduh dokumen</p>
                            <a href="{{ route('document.download', $document->slug) }}"
                               class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-[var(--color-primary-500)] to-[var(--color-accent-500)] text-white font-bold rounded-xl hover:shadow-xl hover:scale-105 transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                Download Dokumen
                                <span class="text-sm opacity-90">({{ $document->formatted_file_size }})</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="text-center">
                    <a href="{{ route('document.index') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-[var(--color-neutral-100)] text-[var(--color-neutral-700)] font-semibold rounded-lg hover:bg-[var(--color-neutral-200)] transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Kembali ke Daftar Dokumen
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-blog-layout>
