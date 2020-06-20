<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Gate;
use Carbon\Carbon;
use App\Task;
use App\Project;
use App\Meeting;
use Spatie\Activitylog\Models\Activity;

class MeetingsController extends Controller
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
        $meetings = $user->meetings()->get();
        //$todaysmeetings = $user->meetings()->where('start', '>', \Carbon\Carbon::now()->subDays(1)->toDateString())->where('start', '<', \Carbon\Carbon::now()->addDays(1)->toDateString())->where('status','4')->orWhere('recurring_day', \Carbon\Carbon::now()->englishDayOfWeek)->get();
        
        $todaysmeetings = $user->meetings()->where(function($query) {
            $query->whereDate('start', Carbon::today())->whereBetween('status', ['3','4']);	
        })->get();
        $recurringmeetings = $user->meetings()->where(function($query) {
            $query->where('recurring_day', Carbon::now()->englishDayOfWeek)->whereBetween('status', ['3','4']);	
        })->get();
        $upcomingmeetings = $user->meetings()->where('status', '3')->where(function($query) {
                                $query->whereDate('start', ">" ,Carbon::today());	
                            })->get();
        $upcomingrecurringmeetings = $user->meetings()->where(function($query) {
                                $query->where('recurring_day', "!=" ,"None");	
                            })->get();
        $pastmeetings = $user->meetings()->where('status', '3')->where(function($query) {
                                $query->whereDate('start', "<" ,Carbon::today());	
                            })
                            ->orWhere(function($query) {
                                $query->where('recurring_day', "<" ,Carbon::now()->englishDayOfWeek)->where('recurring_day', "!=" ,"None");	
                            })->get();
        $completedmeeting = $user->meetings()->where('status', '5')->paginate('3');
        return view('meeting.index')->with([
            'meetings' => $meetings, 
            'completedmeeting' => $completedmeeting,
            'todaysmeetings' => $todaysmeetings,
            'recurringmeetings' => $recurringmeetings,
            'upcomingmeetings' => $upcomingmeetings,
            'upcomingrecurringmeetings' => $upcomingrecurringmeetings,
            'pastmeetings' => $pastmeetings,
            ]);
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
            'agenda' => 'required',
        ]);
        $user = Auth::user()->id;

        $meeting = new Meeting;
        $meeting->project_id = $request->input('project_id');
        $meeting->user_id = $user;
        $meeting->name = $request->input('name');
        $meeting->agenda = $request->input('agenda');
        $meeting->location = $request->input('location');
        $meeting->link = $request->input('link');
        $meeting->start = $request->input('meeting_start');
        $meeting->end = $request->input('meeting_end');
        $meeting->recurring_day = $request->input('recurring_day');
        $meeting->recurring_time = $request->input('recurring_time');

        if(auth()->user()->hasRole('officer'))
        {
            $meeting->status = "3";
        }
        else
        {
            $meeting->status = "2";
        }
        
        if($meeting->save())
        {
            
            $meeting->users()->attach($user);
            $request->session()->flash('success','Meeting Added!');
        }
        $project = Project::find($meeting->project_id);
        activity()->performedOn($project)
                ->withProperties(['meetingname' =>  $meeting->name, 'meeting_id' =>  $meeting->id ])
                ->log('created');

        return redirect()->route('project.show', $request->input('project_id')."#tab-meetings");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(meeting $meeting)
    {
        
        if(Gate::denies('view-project', $meeting->project)){
            return redirect(route('meeting.index'))->with('error','You have no permission to view the meeting');
        }
        activity()->performedOn($meeting)->log('viewed');
        $logs = Activity::where('subject_type' , 'App\Meeting')->where('subject_id' , $meeting->id)->orderby('created_at', 'desc')->get();
        return view('meeting.show')->with([
                                'meeting' => $meeting,
                                'logs' => $logs
                                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        if(Gate::denies('view-meeting', $meeting->project)){
            return redirect(route('meeting.index'))->with('error','You have no permission to edit the meeting');
        }
        $logs = Activity::where('subject_type' , 'App\Meeting')->where('subject_id' , $meeting->id)->orderby('created_at', 'desc')->get();
        return view('meeting.edit')->with([
            'meeting' => $meeting,
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
    public function update(Request $request, Meeting $meeting)
    {
        if ($request->has('status')) {
            $status = $request->status;
            if($status == '3')
            {
                $meeting->status = $status;
                $meeting->approved = \Carbon\Carbon::now();
                $meeting->started = null;
                $meeting->ended = null;
            }
            else if($status == '4')
            {
                $meeting->status = $status;
                $meeting->started = \Carbon\Carbon::now();
            }
            else if($status == '5')
            {
                $meeting->status = $status;
                $meeting->ended = \Carbon\Carbon::now();
            }
        }
        if($request->has('name'))
        {
            $meeting->name = $request->input('name');
        }   
        if($request->has('description'))
        {
            $meeting->description = $request->input('description');
        }   
        if($request->has('deliverable'))
        {
            $meeting->deliverable = $request->input('deliverable');
        }   
        if($request->has('resources'))
        {
            $meeting->resources = $request->input('resources');
        }   
        if($request->has('start'))
        {
            $meeting->start = $request->input('start');
        }   
        if($request->has('end'))
        {
            $meeting->end = $request->input('end');
        }   

        if($meeting->save())
        {
            $request->session()->flash('success','Meeting Updated!');
        }
        else
        {
            $request->session()->flash('error','Error Updating');
        }

        return redirect()->route('meeting.show', $meeting);
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
