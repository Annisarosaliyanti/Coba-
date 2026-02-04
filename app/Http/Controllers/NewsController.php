<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::published()
            ->latest()
            ->paginate(9);
        
        $featuredNews = News::published()
            ->latest()
            ->take(3)
            ->get();
        
        return view('news.index', compact('news', 'featuredNews'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $news->incrementViews();
        
        $relatedNews = News::published()
            ->where('id', '!=', $news->id)
            ->latest()
            ->take(4)
            ->get();
        
        return view('news.show', compact('news', 'relatedNews'));
    }
}
