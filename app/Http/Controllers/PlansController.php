<?php

namespace App\Http\Controllers;

use App\Enums\Page;
use App\Models\Plan;
use App\Models\SeoPage;
use App\Models\Service;

class PlansController extends Controller
{
    public Page $page;

    public function __construct()
    {
        $this->page = Page::PLANS;
    }

    public function index()
    {
        $seo = SeoPage::where('page_slug', $this->page)->first();
        $plans = Plan::where('is_active', 1)
            ->with(['services' => function ($query) {
                $query  ->isActive()->ordered();
            }])->get();

        $services = Service::isActive()->ordered()->with('plans')->get();

        return view('pages.plans', compact('seo', 'services', 'plans'));
    }
}
