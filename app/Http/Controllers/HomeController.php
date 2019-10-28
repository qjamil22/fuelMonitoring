<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fms;
use App\fillLevel_logs;
use App\status_logs;

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

    public function log()
    {
        $fms = fms::all();
        return view('users.log')->with('fms',$fms);
    }
}
