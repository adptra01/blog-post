<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display halaman dokumen & peraturan
     */
    public function index(Request $request)
    {
        $type = $request->get('type');
        $search = $request->get('search');

        $query = Document::active()->published();

        // Filter by type
        if ($type) {
            $query->type($type);
        }

        // Search
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('document_number', 'like', "%{$search}%");
            });
        }

        $documents = $query->latest('document_date')->paginate(15);

        // Tipe dokumen untuk filter
        $types = [
            'peraturan' => 'Peraturan Desa',
            'sk' => 'Surat Keputusan',
            'laporan' => 'Laporan',
            'formulir' => 'Formulir',
            'lainnya' => 'Lainnya',
        ];

        return view('document.index', compact('documents', 'types', 'type', 'search'));
    }

    /**
     * Display detail dokumen
     */
    public function show($slug)
    {
        $document = Document::active()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('document.show', compact('document'));
    }

    /**
     * Download dokumen
     */
    public function download($slug)
    {
        $document = Document::active()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        // Increment download count
        $document->incrementDownload();

        // Download file
        $filePath = Storage::disk('public')->path($document->file_path);

        return response()->download($filePath, $document->title.'.'.$document->file_type);
    }
}
