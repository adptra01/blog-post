<x-blog-layout>
    <!-- Hero Section -->
    <section class="relative h-[400px] overflow-hidden bg-gradient-to-br from-[var(--color-accent-500)] to-[var(--color-primary-500)]">
        <div class="absolute inset-0 opacity-20">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <pattern id="pattern-announcement" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="1" fill="white"/>
                </pattern>
                <rect x="0" y="0" width="100%" height="100%" fill="url(#pattern-announcement)"/>
            </svg>
        </div>

        <div class="relative container mx-auto px-4 h-full flex items-center">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-slide-up">Pengumuman & Agenda</h1>
                <p class="text-lg text-white/90 animate-fade-in">Informasi penting dan agenda kegiatan Desa Tangkit</p>
            </div>
        </div>
    </section>

    <!-- Filter Tabs -->
    <section class="py-8 bg-white border-b border-[var(--color-neutral-200)]">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap gap-3 justify-center">
                <a href="{{ route('announcement.index') }}"
                   class="px-6 py-2.5 rounded-full font-semibold transition-all {{ $type === 'all' ? 'bg-[var(--color-primary-500)] text-white shadow-lg' : 'bg-[var(--color-neutral-100)] text-[var(--color-neutral-700)] hover:bg-[var(--color-neutral-200)]' }}">
                    Semua
                </a>
                <a href="{{ route('announcement.index', ['type' => 'announcement']) }}"
                   class="px-6 py-2.5 rounded-full font-semibold transition-all {{ $type === 'announcement' ? 'bg-[var(--color-primary-500)] text-white shadow-lg' : 'bg-[var(--color-neutral-100)] text-[var(--color-neutral-700)] hover:bg-[var(--color-neutral-200)]' }}">
                    Pengumuman
                </a>
                <a href="{{ route('announcement.index', ['type' => 'event']) }}"
                   class="px-6 py-2.5 rounded-full font-semibold transition-all {{ $type === 'event' ? 'bg-[var(--color-primary-500)] text-white shadow-lg' : 'bg-[var(--color-neutral-100)] text-[var(--color-neutral-700)] hover:bg-[var(--color-neutral-200)]' }}">
                    Event & Agenda
                </a>
            </div>
        </div>
    </section>

    <div class="py-16 bg-[var(--color-neutral-50)]">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <!-- Upcoming Events Section -->
                @if($upcomingEvents->isNotEmpty())
                <div class="mb-16">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-12 h-12 bg-gradient-to-br from-[var(--color-primary-500)] to-[var(--color-accent-500)] rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-[var(--color-neutral-dark)]">Agenda Mendatang</h2>
                            <p class="text-[var(--color-neutral-600)]">Event dan kegiatan yang akan datang</p>
                        </div>
                    </div>

                    <div class="grid gap-6">
                        @foreach($upcomingEvents as $event)
                        <a href="{{ route('announcement.show', $event->slug) }}"
                           class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300">
                            <div class="flex flex-col md:flex-row">
                                <!-- Date Badge -->
                                <div class="flex-shrink-0 bg-gradient-to-br from-[var(--color-primary-500)] to-[var(--color-accent-500)] p-8 text-white text-center md:w-32 flex flex-col items-center justify-center">
                                    <div class="text-4xl font-bold">{{ $event->event_date->format('d') }}</div>
                                    <div class="text-lg uppercase tracking-wide">{{ $event->event_date->format('M') }}</div>
                                    <div class="text-sm opacity-90">{{ $event->event_date->format('Y') }}</div>
                                </div>

                                <!-- Content -->
                                <div class="flex-1 p-6">
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <span class="px-3 py-1 bg-[var(--color-primary-100)] text-[var(--color-primary-600)] text-xs font-semibold rounded-full">
                                            {{ ucfirst($event->type) }}
                                        </span>
                                        @if($event->is_featured)
                                        <span class="px-3 py-1 bg-[var(--color-accent-100)] text-[var(--color-accent-600)] text-xs font-semibold rounded-full">
                                            Penting
                                        </span>
                                        @endif
                                    </div>

                                    <h3 class="text-xl font-bold text-[var(--color-neutral-dark)] mb-2 group-hover:text-[var(--color-primary-500)] transition-colors">
                                        {{ $event->title }}
                                    </h3>

                                    <p class="text-[var(--color-neutral-600)] mb-4 line-clamp-2">
                                        {{ Str::limit(strip_tags($event->content), 150) }}
                                    </p>

                                    <div class="flex flex-wrap gap-4 text-sm text-[var(--color-neutral-500)]">
                                        @if($event->location)
                                        <span class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            {{ $event->location }}
                                        </span>
                                        @endif
                                        <span class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $event->event_date->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Image (if exists) -->
                                @if($event->image)
                                <div class="md:w-64 h-48 md:h-auto overflow-hidden">
                                    <img src="{{ Storage::url($event->image) }}"
                                         alt="{{ $event->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                </div>
                                @endif
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- All Announcements Section -->
                <div>
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-12 h-12 bg-gradient-to-br from-[var(--color-secondary-500)] to-[var(--color-primary-500)] rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-[var(--color-neutral-dark)]">
                                @if($type === 'event')
                                    Semua Event & Agenda
                                @elseif($type === 'announcement')
                                    Semua Pengumuman
                                @else
                                    Pengumuman & Arsip
                                @endif
                            </h2>
                        </div>
                    </div>

                    @if($announcements->isNotEmpty())
                    <div class="grid gap-6">
                        @foreach($announcements as $announcement)
                        <a href="{{ route('announcement.show', $announcement->slug) }}"
                           class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300">
                            <div class="flex gap-4">
                                <!-- Icon -->
                                <div class="flex-shrink-0 w-12 h-12 bg-[var(--color-primary-100)] rounded-lg flex items-center justify-center group-hover:bg-[var(--color-primary-500)] transition-colors">
                                    @if($announcement->type === 'event')
                                    <svg class="w-6 h-6 text-[var(--color-primary-500)] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    @else
                                    <svg class="w-6 h-6 text-[var(--color-primary-500)] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                    </svg>
                                    @endif
                                </div>

                                <!-- Content -->
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-2">
                                        <span class="px-2 py-1 bg-[var(--color-neutral-100)] text-[var(--color-neutral-600)] text-xs font-medium rounded">
                                            {{ $announcement->type === 'event' ? 'Event' : 'Pengumuman' }}
                                        </span>
                                        @if($announcement->is_featured)
                                        <span class="px-2 py-1 bg-[var(--color-primary-500)] text-white text-xs font-semibold rounded">
                                            Penting
                                        </span>
                                        @endif
                                        <span class="text-xs text-[var(--color-neutral-500)]">
                                            {{ $announcement->published_at->format('d M Y') }}
                                        </span>
                                    </div>

                                    <h3 class="text-lg font-bold text-[var(--color-neutral-dark)] mb-2 group-hover:text-[var(--color-primary-500)] transition-colors line-clamp-2">
                                        {{ $announcement->title }}
                                    </h3>

                                    <p class="text-sm text-[var(--color-neutral-600)] line-clamp-2">
                                        {{ Str::limit(strip_tags($announcement->content), 120) }}
                                    </p>
                                </div>

                                <!-- Arrow -->
                                <div class="flex-shrink-0 self-center">
                                    <svg class="w-6 h-6 text-[var(--color-neutral-400)] group-hover:text-[var(--color-primary-500)] group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $announcements->links() }}
                    </div>
                    @else
                    <!-- Empty State -->
                    <div class="text-center py-16 bg-white rounded-xl">
                        <svg class="w-24 h-24 mx-auto text-[var(--color-neutral-300)] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-[var(--color-neutral-600)] mb-2">Belum Ada Pengumuman</h3>
                        <p class="text-[var(--color-neutral-500)]">Saat ini belum ada pengumuman untuk ditampilkan</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-blog-layout>
