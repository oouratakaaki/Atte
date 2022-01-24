<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\rest;
use Carbon\Carbon;
use Nette\Utils\DateTime;



class AttendanceController extends Controller
{
    public function pageAttendance(Request $request)
    {
        $days = Carbon::now()->format('Y-m-d');
        $y= new Carbon('yesterday');
        //$items = Attendance::where('start_attendance',$days)->get();
        //$items = User::all();
        //$atte1 = Attendance::where('start_attendance','2022-1-17 10:00:00')->select('start_attendance')->get();
        //var_dump($atte1);
        //$items = Attendance::all();
        $items = Attendance::whereDate('start_attendance', $days)->get();
        
        //$atte2 = Attendance::all;
        


        //$re = Attendance::find(1)->rests;
        //print($re);
        //dd($items);
        return view('Attendance',[
            'days'=>$days,
            'items'=>$items,
            //'re'=>$re
            //'ats'=>$ats,
            //'atte1'=>$atte1,
        ]);
    }
/*
    public function pageAttendance(Request $request)
    {
        $days = Carbon::now()->format('Y-m-d');
        
        $items = User::all();


        return view('Attendance', [
            'days' => $days,
            'items' => $items,
            //'ats'=>$ats,
            //'atte1'=>$atte1,
        ]);
    }

*/

}
