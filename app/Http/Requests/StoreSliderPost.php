<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PhpParser\Node\Expr\FuncCall;

class StoreSliderPost extends FormRequest
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
            'ten_slider' => 'required',
            'tieu_de' => 'required',
            'noi_dung' => 'required',
            'url' => 'required',
            'hinh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'ten_slider.required' => 'Vui lòng nhập dữ liệu',
            'tieu_de.required' => 'Vui lòng nhập dữ liệu',
            'noi_dung.required' => 'Vui lòng nhập dữ liệu',
            'url.required' => 'Vui lòng nhập dữ liệu',
            'hinh.required' => 'Chỉ chọn ảnh'
        ];
    }

    public function attributes()
    {
        return [
            'ten_slider' => 'Tên Slider',
            'tieu_de' => 'Tiêu Đề',
            'noi_dung' => 'Nộ Dung',
            'url' => 'URL',
            'hinh' => 'Hình'
            
        ];
    } 
}
