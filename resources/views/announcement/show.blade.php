<x-blog-layout>
    @php
        $title = $announcement->title;
        $description = Str::limit(strip_tags($announcement->content), 150);
    @endphp

    <!-- Breadcrumb -->
    <section class="py-8 bg-white border-b border-[var(--color-neutral-200)]">
        <div class="container mx-auto px-4">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)]">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-[var(--color-neutral-400)]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="{{ route('announcement.index') }}" class="ml-1 text-sm font-medium text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] md:ml-2">Pengumuman</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-[var(--color-neutral-400)]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-sm font-medium text-[var(--color-neutral-500)] md:ml-2 line-clamp-1">{{ $title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <div class="py-16 bg-[var(--color-neutral-50)]">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <article class="bg-white p-8 rounded-2xl shadow-lg">
                    <!-- Header -->
                    <header class="mb-8">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="px-3 py-1 bg-[var(--color-primary-100)] text-[var(--color-primary-600)] text-sm font-semibold rounded-full">
                                {{ $announcement->type === 'event' ? 'Event' : 'Pengumuman' }}
                            </span>
                            @if($announcement->is_featured)
                                <span class="px-3 py-1 bg-[var(--color-accent-100)] text-[var(--color-accent-600)] text-sm font-semibold rounded-full">
                                    Penting
                                </span>
                            @endif
                        </div>

                        <h1 class="text-3xl md:text-4xl font-bold text-[var(--color-neutral-dark)] mb-4">{{ $announcement->title }}</h1>

                        <div class="flex flex-wrap items-center gap-x-6 gap-y-3 text-sm text-[var(--color-neutral-600)]">
                            <span class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                Dipublikasikan pada {{ $announcement->published_at->format('d F Y') }}
                            </span>
                            @if($announcement->type === 'event' && $announcement->event_date)
                                <span class="flex items-center gap-2 font-semibold text-[var(--color-primary-500)]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    Diselenggarakan pada {{ $announcement->event_date->format('d F Y') }}
                                </span>
                            @endif
                            @if($announcement->location)
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $announcement->location }}
                                </span>
                            @endif
                        </div>
                    </header>

                    <!-- Image -->
                    @if($announcement->image)
                        <div class="mb-8 rounded-xl overflow-hidden shadow-md">
                            <img src="{{ Storage::url($announcement->image) }}" alt="{{ $announcement->title }}" class="w-full h-auto object-cover">
                        </div>
                    @endif

                    <!-- Content -->
                    <div class="prose prose-lg max-w-none text-[var(--color-neutral-700)] leading-relaxed">
                        {!! $announcement->content !!}
                    </div>

                </article>

                <!-- Related Announcements -->
                @if($relatedAnnouncements->isNotEmpty())
                    <div class="mt-16">
                        <h2 class="text-2xl font-bold text-[var(--color-neutral-dark)] mb-8">Pengumuman Terkait</h2>
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($relatedAnnouncements as $related)
                                <a href="{{ route('announcement.show', $related->slug) }}" class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300">
                                    <div class="flex flex-col h-full">
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-3">
                                                <span class="px-2 py-1 bg-[var(--color-neutral-100)] text-[var(--color-neutral-600)] text-xs font-medium rounded">
                                                    {{ $related->type === 'event' ? 'Event' : 'Pengumuman' }}
                                                </span>
                                                <span class="text-xs text-[var(--color-neutral-500)]">
                                                    {{ $related->published_at->format('d M Y') }}
                                                </span>
                                            </div>
                                            <h3 class="text-lg font-bold text-[var(--color-neutral-dark)] mb-2 group-hover:text-[var(--color-primary-500)] transition-colors line-clamp-2">
                                                {{ $related->title }}
                                            </h3>
                                        </div>
                                        <div class="mt-4">
                                            <span class="font-semibold text-sm text-[var(--color-primary-500)]">Baca Selengkapnya</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-blog-layout>
