<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'txtName' => 'required|min:5',
            'txtDes' => 'required|min:10',
            'txtprice' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'txtName.required' => __('Bạn chưa nhập tên sách.'),
            'txtDes.required' => __('Bạn chưa nhập mô tả.'),
            'txtprice.required' => __('Bạn chưa nhập giá.'),
            'txtName.min' => __('Tên sách phải hơn 5 ký tự.'),
            'txtDes.min' => __('Mô tả phải hơn 10 ký tự.'),
            'txtprice.integer' => __('Bạn nhập giá không hợp lệ.')
        ];
    }
}
