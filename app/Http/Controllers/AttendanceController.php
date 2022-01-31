<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;
use Nette\Utils\DateTime;


class AttendanceController extends Controller
{

    public function pageAttendance(Request $request)
    {
        //dump($request);
        $nowdate = $request->input('day');
        //print($nowdate);
        if($request->has('back')){
            $day = date("Y-m-d", strtotime($nowdate . "-1 day"));
        }elseif ($request->has('next')){
            $day = date("Y-m-d", strtotime($nowdate . "+1 day"));
        }else{
        $day = Carbon::today()->format('Y-m-d');
        }

        $items = Attendance::whereDate('start_attendance',$day)->with('user')->with('rest')->Paginate(5);

        return view('Attendance', compact('day', 'items'));

    }


}
