<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rest;
use Carbon\Carbon;


class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    protected $fillable = [
        'user_id',
        'start_attendance',
        'end_attendance',
    ];
    protected $dates = [
        'start_attendance',
        'end_attendance',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rest()
    {
        return $this->hasMany(Rest::class);
    }

    //勤務開始時間取得->blade
    public function atteStartTime()
    {
        $atteStart = $this->start_attendance->format('H:i:s');
        return $atteStart;
    }

    //勤務終了時間取得->blade
    public function atteEndTime()
    {
        $atteEnd = $this->end_attendance;
        if($atteEnd!=null)
        $atteEnd = $atteEnd->format('H:i:s');
        return $atteEnd;
    }

    //休憩時間->秒
    public function totalRest()
    {
        //restsテーブルのデータ取得
        $rest = $this->rest;
        if(isset($rest)){
            //取得データをカウント
            $count = count($rest);
            //start,endを0にセット
            $startRestTotal=0;
            $endRestTotal = 0;
            for($i=0; $i<$count; $i++){
                if(isset($rest)){
                    $startRest=($rest[$i]->start_rest->format('H')*3600)+($rest[$i]->start_rest->format('i') * 60)+ ($rest[$i]->start_rest->format('s'));
                    $endRest = ($rest[$i]->end_rest->format('H') * 3600) + ($rest[$i]->end_rest->format('i') * 60) + ($rest[$i]->end_rest->format('s'));
                }
                $startRestTotal=$startRest+$startRestTotal;
                $endRestTotal = $endRest + $endRestTotal;

                return $totalRest =$endRestTotal - $startRestTotal;
            }
        }
    }

    //休憩時間を秒を（時:分:秒）に変更
    public function restTime(){

        $totalRest = $this->totalRest();

        $hours = floor($totalRest / 3600);
        $minutes = floor(($totalRest / 60) % 60);
        $seconds = floor($totalRest % 60);
        $totalRest = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
        return  $totalRest;
    }

    //勤務時間
    public function totalAtte()
    {
        //勤務休憩テータ取得
        $start_attendance = $this -> start_attendance;
        $end_attendance = $this -> end_attendance;;
        $totalRest = $this -> totalRest();

        //勤務開始と終了の差->秒
        $totalAtte = $start_attendance->diffInSeconds($end_attendance);
        //勤怠時間計算
        $Atte =$totalAtte - $totalRest;

        //秒を（時:分:秒）に変更
        $hours = floor($Atte / 3600);
        $minutes = floor(($Atte / 60) % 60);
        $seconds = floor($Atte % 60);
        $totalAtte = sprintf("%02d:%02d:%02d",$hours,$minutes,$seconds);
        return  $totalAtte;
    }

}
