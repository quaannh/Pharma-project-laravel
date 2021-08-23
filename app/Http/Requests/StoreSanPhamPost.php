<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PhpParser\Node\Expr\FuncCall;

class StoreSanPhamPost extends FormRequest
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
            'ten_san_pham'=>'required',
            'mo_ta_tom_tat'=>'required',
            'hinh_san_pham' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gia_san_pham'=>'required',
            'don_vi'=>'required',
            'nguon_goc'=>'required'

        ];
    }
    public function messages()
    {
        return [
            'ten_san_pham.required' => 'Vui lòng nhập dữ liệu',
            'mo_ta_tom_tat.required' => 'Vui lòng nhập dữ liệu',
            'hinh_san_pham.required' => 'Chỉ chọn ảnh',
            'gia_san_pham.required' => 'Vui lòng nhập dữ liệu',
            'don_vi.required' => 'Vui lòng nhập dữ liệu',
            'nguon_goc.required' => 'Vui lòng nhập dữ liệu'
        ];
    }

    public function attributes()
    {
        return [
            'ten_san_pham' => 'Tên Sản Phẩm',
            'mo_ta_tom_tat' => 'Mô tả tóm tắt',
            'hinh_san_pham' => 'Hình',
            'gia_san_pham' => 'Giá Sản Phẩm',
            'don_vi'=>'Đơn Vị Tính',
            'nguon_goc'=>'Nguồn Gốc'

        ];
        
    }

}
