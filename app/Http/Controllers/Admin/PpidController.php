<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PpidDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PpidController extends Controller
{
    public function index()
    {
        $documents = PpidDocument::orderBy('category')->orderBy('order')->get();
        return view('admin.ppid.index', compact('documents'));
    }

    public function create()
    {
        $categories = PpidDocument::CATEGORIES;
        return view('admin.ppid.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|max:10240',
            'external_link' => 'nullable|url',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $validated['file_path'] = $file->store('ppid', 'public');
            $validated['file_type'] = $file->getClientOriginalExtension();
            $validated['file_size'] = $file->getSize();
        }

        $validated['is_active'] = $request->has('is_active');
        unset($validated['file']);

        PpidDocument::create($validated);

        return redirect()->route('admin.ppid.index')->with('success', 'Dokumen PPID berhasil ditambahkan.');
    }

    public function edit(PpidDocument $ppid)
    {
        $categories = PpidDocument::CATEGORIES;
        return view('admin.ppid.form', compact('ppid', 'categories'));
    }

    public function update(Request $request, PpidDocument $ppid)
    {
        $validated = $request->validate([
            'category' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|max:10240',
            'external_link' => 'nullable|url',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('file')) {
            if ($ppid->file_path) {
                Storage::disk('public')->delete($ppid->file_path);
            }
            $file = $request->file('file');
            $validated['file_path'] = $file->store('ppid', 'public');
            $validated['file_type'] = $file->getClientOriginalExtension();
            $validated['file_size'] = $file->getSize();
        }

        $validated['is_active'] = $request->has('is_active');
        unset($validated['file']);

        $ppid->update($validated);

        return redirect()->route('admin.ppid.index')->with('success', 'Dokumen PPID berhasil diperbarui.');
    }

    public function destroy(PpidDocument $ppid)
    {
        if ($ppid->file_path) {
            Storage::disk('public')->delete($ppid->file_path);
        }
        
        $ppid->delete();

        return redirect()->route('admin.ppid.index')->with('success', 'Dokumen PPID berhasil dihapus.');
    }
}
