<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\San_pham;
use App\Models\Khach_hang;
use App\Models\Loai_san_pham;
use App\Models\Hoa_don;
use App\Models\Ct_hoa_don;
use App\Models\Coupon;
use App\Models\Thanh_vien;
use App\Models\SP_trong_kho;
use App\Http\Requests\StoreKhachHangPost;
use Cart;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailHoaDon;

class KhachHangController extends Controller
{

    public function NhapCoupon(Request $request)
    {
        $data = $request->all();
        //echo "<pre>";print_r($data);  die;



        $check = Coupon::where('ma_code', $data['code'])->count();
        if ($check == 0) {
            return redirect()->back()->with('alert', 'Code Không Có Giá Trị');
        } else {

            $coupon_detail = Coupon::where('ma_code', $data['code'])->first();

            // check trạng thái
            if ($coupon_detail->trang_thai == 0) {
                return redirect()->back()->with('alert', 'Code Chưa Active');
            }
            // check date
            $han_su_dung =  $coupon_detail->han_su_dung;
            $ngay_hien_tai = date('Y-m-d');
            if ($han_su_dung < $ngay_hien_tai) {
                return redirect()->back()->with('alert', 'Code Hết Hạn Sử Dụng');
            }
            //

            $pham_vi_ap_dung =  $coupon_detail->pham_vi_ap_dung;
            if (Session::has('id_thanh_vien')) {
                $id_thanh_vien = Session::get('id_thanh_vien');
                $thanh_vien = Thanh_vien::where('id', $id_thanh_vien)->first();
                $ma_thanh_vien = $thanh_vien->ma_thanh_vien;
                //$dien_thoai = $thanh_vien->dien_thoai;
                $check_da_ap_dung = DB::table('hoa_don')
                    ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_ma_kh')
                    ->where('khach_hang.thanh_vien', $ma_thanh_vien)
                    ->where('hoa_don.ma_coupon', $data['code'])
                    ->count();

                //echo "<pre>";print_r($check_da_ap_dung);  die;

                if ($check_da_ap_dung > 0) {
                    return redirect()->back()->with('alert', 'Bạn đã áp dụng code với đơn hàng trước đó');
                } else {

                    $hang_thanh_vien = $thanh_vien->hang_thanh_vien;
                    if ($pham_vi_ap_dung != $hang_thanh_vien) {
                        return redirect()->back()->with('alert', 'Code Không Có Giá Trị');
                    }
                    //echo "<pre>";print_r($pham_vi_ap_dung);  die;
                }
            } else {
                if ($pham_vi_ap_dung != "KHÁCH") {
                    return redirect()->back()->with('alert', 'Code Không Có Giá Trị');
                }
            }
            
            //giá trị
            $subtotal = Cart::subtotal();
            $subtotal_re = str_replace(',', '', $subtotal);
            settype($subtotal_re, 'float');
            if ($coupon_detail->loai_code == "số tiền cố định")
                $gia_tri_coupon = $coupon_detail->gia_tri;
            else {
                $gia_tri_coupon = $subtotal_re * ($coupon_detail->gia_tri) / 100;
            }

            // tạo session giảm giá discount
            $total = $subtotal_re - $gia_tri_coupon;
            $request->session()->put('ma_code', $coupon_detail->ma_code);
            $request->session()->put('gia_tri_coupon', $gia_tri_coupon);
            $request->session()->put('total', $total);
            return redirect('/khach-hang/tien-hanh-dat-hang')->with('alert', 'Nhập Code thành công');
        }
    }
    public function XoaCoupon(Request $request)
    {

        $request->session()->forget('ma_code');
        $request->session()->forget('gia_tri_coupon');

        return redirect('/khach-hang/tien-hanh-dat-hang');
    }

