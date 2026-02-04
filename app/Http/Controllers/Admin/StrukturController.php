<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    public function index()
    {
        $struktur = StrukturOrganisasi::with('parent')->orderBy('order')->get();
        return view('admin.struktur.index', compact('struktur'));
    }

    public function create()
    {
        $parents = StrukturOrganisasi::active()->orderBy('order')->get();
        return view('admin.struktur.form', compact('parents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'parent_id' => 'nullable|exists:struktur_organisasis,id',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('struktur', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        StrukturOrganisasi::create($validated);

        return redirect()->route('admin.struktur.index')->with('success', 'Struktur organisasi berhasil ditambahkan.');
    }

    public function edit(StrukturOrganisasi $struktur)
    {
        $parents = StrukturOrganisasi::active()->where('id', '!=', $struktur->id)->orderBy('order')->get();
        return view('admin.struktur.form', compact('struktur', 'parents'));
    }

    public function update(Request $request, StrukturOrganisasi $struktur)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'parent_id' => 'nullable|exists:struktur_organisasis,id',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('photo')) {
            if ($struktur->photo) {
                Storage::disk('public')->delete($struktur->photo);
            }
            $validated['photo'] = $request->file('photo')->store('struktur', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $struktur->update($validated);

        return redirect()->route('admin.struktur.index')->with('success', 'Struktur organisasi berhasil diperbarui.');
    }

    public function destroy(StrukturOrganisasi $struktur)
    {
        if ($struktur->photo) {
            Storage::disk('public')->delete($struktur->photo);
        }
        
        $struktur->delete();

        return redirect()->route('admin.struktur.index')->with('success', 'Struktur organisasi berhasil dihapus.');
    }
}
