<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\User;
use App\Task;
use App\Project;
use App\Meeting;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index')->with('users', $users);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit')->with('user',$user);
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
        //
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

    public function getUsers(Request $request)
    {
        $search = $request->search;
        if($search == ''){
           $users = User::orderby('name','asc')->select('id','name')->limit(5)->get();
        }else{
           $users = User::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(10)->get();
        }
        $response = array();
        foreach($users as $user){
           $response[] = array("value"=>$user->id,"label"=>$user->name);
        }
        echo json_encode($response);
        exit;
    }

    public function getUserProject(Request $request)
    {
        $search = $request->search;
        $projectid = $request->projectid;
        $project = Project::find($projectid);
        if($search == ''){
           $users = $project->users()->orderby('name','asc')->limit(5)->get();
        }else{
            $users = $project->users()->orderby('name','asc')->where('name', 'like', '%' .$search . '%')->limit(10)->get();
        }
        $response = array();
        foreach($users as $user){
           $response[] = array("value"=>$user->id,"label"=>$user->name);
        }
        echo json_encode($response);
        exit;
    }

    public function getUserTask(Request $request)
    {
        $search = $request->search;
        $projectid = $request->projectid;
        $project = Project::find($projectid);
        if($search == ''){
           $users = $project->users()->orderby('name','asc')->limit(5)->get();
        }else{
            $users = $project->users()->orderby('name','asc')->where('name', 'like', '%' .$search . '%')->limit(10)->get();
        }
        $response = array();
        foreach($users as $user){
           $response[] = array("value"=>$user->id,"label"=>$user->name);
        }
        echo json_encode($response);
        exit;
    }

    public function addUserTask(Request $request)
    {
        $user = $request->user;
        $taskid = $request->taskid;
        $user = User::find($user);
        $task = Task::find($taskid);

        if($task->users()->where('user_id', $user->id)->exists())
        {
            echo ('1');
        }
        else
        {
            $task->users()->attach($user);
            echo ('2');
        }
     }


    public function deleteUserTask(Request $request)
    {
        $user = $request->user;
        $taskid = $request->taskid;
        $user = User::find($user);
        $task = Task::find($taskid);

        if($task->users()->where('user_id', $user->id)->exists())
        {
            $task->users()->detach($user);
            echo ('1');
        }
     }

    //  Projects
    public function addUserProject(Request $request)
    {
        $user = $request->user;
        $projectid = $request->projectid;
        $user = User::find($user);
        $project = Project::find($projectid);

        if($project->users()->where('user_id', $user->id)->exists())
        {
            echo ('1');
        }
        else
        {
            $project->users()->attach($user);
            echo ('2');
        }
     }


    public function deleteUserProject(Request $request)
    {
        $user = $request->user;
        $projectid = $request->projectid;
        $user = User::find($user);
        $project = Project::find($projectid);
        
        if($project->users()->where('user_id', $user->id)->exists())
        {
            $project->users()->detach($user);
            echo ('1');
        }
        else
        {
            echo ('2');
        }
     }

     //Meetings
     
    public function addUserMeeting(Request $request)
    {
        $user = $request->user;
        $meetingid = $request->meetingid;
        $user = User::find($user);
        $meeting = Meeting::find($meetingid);

        if($meeting->users()->where('user_id', $user->id)->exists())
        {
            echo ('1');
        }
        else
        {
            $meeting->users()->attach($user, ['guest_status' => 'Invited']);
            echo ('2');
        }
     }

     public function deleteUserMeeting(Request $request)
     {
         $user = $request->user;
         $meetingid = $request->meetingid;
         $user = User::find($user);
         $meeting = Meeting::find($meetingid);
 
         if($meeting->users()->where('user_id', $user->id)->exists())
         {
             $meeting->users()->detach($user);
             echo ('1');
         }
      }

}
