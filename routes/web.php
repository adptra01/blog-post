<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\VillageController;
use Illuminate\Support\Facades\Route;

// Public Blog Routes
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/artikel/{slug}', [BlogController::class, 'show'])->name('show');
    Route::get('/kategori/{slug}', [BlogController::class, 'category'])->name('category');
    Route::get('/tag/{slug}', [BlogController::class, 'tag'])->name('tag');
    Route::get('/cari', [BlogController::class, 'search'])->name('search');
    Route::post('/artikel/{slug}/comment', [BlogController::class, 'comment'])->name('comment');
});

// Village pages
Route::prefix('desa')->name('village.')->group(function () {
    Route::get('/profil', [VillageController::class, 'profile'])->name('profile');
    Route::get('/potensi', [VillageController::class, 'potential'])->name('potential');
    Route::get('/kontak', [VillageController::class, 'contact'])->name('contact');
    Route::get('/galeri', [VillageController::class, 'gallery'])->name('gallery');
    Route::get('/pengumuman', [VillageController::class, 'announcements'])->name('announcements');
    Route::get('/dokumen', [VillageController::class, 'documents'])->name('documents');
});

// Newsletter subscription
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Legacy route (if you want to keep the old welcome page)
Route::get('/', function () {
    return redirect()->route('blog.index');
});
