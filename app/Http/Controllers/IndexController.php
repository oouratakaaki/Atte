<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Attendance;
use Carbon\Carbon;

class IndexController extends Controller
{

    //当日の勤務開始があるかどうか
    public function checkAtte()
    {
        $today = Carbon::today()->format('Y-m-d');
        $checkAtte = Attendance::where('user_id', session('id'))->whereDate('start_attendance', $today)->latest()->first();
        return $checkAtte;
    }

    //最後の勤怠打刻データに勤務終了データがあるかどうか
    public function checkAtte_end()
    {
        $today_end = Carbon::today()->format('Y-m-d');
        $checkAtte_end = Attendance::where('user_id', session('id'))->whereDate('end_attendance', $today_end)->latest()->first();
        return $checkAtte_end;
    }

    public function index()
    {
        //今日の日付取得
        $today = Carbon::today()->format('Y-m-d');
        //当日の勤怠開始取得
        $checkAtte = $this->checkAtte();
        //勤怠終了にNULLがあるか
        $checkAtte_end_Null = Attendance::where('user_id', session('id'))->whereNull('end_attendance')->first();
        //勤怠終了にNULLがないか
        $checkAtte_end_notNull = Attendance::where('user_id', session('id'))->whereNotNull('end_attendance')->first();

        $checkAtte_end = Attendance::where('user_id', session('id'))->whereDate('end_attendance', $today)->latest()->first();

        if(isset($checkAtte_end_Null)){//最後の勤怠終了データがない
            //end_restにNULLがあるか
            $endRestCheck = app()->make('App\Http\Controllers\RestController');
            $endRestCheck = $endRestCheck->endRestCheck();

            if (isset($endRestCheck)) {//休憩開始が押されていれば休憩終了ボタンON
                $startAtte = 1;
                $endAtte = 1;
                $startRest = 1;
                return view('index')->with('startAtte', $startAtte)->with('endAtte', $endAtte)->with('startRest', $startRest);
            }elseif(isset($checkAtte_end_Null)){//休憩開始がなければ休憩開始開始と勤務終了ボタンON
                $startAtte = 1;
                $endAtte = 0;
                return view('index')->with('startAtte', $startAtte)->with('endAtte', $endAtte);
            }else{//勤怠終了が押されて当日の勤怠開始があれば全てのボタンOFF
                $startAtte = 1;
                $endAtte = 1;
                return view('index')->with('startAtte', $startAtte)->with('endAtte', $endAtte);
                }
        }elseif(isset($checkAtte)){//当日の勤怠開始データがある
            if(isset($checkAtte) && isset($checkAtte_end_notNull)){ //当日の勤怠開始データと勤怠終了の最終データがあるなら全てのボタンをOFF
                $startAtte = 1;
                $endAtte = 1;
                $startRest = 0;
                return view('index')->with('startAtte', $startAtte)->with('endAtte', $endAtte)->with('startRest', $startRest);
            }
            //勤怠終了がなければ終了
            $startAtte = 1;
            $endAtte = 0;
            return view('index')->with('startAtte', $startAtte)->with('endAtte', $endAtte);
        }else{//当日の勤怠開始がなければ勤怠開始
            $startAtte = 0;
            $endAtte = 1;

            return view('index')->with('startAtte', $startAtte)->with('endAtte', $endAtte);
        }
    }


    //勤怠開始
    public function startAttendance()
    {
            Attendance::create([
                'user_id' => session('id'),
                'start_attendance' => Carbon::now()->format('Y-m-d H:i:s'),
                //昨日の日付を保存
                //'start_attendance' => Carbon::yesterday(),
            ]);
            return redirect()->back();
    }


    //勤務終了
    public function endAttendance()
    {
        Attendance::where('user_id', session('id'))->latest()->first()->update(['end_attendance' => Carbon::now()->format('Y-m-d H:i:s')]);

            return redirect()->back();
    }









}
