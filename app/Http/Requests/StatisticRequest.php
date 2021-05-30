<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatisticRequest extends FormRequest
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
            'date_from' => 'required|before:txtEnd',
            'date_to' => 'required|after:txtBegin',
        ];
    }

    public function messages()
    {
        return [
            'date_from.required' => __('Bạn chưa nhập ngày bắt đầu.'),
            'date_to.required' => __('Bạn chưa nhập ngày kết thúc.'),  
            'date_from.before' => __('Bạn phải nhập ngày bắt đầu trước ngày kết thúc.'),
            'date_to.after' => __('Bạn phải nhập ngày kết thúc sau ngày bắt đầu.'),  
        ];
    }
}
