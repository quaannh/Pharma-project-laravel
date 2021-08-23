<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loai_san_pham;

class APILoaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Loai_san_pham::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loai_san_pham = Loai_san_pham::create($request->all());
        return response()->json($loai_san_pham, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loai_san_pham = Loai_san_pham::find($id);
        if (empty($loai_san_pham))
            return response()->json(array("Ma_loi" => -1, "Noi_dung" => "Loại sản phẩm không tồn tại", 200));
        else{
            return Loai_san_pham::find($id);
        }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $loai_san_pham_old = Loai_san_pham::find($id);
        if (empty($loai_san_pham_old))
            return response()->json(array("Ma_loi" => -1, "Noi_dung" => "Loại sản phẩm không tồn tại", 200));
        else {
            $loai_san_pham_old->update($request->all());
            return response()->json($loai_san_pham_old, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loai_san_pham = Loai_san_pham::find($id);
        if (empty($loai_san_pham))
            return response()->json(array("Ma_loi" => -1, "Noi_dung" => "Loại sản phẩm không tồn tại", 200));
        else {
            $xoa = $loai_san_pham->delete();
            return response()->json($xoa, 200);
        }
    }
}
