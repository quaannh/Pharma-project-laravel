<?php

namespace App\Http\Controllers;
use App\Models\Loai_san_pham;
use App\Models\San_pham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreLoaiSanPhamPost;

class LoaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dslsp = Loai_san_pham::where('trang_thai',1) -> get();
        return view('catelogy.index', ['dslsp' => $dslsp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {   $dslsp = Loai_san_pham::where('trang_thai', 1)->get();
        $arrId = explode('-', $id);
        $id = $arrId[count($arrId) - 1];
        $loaisanpham =Loai_san_pham::where('id', $id)->first();
        $sanpham = San_pham::where('ma_loai', $id)->paginate(12);
        return view('catelogy.show', ['loaisanpham' => $loaisanpham ,'dslsp' => $dslsp, 'sanpham' => $sanpham]);
    }
}
