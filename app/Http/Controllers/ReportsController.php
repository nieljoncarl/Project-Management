<?php

namespace App\Http\Controllers;

use Auth;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\Status;
use App\User;

class ReportsController extends Controller
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
        //$projects = Project::all();

        $user = Auth::user();
        return view('report.index')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('report.create');
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
        $project->user_id = Auth::user()->id;
        $project->name = $request->input('name');
        $project->alias = $request->input('alias');
        $project->description = $request->input('description');
        $project->outcomes = $request->input('outcomes');
        $project->status = "2";
        $project->start = $request->input('start');
        $project->end = $request->input('end');
        
        if($project->save())
        {
            $request->session()->flash('success','Project Added!');
        }

        $creator = Auth::user();
        $project->users()->attach($creator,['user_id' => $creator->id,'type' => "Creator" ]);
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
        
        $logs = Activity::where('subject_type' , 'App\Project')->where('subject_id' , $project->id)->orderby('created_at', 'desc')->get();
        $tasks = Task::where('project_id', $project->id)->get();
        $statuses = Status::all();
        return view('report.show')->with([
            'project' => $project, 
            'logs' => $logs,
            'tasks' => $tasks,
            'statuses' => $statuses
            ]);
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
        $statuses = Status::all();
        return view('report.edit')->with(['project' => $project, 
        'statuses' => $statuses]);
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

    public function tasks(Request $request, $id)
    {
        $user = User::find($id);
        $request_start = $request->input('start2');
        $request_end = $request->input('end2');
        if($request_end=='')
        {
            $request_end = \Carbon\Carbon::now();
        }
        $tasks = $user->tasks()->where('started', '!=', '')->whereBetween('start', [$request_start, $request_end])->get();
        return view('report.print')->with([
            'user' => $user, 
            'tasks' => $tasks, 
            'request_start' => $request_start, 
            'request_end' => $request_end
            ]);
    }

}
