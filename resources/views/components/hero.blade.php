@props([
    'title' => 'Berita & Informasi Resmi Desa Tangkit',
    'subtitle' => 'Suara Warga, Kabar Terbaru',
    'image' => null,
    'buttons' => [],
    'overlay' => true,
    'height' => 'h-[500px]',
])

<section class="relative {{ $height }} overflow-hidden">
    <!-- Background Image -->
    @if($image)
        <img src="{{ $image }}" alt="{{ $title }}" class="absolute inset-0 w-full h-full object-cover">
    @else
        <div class="absolute inset-0 bg-gradient-to-br from-[var(--color-primary-500)] via-[var(--color-accent-500)] to-[var(--color-secondary-500)]"></div>
    @endif

    <!-- Overlay -->
    @if($overlay)
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-black/20"></div>
    @endif

    <!-- Pattern Overlay -->
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <pattern id="pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                <circle cx="20" cy="20" r="1" fill="white"/>
            </pattern>
            <rect x="0" y="0" width="100%" height="100%" fill="url(#pattern)"/>
        </svg>
    </div>

    <!-- Content -->
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="max-w-3xl animate-fade-in">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight">
                {{ $title }}
            </h1>

            @if($subtitle)
                <p class="text-lg md:text-xl text-white/90 mb-8">
                    {{ $subtitle }}
                </p>
            @endif

            @if(!empty($buttons))
                <div class="flex flex-wrap gap-4">
                    @foreach($buttons as $button)
                        <a href="{{ $button['url'] ?? '#' }}"
                           class="px-6 py-3 bg-{{ $button['style'] ?? 'white' }} text-{{ $button['textColor'] ?? '[var(--color-neutral-dark)]' }} font-semibold rounded-lg hover:scale-105 transition-transform shadow-lg">
                            {{ $button['text'] }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>
