<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestController extends Controller
{
    public function startRest()
    {
        return view('startRest');
    }

    public function endRest()
    {
        return view('endRest');
    }
}
