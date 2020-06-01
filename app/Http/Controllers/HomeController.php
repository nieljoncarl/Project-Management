<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        
        $todaysmeetings = $user->meetings()->where(function($query) {
            $query->whereDate('start', Carbon::today());	
        })
        ->orWhere(function($query) {
            $query->where('recurring_day', Carbon::now()->englishDayOfWeek);	
        })->get();
        return view('home')->with('user', $user)->with('todaysmeetings', $todaysmeetings);
    }
}
