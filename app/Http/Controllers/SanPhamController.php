<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSanPhamPost;
use App\Models\Slider;
use App\Models\San_pham;
use App\Models\Loai_san_pham;
use App\Models\SP_trong_kho;
use App\Models\Y_kien_KH;
use App\Models\Thanh_vien;
use Session;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function test1(Request  $request)
    {

        return view('test');
    }



    public function welcome()
    {
        return redirect('/trang-chu');
    }
    public function aboutme()
    {
        return view('welcome');
    }
    public function home(Request  $request)
    {

        $user = "Guest";
        $visit  = array([
            'User' => $user,
            'Time' => date('Y-m-d H:i:s'),
        ]);
        
        if (!Session::has('visit')) {
           $request->session()->put('visit', $user);
            DB::table('ghi_log')->insert($visit);
        }

        if (Session::has('id_thanh_vien')) {
            $id = Session::get('id_thanh_vien');
            $thanh_vien = Thanh_vien::where('id', $id)->first();
            $ma_thanh_vien =  $thanh_vien->ma_thanh_vien;
            $visit_member  = array([
                'User' => $ma_thanh_vien,
                'Time' => date('Y-m-d H:i:s'),
            ]);
            
            if (!Session::has('visit_member')) {
               $request->session()->put('visit_member', $ma_thanh_vien);
                DB::table('ghi_log')->insert($visit_member);
            }
        }

        $slider = Slider::where('trang_thai', 1)->get();
        $dssp = San_pham::where('giam_gia', '>', 0)->orderby('giam_gia')->get();
        $feedback = Y_kien_KH::where('muc_dich','ý kiến')->get();
        $TopBuy = DB::table('hang_trong_kho')
            ->join('san_pham', 'san_pham.id', '=', 'hang_trong_kho.ma_san_pham')
            ->select('hang_trong_kho.*', 'san_pham.*')
            ->orderby('sl_da_ban', 'DESC')
            ->take(3)
            ->get();
        return view('home.index', [
            'slider' => $slider, 'dssp' => $dssp, 'feedback' => $feedback, 'TopBuy' => $TopBuy
        ]);
    }


    public function index()
    {
        $loai = Loai_san_pham::get();
        $dssp = San_pham::orderBy('id')->paginate(12);
        return view('product.index', ['loai' => $loai, 'dssp' => $dssp]);
    }

    public function search(Request $request)
    {

        $gia_tri_tim = $request->input('gia_tri_tim');
        $tim_sp = San_pham::where('ten_san_pham', 'like', "%$gia_tri_tim%")->orwhere('mo_ta_tom_tat', 'like', "%$gia_tri_tim%")->orwhere('chi_tiet', 'like', "%$gia_tri_tim%")->get();
        return view('product.results', ['tim_sp' => $tim_sp]);
    }


    public function show($id)
    {
        

        $arrId = explode('-', $id);
        $id = $arrId[count($arrId) - 1];
        $sanpham = San_pham::where('id', $id)->first();
      
        $sanphamlienquan = San_pham::where('id', '!=', $id)->where('ma_loai', $sanpham->ma_loai)->get();
        $today = date('Y-m-d');
        $so_luong_kha_dung = DB::table('hang_trong_kho')
        ->where('ma_san_pham',$id)
        ->where('han_su_dung','>',$today)
        ->select(DB::raw('sum(`sl_trong_kho`) as so_luong'))
        ->first();
        
       // echo "<pre>";print_r($so_luong_kha_dung);  die;
        return view('product.show', ['sanpham' => $sanpham, 'sanphamlienquan' => $sanphamlienquan, 'so_luong_kha_dung' => $so_luong_kha_dung ]);
    }
}
