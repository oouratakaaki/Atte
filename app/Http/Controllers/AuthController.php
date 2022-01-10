<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;




class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }



    /**
     * @param App\Http\Requests\LoginRequest
     */

    public function loginUser(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->get();
        if (count($user) === 0) {
            return view('login');
        }

        // 一致
        if (Hash::check($request->password, $user[0]->password)) {

            session(['id'  => $user[0]->id]);
            session(['name'  => $user[0]->name]);
            session(['email' => $user[0]->email]);
            return redirect('/');
        } else {
            return view('login');
        }
    }



    public function logout()
    {
        session()->flash('id');
        session()->flash('name');
        session()->flash('email');
        


        return redirect('login');
    }
}