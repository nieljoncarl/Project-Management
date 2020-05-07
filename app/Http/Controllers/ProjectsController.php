<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Auth;
use Spatie\Activitylog\Models\Activity;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'alias' => 'required',
            'description' => 'required',
            'outcomes' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        
        $project = new Project;
        $project->name = $request->input('name');
        $project->alias = $request->input('alias');
        $project->description = $request->input('description');
        $project->outcomes = $request->input('outcomes');
        $project->status = $request->input('status');
        $project->start = $request->input('start');
        $project->end = $request->input('end');
        
        if($project->save())
        {
            $request->session()->flash('success','Project Added!');
        }

        $creator = Auth::user();
        $project->users()->attach($creator,['user_id' => $creator->id,'type' => "Creator" ]);

        activity()->performedOn($project)
                ->causedBy($creator)
                ->log('Added a new Project');

        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {        
        activity()->performedOn($project)
                ->log('viewed');
        return view('project.show')->with('project',$project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('project.edit')->with('project',$project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'alias' => 'required',
            'description' => 'required',
            'outcomes' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        
        $project = Project::find($id);
        $project->name = $request->input('name');
        $project->alias = $request->input('alias');
        $project->description = $request->input('description');
        $project->outcomes = $request->input('outcomes');
        $project->status = $request->input('status');
        $project->start = $request->input('start');
        $project->end = $request->input('end');
        
        if($project->save())
        {
            $request->session()->flash('success','Project Modified!');
        }

        $activity = Activity::all()->last();

        return redirect()->route('project.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
