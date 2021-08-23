<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTinTucPost;
use App\Models\Loai_san_pham;
use App\Models\Tin_tuc;
use App\Models\Video_truyen_thong;



class TinTucController extends Controller
{

    public function index()
    {  
        $coupon = DB::table('coupon')->where('trang_thai',1)->orderBy('han_su_dung')->get();
        $video = Video_truyen_thong::get();
        $tin_tuc = Tin_tuc::where('trang_thai', 1)->paginate(10);
        return view('news.index', ['tin_tuc' => $tin_tuc, 'video' => $video ,'coupon'=>$coupon]);
    }
    
    public function show($id)
    {
       
        $tin_tuc = Tin_tuc::where('id', $id)->first();
        return view('news.show',['tin_tuc' => $tin_tuc ]);
        
    }

}
