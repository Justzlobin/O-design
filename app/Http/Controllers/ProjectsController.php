<?php

namespace App\Http\Controllers;

use App\Enums\ProjectType;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type', false);

        if ($type && ProjectType::isValid($type)) {
            $projects = Project::select(['title', 'description', 'id', 'slug'])->where('type', $type)->get();
        } else {
            $projects = Project::select(['id', 'type'])->where('type', ProjectType::Privat)->limit(1)
                ->union(Project::select(['id', 'type'])->where('type', ProjectType::Commercial)->limit(1))
                ->get();
        }

        return view('pages.projects', compact('projects', 'type'));
    }
}
