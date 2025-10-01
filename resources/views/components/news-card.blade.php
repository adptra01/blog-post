@props([
    'post',
    'featured' => false,
])

@php
    $cardClass = $featured
        ? 'group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 h-[400px] md:h-[500px]'
        : 'group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300';
@endphp

<article class="{{ $cardClass }}">
    @if($featured)
        <!-- Featured Card Layout -->
        <a href="{{ route('filamentblog.post.show', ['post' => $post->slug]) }}" class="block h-full">
            <!-- Image -->
            <div class="absolute inset-0">
                <img src="{{ $post->featurePhoto }}"
                     alt="{{ $post->title }}"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
            </div>

            <!-- Content -->
            <div class="relative h-full flex flex-col justify-end p-6 md:p-8">
                <!-- Badge -->
                @if($post->is_featured)
                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-[var(--color-primary-500)] text-white text-xs font-semibold rounded-full mb-4 w-fit">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        Unggulan
                    </span>
                @endif

                <!-- Category -->
                @if($post->categories->isNotEmpty())
                    <a href="{{ route('filamentblog.category.post', ['category' => $post->categories->first()->slug]) }}"
                       class="inline-flex items-center gap-1 text-[var(--color-secondary-300)] hover:text-white text-sm font-medium mb-3 w-fit">
                        {{ $post->categories->first()->name }}
                    </a>
                @endif

                <!-- Title -->
                <h3 class="text-2xl md:text-3xl font-bold text-white mb-3 line-clamp-2 group-hover:text-[var(--color-primary-300)] transition-colors">
                    {{ $post->title }}
                </h3>

                <!-- Excerpt -->
                <p class="text-white/90 text-sm md:text-base mb-4 line-clamp-2">
                    {{ $post->excerpt }}
                </p>

                <!-- Meta -->
                <div class="flex items-center gap-4 text-white/80 text-sm">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $post->published_at->format('d M Y') }}
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        {{ number_format($post->views ?? 0) }}
                    </span>
                </div>
            </div>
        </a>
    @else
        <!-- Regular Card Layout -->
        <a href="{{ route('filamentblog.post.show', ['post' => $post->slug]) }}" class="block">
            <!-- Image -->
            <div class="relative h-48 overflow-hidden">
                <img src="{{ $post->featurePhoto }}"
                     alt="{{ $post->title }}"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">

                <!-- Badge -->
                @if($post->is_featured)
                    <span class="absolute top-3 right-3 px-2 py-1 bg-[var(--color-primary-500)] text-white text-xs font-semibold rounded-full">
                        Unggulan
                    </span>
                @endif
            </div>

            <!-- Content -->
            <div class="p-5">
                <!-- Category -->
                @if($post->categories->isNotEmpty())
                    <a href="{{ route('filamentblog.category.post', ['category' => $post->categories->first()->slug]) }}"
                       class="inline-block text-[var(--color-primary-500)] hover:text-[var(--color-primary-600)] text-xs font-semibold uppercase tracking-wide mb-2">
                        {{ $post->categories->first()->name }}
                    </a>
                @endif

                <!-- Title -->
                <h3 class="text-lg font-bold text-[var(--color-neutral-dark)] mb-2 line-clamp-2 group-hover:text-[var(--color-primary-500)] transition-colors">
                    {{ $post->title }}
                </h3>

                <!-- Excerpt -->
                <p class="text-[var(--color-neutral-600)] text-sm mb-4 line-clamp-2">
                    {{ $post->excerpt }}
                </p>

                <!-- Meta -->
                <div class="flex items-center gap-4 text-[var(--color-neutral-500)] text-xs">
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $post->published_at->format('d M Y') }}
                    </span>
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        {{ number_format($post->views ?? 0) }}
                    </span>
                </div>
            </div>
        </a>
    @endif
</article>
