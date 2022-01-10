<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rest;
use Carbon\Carbon;
use App\Models\Attendance;
use App\Http\Controllers\IndexController;

class RestController extends Controller
{

    public function index()
    {
        return view('index');
    }


    public function checkRest()
    {
        $user_id = session()->get('id');
        $today = Carbon::today()->format('Y-m-d');
        $checkRest = attendance::where('user_id', $user_id)->whereDate('end_attendance',$today)->latest()->first();
        
        return $checkRest;
        
    }


    /**
     *  checkAtte App\Http\Controllers\IndexController
     */
    public function startRest()
    {
        $user_id = session()->get('id');
        $today = Carbon::today()->format('Y-m-d');


        $called = app()->make('App\Http\Controllers\IndexController');
        $checkAtte = $called ->checkAtte();

        $checkRest = $this->checkRest();
        var_dump($checkRest);
        //exit();






        if (is_null(($checkAtte))) {
            return redirect()->back()->with('error', '勤務開始して下さい');
        } elseif (is_null($checkRest)) {
            return redirect()->back()->with('error', '休憩を終了して下さい');
        } else {
            Rest::create([
                'attendance_id' => ,
                'start_rest' => Carbon::now()->format('Y-m-d h:i:s'),
            ]);

        return redirect()->back()->with('error', '休憩開始しました');
        }
    }

    public function endRest()
    {
        return redirect()->back();
    }
}
