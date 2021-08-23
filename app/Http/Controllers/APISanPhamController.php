<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\San_pham;

class APISanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return San_pham::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $san_pham = San_pham::create($request->all());
        return response()->json($san_pham, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $san_pham= San_pham::find($id);
        if (empty($san_pham)){
            return response()->json(array("Ma_loi" => -1, "Noi_dung" => "Sản phẩm không tồn tại", 200));
        }
        else{
            return San_pham::find($id);
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
        $san_pham_old = San_pham::find($id);
        if (empty($san_pham_old))
            return response()->json(array("Ma_loi" => -1, "Noi_dung" => "Sản phẩm không tồn tại", 200));
        else {
            $san_pham_old->update($request->all());
            return response()->json($san_pham_old, 200);
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
        $san_pham_old = San_pham::find($id);
        if (empty($san_pham_old))
            return response()->json(array("Ma_loi" => -1, "Noi_dung" => "Sản phẩm không tồn tại", 200));
        else {
            $xoa = $san_pham_old->delete();
            return response()->json($xoa, 200);
        }
    }
}
