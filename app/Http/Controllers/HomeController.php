<?php

namespace App\Http\Controllers;


use App\Enums\Page;
use App\Models\Banner;
use App\Models\Menu;
use App\Models\SeoPage;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('is_active', 1)->get();
        $seo = SeoPage::where('page_slug', Page::HOME)->first();

        return view('pages.home', compact('banners', 'seo'));
    }
}
