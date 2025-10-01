<x-blog-layout>
    @php
        $title = 'Profil Desa Tangkit';
        $description =
            'Mengenal lebih dekat Desa Tangkit, sejarah, visi misi, struktur perangkat, dan data statistik desa';
    @endphp

    <!-- Hero Section -->
    <section
        class="relative h-[400px] overflow-hidden bg-gradient-to-br from-[var(--color-primary-500)] to-[var(--color-accent-500)]">
        <div class="absolute inset-0 opacity-20">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <pattern id="pattern-profile" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="1" fill="white" />
                </pattern>
                <rect x="0" y="0" width="100%" height="100%" fill="url(#pattern-profile)" />
            </svg>
        </div>

        <div class="relative container mx-auto px-4 h-full flex items-center">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Profil Desa Tangkit</h1>
                <p class="text-lg text-white/90">Mengenal lebih dekat tentang Desa Tangkit</p>
            </div>
        </div>
    </section>

    <!-- Intro/Header -->
    @if ($intro)
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <div class="prose prose-lg max-w-none">
                        <h2 class="text-3xl font-bold text-[var(--color-neutral-dark)] mb-6">{{ $intro->title }}</h2>
                        @if ($intro->image)
                            <img src="{{ Storage::url($intro->image) }}" alt="{{ $intro->title }}"
                                class="w-full rounded-xl shadow-lg mb-8">
                        @endif
                        <div class="text-[var(--color-neutral-700)] leading-relaxed">
                            {!! $intro->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Sejarah -->
    @if ($history)
        <section class="py-16 bg-[var(--color-neutral-50)]">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <h2 class="text-3xl font-bold text-[var(--color-neutral-dark)] mb-8">{{ $history->title }}</h2>
                    <div class="grid md:grid-cols-2 gap-8 items-center">
                        @if ($history->image)
                            <div class="order-2 md:order-1">
                                <img src="{{ Storage::url($history->image) }}" alt="{{ $history->title }}"
                                    class="w-full rounded-xl shadow-lg">
                            </div>
                        @endif
                        <div class="order-1 md:order-2">
                            <div class="prose max-w-none text-[var(--color-neutral-700)]">
                                {!! $history->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Visi & Misi -->
    @if ($visionMission)
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <h2 class="text-3xl font-bold text-[var(--color-neutral-dark)] mb-8 text-center">
                        {{ $visionMission->title }}</h2>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div
                            class="p-8 bg-gradient-to-br from-[var(--color-primary-50)] to-white rounded-2xl border border-[var(--color-primary-200)] shadow-md">
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-[var(--color-primary-500)] to-[var(--color-accent-500)] rounded-xl flex items-center justify-center mb-6">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </div>
                            <div class="prose max-w-none">
                                {!! $visionMission->content !!}
                            </div>
                        </div>

                        <div
                            class="p-8 bg-gradient-to-br from-[var(--color-secondary-50)] to-white rounded-2xl border border-[var(--color-secondary-200)] shadow-md">
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-[var(--color-secondary-500)] to-[var(--color-primary-500)] rounded-xl flex items-center justify-center mb-6">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                    </path>
                                </svg>
                            </div>
                            <div class="prose max-w-none">
                                {!! $visionMission->data['misi'] ?? '' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Struktur Perangkat -->
    @if ($structure && $structure->data)
        <section class="py-16 bg-[var(--color-neutral-50)]">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <h2 class="text-3xl font-bold text-[var(--color-neutral-dark)] mb-12 text-center">
                        {{ $structure->title }}</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($structure->data as $person)
                            <div
                                class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all group">
                                <div
                                    class="aspect-square bg-gradient-to-br from-[var(--color-neutral-200)] to-[var(--color-neutral-100)] flex items-center justify-center">
                                    @if (isset($person['photo']))
                                        <img src="{{ Storage::url($person['photo']) }}" alt="{{ $person['name'] }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <svg class="w-24 h-24 text-[var(--color-neutral-400)]" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                    @endif
                                </div>
                                <div class="p-4 text-center">
                                    <h3 class="font-bold text-[var(--color-neutral-dark)] mb-1">{{ $person['name'] }}
                                    </h3>
                                    <p class="text-sm text-[var(--color-primary-500)] font-medium">
                                        {{ $person['position'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Data Statistik -->
    @if ($statistics && $statistics->data)
        <section
            class="py-16 bg-gradient-to-br from-[var(--color-neutral-dark)] to-[var(--color-accent-900)] text-white">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <h2 class="text-3xl font-bold mb-12 text-center">{{ $statistics->title }}</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($statistics->data as $key => $value)
                            <div class="p-6 bg-white/10 backdrop-blur-sm rounded-xl border border-white/20 text-center">
                                <div class="text-4xl font-bold text-[var(--color-primary-300)] mb-2">
                                    {{ is_numeric($value) ? number_format($value) : $value }}
                                </div>
                                <div class="text-sm text-white/80">
                                    {{ ucwords(str_replace('_', ' ', $key)) }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Map Location (Optional) -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-[var(--color-neutral-dark)] mb-8 text-center">Lokasi Desa</h2>
                <div class="aspect-video bg-[var(--color-neutral-200)] rounded-xl overflow-hidden shadow-lg">
                    <!-- Embed Google Maps di sini -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127643.94203928188!2d101.31598655820312!3d0.44799789999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a8f3b6e6c3a3%3A0x2b0b0b0b0b0b0b0b!2sPangkalan%20Kuras%2C%20Riau!5e0!3m2!1sen!2sid!4v1234567890"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="w-full h-full">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
</x-blog-layout>
