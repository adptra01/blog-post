@props([
    'categories'
])

<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="container-custom">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                Kategori Berita
            </h2>
            <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Temukan berita dan informasi terkini dari berbagai aspek kehidupan Desa Tangkit
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($categories as $category)
                <a href="{{ route('blog.category', $category->slug) }}"
                   class="group bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl card-hover text-center transition-all duration-300">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/20 transition-colors">
                        <i class="fas fa-{{ $category->icon ?? 'folder' }} text-primary text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 dark:text-white mb-2 group-hover:text-primary transition-colors">
                        {{ $category->name }}
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $category->posts_count ?? 0 }} artikel
                    </p>
                </a>
            @endforeach
        </div>
    </div>
</section>
