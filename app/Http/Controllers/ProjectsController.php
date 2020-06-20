<?php

namespace App\Http\Controllers;

use Auth;
use Gate;
use Carbon\Carbon;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\File;
use App\Meeting;
use App\Status;
use App\Agency;

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
        $user = Auth::user();
        if($user->hasRole('officer'))
        {
            $projects = Project::all();
        }
        else
        {
            $projects = $user->projects()->get();
        }
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
            'output' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        
        $project = new Project;
        $project->user_id = Auth::user()->id;
        $project->name = $request->input('name');
        $project->alias = $request->input('alias');
        $project->description = $request->input('description');
        $project->output = $request->input('output');
        $project->start = $request->input('start');
        $project->end = $request->input('end');
        
        if(auth()->user()->hasRole('officer'))
        {
            $project->status = "3";
        }
        else
        {
            $project->status = "2";
        }
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
        
        if(Gate::denies('manage-project', $project)){
            return redirect(route('project.index'))->with('error','You have no permission to view the project');
        }
        activity()->performedOn($project)
                ->log('viewed');
        
        $logs = Activity::where('subject_type' , 'App\Project')->where('subject_id' , $project->id)->orderby('created_at', 'desc')->get();
        $tasks = Task::where('project_id', $project->id)->get();
        $meetings = Meeting::where('project_id', $project->id)->get();
        $todaysmeetings = Meeting::where(function($query) use ($project) {
                                $query->whereDate('start', Carbon::today())->where('project_id', $project->id)->whereBetween('status', ['3','4']);	
                            })
                            ->orWhere(function($query) use ($project) {
                                $query->where('recurring_day', Carbon::now()->englishDayOfWeek)->where('project_id', $project->id)->whereBetween('status', ['3','4']);	
                            })->get();
        $upcomingmeetings = Meeting::where(function($query) use ($project) {
                                $query->whereDate('start', ">" ,Carbon::today())->where('status','3')->where('project_id', $project->id);	
                            })
                            ->orWhere(function($query) use ($project) {
                                $query->where('recurring_day', ">" ,Carbon::now()->englishDayOfWeek)->where('recurring_day', "!=" ,"None")->where('project_id', $project->id);	
                            })->get();
                            
        $pastmeetings = Meeting::where(function($query) use ($project) {
            $query->whereDate('start', "<" ,Carbon::today())->where('project_id', $project->id);	
        })->get();
        $statuses = Status::all();
        return view('project.show')->with([
            'project' => $project, 
            'logs' => $logs,
            'tasks' => $tasks,
            'meetings' => $meetings,
            'todaysmeetings' => $todaysmeetings,
            'upcomingmeetings' => $upcomingmeetings,
            'pastmeetings' => $pastmeetings,
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
        $agencies = Agency::all();
        return view('project.edit')->with([
            'project' => $project, 
            'statuses' => $statuses,
            'agencies' => $agencies
        ]);
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
            'output' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        
        $project = Project::find($id);
        $project->name = $request->input('name');
        $project->alias = $request->input('alias');
        $project->description = $request->input('description');
        $project->output = $request->input('output');
        $project->status = $request->input('status');
        $project->agency_id = $request->input('agency_id');
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

    public function addReferenceProject(Request $request, $id)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'link' => 'required',
            'notes' => 'required',
        ]);
        $project = Project::find($id);
        $project->references()->create([
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'notes' => $request->input('notes')
        ]);
        $request->session()->flash('success','Reference Added!');
        return redirect()->route('project.show', $project->id."#tab-references");
        
    }

    public function updateReferenceProject(Request $request, $id)
    {
        $project = Project::find($id);
        $project->references()->create([
            'user_id' => Auth::id(),
            'body' => $request->input('body')
        ]);
        return redirect()->route('project.show', $project);
        
    }
    public function deleteReferenceProject(Request $request, $id)
    {
        $project = Project::find($id);
        $project->references()->create([
            'user_id' => Auth::id(),
            'body' => $request->input('body')
        ]);
        return redirect()->route('project.show', $project);
        
    }

    public function addCommentProject(Request $request, $id)
    {
        $project = Project::find($id);
        $project->comments()->create([
            'user_id' => Auth::id(),
            'body' => $request->input('body')
        ]);
        return redirect()->route('project.show', $project);
        
    }

    public function addFileProject(Request $request, $id)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $project = Project::find($id);
        $project->files()->create([
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'link' => $request->input('link')
        ]);
        return redirect()->route('project.show', $project->id."#tab-files")->with('success','File Added!');
        
    }

    public function getLogs($project)
    {        
        $project = Project::find($project);
        if(Gate::denies('manage-project', $project)){
            return redirect(route('project.index'))->with('error','You have no permission to view the logs project');
        }
        $logs = Activity::where('subject_type' , 'App\Project')->where('subject_id' , $project->id)->orderby('created_at', 'desc')->get();
        return view('project.show-logs')->with([
                                                'project' => $project, 
                                                'logs' => $logs
                                                ]);
    }
}
