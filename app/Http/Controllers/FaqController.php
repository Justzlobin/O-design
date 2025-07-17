<?php

namespace App\Http\Controllers;

use App\Enums\Page;
use App\Models\QuestionAndAnswer;
use App\Models\SeoPage;

class FaqController extends Controller
{
    public function index()
    {
        $faq_s = QuestionAndAnswer::select(['id', 'question', 'answer'])
            ->where('is_active', 1)
            ->ordered()
            ->get();
        $seo = SeoPage::where('page_slug', Page::FAQ)->first();

        return view('pages.faq', compact('faq_s', 'seo'));
    }
}
