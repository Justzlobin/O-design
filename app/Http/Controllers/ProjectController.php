<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController
{
    public function index(Project $project)
    {
        $sameProjects = Project::where('type', $project->type)->where('id', '!=', $project->id)->get();

        return view('pages.project', compact('project', 'sameProjects'));
    }
}
