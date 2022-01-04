<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rests extends Model
{
    use HasFactory;

    protected $table = 'rests';

    protected $fillable = [
        'start_rest',
        'end_rest',
    ];

    public function attendance()
    {
        $this->belongsTo(attendance::class);
    }
}
