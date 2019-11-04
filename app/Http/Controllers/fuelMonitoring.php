<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\fms;
use App\fillLevel_logs;
use App\status_logs;
use App\User;

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

        $request->validate([
            'name' => 'required'
        ]);

        $user = Auth::user();
        $fms = new fms();
 
        $fms->name = $request->name;
        $fms->timestamps = false;
        $fms->user_id = $user->id;
        $fms->save();
        
        return redirect()->back()->with('success','Created Successfully');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            
            return view('home',['_f_m_s'=> $fms]);
        
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
        $user = User::where('id', $fms->user_id)->first(); 

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
          );

          $pusher = new \Pusher\Pusher(
            'cb63405c99491817179a',
            '03d03727d6af15846cd3',
            '891538',
            $options
          );

        $pusher->trigger($user->id."-channel","update-fillLevel",$request->fillLevel);
        $pusher->trigger($user->id."-channel","notification","Fill Level has been updated of fms ".$fms->name." Fill Level is ".$request->fillLevel);

        
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

        return json_encode($json);
    }

    public function updateStatusStatic(Request $request)
    {

        $fms = fms::where('id',$request->id)->first();
        $user = User::where('id', $fms->user_id)->first(); 

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
          );

          $pusher = new \Pusher\Pusher(
            'cb63405c99491817179a',
            '03d03727d6af15846cd3',
            '891538',
            $options
          );

        $pusher->trigger($user->id."-channel","update-status",$request->status);
        $pusher->trigger($user->id."-channel","notification","Door status has been updated of fms ".$fms->name." Door status is ".$request->status);

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
