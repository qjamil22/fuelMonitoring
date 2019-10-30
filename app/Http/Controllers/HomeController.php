<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\fms as f;
use App\fillLevel_logs as fl;
use App\status_logs as sl;

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
        return view('home');
    }

    public function sensor()
    {
        return view('users.sensor');
    }

    public function fms_log(Request $request)
    {
        $fms = f::where('id',$request->id)->first();
        $fl = fl::where('fms_id',$request->id)->get();
        $sl = sl::where('fms_id',$request->id)->get();
        return view('users.fms_log')->with('fill_level_logs',$fl)->with('status_logs',$sl)->with('fms',$fms);
    }

    public function log()
    {
        $user = Auth::user();
        $fms = f::where('user_id',$user->id)->get();
        return view('users.log')->with('fms',$fms);
    }
}
