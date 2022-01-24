<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;

    protected $table = 'rests';

    protected $fillable = [
        'attendance_id',
        'start_rest',
        'end_rest',
    ];
    protected $dates = [
        'start_rest',
        'end_rest',
    ];
    /*
    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
*/
    public function startRest()
    {
        return $this->start_rest;
    }
    public function endRest()
    {
        return $this->end_rest;
    }
    public function Rest()
    {
        $start_rest = $this->startRest();
        $end_rest = $this->endRest();

        $rest = $end_rest ->diffInSeconds($start_rest);
        $hours = floor($rest / 3600); //時間
        $minutes = floor(($rest / 60) % 60); //分
        $seconds = floor($rest % 60); //秒
        $hms = sprintf("%2d:%02d:%02d", $hours, $minutes, $seconds);
        return $hms;
    }
}
