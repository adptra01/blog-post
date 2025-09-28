@extends('layouts.blog')

@section('title', 'Tag: ' . $tag->name)
@section('description', 'Artikel dengan tag ' . $tag->name . ' - ' . $settings->description)
@section('keywords', $tag->name . ', teknologi, programming, development')

@section('content')
    <!-- Tag Header -->
    <div class="bg-gradient-to-r from-green-600 to-teal-600 dark:from-green-800 dark:to-teal-800">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-white sm:text-5xl md:text-6xl">
                    Tag: {{ $tag->name }}
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base text-green-100 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Temukan semua artikel dengan tag {{ strtolower($tag->name) }}
                </p>
                <div class="mt-5 text-green-100">
                    <i class="fas fa-tag text-2xl mr-2"></i>
                    <span class="text-lg">{{ $tag->posts()->count() }} artikel</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Posts Grid -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    @if($posts->count() > 0)
                        <div class="grid gap-8 md:grid-cols-2">
                            @foreach($posts as $post)
                                <article class="bg-white dark:bg-gray-700 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                    <div class="relative">
                                        @if($post->cover_photo_path)
                                            <img class="h-48 w-full object-cover" src="{{ $post->cover_photo_path }}" alt="{{ $post->photo_alt_text }}">
                                        @else
                                            <div class="h-48 w-full bg-gradient-to-br from-green-400 to-blue-500 flex items-center justify-center">
                                                <i class="fas fa-newspaper text-white text-4xl"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-6">
                                        <div class="flex items-center space-x-2 mb-2">
                                            @foreach($post->categories->take(2) as $category)
                                                <a href="{{ route('blog.category', $category) }}" class="text-xs text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">
                                                    {{ $category->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                            <a href="{{ route('blog.show', $post) }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                                {{ $post->title }}
                                            </a>
                                        </h3>
                                        @if($post->sub_title)
                                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3">{{ $post->sub_title }}</p>
                                        @endif
                                        <p class="text-gray-500 dark:text-gray-400 text-sm line-clamp-2">
                                            {!! Str::limit(strip_tags($post->body), 100) !!}
                                        </p>
                                        <div class="mt-4 flex items-center justify-between">
                                            <div class="flex items-center space-x-2">
                                                <img class="h-6 w-6 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&color=7F9CF5&background=EBF4FF" alt="{{ $post->user->name }}">
                                                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $post->user->name }}</span>
                                            </div>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $post->published_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        @if($posts->hasPages())
                            <div class="mt-12">
                                {{ $posts->links() }}
                            </div>
                        @endif
                    @else
                        <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg p-12 text-center">
                            <i class="fas fa-tag text-gray-300 dark:text-gray-600 text-6xl mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Belum ada artikel</h3>
                            <p class="text-gray-500 dark:text-gray-400">Artikel dengan tag ini akan segera ditambahkan.</p>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Tag Info -->
                    <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg p-6 mb-8">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Tentang Tag</h3>
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-tag text-green-600 dark:text-green-400 text-xl"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $tag->name }}</h4>
                            <p class="text-gray-500 dark:text-gray-400 text-sm mt-2">{{ $tag->posts()->count() }} artikel</p>
                        </div>
                    </div>

                    <!-- Related Tags -->
                    <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg p-6 mb-8">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">Tag Terkait</h3>
                        <div class="flex flex-wrap gap-2">
                            @php
                                $relatedTags = \App\Models\Tag::withCount('posts')
                                    ->orderBy('posts_count', 'desc')
                                    ->where('id', '!=', $tag->id)
                                    ->limit(12)
                                    ->get();
                            @endphp
                            @foreach($relatedTags as $relatedTag)
                                <a href="{{ route('blog.tag', $relatedTag) }}" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                    {{ $relatedTag->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Popular Posts -->
                    <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">Artikel Populer</h3>
                        @php
                            $popularPosts = \App\Models\Post::with(['categories', 'user'])
                                ->published()
                                ->withCount('comments')
                                ->orderBy('comments_count', 'desc')
                                ->limit(5)
                                ->get();
                        @endphp
                        <div class="space-y-4">
                            @foreach($popularPosts as $index => $post)
                                <div class="flex space-x-4">
                                    <div class="flex-shrink-0">
                                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-green-600 text-white text-xs font-medium">
                                            {{ $index + 1 }}
                                        </span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-medium text-gray-900 dark:text-white">
                                            <a href="{{ route('blog.show', $post) }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                                                {{ Str::limit($post->title, 40) }}
                                            </a>
                                        </h4>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $post->published_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush
