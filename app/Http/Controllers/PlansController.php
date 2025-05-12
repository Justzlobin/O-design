<?php

namespace App\Http\Controllers;

use App\Enums\Page;
use App\Models\SeoPage;
use App\Models\Service;

class PlansController extends Controller
{
    public function index() {
        $seo = SeoPage::where('page_slug', Page::PLANS)->first();

        $services = Service::where('is_active', 1)->get();

        return view('pages.plans', compact('seo', 'services'));
    }
}
