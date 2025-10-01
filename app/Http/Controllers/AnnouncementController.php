<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display halaman pengumuman & agenda
     */
    public function index(Request $request)
    {
        $type = $request->get('type', 'all');

        // Upcoming events
        $upcomingEvents = Announcement::active()
            ->published()
            ->upcoming()
            ->get();

        // Pengumuman & arsip
        $query = Announcement::active()->published();

        if ($type !== 'all') {
            $query->type($type);
        }

        $announcements = $query->latest('published_at')->paginate(10);

        return view('announcement.index', compact('upcomingEvents', 'announcements', 'type'));
    }

    /**
     * Display detail pengumuman
     */
    public function show($slug)
    {
        $announcement = Announcement::active()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        // Pengumuman terkait
        $relatedAnnouncements = Announcement::active()
            ->published()
            ->where('type', $announcement->type)
            ->where('id', '!=', $announcement->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('announcement.show', compact('announcement', 'relatedAnnouncements'));
    }
}
