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
            'p_name'=>'unique:position,p_name',
            'role'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'p_name.unique'=>'Tên chức vụ không được trùng',
            'role.required'=>'Vui lòng phân quyền cho chức vụ',
        ];
    }
}
