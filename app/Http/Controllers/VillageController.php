<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\View\View;

class VillageController extends Controller
{
    /**
     * Display village profile page.
     */
    public function profile(): View
    {
        $settings = Setting::first();
        $categories = Category::withCount('posts')->get();

        // Get some featured posts for the profile page
        $featuredPosts = Post::with(['categories', 'user'])
            ->published()
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('village.profile', compact(
            'settings',
            'categories',
            'featuredPosts'
        ));
    }

    /**
     * Display village potential/UMKM page.
     */
    public function potential(): View
    {
        $settings = Setting::first();
        $categories = Category::withCount('posts')->get();

        // Get posts related to UMKM and potential
        $umkmPosts = Post::with(['categories', 'user'])
            ->published()
            ->whereHas('categories', function ($query) {
                $query->whereIn('slug', ['umkm-produk-lokal', 'potensi-desa']);
            })
            ->latest('published_at')
            ->limit(6)
            ->get();

        return view('village.potential', compact(
            'settings',
            'categories',
            'umkmPosts'
        ));
    }

    /**
     * Display contact and services page.
     */
    public function contact(): View
    {
        $settings = Setting::first();
        $categories = Category::withCount('posts')->get();

        return view('village.contact', compact(
            'settings',
            'categories'
        ));
    }

    /**
     * Display photo gallery page.
     */
    public function gallery(): View
    {
        $settings = Setting::first();
        $categories = Category::withCount('posts')->get();

        // Get posts with images for gallery
        $galleryPosts = Post::with(['categories', 'user'])
            ->published()
            ->whereNotNull('cover_photo_path')
            ->latest('published_at')
            ->limit(12)
            ->get();

        return view('village.gallery', compact(
            'settings',
            'categories',
            'galleryPosts'
        ));
    }

    /**
     * Display announcements and agenda page.
     */
    public function announcements(): View
    {
        $settings = Setting::first();
        $categories = Category::withCount('posts')->get();

        // Get announcement posts
        $announcements = Post::with(['categories', 'user'])
            ->published()
            ->whereHas('categories', function ($query) {
                $query->whereIn('slug', ['pengumuman-resmi', 'agenda-event']);
            })
            ->latest('published_at')
            ->paginate(10);

        // Get upcoming scheduled posts
        $upcomingEvents = Post::with(['categories', 'user'])
            ->scheduled()
            ->whereHas('categories', function ($query) {
                $query->whereIn('slug', ['pengumuman-resmi', 'agenda-event', 'kegiatan-desa']);
            })
            ->orderBy('scheduled_for')
            ->limit(5)
            ->get();

        return view('village.announcements', compact(
            'settings',
            'categories',
            'announcements',
            'upcomingEvents'
        ));
    }

    /**
     * Display documents and regulations page.
     */
    public function documents(): View
    {
        $settings = Setting::first();
        $categories = Category::withCount('posts')->get();

        // This would typically show actual documents
        // For now, we'll show related posts
        $documentPosts = Post::with(['categories', 'user'])
            ->published()
            ->whereHas('categories', function ($query) {
                $query->whereIn('slug', ['pemerintah-desa', 'infrastruktur']);
            })
            ->latest('published_at')
            ->paginate(10);

        return view('village.documents', compact(
            'settings',
            'categories',
            'documentPosts'
        ));
    }
}
