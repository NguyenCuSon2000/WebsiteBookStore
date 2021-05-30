<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
            'txtPer' => 'required|integer',
            'txtBegin' => 'required|before:txtEnd',
            'txtEnd' => 'required|after:txtBegin',
        ];
    }

    public function messages()
    {
        return [
            'txtPer.required' => __('Bạn chưa nhập phần trăm khuyến mại.'),
            'txtBegin.required' => __('Bạn chưa nhập ngày bắt đầu.'),
            'txtEnd.required' => __('Bạn chưa nhập ngày kết thúc.'),  
            'txtPer.integer' => __('Bạn nhập phần trăm khuyến mại chưa đúng định dạng.'),
            'txtBegin.before' => __('Bạn phải nhập ngày bắt đầu trước ngày kết thúc.'),
            'txtEnd.after' => __('Bạn phải nhập ngày kết thúc sau ngày bắt đầu.'),  
        ];
    }
}
