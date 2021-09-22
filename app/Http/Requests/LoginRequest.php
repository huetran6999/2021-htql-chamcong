<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username'=>'required|min:5',
            'password'=>'required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'Vui lòng nhập tên người dùng.',
            'username.min'=>'Tên người dùng phải chứa trên 5 ký tự.',
            'password.required'=>'Vui lòng nhập mật khẩu.',
            'password.min'=>'Mật khẩu phải chứa trên 6 ký tự.'
        ];
    }
}
