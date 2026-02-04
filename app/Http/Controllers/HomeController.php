<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Profile;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $sambutan = Profile::active()->ofType('sambutan')->first();
        $pimpinan = Profile::active()->ofType('pimpinan')->first();
        $latestNews = News::published()->latest()->take(6)->get();
        $settings = [
            'site_name' => Setting::get('site_name', 'Kecamatan Sungai Pinang'),
            'welcome_title' => Setting::get('welcome_title', 'Selamat Datang'),
            'welcome_text' => Setting::get('welcome_text', 'Website Resmi Kecamatan Sungai Pinang'),
        ];

        return view('home', compact('sambutan', 'pimpinan', 'latestNews', 'settings'));
    }
}
