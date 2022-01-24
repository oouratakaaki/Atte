<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'start_rest',
        'end_rest',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rests()
    {
        return $this->hasMany(Rest::class);
    }

    /*
    public function getTitle()
    {
        return  optional($this->user)->name;
    }
    */
    public function atteStart()
    {
        return  $this->start_attendance;
    }
    public function atteStartTime()
    {
        $atteStart = $this->start_attendance->format('H:i:s');
        return $atteStart;
    }

    public function atteEnd()
    {
        return  $this->end_attendance;
    }
    public function atteEndTime()
    {
        $atteEnd = $this->end_attendance->format('H:i:s');
        return $atteEnd;
    }

    public function getAtte()
    {
        $start_attendance = $this -> atteStart();
        $end_attendance = $this -> atteEnd();
        //勤務時間の差->秒
        $Atte = $start_attendance ->diffInSeconds($end_attendance);
        //秒->時:分:秒に変更
        $hours = floor($Atte / 3600); //時間
        $minutes = floor(($Atte / 60) % 60); //分
        $seconds = floor($Atte % 60); //秒
        $hms = sprintf("%2d:%02d:%02d",$hours,$minutes,$seconds);
        return  $hms;
    }



/*
    public function totalRest()
    {
        $start = optional($this->rest)->start_rest;
        $end = optional($this->rest)->end_rest;

        //$rest = $start ->diffInSeconds($end);
        /*
        $hours = floor($rest / 3600); //時間
        $minutes = floor(($rest / 60) % 60); //分
        $seconds = floor($rest % 60); //秒
        $hms = sprintf("%2d:%02d:%02d", $hours, $minutes, $seconds);
        
        return  $start;//$end;
        
    }*/
    
}
