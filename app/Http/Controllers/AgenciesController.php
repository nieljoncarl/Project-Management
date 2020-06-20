<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agency;
class AgenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencies = Agency::all();
        return view('agency.index')->with(
            [
                "agencies" => $agencies
            ]
        );
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
            'address' => 'required',
        ]);

        
        $user = Auth::user()->id;

        $agency = new Agency;
        $agency->user_id = $user;
        $agency->name = $request->input('name');
        $agency->address = $request->input('address');
        $agency->contact_number = $request->input('contact_number');
        $agency->contact_email = $request->input('contact_email');
        if($agency->save())
        {
            return redirect()->route('agency.index')->with('success','Agency Added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        return view('agency.show')->with('agency',$agency);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $agency)
    {        
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
        ]);

        
        $user = Auth::user()->id;

        $agency = Agency::find($agency);
        $agency->user_id = $user;
        $agency->name = $request->input('name');
        $agency->address = $request->input('address');
        $agency->contact_number = $request->input('contact_number');
        $agency->contact_email = $request->input('contact_email');
        if($agency->save())
        {
            return redirect()->route('agency.show', $agency)->with('success','Agency Saved!');
        }
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
