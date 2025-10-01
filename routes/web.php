<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VillageProfileController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profil Desa
Route::get('/profile', [VillageProfileController::class, 'index'])->name('village-profile');

// Galeri
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');

// Pengumuman & Agenda
Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement.index');
Route::get('/announcement/{slug}', [AnnouncementController::class, 'show'])->name('announcement.show');

// Dokumen & Peraturan
Route::get('/document', [DocumentController::class, 'index'])->name('document.index');
Route::get('/document/{slug}', [DocumentController::class, 'show'])->name('document.show');
Route::get('/document/{slug}/download', [DocumentController::class, 'download'])->name('document.download');

// Kontak - akan menggunakan form di homepage atau halaman terpisah nanti
Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');
