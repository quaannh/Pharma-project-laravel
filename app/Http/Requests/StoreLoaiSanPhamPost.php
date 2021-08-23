<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PhpParser\Node\Expr\FuncCall;

class StoreLoaiSanPhamPost extends FormRequest
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
            'ten_loai' => 'required',
            'ghi_chu' => 'required',
            'hinh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'ten_loai.required' => 'Vui lòng nhập dữ liệu',
            'ghi_chu.required' => 'Vui lòng nhập dữ liệu',
            'hinh.required' => 'Chỉ chọn ảnh'
        ];
    }

    public function attributes()
    {
        return [
            'ten_loai' => 'Tên Loại',
            'ghi_chu' => 'Ghi Chú',
            'hinh' => 'Hình'
            
        ];
    } 
}
