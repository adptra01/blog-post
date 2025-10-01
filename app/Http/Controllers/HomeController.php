<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Gallery;
use App\Models\VillageProfile;
use Firefly\FilamentBlog\Models\Category;
use Firefly\FilamentBlog\Models\Post;

class HomeController extends Controller
{
    /**
     * Display homepage dengan berbagai section
     */
    public function index()
    {
        // Berita unggulan (featured post)
        $featuredPost = Post::published()
            ->where('is_featured', true)
            ->latest('published_at')
            ->first();

        // Berita terbaru (grid)
        $latestPosts = Post::published()
            ->where('id', '!=', $featuredPost?->id ?? 0)
            ->latest('published_at')
            ->take(6)
            ->get();

        // Kategori untuk sekilas
        $categories = Category::whereHas('posts')
            ->withCount('posts')
            ->take(5)
            ->get();

        // Potensi desa (galeri produk unggulan)
        $potentials = Gallery::active()
            ->featured()
            ->where('category', 'produk_lokal')
            ->ordered()
            ->take(4)
            ->get();

        // Pengumuman & Agenda upcoming
        $upcomingEvents = Announcement::active()
            ->published()
            ->upcoming()
            ->take(3)
            ->get();

        // Pengumuman terbaru
        $recentAnnouncements = Announcement::active()
            ->published()
            ->where('type', 'announcement')
            ->latest('published_at')
            ->take(3)
            ->get();

        // Galeri preview (foto/video)
        $galleryPreview = Gallery::active()
            ->ordered()
            ->take(8)
            ->get();

        // Profil singkat (visi misi)
        $visionMission = VillageProfile::active()
            ->section('vision_mission')
            ->first();

        // Statistik desa
        $statistics = VillageProfile::active()
            ->section('statistics')
            ->first();

        return view('home', compact(
            'featuredPost',
            'latestPosts',
            'categories',
            'potentials',
            'upcomingEvents',
            'recentAnnouncements',
            'galleryPreview',
            'visionMission',
            'statistics'
        ));
    }
}
