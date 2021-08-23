<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreYKienKHPost extends FormRequest
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
            'ho_ten_khach_hang' => 'required|max:255',
            'dia_chi' => 'required|min:5|max:255',
            'dien_thoai' => 'required|numeric|digits:10',
            'email' => 'required',
            'noi_dung'=>'required',
            //'hinh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages(){
        return [
            'ho_ten_khach_hang.required' => 'Vui lòng nhập Họ tên khách hàng',
            //'ho_ten_khach_hang.alpha' => 'Họ tên khách hàng là chữ',
            'dia_chi.required' => 'Vui lòng nhập Địa chỉ',
            'dia_chi.min' => 'Vui lòng nhập Địa chỉ rõ hơn',
            'dien_thoai.required' => 'Vui lòng nhập Điện thoại',
            'dien_thoai.numeric' => 'Số điện thoại là số',
            'dien_thoai.digits' => 'Vui lòng nhập Điện thoại 10 số',
            'email.required' => 'Vui lòng nhập Email',
            'noi_dung.required'=>'Vui lòng nhập dữ liệu',
            //'hinh.required'=>'Vui lòng chọn file ảnh',
            //'hinh.image'=>'Chỉ chọn hình ảnh'
        ];
    }
}
