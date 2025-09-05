<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required','string','max:255'],
            'email' => ['required','string','max:255','email','unique:users'],
            'password' => ['required','string','max:255']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'お名前を入力して下さい',
            'name.string' => 'お名前を文字列で入力してください',
            'name.max' => 'お名前は255文字以内で入力してください',
            'email.required' => 'メールアドレスを入力して下さい',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.max' => 'メールアドレスは255文字以内で入力してください',
            'email.email' => 'メールアドレスは「ユーザー名＠ドメイン」形式で入力してください',
            'email.unique' => '入力したメールアドレスはすでに登録されています',
            'password.required' => 'パスワードを入力してください',
            'password.string' => 'パスワードを文字列で入力してください',
            'password.max' =>'パスワードは255文字以内で入力してください'
        ];
    }
}
