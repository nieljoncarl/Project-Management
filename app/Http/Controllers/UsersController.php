<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\User;
use App\Task;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
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

    public function getUsersTask(Request $request)
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
        $item = $request->item;
        $purchaseid = $request->purchaseid;

        $purchase = Purchase::find($purchaseid);
        if($purchase->items()->detach($item))
        {
            echo json_encode('deleted');
        }
        else
        {
            echo json_encode('unable to delete');
        }
     }
}
