<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
    public function rules() {

        return [
            //
            'txtName' => 'required|min:5',
            'txtdes' => 'required|min:10'
        ];
    }
    public function messages()
    {
        return [
            'txtName.required' => __('Bạn chưa nhập tên loại sách.'),
            'txtdes.required' => __('Bạn chưa nhập mô tả.'),
            'txtName.min' => __('Tên loại sách phải hơn 5 ký tự.'),
            'txtdes.min' => __('Mô tả phải hơn 10 ký tự.')
        ];
    }
}
