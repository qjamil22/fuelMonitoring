<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }

    public function index(){
        // return view('users.admin');
        foreach($this->guard()->user()->role as $role) {
        if($role->name == 'admin'){
            return redirect('log_a');
        }
        else {
            return view('users.log');
        }
    }
    }
}
