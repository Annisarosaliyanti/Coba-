<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\StrukturOrganisasi;

class ProfileController extends Controller
{
    public function sambutan()
    {
        $sambutan = Profile::active()->ofType('sambutan')->first();
        $pimpinan = Profile::active()->ofType('pimpinan')->first();
        
        return view('profile.sambutan', compact('sambutan', 'pimpinan'));
    }

    public function pimpinan()
    {
        $pimpinan = Profile::active()->ofType('pimpinan')->first();
        
        return view('profile.pimpinan', compact('pimpinan'));
    }

    public function sejarah()
    {
        $sejarah = Profile::active()->ofType('sejarah')->first();
        
        return view('profile.sejarah', compact('sejarah'));
    }

    public function visiMisi()
    {
        $visiMisi = Profile::active()->ofType('visi_misi')->first();
        
        return view('profile.visi-misi', compact('visiMisi'));
    }

    public function tupoksi()
    {
        $tupoksi = Profile::active()->ofType('tupoksi')->first();
        
        return view('profile.tupoksi', compact('tupoksi'));
    }

    public function struktur()
    {
        $struktur = StrukturOrganisasi::active()
            ->roots()
            ->with('children.children.children')
            ->ordered()
            ->get();
        
        return view('profile.struktur', compact('struktur'));
    }
}