    public function ThemGioHang(Request $request, $id)
    {

        $sl = $request->sl;

        $today = date('Y-m-d');
        $so_luong_kha_dung = DB::table('hang_trong_kho')
            ->where('ma_san_pham', $id)
            ->where('han_su_dung', '>', $today)
            ->select(DB::raw('sum(`sl_trong_kho`) as so_luong'))
            ->first();
        $so_luong_check = $so_luong_kha_dung->so_luong;
        if ($sl >  $so_luong_check)
            return json_encode(array('n' => 0));
        else {
            $sanpham = San_pham::where('id', $id)->first();
            if ($sanpham == null)
                return json_encode(array('n' => 0));
            else {
                if ($sanpham->giam_gia > 0) {
                    Cart::add($sanpham->id, $sanpham->ten_san_pham, $sl, $sanpham->giam_gia, ['hinh_san_pham' => $sanpham->hinh_san_pham, 'don_vi' => $sanpham->don_vi]);
                } else {
                    Cart::add($sanpham->id, $sanpham->ten_san_pham, $sl, $sanpham->gia_san_pham, ['hinh_san_pham' => $sanpham->hinh_san_pham, 'don_vi' => $sanpham->don_vi]);
                }
                return json_encode(array('n' => 1));
            }
        }
    }

    public function XemGioHang(Request $request)
    {


        return view('customer.cart');
    }

    public function CapNhatGioHang(Request $request)
    {
        $rowID = $request->Th_rowID;
        $soLuong = $request->Th_soluong * 1;

        foreach (Cart::content() as $row) {
            $ma_san_pham =  $row->id;
        }
        $today = date('Y-m-d');
        $so_luong_kha_dung = DB::table('hang_trong_kho')
            ->where('ma_san_pham', $ma_san_pham)
            ->where('han_su_dung', '>', $today)
            ->select(DB::raw('sum(`sl_trong_kho`) as so_luong'))
            ->first();
        $so_luong_check = $so_luong_kha_dung->so_luong;
        if ($so_luong_check > $soLuong) {
            Cart::update($rowID, $soLuong);
            return redirect('khach-hang/gio-hang');
        } else {
            return redirect()->back()->with('alert', 'Số lượng tạm thời không đủ cung cấp');
        }
    }

    public function XoaMatHang(Request $request, $id)
    {
        if (Session::has('ma_code')) {
            if (Cart::count() == 0) {
                $request->session()->forget('ma_code');
                $request->session()->forget('gia_tri_coupon');
            }
        }
        Cart::remove($id);
        return redirect()->back();
    }
    public function TienHanhDatHang()
    {

        if (Session::has('id_thanh_vien')) {
            $id = Session::get('id_thanh_vien');
            $thanh_vien = Thanh_vien::where('id', $id)->first();
            return view('customer.ordermember', ['thanh_vien' => $thanh_vien]);
        } else {
            return view('customer.order');
        }
    }

