<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;
use Auth;


class AttendanceController extends Controller
{

    public function startAttendance()
    {

        return view('Attendance');
    }
    
    public function endAttendance()
    {
        return view('Attendance');
    }

    public function pageAttendance()
    {
        return view('Attendance');
    }

}
