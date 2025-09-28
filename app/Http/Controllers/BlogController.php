<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display the blog home page.
     */
    public function index(): View
    {
        $settings = Setting::first();
        $categories = Category::withCount('posts')->get();
        $featuredPosts = Post::with(['categories', 'user'])
            ->published()
            ->latest('published_at')
            ->limit(1)
            ->get();

        $recentPosts = Post::with(['categories', 'user'])
            ->published()
            ->latest('published_at')
            ->skip(1) // Skip the featured post
            ->limit(3)
            ->get();

        $popularPosts = Post::with(['categories', 'user'])
            ->published()
            ->withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->limit(5)
            ->get();

        return view('blog.index', compact(
            'settings',
            'categories',
            'featuredPosts',
            'recentPosts',
            'popularPosts'
        ));
    }

    /**
     * Display a specific post.
     */
    public function show(string $slug): View
    {
        $post = Post::where('slug', $slug)->orWhere('id', $slug)->first();

        if (! $post || $post->status !== 'published') {
            abort(404);
        }

        $post->load(['categories', 'tags', 'user', 'seoDetails', 'comments.user']);
        $settings = Setting::first();

        // Get related posts from the same categories
        $relatedPosts = Post::with(['categories', 'user'])
            ->published()
            ->whereHas('categories', function ($query) use ($post) {
                $query->whereIn('id', $post->categories->pluck('id'));
            })
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->limit(3)
            ->get();

        // Get share snippets
        $shareSnippets = \App\Models\ShareSnippet::active()->get();

        return view('blog.show', compact(
            'post',
            'settings',
            'relatedPosts',
            'shareSnippets'
        ));
    }

    /**
     * Display posts by category.
     */
    public function category(string $slug): View
    {
        $category = Category::where('slug', $slug)->first();

        if (! $category) {
            abort(404);
        }

        $settings = Setting::first();

        $posts = Post::with(['categories', 'user'])
            ->published()
            ->whereHas('categories', function ($query) use ($category) {
                $query->where('id', $category->id);
            })
            ->latest('published_at')
            ->paginate(12);

        return view('blog.category', compact(
            'category',
            'settings',
            'posts'
        ));
    }

    /**
     * Display posts by tag.
     */
    public function tag(string $slug): View
    {
        $tag = Tag::where('slug', $slug)->first();

        if (! $tag) {
            abort(404);
        }

        $settings = Setting::first();

        $posts = Post::with(['categories', 'user'])
            ->published()
            ->whereHas('tags', function ($query) use ($tag) {
                $query->where('id', $tag->id);
            })
            ->latest('published_at')
            ->paginate(12);

        return view('blog.tag', compact(
            'tag',
            'settings',
            'posts'
        ));
    }

    /**
     * Search posts.
     */
    public function search(Request $request): View
    {
        $query = $request->get('q');
        $settings = Setting::first();

        $posts = Post::with(['categories', 'user'])
            ->published()
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                    ->orWhere('body', 'like', "%{$query}%")
                    ->orWhere('sub_title', 'like', "%{$query}%");
            })
            ->latest('published_at')
            ->paginate(12);

        return view('blog.search', compact(
            'settings',
            'posts',
            'query'
        ));
    }

    /**
     * Store a newly created comment in storage.
     */
    public function comment(Request $request, string $slug)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $post = Post::where('slug', $slug)->firstOrFail();

        $comment = new \App\Models\Comment([
            'user_id' => auth()->id(), // or null if guest comments are allowed
            'post_id' => $post->id,
            'comment' => $request->input('comment'),
            'approved' => false, // or true if comments are auto-approved
        ]);

        $comment->save();

        return back()->with('success', 'Komentar Anda telah dikirim dan sedang menunggu persetujuan.');
    }
}
