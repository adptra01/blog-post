@extends('layouts.blog')

@section('title', $post->title)
@section('description', Str::limit(strip_tags($post->body), 160))
@section('keywords', isset($post->seoDetails->keywords) ? implode(', ', $post->seoDetails->keywords) : 'desa, tangkit, berita, informasi')
@section('og_image', $post->cover_photo_path ?? asset('images/og-default.png'))

@section('content')
    <div class="bg-neutral-light dark:bg-neutral-dark">
        <div class="container mx-auto px-4 py-8">
            <!-- Breadcrumb -->
            <nav class="mb-8 text-sm text-gray-500">
                <a href="{{ route('blog.index') }}" class="hover:text-primary">Beranda</a>
                <span class="mx-2">/</span>
                @if($post->categories->isNotEmpty())
                    <a href="{{ route('blog.category', $post->categories->first()) }}" class="hover:text-primary">{{ $post->categories->first()->name }}</a>
                    <span class="mx-2">/</span>
                @endif
                <span class="text-neutral-dark dark:text-neutral-light">{{ Str::limit($post->title, 50) }}</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <main class="lg:col-span-2">
                    <!-- Article Header -->
                    <header class="mb-8">
                        <h1 class="text-4xl font-bold text-neutral-dark dark:text-neutral-light mb-4">{{ $post->title }}</h1>
                        <div class="flex items-center text-sm text-gray-500">
                            <span>{{ $post->user->name }}</span>
                            <span class="mx-2">&bull;</span>
                            <time>{{ $post->published_at->format('d M Y') }}</time>
                        </div>
                    </header>

                    <!-- Featured Image -->
                    @if($post->cover_photo_path)
                        <img src="{{ $post->cover_photo_path }}" alt="{{ $post->photo_alt_text }}" class="w-full rounded-lg shadow-md mb-8">
                    @endif

                    <!-- Article Body -->
                    <div class="prose max-w-none">
                        {!! $post->body !!}
                    </div>

                    <!-- Tags -->
                    @if($post->tags->isNotEmpty())
                        <div class="mt-8">
                            @foreach($post->tags as $tag)
                                <a href="{{ route('blog.tag', $tag) }}" class="inline-block bg-secondary text-white px-3 py-1 rounded-full text-sm mr-2 mb-2">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    @endif

                    <!-- Comments Section -->
                    <section class="mt-12">
                        <h2 class="text-2xl font-bold text-neutral-dark dark:text-neutral-light mb-6">Komentar</h2>
                        @auth
                            <form action="{{ route('blog.comment', $post->slug) }}" method="POST" class="mb-8">
                                @csrf
                                <textarea name="comment" rows="4" class="w-full p-4 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary" placeholder="Tulis komentar Anda..."></textarea>
                                <button type="submit" class="mt-4 bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-opacity-80 transition-colors">Kirim Komentar</button>
                            </form>
                        @else
                            <p class="mb-8">Silakan <a href="{{ route('login') }}" class="text-primary hover:underline">masuk</a> untuk memberikan komentar.</p>
                        @endauth

                        <div class="space-y-6">
                            @forelse($post->comments->where('approved', true) as $comment)
                                <div class="flex space-x-4">
                                    <div class="flex-shrink-0">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}&background=random" alt="{{ $comment->user->name }}" class="w-12 h-12 rounded-full">
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-neutral-dark dark:text-neutral-light">{{ $comment->user->name }}</h4>
                                        <p class="text-sm text-gray-500 mb-2">{{ $comment->created_at->diffForHumans() }}</p>
                                        <p class="text-neutral-dark dark:text-neutral-light">{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            @empty
                                <p>Belum ada komentar.</p>
                            @endforelse
                        </div>
                    </section>
                </main>

                <!-- Sidebar -->
                <aside>
                    <!-- Related Posts -->
                    @if($relatedPosts->isNotEmpty())
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-bold text-neutral-dark dark:text-neutral-light mb-4">Artikel Terkait</h3>
                            <div class="space-y-4">
                                @foreach($relatedPosts as $relatedPost)
                                    <div>
                                        <a href="{{ route('blog.show', $relatedPost) }}" class="font-semibold text-neutral-dark dark:text-neutral-light hover:text-primary">{{ $relatedPost->title }}</a>
                                        <p class="text-sm text-gray-500">{{ $relatedPost->published_at->format('d M Y') }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </div>
@endsection