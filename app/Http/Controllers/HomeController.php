<?php

namespace App\Http\Controllers;


use App\Models\Banner;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('is_active', 1)->get();

        return view('pages.home', compact('banners'));
    }
}
