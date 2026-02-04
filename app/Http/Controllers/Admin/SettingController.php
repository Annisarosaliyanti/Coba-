<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'site_name' => Setting::get('site_name', 'Kecamatan Sungai Pinang'),
            'site_description' => Setting::get('site_description', 'Website Resmi Kecamatan Sungai Pinang'),
            'welcome_title' => Setting::get('welcome_title', 'Selamat Datang'),
            'welcome_text' => Setting::get('welcome_text', 'Website Resmi Kecamatan Sungai Pinang'),
            'logo' => Setting::get('logo'),
        ];
        
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string',
            'welcome_title' => 'required|string|max:255',
            'welcome_text' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
        ]);

        Setting::set('site_name', $request->site_name);
        Setting::set('site_description', $request->site_description);
        Setting::set('welcome_title', $request->welcome_title);
        Setting::set('welcome_text', $request->welcome_text);

        if ($request->hasFile('logo')) {
            $oldLogo = Setting::get('logo');
            if ($oldLogo) {
                Storage::disk('public')->delete($oldLogo);
            }
            $logoPath = $request->file('logo')->store('settings', 'public');
            Setting::set('logo', $logoPath, 'image');
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