    public function storeTienHanhDatHang(StoreKhachHangPost $request)
    {
        $validated = $request->validated();

        $data = $request->all();

        //create coupon
        if (Session::has('gia_tri_coupon')) {
            if (!Session::has('id_thanh_vien')) {
                $ma_coupon = Session::get('ma_code');
                $check_da_ap_dung = DB::table('hoa_don')
                    ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_ma_kh')
                    ->where('khach_hang.dien_thoai', $data['dien_thoai'])
                    ->orwhere('khach_hang.email', $data['email'])
                    ->where('hoa_don.ma_coupon', $ma_coupon)
                    ->count();
                if ($check_da_ap_dung > 0) {
                    return redirect()->back()->with('alert', 'Bạn đã áp dụng code với đơn hàng có số điện thoại hoặc email trước đó');
                }
            }
            $gia_tri_coupon = Session::get('gia_tri_coupon');
            $total = Session::get('total');
            $ma_coupon = Session::get('ma_code');
        } else {
            $gia_tri_coupon = 0;
            $total = Cart::total();
            $ma_coupon = '0';
        }
        //
        if (Session::has('id_thanh_vien')) {
            $id = Session::get('id_thanh_vien');
            $thanh_vien = Thanh_vien::where('id', $id)->first();
            $ma_thanh_vien = $thanh_vien->ma_thanh_vien;
            $hang_thanh_vien = $thanh_vien->hang_thanh_vien;
            if ($hang_thanh_vien == "ĐỒNG") {
                $giam_voi_thanh_vien = 3;
            }
            if ($hang_thanh_vien == "BẠC") {
                $giam_voi_thanh_vien = 5;
            }
            if ($hang_thanh_vien == "VÀNG") {
                $giam_voi_thanh_vien = 10;
            }
            if ($hang_thanh_vien == "KIM CƯƠNG") {
                $giam_voi_thanh_vien = 15;
            }
            //giá trị

            $total_re = str_replace(',', '', $total);
            settype($total_re, 'float');
            $total_thanh_vien = $total_re - $total_re * $giam_voi_thanh_vien / 100;
            $total = $total_thanh_vien;
        } else {
            $ma_thanh_vien = '0';
            $giam_voi_thanh_vien = '0';
        }
        $idkh = Khach_hang::insertGetId(
            ['ho_kh' => $request->ho_kh, 'ten_kh' => $request->ten_kh, 'dia_chi' => $request->dia_chi, 'dien_thoai' => $request->dien_thoai, 'email' => $request->email, 'dien_thoai' => $request->dien_thoai, 'thanh_vien' => $ma_thanh_vien, 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')]
        );

        $idhd = Hoa_don::insertGetId(
            ['ngay_hoa_don' => date('Y-m-d H:m:s'), 'id_ma_kh' => $idkh, 'tong_tien' => str_replace(',', '', Cart::subtotal()), 'nhap_coupon' =>  $gia_tri_coupon, 'ma_coupon' =>  $ma_coupon, 'uu_dai_thanh_vien' =>  $giam_voi_thanh_vien, 'con_lai' => str_replace(',', '',  $total), 'trang_thai' => 0, 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')]
        );

        $dsMH = array();
        foreach (Cart::content() as $row) {
            $dsMH[] = array('id_sohd' => $idhd, 'ma_san_pham' => $row->id, 'so_luong' => $row->qty, 'don_vi' => $row->options->don_vi, 'don_gia' => $row->price, 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'));
        }
        Ct_hoa_don::insert($dsMH);
        Cart::destroy();
        $request->session()->forget('ma_code');
        $request->session()->forget('gia_tri_coupon');
        $request->session()->forget('total');
        return redirect('khach-hang/don-dat-hang/' . $idhd);
    }
    public function DonDatHang($id)
    {

        $DonDatHang = Hoa_don::join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_ma_kh')
            ->join('ct_hoa_don', 'hoa_don.id', '=', 'ct_hoa_don.id_sohd')
            ->join('san_pham', 'san_pham.id', '=', 'ct_hoa_don.ma_san_pham')
            ->select('hoa_don.id', 'hoa_don.ngay_hoa_don', 'hoa_don.id_ma_kh', 'hoa_don.tong_tien', 'hoa_don.nhap_coupon', 'hoa_don.uu_dai_thanh_vien', 'hoa_don.con_lai', 'khach_hang.ho_kh', 'khach_hang.thanh_vien', 'khach_hang.ten_kh', 'khach_hang.dia_chi', 'khach_hang.dien_thoai', 'khach_hang.email', 'ct_hoa_don.so_luong', 'ct_hoa_don.don_vi', 'ct_hoa_don.don_gia', 'san_pham.id as MaSP', 'san_pham.ten_san_pham', 'san_pham.hinh_san_pham')
            ->where('hoa_don.id', $id)
            ->get();
        if (count($DonDatHang) === 0)
            return redirect("/");
        Mail::to($DonDatHang[0]->email)->send(new SendEmailHoaDon($DonDatHang));
        return view('customer.purchaseorder', ['DonDatHang' => $DonDatHang]);
    }
}
