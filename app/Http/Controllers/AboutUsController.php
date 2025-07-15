<?php

namespace App\Http\Controllers;

use App\Enums\Page;
use App\Models\SeoPage;

class AboutUsController extends Controller
{
    public function index() {
        $seo = SeoPage::where('page_slug', Page::ABOUT_US)->first();

        return view('pages.about-us', compact('seo'));
    }
}
