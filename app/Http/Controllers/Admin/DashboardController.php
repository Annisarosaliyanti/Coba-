<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Profile;
use App\Models\Service;
use App\Models\PpidDocument;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'profiles' => Profile::count(),
            'services' => Service::count(),
            'news' => News::count(),
            'ppid' => PpidDocument::count(),
        ];
        
        $latestNews = News::latest()->take(5)->get();
        
        return view('admin.dashboard', compact('stats', 'latestNews'));
    }
}
