<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index($category = null)
    {
        $categories = Service::CATEGORIES;
        
        $query = Service::active()->ordered();
        
        if ($category && array_key_exists($category, $categories)) {
            $services = $query->ofCategory($category)->get();
            $currentCategory = $category;
        } else {
            $services = $query->get()->groupBy('category');
            $currentCategory = null;
        }
        
        return view('services.index', compact('services', 'categories', 'currentCategory'));
    }

    public function show($id)
    {
        $service = Service::active()->findOrFail($id);
        $relatedServices = Service::active()
            ->ofCategory($service->category)
            ->where('id', '!=', $id)
            ->ordered()
            ->take(4)
            ->get();
        
        return view('services.show', compact('service', 'relatedServices'));
    }
}
