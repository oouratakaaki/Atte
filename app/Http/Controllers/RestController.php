<?php

namespace App\Http\Controllers;

use App\Models\Rest;
use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Support\Arr;

class RestController extends Controller
{
    //attendance_id取得
    public function atte_id()
    {
        [$keys, $values] = Arr::divide(Attendance::where('user_id', session()->get('id'))->latest()->first()->toArray());

        $atte_id = $values[0];

        return $atte_id;
    }

    //end_restのNULLを取得
    public function endRestCheck()
    {
        $atte_id = $this->atte_id();
        $endRestCheck = Rest::where('attendance_id', $atte_id)->latest()->whereNull('end_rest')->first();
        return $endRestCheck;
    }

    //休憩開始
    public function startRest()
    {
        //attendance_id取得
        $atte_id = $this -> atte_id();

        Rest::create([
                'attendance_id' => $atte_id,
                'start_rest' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        return redirect()->back();
    }

    //休憩終了
    public function endRest()
    {
        //attendance_id取得
        $atte_id = $this->atte_id();

        Rest::where('attendance_id',$atte_id)->whereNull('end_rest')->update(['end_rest' => Carbon::now()->format('Y-m-d H:i:s')]);

        return redirect()->back();
    }
}
