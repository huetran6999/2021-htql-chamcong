<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'u_name'=>'required',
            'u_gender'=>'required',
            'u_dob'=>'required',
            'u_pob'=>'required',
            'u_IDcode'=>'required|digits_between:9,12',
            'u_IDcodedate'=>'required',
            'u_IDcodeplace'=>'required',
            'u_nationality'=>'required',
            'u_ethnic'=>'required',
            'u_religion'=>'required',
            'u_phone'=>'required|numeric',
            'u_email'=>'required|email',
            're_name'=>'required',
            're_gender'=>'required',
            're_ship'=>'required',
            're_phone'=>'required|numeric',
            'u_household'=>'required',
            'u_adress'=>'required',
            're_address'=>'required',
            'l_name'=>'required',
            'l_major'=>'required',
            'l_grading'=>'required',
            'l_graduation_school'=>'required',
            'f_name'=>'required',
            'l_graduation_year'=>'required',
            'e_name'=>'required',
            'p_name'=>'required',
            'username'=>'required',
            'password'=>'required',
            'u_checkindate'=>'required',
            'u_status'=>'required',
            'd_name'=>'required',

        ];
    }

    public function messages()
    {
        return [
            'u_name.required'=>'Vui lòng nhập họ tên',
            'u_gender.required'=>'Vui lòng nhập giới tính',
            'u_dob.required'=>'Vui lòng nhập ngày sinh',
            'u_pob.required'=>'Vui lòng nhập nơi sinh',
            'u_IDcode.required'=>'Vui lòng nhập số CMND/CCCD',
            'u_IDcode.digits_between:9,12'=>'Số CMND/CCCD phải chứa 9-12 số',
            'u_IDcodedate.required'=>'Vui lòng nhập ngày cấp CMND/CCCD',
            'u_IDcodeplace.required'=>'Vui lòng nhập nơi cấp CMND/CCCD',
            'u_nationality.required'=>'Vui lòng nhập quốc tịch',
            'u_ethnic.required'=>'Vui lòng nhập dân tộc',
            'u_religion.required'=>'Vui lòng nhập tôn giáo',
            'u_phone.required'=>'Vui lòng nhập số điện thoại',
            'u_phone.numeric'=>'Số điện thoại phải là dạng số',
            'u_email.required'=>'Vui lòng nhập địa chỉ email',
            'u_email.email'=>'Vui lòng nhập dưới dạng email',
            're_name.required'=>'Vui lòng nhập họ tên người thân',
            're_gender.required'=>'Vui lòng chọn giới tính người thân',
            're_ship.required'=>'Vui lòng chọn quan hệ',
            're_phone.required'=>'Vui lòng nhập số điện thoại người thân',
            're_phone.numeric'=>'Số điện thoại phải là dạng số',
            'u_household.required'=>'Vui lòng nhập hộ khẩu thường trú',
            'u_adress.required'=>'Vui lòng nhập địa chỉ tạm trú',
            're_address.required'=>'Vui lòng nhập địa chỉ liên hệ',
            'l_name.required'=>'Vui lòng chọn trình độ học vấn',
            'l_major.required'=>'Vui lòng nhập ngành học',
            'l_grading.required'=>'Vui lòng chọn xếp loại',
            'l_graduation_school.required'=>'Vui lòng nhập nơi đào tạo',
            'f_name.required'=>'Vui lòng chọn trình độ ngoại ngữ',
            'l_graduation_year.required'=>'Vui lòng nhập năm tốt nghiệp',
            'e_name.required'=>'Vui lòng chọn tên đơn vị',
            'p_name.required'=>'Vui lòng chọn chức vụ',
            'username.required'=>'Vui lòng nhập tên đăng nhập',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'u_checkindate.required'=>'Vui lòng nhập ngày vào làm',
            'u_status.required'=>'Vui lòng chọn trạng thái hoạt động',
            'd_name.required'=>'Vui lòng chọn phòng ban',
        ];
    }
}
