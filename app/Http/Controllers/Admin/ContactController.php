<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function edit()
    {
        $contact = Contact::first() ?? new Contact();
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'fax' => 'nullable|string|max:255',
            'maps_embed' => 'nullable|string',
            'latitude' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
            'working_hours' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',
        ]);

        $socialMedia = [
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
        ];

        $contact = Contact::first();
        
        if ($contact) {
            $contact->update([
                'address' => $validated['address'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'fax' => $validated['fax'],
                'maps_embed' => $validated['maps_embed'],
                'latitude' => $validated['latitude'],
                'longitude' => $validated['longitude'],
                'working_hours' => $validated['working_hours'],
                'social_media' => $socialMedia,
            ]);
        } else {
            Contact::create([
                'address' => $validated['address'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'fax' => $validated['fax'],
                'maps_embed' => $validated['maps_embed'],
                'latitude' => $validated['latitude'],
                'longitude' => $validated['longitude'],
                'working_hours' => $validated['working_hours'],
                'social_media' => $socialMedia,
            ]);
        }

        return redirect()->route('admin.contact.edit')->with('success', 'Informasi kontak berhasil diperbarui.');
    }
}
