<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Rest;
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
    //勤怠休憩ボタンの状態
    public function index()
    {
        //今日の日付取得
        $today = Carbon::today()->format('Y-m-d');

        //当日の勤怠開始取得
        $checkAtte = $this->checkAtte();

        //勤怠終了にNULLがあるか
        $checkAtte_end_Null = Attendance::where('user_id', session('id'))->whereNull('end_attendance')->first();

        //RestControllerから呼び出し
        $RestController = app()->make('App\Http\Controllers\RestController');
        //end_restにNULLがあるデータ
        $endRestCheck = $RestController->endRestCheck();
        //attendance_idの取得
        $atte_id = $RestController->atte_id();

        if(isset($checkAtte_end_Null)){ //勤務開始が押されて最後の勤怠終了データがない

            $checkAtte_end = $checkAtte_end_Null->start_attendance->format('Y-m-d');
            //nullのある勤務終了は当日である
            if($today === $checkAtte_end){

                if (isset($endRestCheck)) {//休憩開始が押されていれば休憩終了ボタンON
                $startAtte = 1;
                $endAtte = 1;
                $startRest = 1;

                return view('index')->with('startAtte', $startAtte)->with('endAtte', $endAtte)->with('startRest', $startRest);

                }elseif(isset($checkAtte_end_Null)){//休憩開始がなければ休憩開始開始と勤務終了ボタンON
                    $startAtte = 1;
                    $endAtte = 0;

                    return view('index')->with('startAtte', $startAtte)->with('endAtte', $endAtte);

                }else//勤怠終了が押されて当日の勤怠開始があれば全てのボタンOFF
                    $startAtte = 1;
                    $endAtte = 1;

                    return view('index')->with('startAtte', $startAtte)->with('endAtte', $endAtte);

            }else{//当日ではないデータにnullがあれば開始日の日を跨ぐ前の時刻で記録
                //end_restにNULLがあるなら記録
                if (isset($endRestCheck)) {
                    $endRest_end = $endRestCheck->start_rest->format('Y-m-d 23:59:59');
                    Rest::where('attendance_id', $atte_id)->whereNull('end_rest')->update(['end_rest' => $endRest_end]);
                }
                //end_attendanceにnullがあるなら記録
                if (isset($checkAtte_end_Null)) {
                    $endAtte_end = $checkAtte_end_Null->start_attendance->format('Y-m-d 23:59:59');
                    Attendance::where('user_id', session('id'))
                        ->latest()->first()->update(['end_attendance' => $endAtte_end]);
                }
                $startAtte = 0;
                $endAtte = 1;

                return view('index')->with('startAtte', $startAtte)->with('endAtte', $endAtte);
            }
        }elseif(isset($checkAtte)){//当日の勤怠開始データがある
            if(isset($checkAtte) && is_null($checkAtte_end_Null)){ //当日の勤怠開始データと勤怠終了の最終データがあるなら全てのボタンをOFF
                $startAtte = 1;
                $endAtte = 1;
                $startRest = 0;

                return view('index')->with('startAtte', $startAtte)->with('endAtte', $endAtte)->with('startRest', $startRest);
            }
            //勤務終了がなければ勤務終了ボタンON
            $startAtte = 1;
            $endAtte = 0;

            return view('index')->with('startAtte', $startAtte)->with('endAtte', $endAtte);

        }else{ //当日の勤務開始がなければ勤務開始ボタンON

            $startAtte = 0;
            $endAtte = 1;

            return view('index')->with('startAtte', $startAtte)->with('endAtte', $endAtte);
        }
    }


    //勤務開始を保存
    public function startAttendance()
    {
            Attendance::create([
                'user_id' => session('id'),
                'start_attendance' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            return redirect()->back();
    }

    //勤務終了を保存
    public function endAttendance()
    {
        Attendance::where('user_id', session('id'))
        ->latest()->first()->update(['end_attendance' => Carbon::now()->format('Y-m-d H:i:s')]);

            return redirect()->back();
    }
}
