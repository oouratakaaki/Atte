<?php

namespace App\Http\Controllers;


use App\Http\Requests\RegistrRequest;
use App\Models\user;
use Illuminate\Support\Facades\Hash;






class RegisterUserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    //会員登録
    public function registUser(RegistrRequest $request)
    {
        $regist = new user();
        $regist ->fill(array_merge($request->all(), ['email','password' => Hash::make($request->password)]));
        $regist -> save();


            return redirect('/login');

}
}