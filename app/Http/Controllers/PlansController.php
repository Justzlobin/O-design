<?php

namespace App\Http\Controllers;

class PlansController extends Controller
{
    public function index() {
        return view('pages.plans');
    }
}
