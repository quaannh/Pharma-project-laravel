<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTinTucPost extends FormRequest
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
            'tieu_de' => 'required',
            'tom_tat' => 'required',
            'chi_tiet'=> 'required',
            'tac_gia' => 'required',
            'nhan_vien'=> 'required',
            'hinh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ];
    }
    public function messages()
    {
        return [
            'tieu_de.required' => 'Vui lòng nhập dữ liệu',
            'tom_tat.required' => 'Vui lòng nhập dữ liệu',
            'chi_tiet.required' => 'Vui lòng nhập dữ liệu',
            'tac_gia.required' => 'Vui lòng nhập dữ liệu',
            'nhan_vien.required' => 'Vui lòng nhập dữ liệu',
            'hinh.required' => 'Chỉ chọn ảnh'
        ];
    }
    
}
