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



    public function startRest()
    {
        $start_rest = $this->start_rest->format('H:i:s');
        return  $start_rest;
    }
    public function endRest()
    {
        $end_rest = $this->end_rest->format('H:i:s');
        return  $end_rest;
    }
}
