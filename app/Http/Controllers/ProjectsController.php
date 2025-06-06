<?php

namespace App\Http\Controllers;

use App\Enums\Page;
use App\Enums\ProjectType;
use App\Models\Project;
use App\Models\SeoPage;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
//        $type = $request->query('type');
//
//        if ($type && ProjectType::isValid($type)) {
//            $projects = Project::select(['title', 'description', 'id', 'slug'])->where('type', $type)->get();
//        } else {
//            $projects = Project::select(['title', 'description', 'id', 'slug'])->where('type', ProjectType::Commercial)->get();
//            $type = ProjectType::Commercial;
//        }

        $projects = Project::select(['title', 'description', 'id', 'slug', 'type'])->get();
        $seo = SeoPage::where('page_slug', Page::PROJECTS)->first();

        return view('pages.projects', compact('projects', 'seo'));
    }
}
