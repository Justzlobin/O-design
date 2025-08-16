<?php

namespace App\Http\Controllers;


use App\Enums\Page;
use App\Models\Banner;
use App\Models\SeoPage;
use App\Models\Social;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::ordered()->where('is_active', 1)->with('media')->get();
        $seo = SeoPage::where('page_slug', Page::HOME)->first();
        $telegramSocial = Social::where('title', 'Telegram')->first();

        return view('pages.home', compact('banners', 'seo', 'telegramSocial'));
    }
}
