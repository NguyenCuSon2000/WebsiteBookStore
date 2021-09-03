<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthLogin extends FormRequest
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
            'username' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],

        ];
    }

    public function messages()
    {
        return [
            'username.email' => __('Nhập tài khoản không hợp lệ.'),
            'password.min' => __('Mật khẩu phải hơn 8 ký tự.'),
        ];
    }
}
