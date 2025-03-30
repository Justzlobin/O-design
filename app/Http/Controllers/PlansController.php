<?php

namespace App\Http\Controllers;

use App\Enums\Page;
use App\Models\SeoPage;

class PlansController extends Controller
{
    public function index() {
        $seo = SeoPage::where('page_slug', Page::PLANS)->first();

        return view('pages.plans', compact('seo'));
    }
}
