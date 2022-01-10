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

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function rest()
    {
        return $this->hasMany(rest::class);
    }

}
