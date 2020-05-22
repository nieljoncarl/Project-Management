<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Gate;
use App\Task;
use App\Project;
use Spatie\Activitylog\Models\Activity;

class TasksController extends Controller
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
        $tasks = $user->tasks()->get();
        $completedtask = $user->tasks()->where('status', '5')->paginate('3');
        return view('task.index')->with(['tasks' => $tasks, 'completedtask' => $completedtask]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'description' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        $user = Auth::user()->id;

        $task = new Task;
        $task->project_id = $request->input('project_id');
        $task->user_id = $user;
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->status = "2";
        $task->start = $request->input('start');
        $task->end = $request->input('end');

        
        
        if($task->save())
        {
            
            $task->users()->attach($user);
            $request->session()->flash('success','Task Added!');
        }
        $project = Project::find($task->project_id);
        activity()->performedOn($project)
                ->withProperties(['taskname' =>  $task->name, 'task_id' =>  $task->id ])
                ->log('created');

        

        return redirect()->route('project.show', $request->input('project_id')."#tab-task");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        
        if(Gate::denies('view-task', $task->project)){
            return redirect(route('task.index'))->with('error','You have no permission to view the task');
        }
        activity()->performedOn($task)->log('viewed');
        $logs = Activity::where('subject_type' , 'App\Task')->where('subject_id' , $task->id)->orderby('created_at', 'desc')->get();
        return view('task.show')->with([
                                'task' => $task,
                                'logs' => $logs
                                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $logs = Activity::where('subject_type' , 'App\Task')->where('subject_id' , $task->id)->orderby('created_at', 'desc')->get();
        return view('task.edit')->with([
            'task' => $task,
            'logs' => $logs
            ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        if ($request->has('status')) {
            $status = $request->status;
            if($status == '3')
            {
                $task->status = $status;
                $task->approved = \Carbon\Carbon::now();
                $task->started = null;
                $task->ended = null;
            }
            else if($status == '4')
            {
                $task->status = $status;
                $task->started = \Carbon\Carbon::now();
            }
            else if($status == '5')
            {
                $task->status = $status;
                $task->ended = \Carbon\Carbon::now();
            }
        }
        if($request->has('name'))
        {
            $task->name = $request->input('name');
        }   
        if($request->has('description'))
        {
            $task->description = $request->input('description');
        }   
        if($request->has('start'))
        {
            $task->start = $request->input('start');
        }   
        if($request->has('end'))
        {
            $task->end = $request->input('end');
        }   

        if($task->save())
        {
            $request->session()->flash('success','Task Updated!');
        }
        else
        {
            $request->session()->flash('error','Error Updating');
        }

        return redirect()->route('task.show', $task);
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
