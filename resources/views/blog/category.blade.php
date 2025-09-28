@extends('layouts.blog')

@section('title', 'Kategori: ' . $category->name)
@section('description', 'Artikel dalam kategori ' . $category->name . ' - ' . ($settings->description ?? ''))

@section('content')
    <!-- Category Header -->
    <section class="bg-neutral-dark text-white">
        <div class="container mx-auto px-4 py-12 text-center">
            <h1 class="text-4xl font-bold">Kategori: {{ $category->name }}</h1>
            <p class="text-lg mt-2">{{ $category->posts_count }} artikel ditemukan</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Posts -->
            <main class="lg:col-span-2">
                @if($posts->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach($posts as $post)
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                                <a href="{{ route('blog.show', $post) }}">
                                    <img src="{{ $post->cover_photo_path ?? 'https://source.unsplash.com/random/400x300?news,' . $post->id }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                                </a>
                                <div class="p-6">
                                    <span class="text-sm text-gray-500">{{ $post->published_at->format('d M Y') }}</span>
                                    <h3 class="text-xl font-bold text-neutral-dark dark:text-white mt-2 mb-4">
                                        <a href="{{ route('blog.show', $post) }}" class="hover:text-primary">{{ $post->title }}</a>
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-400 mb-4">{!! Str::limit(strip_tags($post->body), 100) !!}</p>
                                    <a href="{{ route('blog.show', $post) }}" class="font-semibold text-primary hover:underline">Baca Selengkapnya &rarr;</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-8">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="text-center py-16">
                        <p class="text-xl">Tidak ada artikel dalam kategori ini.</p>
                    </div>
                @endif
            </main>

            <!-- Sidebar -->
            <aside>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold text-neutral-dark dark:text-white mb-4">Kategori Lainnya</h3>
                    <ul class="space-y-2">
                        @foreach($categories->where('id', '!=', $category->id) as $otherCategory)
                            <li>
                                <a href="{{ route('blog.category', $otherCategory) }}" class="text-neutral-dark dark:text-white hover:text-primary flex justify-between">
                                    <span>{{ $otherCategory->name }}</span>
                                    <span>{{ $otherCategory->posts_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
@endsection