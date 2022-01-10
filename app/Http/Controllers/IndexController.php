<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Attendance;
use Carbon\Carbon;


class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    //当日の勤務開始があるかどうか
    public function checkAtte()
    {
        $user_id = session()->get('id');

        $today = Carbon::today()->format('Y-m-d');
        $todayAttendance = Attendance::where('user_id', $user_id)->whereDate('start_attendance',$today)->latest()->first();
        return $todayAttendance;
    }
    //当日の勤務があるかどうか->最後の勤怠打刻データに勤務終了データがあるかどうか
    public function checkAtte_end()
    {
        $user_id = session()->get('id');
        $today_end = Carbon::today()->format('Y-m-d');
        $check = Attendance::where('user_id',$user_id)->whereDate('end_attendance', $today_end)->latest()->first();
        return $check;
    }


    //当日の打刻がなければ勤怠開始
    public function startAttendance()
    {
        $user_id = session()->get('id');

        $today = Carbon::today()->format('Y-m-d');
        $checkAtte = $this -> checkAtte();

        //当日の勤怠を開始してるなら、勤怠開始ボタンを押すとエラー
        if ($today = $checkAtte) {
            return redirect()->back()->with('error', '勤務開始済みです');
        }

        //当日の打刻がなければ勤怠開始
        Attendance::create([
            'user_id' => $user_id,
            'start_attendance' => Carbon::now()->format('Y-m-d h:i:s'),
        ]);
    return redirect()->back()->with('start', '勤務開始しました');
    }



    public function endAttendance()
    {
        $today = Carbon::today()->format('Y-m-d');
        $check = $this->checkAtte_end();
        $checkAtte = $this -> checkAtte();

        //勤怠開始がなければエラー
        //最後の勤怠データに勤務終了データがなければ勤務終了
        //今日の勤怠を開始しているなら、勤怠終了ボタンで打刻
        if(is_null(($checkAtte))){
            return redirect()->back()->with('error', '勤務開始して下さい');
        }elseif($today = $check){
            return redirect()->back()->with('error', '勤務終了済です');
        }else{
            $checkAtte->update([
            'end_attendance' => Carbon::now()->format('Y-m-d h:i:s')
        ]);
            return redirect()->back()->with('end', '勤務終了');
    }




        

    }









}
