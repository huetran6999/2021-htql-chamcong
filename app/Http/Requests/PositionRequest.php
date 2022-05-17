<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
            'p_name'=>'required|unique:position,p_name',
            'role'=>'required',
            'basic_salary'=>'required|numeric',
            'e_name'=>'required',
            'd_name'=>'required',
            'coefficient_salary'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'p_name.unique'=>'Tên chức vụ không được trùng',
            'role.required'=>'Vui lòng phân quyền cho chức vụ',
            'basic_salary.required'=>'Vui lòng nhập mức lương cơ bản',
            'basic_salary.numeric'=>'Lương cơ bản là một số',
            'e_name.required'=>'Vui lòng chọn đơn vị',
            'd_name.required'=>'Vui lòng chọn phòng ban',
            'coefficient_salary.required'=>'Vui lòng chọn hệ số lương cho chức vụ',
        ];
    }
}
