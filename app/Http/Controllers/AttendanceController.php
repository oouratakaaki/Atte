<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function pageAttendance(Request $request)
    {
        //パラメータの日付を取得
        $nowdate = $request->input('day');

        //日付ボタンの処理
        if($request->has('back')){
            if($request->has('page')){
                $day = $request->input('day');
            }else{
            $day = date("Y-m-d", strtotime($nowdate . "-1 day"));
            }
        }elseif ($request->has('next')){
            $day = date("Y-m-d", strtotime($nowdate . "+1 day"));
        }else{
        $day = Carbon::today()->format('Y-m-d');
        }

        //表示するデータの取得
        $items = Attendance::whereDate('start_attendance',$day)->with('user')->with('rest')->Paginate(5);

        return view('Attendance', compact('day', 'items'), [
            'pagenate_params' => [
                'day' => $day,
                'back'=>'<',
            ],
        ]);
    }


}
