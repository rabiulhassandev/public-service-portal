<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryPageController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where('status', 'active')
            ->orderBy('order', 'asc')
            ->get();
        
        return view('gallery', compact('galleries'));
    }
}
