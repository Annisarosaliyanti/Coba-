<?php

namespace App\Http\Controllers;

use App\Models\PpidDocument;
use Illuminate\Support\Facades\Storage;

class PpidController extends Controller
{
    public function index()
    {
        $categories = PpidDocument::CATEGORIES;
        
        return view('ppid.index', compact('categories'));
    }

    public function dasarHukum()
    {
        $documents = PpidDocument::active()
            ->ofCategory('dasar_hukum')
            ->ordered()
            ->get();
        
        return view('ppid.dasar-hukum', compact('documents'));
    }

    public function tugasWewenang()
    {
        $content = PpidDocument::active()
            ->ofCategory('tugas_wewenang')
            ->first();
        
        return view('ppid.tugas-wewenang', compact('content'));
    }

    public function informasiPublik()
    {
        $documents = PpidDocument::active()
            ->ofCategory('informasi_publik')
            ->ordered()
            ->get();
        
        return view('ppid.informasi-publik', compact('documents'));
    }

    public function download($id)
    {
        $document = PpidDocument::findOrFail($id);
        $document->incrementDownloads();
        
        if ($document->file_path && Storage::exists($document->file_path)) {
            return Storage::download($document->file_path, $document->title . '.' . $document->file_type);
        }
        
        return back()->with('error', 'File tidak ditemukan.');
    }
}
