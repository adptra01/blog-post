<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display halaman galeri
     */
    public function index(Request $request)
    {
        $category = $request->get('category');

        $query = Gallery::active()->ordered();

        // Filter by category jika ada
        if ($category) {
            $query->category($category);
        }

        $galleries = $query->paginate(12);

        // Kategori untuk filter tabs
        $categories = [
            'kegiatan' => 'Kegiatan',
            'alam' => 'Alam',
            'budaya' => 'Budaya',
            'produk_lokal' => 'Produk Lokal',
        ];

        return view('gallery.index', compact('galleries', 'categories', 'category'));
    }

    /**
     * Display detail galeri (untuk lightbox)
     */
    public function show($id)
    {
        $gallery = Gallery::active()->findOrFail($id);

        return response()->json($gallery);
    }
}
