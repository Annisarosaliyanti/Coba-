<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::orderBy('type')->orderBy('order')->get();
        return view('admin.profiles.index', compact('profiles'));
    }

    public function create()
    {
        $types = [
            'sambutan' => 'Sambutan Pimpinan',
            'pimpinan' => 'Profil Pimpinan',
            'sejarah' => 'Sejarah',
            'visi_misi' => 'Visi & Misi',
            'tupoksi' => 'Tupoksi',
        ];
        return view('admin.profiles.form', compact('types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('profiles', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        Profile::create($validated);

        return redirect()->route('admin.profiles.index')->with('success', 'Profil berhasil ditambahkan.');
    }

    public function edit(Profile $profile)
    {
        $types = [
            'sambutan' => 'Sambutan Pimpinan',
            'pimpinan' => 'Profil Pimpinan',
            'sejarah' => 'Sejarah',
            'visi_misi' => 'Visi & Misi',
            'tupoksi' => 'Tupoksi',
        ];
        return view('admin.profiles.form', compact('profile', 'types'));
    }

    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'type' => 'required|string',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($profile->image) {
                Storage::disk('public')->delete($profile->image);
            }
            $validated['image'] = $request->file('image')->store('profiles', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $profile->update($validated);

        return redirect()->route('admin.profiles.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy(Profile $profile)
    {
        if ($profile->image) {
            Storage::disk('public')->delete($profile->image);
        }
        
        $profile->delete();

        return redirect()->route('admin.profiles.index')->with('success', 'Profil berhasil dihapus.');
    }
}
