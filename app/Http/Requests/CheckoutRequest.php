<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            //
            'txtName' => 'required|regex:/^[a-zA-Z]+$/',
            'txtPhone' => 'required|regex:/^0[0-9]{8}$/',
            'txtEmail' => 'required|email',
            'txtad' => 'required|min:5|max:100',
           
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'txtName.required' => __('Bạn chưa nhập tên khách hàng.'),
    //         'txtPhone.required' => __('Bạn chưa nhập số điện thoại.'),
    //         'txtPhone.regex' => __('Bạn nhập số điện thoại không hợp lệ.'),
    //         'txtName.regex' => __('Bạn nhập tên không hợp lệ.'),
    //         'txtEmail.required' => __('Bạn chưa nhập email.'),
    //         'txtEmail.email' => __('Bạn nhập email không hợp lệ.'),
    //         'txtad.required' => __('Bạn chưa nhập địa chỉ nhận.'),
    //         'txtad.min' => __('Vui lòng nhập địa chỉ hơn 5 ký tự.'),
    //         'txtad.max' => __('Vui lòng nhập địa chỉ nhỏ hơn 100 ký tự.'),
            
    //     ];
    // }
}
