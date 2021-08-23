<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKhachHangPost extends FormRequest
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

            'ho_kh' => 'required|max:255',
            'ten_kh' => 'required|max:255',
            'dia_chi' => 'required|min:5|max:255',
            'dien_thoai' => 'required|numeric|digits:10',
            'email' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'ho_kh.required' => 'Vui lòng nhập Họ khách hàng',
            'ten_kh.required' => 'Vui lòng nhập Tên khách hàng',
            'dia_chi.required' => 'Vui lòng nhập Địa chỉ',
            'dia_chi.min' => 'Vui lòng nhập Địa chỉ rõ hơn',
            'dien_thoai.required' => 'Vui lòng nhập Điện thoại',
            'email.required' => 'Vui lòng nhập Email',
            'dien_thoai.numeric' => 'Số điện thoại là số',
            'dien_thoai.digits' => 'Vui lòng nhập Điện thoại 10 số',
        ];
    }
    public function attributes()
    {
        return [
            'ho_thanh_vien' => 'Họ là chữ',
            'ten_thanh_vien' => 'Tên là chữ',
            'dien_thoai' => 'Điện thoại là số',
        ];
    }
}
