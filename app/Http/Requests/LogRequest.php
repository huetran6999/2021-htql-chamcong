<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogRequest extends FormRequest
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
            'date'=>'required',
            'u_id'=>'required',
            'shift'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'date.required'=>'Vui lòng chọn ngày nghỉ phép',
            'u_id.required'=>'Vui lòng chọn nhân viên đăng ký nghỉ phép',
            'shift.required'=>'Vui lòng chọn ca nghỉ phép',
        ];
    }
}
