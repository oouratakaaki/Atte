<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class RegistrRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->path() === 'register'){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return[
        //お名前
        'name' => 'required|alpha|string',
        //メールアドレス
        'email' => 'required|email|unique:users',
        //パスワード
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.alpha' => '文字を入力してください',
            'email.email'  => 'メールアドレスとして正しい形式ではありません',
            'email.required'  => 'メールアドレスを入力してください',
            'email.unique'  => '登録済みのメールアドレスです',
            'login_email.required' => 'メールアドレスを入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは８文字以上で入力してください',
            'password.confirmed' => 'パスワードが異なります',
            'password_confirmation.required' => '確認用パスワードを入力してください',
            'login_password.required'=> 'パスワードを入力してください'
        ];
    }
}
