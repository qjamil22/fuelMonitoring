<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\fms;
use App\fillLevel_logs;
use App\status_logs;
use App\voltage_logs;
use App\current_logs;
use App\power_logs;
use App\temperature_logs;
use App\genStatus_logs;
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
// dd($request);
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
        $fms->voltage = $request->voltage;
        $fms->current = $request->current;
        $fms->power = $request->power;
        $fms->temperature = $request->temperature;
        $fms->genStatus = $request->gen_status;
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

        if($fms->voltage_log_id == null){
            $log = new voltage_logs;
            $log->voltage = $request->voltage;
            $log->fms_id = $fms->id;
            $log->save();

            $fms->voltage_log_id = $log->id;
        }
        else {
            $prevLog = voltage_logs::where('id',$fms->voltage_log_id)->first();
            $prevLog->touch();

            $log = new voltage_logs;
            $log->voltage = $request->voltage;
            $log->fms_id = $fms->id;
            $log->save();

            $fms->voltage_log_id = $log->id;
        }

        if($fms->current_log_id == null){
            $log = new current_logs;
            $log->current = $request->current;
            $log->fms_id = $fms->id;
            $log->save();

            $fms->current_log_id = $log->id;
        }
        else {
            $prevLog = current_logs::where('id',$fms->current_log_id)->first();
            $prevLog->touch();

            $log = new current_logs;
            $log->current = $request->current;
            $log->fms_id = $fms->id;
            $log->save();

            $fms->current_log_id = $log->id;
        }

        if($fms->power_log_id == null){
            $log = new power_logs;
            $log->power = $request->power;
            $log->fms_id = $fms->id;
            $log->save();

            $fms->power_log_id = $log->id;
        }
        else {
            $prevLog = power_logs::where('id',$fms->power_log_id)->first();
            $prevLog->touch();

            $log = new power_logs;
            $log->power = $request->power;
            $log->fms_id = $fms->id;
            $log->save();

            $fms->power_log_id = $log->id;
        }

        if($fms->temperature_log_id == null){
            $log = new temperature_logs;
            $log->temperature = $request->temperature;
            $log->fms_id = $fms->id;
            $log->save();

            $fms->temperature_log_id = $log->id;
        }
        else {
            $prevLog = temperature_logs::where('id',$fms->temperature_log_id)->first();
            $prevLog->touch();

            $log = new temperature_logs;
            $log->temperature = $request->temperature;
            $log->fms_id = $fms->id;
            $log->save();

            $fms->temperature_log_id = $log->id;
        }

        if($fms->gen_status_log_id == null){
            $log = new genStatus_logs;
            $log->gen_status = $request->gen_status;
            $log->fms_id = $fms->id;
            $log->save();

            $fms->gen_status_log_id = $log->id;
        }
        else {
            $prevLog = genStatus_logs::where('id',$fms->gen_stauts_log_id)->first();
            $prevLog->touch();

            $log = new genStatus_logs;
            $log->gen_status = $request->gen_status;
            $log->fms_id = $fms->id;
            $log->save();

            $fms->gen_status_log_id = $log->id;
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
