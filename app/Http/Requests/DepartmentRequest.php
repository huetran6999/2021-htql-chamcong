<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'e_id' => 'required|numeric',
            'd_name' => 'required',
            'd_phone' => 'numeric',
        ];
    }

    public function messages()
    {
        return [
            'e_id.required'=>'Vui lòng chọn đơn vị',
            'd_name.required'=>'Vui lòng nhập tên phòng ban mới',
            'd_phone.numeric'=>'Số điện thoại phải là một số'
        ];
        
    }
}
