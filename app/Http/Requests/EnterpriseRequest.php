<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnterpriseRequest extends FormRequest
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
            'e_name' => 'required',
            'e_address' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'e_name.required'=>'Vui lòng nhập tên đơn vị',
            'e_address.required'=>'Vui lòng nhập địa chỉ đơn vị'
        ];
    }
}
