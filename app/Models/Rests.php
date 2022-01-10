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

    public function attendance()
    {
        $this->belongsTo(attendance::class);
    }
}
