<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewRequest extends FormRequest
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
            'txtContent' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'txtName.required' => __('Bạn chưa nhập tên loại sách.'),
            'txtDes.required' => __('Bạn chưa nhập mô tả.'),
            'txtContent.required' => __('Bạn chưa nhập nội dung.'),  
            'txtName.min' => __('Tên loại sách phải hơn 5 ký tự.'),
            'txtDes.min' => __('Mô tả phải hơn 10 ký tự.'),
            'txtContent.min' => __('Nội dung phải hơn 10 ký tự.'),
        ];
    }
}
