<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;


class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function startAttendance(Request $request)
    {




        $user = Auth::user();

        /**
         * 打刻は1日一回までにしたい
         */
        $oldTimestamp = Attendance::where('user_id', $user->id)->latest()->first();
        if ($oldTimestamp) {
            $oldTimestamp = new Carbon($oldTimestamp->start_attendance);
            $oldTimestampDay = $oldTimestamp->startOfDay();
        }

        $newTimestampDay = Carbon::today();

        /**
         * 日付を比較する。同日付の出勤打刻で、かつ直前のTimestampの退勤打刻がされていない場合エラーを吐き出す。
         */
        if (($oldTimestampDay == $newTimestampDay) && (empty($oldTimestamp->end_attendance))) {
            return redirect()->back();
        }

        $timestamp = Attendance::create([
            'user_id' => $user->id,
            'start_attendance' => Carbon::now(),
        ]);

        return redirect()->back();
    }
    
    








}
