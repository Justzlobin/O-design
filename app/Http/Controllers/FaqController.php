<?php

namespace App\Http\Controllers;

use App\Models\QuestionAndAnswer;

class FaqController extends Controller
{
    public function index()
    {
        $faq_s = QuestionAndAnswer::select(['id', 'question', 'answer'])->where('is_active', 1)->get();

        return view('pages.faq', compact('faq_s'));
    }
}
