<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Loai_san_pham;
use App\Models\Y_kien_KH;
use App\Models\Thanh_vien;
use App\Http\Requests\StoreYKienKHPost;
use Session;

class LienHeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function create(Request  $request)
    {
        if (Session::has('id_thanh_vien')) {
            $id = Session::get('id_thanh_vien');
            $thanh_vien = Thanh_vien::where('id', $id)->first();
            return view('contact.create',['thanh_vien'=>$thanh_vien]);
        }else{
            return view('contact.create');
        }
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreYKienKHPost $request)
    {
        $validated = $request ->validated();
        $name_hinh='';
        $noi_dung_tra_loi='';
        if ( $request->hasFile('hinh')){
            if ($request->file('hinh')->isValid()){
                $file = $request->file('hinh');
                $name = $file->getClientOriginalName();
                $file->move('resources/pharma/hinh/hinh_y_kien' , $name);
                $name_hinh = $name;
            }
        }
        $form_feedback = new Y_kien_KH();
        $form_feedback->ho_ten_khach_hang = $request->ho_ten_khach_hang;
        $form_feedback->dia_chi = $request->dia_chi;
        $form_feedback->dien_thoai = $request->dien_thoai;
        $form_feedback->email = $request->email;
        $form_feedback-> noi_dung = $request->noi_dung;
        $form_feedback->hinh = $name_hinh;
        $form_feedback->noi_dung_tra_loi = " ";
        $form_feedback->trang_thai = 0;
        $form_feedback->muc_dich = $request->muc_dich;
        $result = $form_feedback ->save();
        
        if($result)
            return redirect('lien-he')->with('alert','Gửi Thành Công');
        else
            return redirect('lien-he')->with('alert','Gửi Không Thành Công');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
