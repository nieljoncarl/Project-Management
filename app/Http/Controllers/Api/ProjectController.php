<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity; 
use App\Http\Resources\ProjectResource;
use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return ProjectResource::collection(Project::all());
    }

    public function show($id)
    {
        return Project::find($id);
    }
    
    public function logs($id)
    {
        $project = Project::find($id);
        $logs = Activity::where('subject_type' , 'App\Project')->where('subject_id' , $project->id)->orderby('created_at', 'desc')->get();
        return $logs;
    }
}
