<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fms;
use App\fillLevel_logs;
use App\status_logs;

class fuelMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fms = fms::lists(['name']);
        return view('home', compact('name', 'fms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // dd($request);
        $fms = new fms();
 
        $fms->name = $request->name;
        $fms->timestamps = false;
 
        $fms->save();

        $json = [
            'message' => 'Saved Successfully',
        ];

        //return view('home');
        return json_encode($json);

       
        
        //return redirect('log');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            //Fetching all the posts from the database
            // $posts = Post::all();
            return view('home',['_f_m_s'=> $fms]);
        // $fms = new fms();
        //     // $user = Auth::user();
        // $fms = fms::where('status', $fms->status)->where('fuelMonitoring',"fms")->get();
        // return view('fms.home')->with('fms',$fms)->with('fms', $fms);
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
    public function updateFillevelStatic(Request $request)
    {
        $fms = fms::where('id',$request->id)->first();
        $fms->fillLevel = $request->fillLevel;
        $fms->timestamps = false;
        $fms->save();

        if($fms->fillLevel_log_id == null) {    
            $log = new fillLevel_logs;
            $log->fillLevel = $request->fillLevel;
            $log->fms_id = $fms->id;
            $log->save();

            $fms->fillLevel_log_id = $log->id;
        }
        else {

            $prevLog = fillLevel_logs::where('id',$fms->fillLevel_log_id)->first();
            $prevLog->touch();

            $log = new fillLevel_logs;
            $log->fillLevel = $request->fillLevel;
            $log->fms_id = $fms->id;
            $log->save();

            $fms->fillLevel_log_id = $log->id;
        }

        $json = [
            'message' => 'Saved Successfully',
        ];

        //return view('home');
        return json_encode($json);
    }

    public function updateStatusStatic(Request $request)
    {
      //  dd($request);
        $fms = fms::where('id',$request->id)->first();
        $fms->status = $request->status;
        $fms->timestamps = false;
        $fms->save();

        if($fms->status_log_id == null) {    
            $log = new status_logs;
            $log->status = $request->status;
            $log->fms_id = $fms->id;
            $log->save();

            $fms->status_log_id = $log->id;
        }
        else {

            $prevLog = status_logs::where('id',$fms->status_log_id)->first();
            $prevLog->touch();

            $log = new status_logs;
            $log->status = $request->status;
            $log->fms_id = $fms->id;
            $log->save();

            $fms->status_log_id = $log->id;
        }

        $json = [
            'message' => 'Saved Successfully',
        ];

        //return view('home');
        return json_encode($json);
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
