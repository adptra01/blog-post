@props([
    'title' => 'Berita & Informasi Resmi Desa Tangkit',
    'subtitle' => 'Suara Warga, Kabar Terbaru',
    'backgroundImage' => null,
    'primaryButton' => ['text' => 'Berita Terbaru', 'url' => route('blog.index')],
    'secondaryButton' => ['text' => 'Pengumuman Penting', 'url' => route('village.announcements')]
])

<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0">
        @if($backgroundImage)
            <img src="{{ $backgroundImage }}" alt="Background" class="w-full h-full object-cover">
        @else
            <div class="w-full h-full bg-gradient-to-br from-primary via-secondary to-accent"></div>
        @endif
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="absolute inset-0 hero-gradient opacity-80"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto animate-fade-in">
        <h1 class="text-4xl sm:text-5xl lg:text-7xl font-bold text-white mb-6 leading-tight">
            {{ $title }}
        </h1>

        @if($subtitle)
            <p class="text-xl sm:text-2xl lg:text-3xl text-white/90 mb-12 font-light leading-relaxed">
                {{ $subtitle }}
            </p>
        @endif

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ $primaryButton['url'] }}" class="btn-primary text-lg px-8 py-4 min-w-[200px] text-center">
                {{ $primaryButton['text'] }}
            </a>
            <a href="{{ $secondaryButton['url'] }}" class="btn-secondary text-lg px-8 py-4 min-w-[200px] text-center">
                {{ $secondaryButton['text'] }}
            </a>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>
