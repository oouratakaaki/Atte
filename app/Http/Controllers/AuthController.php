<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\User;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }



    /**
     * @param App\Http\Requests\LoginFormRequest
     */
    /**
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
    */
    /**
     * 認証の試行を処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();


            return redirect('/');
        }

        return back();
    }



    public function logout(Request $request)
    {
        //session()->flash('name');
        //session()->flash('email');
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}