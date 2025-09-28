@props([
    'post',
    'isLarge' => false,
    'showExcerpt' => true,
    'showCategory' => true
])

@php
    $cardClasses = $isLarge
        ? 'col-span-full lg:col-span-2'
        : 'col-span-1';
@endphp

<article class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden card-hover animate-scale-in">
    <!-- Featured Image -->
    <div class="relative {{ $isLarge ? 'h-96' : 'h-48' }}">
        @if($post->cover_photo_path)
            <img class="w-full h-full object-cover" src="{{ $post->cover_photo_path }}" alt="{{ $post->photo_alt_text }}">
        @else
            <div class="w-full h-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
                <i class="fas fa-newspaper text-white {{ $isLarge ? 'text-6xl' : 'text-4xl' }}"></i>
            </div>
        @endif

        <!-- Badge -->
        @if($isLarge)
            <div class="absolute top-4 left-4">
                <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">
                    <i class="fas fa-star mr-1"></i>Berita Unggulan
                </span>
            </div>
        @endif

        <!-- Category Badge -->
        @if($showCategory && $post->categories->count() > 0)
            <div class="absolute top-4 right-4">
                <span class="bg-white/90 dark:bg-gray-800/90 text-gray-800 dark:text-white px-3 py-1 rounded-full text-sm font-medium">
                    {{ $post->categories->first()->name }}
                </span>
            </div>
        @endif
    </div>

    <!-- Content -->
    <div class="p-6">
        <!-- Title -->
        <h3 class="text-xl lg:text-2xl font-bold text-gray-900 dark:text-white mb-3 leading-tight hover:text-primary transition-colors">
            <a href="{{ route('blog.show', $post->slug) }}">
                {{ $post->title }}
            </a>
        </h3>

        <!-- Subtitle -->
        @if($post->sub_title)
            <p class="text-gray-600 dark:text-gray-300 mb-4 text-lg">
                {{ $post->sub_title }}
            </p>
        @endif

        <!-- Excerpt -->
        @if($showExcerpt)
            <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">
                {!! Str::limit(strip_tags($post->body), $isLarge ? 200 : 120) !!}
            </p>
        @endif

        <!-- Meta Information -->
        <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <img class="h-6 w-6 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&color=7F9CF5&background=EBF4FF" alt="{{ $post->user->name }}">
                    <span>{{ $post->user->name }}</span>
                </div>
                <span>•</span>
                <time datetime="{{ $post->published_at->toISOString() }}">
                    {{ $post->published_at->format('d M Y') }}
                </time>
            </div>

            <!-- Read More -->
            <a href="{{ route('blog.show', $post->slug) }}" class="text-primary hover:text-primary-600 font-medium transition-colors">
                Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
</article>
