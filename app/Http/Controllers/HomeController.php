<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\fms as f;
use App\fillLevel_logs as fl;
use App\status_logs as sl;
use App\voltage_logs as vl;
use App\current_logs as cl;
use App\power_logs as pl;
use App\temperature_logs as tl;
use App\genStatus_logs as gl;
use DB;
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
    
        $fms = f::where('user_id',$user->id)->paginate(5);
        return view('users.log')->with('fms',$fms)->with('user',$user);

    }

    public function sensor()
    {
        $user = Auth::user();
        $success = null;
        return view('users.sensor')->with('success',$success)->with('user',$user);
    }

    public function fms_log(Request $request)
    {
        $user = Auth::user();
        $fms = f::where('id',$request->id)->first();
        $fl = fl::where('fms_id',$request->id)->get();
        $sl = sl::where('fms_id',$request->id)->get();
        $vl = vl::where('fms_id',$request->id)->get();
        $cl = cl::where('fms_id',$request->id)->get();
        $pl = pl::where('fms_id',$request->id)->get();
        $tl = tl::where('fms_id',$request->id)->get();
        $gl = gl::where('fms_id',$request->id)->get();

        //FillLevel_logs

        $avgArray = [];
        $j = 0;
        $sum = 0;

        for($i=6; $i>=0; $i--) {

            $temp = DB::table('fill_level_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->avg('fillLevel');
            $date = DB::table('fill_level_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::createFromDate()->format('d/m/y'))->get();
            if($temp == null) {
                $avgArray[$j] = 0;  

            }
            else {
                $avgArray[$j] = $temp;  
            }

            $j++;
        }

        //Voltage_logs

        $avgArray1 = [];
        $j = 0;
        $sum = 0;

        for($i=6; $i>=0; $i--) {

            $temp = DB::table('voltage_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->avg('voltage');
            $date = DB::table('voltage_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::createFromDate()->format('d/m/y'))->get();
            if($temp == null) {
                $avgArray1[$j] = 0;  

            }
            else {
                $avgArray1[$j] = $temp;  
            }

            $j++;
        }

        //Current_logs

        $avgArray2 = [];
        $j = 0;
        $sum = 0;

        for($i=6; $i>=0; $i--) {

            $temp = DB::table('current_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->avg('current');
            $date = DB::table('current_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::createFromDate()->format('d/m/y'))->get();
            if($temp == null) {
                $avgArray2[$j] = 0;  

            }
            else {
                $avgArray2[$j] = $temp;  
            }

            $j++;
        }

        //Power_logs

        $avgArray3 = [];
        $j = 0;
        $sum = 0;

        for($i=6; $i>=0; $i--) {

            $temp = DB::table('power_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->avg('power');
            $date = DB::table('power_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::createFromDate()->format('d/m/y'))->get();
            if($temp == null) {
                $avgArray3[$j] = 0;  

            }
            else {
                $avgArray3[$j] = $temp;  
            }

            $j++;
        }

        //Temperature_logs

        $avgArray4 = [];
        $j = 0;
        $sum = 0;

        for($i=6; $i>=0; $i--) {

            $temp = DB::table('temperature_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->avg('temperature');
            $date = DB::table('temperature_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::createFromDate()->format('d/m/y'))->get();
            if($temp == null) {
                $avgArray4[$j] = 0;  

            }
            else {
                $avgArray4[$j] = $temp;  
            }

            $j++;
        }

        //Gen-Status_logs

        $avgArray5 = [];
        $j = 0;

        for($i=6; $i>=0; $i--) {

            $temp = DB::table('gen_status_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->where('gen_status',1)->count();
            
            $avgArray5[$j] = $temp;

            $j++;
        }
        // $dateArray = [];
        // $k = 0;
        // for($m=6; $m>=0; $m--) {
        //     $temp1 = Carbon::now()->subDays($m)->format('y/m/d');
        //     $dateArray[$k] = $temp1;
        //     $k++;
        // }

        //Door_status_logs

        $countArray = [];
        $j = 0;
        for($i=6; $i>=0; $i--) {

            $temp = DB::table('status_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->where('status',1)->count();
            
            $countArray[$j] = $temp;

            $j++;
        }

        $dateArray = [];
        $k = 0;
        for($m=6; $m>=0; $m--) {
            $temp1 = Carbon::now()->subDays($m)->format('y/m/d');
            $dateArray[$k] = $temp1;
            $k++;
        }

        return view('users.fms_log')
                ->with('fill_level_logs',$fl)
                ->with('status_logs',$sl)
                ->with('voltage_logs', $vl)
                ->with('current_logs', $cl)
                ->with('power_logs', $pl)
                ->with('temperature_logs', $tl)
                ->with('gen_status_logs', $gl)
                ->with('fms',$fms)
                ->with('avgFillLevel', $avgArray)
                ->with('avgVoltage', $avgArray1)
                ->with('avgCurrent', $avgArray2)
                ->with('avgPower', $avgArray3)
                ->with('avgTemperature', $avgArray4)
                ->with('avgGenStatus', $avgArray5)
                ->with('statusCount', $countArray)
                ->with('dateLabels',$dateArray)
                ->with('user',$user);
    }

    public function log()
    {
        $user = Auth::user();
        $fms = f::where('user_id',$user->id)->paginate(7);
        return view('users.log')->with('fms',$fms)->with('user',$user);
    }

    public function notifications(Request $request)
    {
        // dd($request);

        $user = Auth::user();
        $fms = f::where('user_id',$request->user_id)->paginate(7);
        return view('pages.notifications')->with('fms',$fms)->with('user',$user);
    }

    public function user_u(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $fms = f::where('user_id',$request->user_id);
        return view('users.user_u')->with('fms',$fms)->with('user',$user);
    }






    public function index_a()
    {
        $user = Auth::user();
    
        $fms = f::where('user_id',$user->id)->paginate(5);
        return view('users.log_a')->with('fms',$fms)->with('user',$user);

    }

    public function sensor_a()
    {
        $user = Auth::user();
        $success = null;
        return view('users.sensor_a')->with('success',$success)->with('user',$user);
    }

    public function fms_log_a(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $fms = f::where('id',$request->id)->first();
        $fl = fl::where('fms_id',$request->id)->get();
        $sl = sl::where('fms_id',$request->id)->get();
        $vl = vl::where('fms_id',$request->id)->get();
        $cl = cl::where('fms_id',$request->id)->get();
        $pl = pl::where('fms_id',$request->id)->get();
        $tl = tl::where('fms_id',$request->id)->get();
        $gl = gl::where('fms_id',$request->id)->get();
        
        //FillLevel Logs
        
        $avgArray = [];
        $j = 0;
        $sum = 0;

        for($i=6; $i>=0; $i--) {

            $temp = DB::table('fill_level_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->avg('fillLevel');
            $date = DB::table('fill_level_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::createFromDate()->format('d/m/y'))->get();
            if($temp == null) {
                $avgArray[$j] = 0;  
                
            }
            else {
                $avgArray[$j] = $temp;  
            }

            $j++;
        }
        // dd($avgArray);
        
        //Voltage_logs

        $avgArray1 = [];
        $j = 0;
        $sum = 0;

        for($i=6; $i>=0; $i--) {

            $temp = DB::table('voltage_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->avg('voltage');
            $date = DB::table('voltage_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::createFromDate()->format('d/m/y'))->get();
            if($temp == null) {
                $avgArray1[$j] = 0;  
                
            }
            else {
                $avgArray1[$j] = $temp; 
                
            }

            $j++;
        }
// dd($avgArray1);
        //Current_logs

        $avgArray2 = [];
        $j = 0;
        $sum = 0;

        for($i=6; $i>=0; $i--) {

            $temp = DB::table('current_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->avg('current');
            $date = DB::table('current_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::createFromDate()->format('d/m/y'))->get();
            if($temp == null) {
                $avgArray2[$j] = 0;  

            }
            else {
                $avgArray2[$j] = $temp;  
                 
            }
            
            $j++;
        }

        //Power_logs

        $avgArray3 = [];
        $j = 0;
        $sum = 0;

        for($i=6; $i>=0; $i--) {

            $temp = DB::table('power_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->avg('power');
            $date = DB::table('power_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::createFromDate()->format('d/m/y'))->get();
            if($temp == null) {
                $avgArray3[$j] = 0;  

            }
            else {
                $avgArray3[$j] = $temp;  
            }

            $j++;
        }

        //Temperature_logs

        $avgArray4 = [];
        $j = 0;
        $sum = 0;

        for($i=6; $i>=0; $i--) {

            $temp = DB::table('temperature_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->avg('temperature');
            $date = DB::table('temperature_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::createFromDate()->format('d/m/y'))->get();
            if($temp == null) {
                $avgArray4[$j] = 0;  

            }
            else {
                $avgArray4[$j] = $temp;  
            }

            $j++;
        }

        //Gen-Status_logs

        $avgArray5 = [];
        $j = 0;
        $sum = 0;

        for($i=6; $i>=0; $i--) {

            $temp = DB::table('gen_status_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->avg('gen_status');
            $date = DB::table('gen_status_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::createFromDate()->format('d/m/y'))->get();
            if($temp == null) {
                $avgArray5[$j] = 0;  

            }
            else {
                $avgArray5[$j] = $temp;  
            }

            $j++;
        }
        // dd($avgArray5);

        // Door_Status_log


        $countArray = [];
        $j = 0;
        for($i=6; $i>=0; $i--) {

            $temp = DB::table('status_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->where('status',1)->count();
            
            $countArray[$j] = $temp;

            $j++;
        }

        $dateArray = [];
        $k = 0;
        for($m=6; $m>=0; $m--) {
            $temp1 = Carbon::now()->subDays($m)->format('y/m/d');
            $dateArray[$k] = $temp1;
            $k++;
        }

        return view('users.fms_log_a')
                ->with('fill_level_logs',$fl)
                ->with('status_logs',$sl)
                ->with('voltage_logs', $vl)
                ->with('current_logs', $cl)
                ->with('power_logs', $pl)
                ->with('temperature_logs', $tl)
                ->with('gen_status_logs', $gl)
                ->with('fms',$fms)
                ->with('avgFillLevel', $avgArray)
                ->with('avgVoltage', $avgArray1)
                ->with('avgCurrent', $avgArray2)
                ->with('avgPower', $avgArray3)
                ->with('avgTemperature', $avgArray4)
                ->with('avgGenStatus', $avgArray5)
                ->with('statusCount', $countArray)
                ->with('dateLabels',$dateArray)
                ->with('user',$user);
    }

    public function log_a()
    {
        $user = Auth::user();
        $fms = f::where('user_id',$user->id)->paginate(7);
        return view('users.log_a')->with('fms',$fms)->with('user',$user);
    }

    public function notifications_a(Request $request)
    {
        // dd($request);

        $user = Auth::user();
        $fms = f::where('user_id',$request->user_id)->paginate(7);
        return view('pages.notifications_a')->with('fms',$fms)->with('user',$user);
    }




}
