@props([
    'post',
    'showExcerpt' => true,
    'showCategory' => true
])

<article class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden card-hover animate-scale-in">
    <!-- Featured Image -->
    <div class="relative h-48">
        @if($post->cover_photo_path)
            <img class="w-full h-full object-cover" src="{{ $post->cover_photo_path }}" alt="{{ $post->photo_alt_text }}">
        @else
            <div class="w-full h-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
                <i class="fas fa-newspaper text-white text-3xl"></i>
            </div>
        @endif

        <!-- Category Badge -->
        @if($showCategory && $post->categories->count() > 0)
            <div class="absolute top-3 left-3">
                <span class="bg-white/90 dark:bg-gray-800/90 text-gray-800 dark:text-white px-2 py-1 rounded-md text-xs font-medium">
                    {{ $post->categories->first()->name }}
                </span>
            </div>
        @endif
    </div>

    <!-- Content -->
    <div class="p-4">
        <!-- Title -->
        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 leading-tight hover:text-primary transition-colors line-clamp-2">
            <a href="{{ route('blog.show', $post->slug) }}">
                {{ $post->title }}
            </a>
        </h3>

        <!-- Excerpt -->
        @if($showExcerpt)
            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-2">
                {!! Str::limit(strip_tags($post->body), 100) !!}
            </p>
        @endif

        <!-- Meta Information -->
        <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
            <time datetime="{{ $post->published_at->toISOString() }}">
                {{ $post->published_at->format('d M Y') }}
            </time>
            <span class="flex items-center">
                <i class="fas fa-eye mr-1"></i>
                {{ rand(50, 500) }}
            </span>
        </div>
    </div>
</article>
