<?php

namespace App\Http\Controllers;

use App\Enums\Page;
use App\Enums\ProjectType;
use App\Models\Project;
use App\Models\SeoPage;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::select(['title', 'description', 'id', 'slug', 'type'])->with('media')->get();
        $seo = SeoPage::where('page_slug', Page::PROJECTS)->first();

        return view('pages.projects', compact('projects', 'seo'));
    }
}
