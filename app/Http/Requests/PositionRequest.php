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
            'lunch_fee'=>'required|numeric',
            'gas_fee'=>'required|numeric',
            'others'=>'numeric',
        ];
    }

    public function messages()
    {
        return [
            'p_name.required'=>'Vui lòng nhập tên cho chức vụ mới',
            'p_name.unique'=>'Tên chức vụ không được trùng',
            'role.required'=>'Vui lòng phân quyền cho chức vụ',
            'basic_salary.required'=>'Vui lòng nhập mức lương cơ bản',
            'basic_salary.numeric'=>'Lương cơ bản là một số',
            'e_name.required'=>'Vui lòng chọn đơn vị',
            'd_name.required'=>'Vui lòng chọn phòng ban',
            'coefficient_salary.required'=>'Vui lòng chọn hệ số lương cho chức vụ',
            'lunch_fee.required'=>'Vui lòng nhập số tiền ăn trưa',
            'lunch_fee.numeric'=>'Tiền ăn trưa là một số',
            'gas_fee.required'=>'Vui lòng nhập số tiền xăng xe',
            'gas_fee.numeric'=>'Tiền xăng xe là một số',
            'others.numeric'=>'Vui lòng nhậpdưới dạng số',
        ];
    }
}
