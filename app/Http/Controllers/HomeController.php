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
            $query->whereDate('start', Carbon::today())->whereBetween('status', ['3','4']);	
        })->get();
        $recurringmeetings = $user->meetings()->where(function($query) {
            $query->where('recurring_day', Carbon::now()->englishDayOfWeek)->whereBetween('status', ['3','4']);	
        })->get();
        return view('home')->with('user', $user)->with([
            'todaysmeetings' => $todaysmeetings,
            'recurringmeetings' => $recurringmeetings
            ]);
    }
}
