<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSanPhamPost;
use App\Http\Requests\StoreLoaiSanPhamPost;
use App\Http\Requests\StoreSliderPost;
use App\Http\Requests\StoreTinTucPost;
use App\Models\Ct_hoa_don;
use App\Models\Hoa_don;
use App\Models\Khach_hang;
use App\Models\Thanh_vien;
use App\Models\Slider;
use App\Models\San_pham;
use App\Models\Loai_san_pham;
use App\Models\Y_kien_KH;
use App\Models\Tin_tuc;
use App\Models\SP_trong_kho;
use App\Models\Coupon;
use Session;
use Cookie;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailPhanHoi;


class QuanTriVienController extends Controller
{


    public function index()
    {
        return redirect('admin/dashboard/danh-sach');
    }
    // Dashboard Controller
    public function dashboard(Request $request)
    {

        // Thống kê số sản phẩm theo loại
        $SoSanPhamTheoLoai = DB::table('loai_san_pham')
            ->join('san_pham', 'san_pham.ma_loai', '=', 'loai_san_pham.id')
            ->select(DB::raw('san_pham.ma_loai,ten_loai,count(san_pham.id) as TSSP'))
            ->groupBy('san_pham.ma_loai', 'ten_loai')
            ->get();

        // Thống kê Doanh Thu Theo Tháng
        $DoanhThuTheoThang = DB::table('hoa_don')
            ->select(DB::raw('CONCAT(month(`ngay_hoa_don`),"-" , year(`ngay_hoa_don`) ) as ngay, sum(`tong_tien`) as tong_tien'))
            ->where('trang_thai', 1)
            ->groupBy('ngay')
            ->get();

        // Thống kê số sản phẩm đá bán được
        $SoLuongDaBan =  DB::table('hang_trong_kho')
        ->join('san_pham', 'san_pham.id', '=', 'hang_trong_kho.ma_san_pham')
        ->select('hang_trong_kho.*', 'san_pham.*')
        ->orderby('sl_da_ban', 'DESC')
        ->get();

        // Thống kê đơn hàng chưa xử lý
        $today = date('Y-m-d');
        $DonHangMoi = DB::table('hoa_don')
            ->select('trang_thai', 'ngay_hoa_don', 'id')
            ->where('trang_thai', 0)
            ->where('ngay_hoa_don', $today)

            ->select(DB::raw('id,count(*) as don_hang_moi'))
            ->groupBy('id')
            ->get();

        // Thống kê đơn hàng chưa xử lý
        $DonHangChuaGiao = DB::table('hoa_don')
            ->where('trang_thai', 0)
            ->select(DB::raw('count(*) as don_hang_chua_giao'))
            ->get();

        // Thống kê đơn hàng được đặt
        $DonHang = DB::table('hoa_don')
            ->select(DB::raw('count(*) as don_hang'))
            ->get();

        $TopBuy = DB::table('hang_trong_kho')->join('san_pham', 'san_pham.id', '=', 'hang_trong_kho.ma_san_pham')->select('hang_trong_kho.*', 'san_pham.*')->orderby('sl_da_ban', 'DESC')->take(3)->get();

        $SoLuotTruyCap = DB::table('ghi_log')->count();
        $ThanhVien = DB::table('thanh_vien')->count();

        return view('admin.dashboard.dashboard', [
            'SoSanPhamTheoLoai' => $SoSanPhamTheoLoai,
            'DoanhThuTheoThang' => $DoanhThuTheoThang,
            'SoLuongDaBan' => $SoLuongDaBan,
            'DonHangMoi' => $DonHangMoi,
            'DonHangChuaGiao' => $DonHangChuaGiao,
            'DonHang' => $DonHang,
            'TopBuy' => $TopBuy,
            'SoLuotTruyCap' => $SoLuotTruyCap,
            'ThanhVien' => $ThanhVien,

        ]);
    }


    // Sản Phẩm Controller
    public function viewproduct()
    {
        $dssp = San_pham::orderBy('id')->get();
        return view('admin.product.tableviewproduct', ['dssp' => $dssp]);
    }
    public function createproduct()
    {
        $dssp = San_pham::orderBy('id')->paginate(10);
        $dslsp = Loai_san_pham::where('trang_thai', 1)->get();
        return view('admin.product.tablecreateproduct', ['dssp' => $dssp, 'dslsp' => $dslsp]);
    }
    public function storeproduct(StoreSanPhamPost $request)
    {
        $validated = $request->validated();
        $name_hinh = '';
        if ($request->hasFile('hinh_san_pham')) {
            if ($request->file('hinh_san_pham')->isValid()) {
                $file = $request->file('hinh_san_pham');
                $name = $file->getClientOriginalName();
                $file->move('resources/pharma/hinh/hinh_san_pham', $name);
                $name_hinh = $name;
            }
        }
        $san_pham = new San_pham();
        $san_pham->ten_san_pham = $request->ten_san_pham;
        $san_pham->ma_loai = $request->ma_loai;
        $san_pham->ten_url = $this->bo_dau_vn($request->ten_san_pham);
        $san_pham->mo_ta_tom_tat = $request->mo_ta_tom_tat;
        $san_pham->hinh_san_pham = $name_hinh;
        $san_pham->chi_tiet = $request->chi_tiet;
        $san_pham->gia_san_pham = $request->gia_san_pham;
        $san_pham->giam_gia = $request->giam_gia;
        $san_pham->trang_thai = 1;
        $san_pham->don_vi = $request->don_vi;
        $san_pham->nguon_goc = $request->nguon_goc;
        $result = $san_pham->save();

        if ($result)
            return redirect('admin/san-pham/danh-sach/them-san-pham')->with('alert', 'Add success');
        else
            return redirect('admin/san-pham/danh-sach/them-san-pham')->with('alert', 'Add not success');
    }
    function bo_dau_vn($str)
    {
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D' => 'Đ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );

        foreach ($unicode as $nonUnicode => $uni) {
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        $str = str_replace(' ', '-', $str);
        $str = strtolower($str);
        return $str;
    }


    public function editproduct($id)
    {
        $dslsp = Loai_san_pham::where('trang_thai', 1)->get();
        $san_pham = San_pham::find($id);
        return view('admin.product.tableeditproduct', ['dslsp' => $dslsp, 'san_pham' => $san_pham]);
    }
    public function updateproduct(Request $request, $id)
    {
        $this->validate($request, [
            'ten_san_pham' => 'required',
        ]);


        $loaiSanPham = Loai_san_pham::select('id', 'ten_loai')->get();
        $san_pham = San_pham::find($id);
        $name_hinh = $san_pham->hinh_san_pham;
        if ($request->hasFile('hinh_san_pham')) {
            if ($request->file('hinh_san_pham')->isValid()) {
                $file = $request->file('hinh_san_pham');
                $name = $file->getClientOriginalName();
                $file->move('resources/pharma/hinh/hinh_san_pham', $name);
                $name_hinh = $name;
            }
        }

        $san_pham->ten_san_pham = $request->ten_san_pham;
        $san_pham->ma_loai = $request->ma_loai;
        $san_pham->ten_url = $this->bo_dau_vn($request->ten_san_pham);
        $san_pham->mo_ta_tom_tat = $request->mo_ta_tom_tat;
        $san_pham->hinh_san_pham = $name_hinh;
        $san_pham->chi_tiet = $request->chi_tiet;
        $san_pham->gia_san_pham = $request->gia_san_pham;
        $san_pham->giam_gia =  $request->giam_gia;
        $san_pham->trang_thai = 1;
        $san_pham->don_vi = $request->don_vi;
        $san_pham->nguon_goc = $request->nguon_goc;
        $result = $san_pham->save();
        if ($result)
            return redirect('admin/san-pham/danh-sach/cap-nhat/' . $id)->with('alert', 'Edit success');
        else
            return redirect('admin/san-pham/danh-sach/cap-nhat/' . $id)->with('alert', 'Edit not success');
    }


    public function destroyproduct($id)
    {
        $xoa = San_pham::find($id);
        $xoa->delete();
        return redirect('admin/san-pham/danh-sach')->with('alert', 'Delete success');
    }

    // Loại Sản Phẩm Controller
    public function viewcategory()
    {
        $dslsp = Loai_san_pham::get();
        return view('admin.category.tableviewcategory', ['dslsp' => $dslsp]);
    }

    public function createcategory()
    {
        return view('admin.category.tablecreatecategory');
    }

    public function storecategory(StoreLoaiSanPhamPost $request)
    {

        $validated = $request->validated();
        // Quá trình upload file lên server
        $name_hinh = '';
        if ($request->hasFile('hinh')) {
            if ($request->file('hinh')->isValid()) {
                $file = $request->file('hinh');
                $name = $file->getClientOriginalName();
                $file->move('resources/pharma/hinh/hinh_loai_san_pham', $name);
                $name_hinh = $name;
            }
        }

        // Kết quả sẽ được ghi vào bảng sản phẩm trên DB, lần lượt các cột
        $loai_san_pham = new Loai_san_pham();
        $loai_san_pham->ten_loai = $request->ten_loai;
        $loai_san_pham->hinh = $name_hinh;
        $loai_san_pham->ghi_chu = $request->ghi_chu;
        $loai_san_pham->trang_thai = isset($request->trang_thai) ? $request->trang_thai : false;
        $result = $loai_san_pham->save();

        if ($result)
            return redirect('admin/loai-san-pham/danh-sach/them-loai-san-pham')->with('alert', 'Add success');
        else
            return redirect('admin/loai-san-pham/danh-sach/them-loai-san-pham')->with('alert', 'Add not success');
    }

    public function editcategory($id)
    {

        $loai_san_pham = Loai_san_pham::find($id);
        return view('admin.category.tableeditcategory', ['loai_san_pham' => $loai_san_pham]);
    }
    public function updatecategory(Request $request, $id)
    {
        // Ràng buộc một số điều kiện, nếu không nhập sẽ báo errors
        $this->validate($request, [
            'ten_loai' => 'required',

        ]);
        // Quá trình upload file lên server

        $loai_san_pham = Loai_san_pham::find($id);
        $name_hinh = $loai_san_pham->hinh;
        if ($request->hasFile('hinh')) {
            if ($request->file('hinh')->isValid()) {
                $file = $request->file('hinh');
                $name = $file->getClientOriginalName();
                $file->move('resources/pharma/hinh/hinh_loai_san_pham', $name);
                $name_hinh = $name;
            }
        }

        // Kết quả sẽ được ghi vào bảng sản phẩm trên DB, lần lượt các cột
        $loai_san_pham->ten_loai = $request->ten_loai;
        $loai_san_pham->hinh = $name_hinh;
        $loai_san_pham->ghi_chu = $request->ghi_chu;
        $loai_san_pham->trang_thai = isset($request->trang_thai) ? $request->trang_thai : false;
        $result = $loai_san_pham->save();

        if ($result)
            return redirect('admin/loai-san-pham/danh-sach/cap-nhat/' . $id)->with('alert', 'Edit success');
        else
            return redirect('admin/loai-san-pham/danh-sach/cap-nhat/' . $id)->with('alert', 'Edit not success');
    }
    public function destroycategory($id)
    {

        $xoa = Loai_san_pham::find($id);
        $xoa->delete();
        return redirect('admin/loai-san-pham/danh-sach')->with('alert', 'Delete success');
    }

    // SLIDER Controller
    public function viewslider()
    {
        $slider = Slider::get();
        return view('admin.slider.tableviewslider', ['slider' => $slider]);
    }

    public function createslider()
    {
        return view('admin.slider.tablecreateslider');
    }

    public function storeslider(StoreSliderPost $request)
    {
        $validated = $request->validated();
        // Quá trình upload file lên server
        $name_hinh = '';
        if ($request->hasFile('hinh')) {
            if ($request->file('hinh')->isValid()) {
                $file = $request->file('hinh');
                $name = $file->getClientOriginalName();
                $file->move('resources/pharma/hinh/hinh_slider', $name);
                $name_hinh = $name;
            }
        }

        // Kết quả sẽ được ghi vào bảng sản phẩm trên DB, lần lượt các cột
        $slider = new Slider();
        $slider->ten_slider = $request->ten_slider;
        $slider->hinh = $name_hinh;
        $slider->tieu_de = $request->tieu_de;
        $slider->noi_dung = $request->noi_dung;
        $slider->url = $request->url;
        $slider->trang_thai = isset($request->trang_thai) ? $request->trang_thai : false;
        $result = $slider->save();

        if ($result)
            return redirect('admin/slider/danh-sach/them-slider')->with('alert', 'Add success');
        else
            return redirect('admin/slider/danh-sach/them-slider')->with('alert', 'Add not success');
    }

    public function editslider($id)
    {

        $slider = Slider::find($id);
        return view('admin.slider.tableeditslider', ['slider' => $slider]);
    }
    public function updateslider(Request $request, $id)
    {
        // Ràng buộc một số điều kiện, nếu không nhập sẽ báo errors
        $this->validate($request, [
            'ten_slider' => 'required',

        ]);
        // Quá trình upload file lên server

        $slider = Slider::find($id);
        $name_hinh = $slider->hinh_slider;
        if ($request->hasFile('hinh')) {
            if ($request->file('hinh')->isValid()) {
                $file = $request->file('hinh');
                $name = $file->getClientOriginalName();
                $file->move('resources/pharma/hinh/hinh_slider', $name);
                $name_hinh = $name;
            }
        }

        // Kết quả sẽ được ghi vào bảng sản phẩm trên DB, lần lượt các cột
        $slider->ten_slider = $request->ten_slider;
        $slider->hinh_slider = $name_hinh;
        $slider->tieu_de = $request->tieu_de;
        $slider->noi_dung = $request->noi_dung;
        $slider->url = $request->url;
        $slider->trang_thai = isset($request->trang_thai) ? $request->trang_thai : false;
        $result = $slider->save();

        if ($result)
            return redirect('admin/slider/danh-sach/cap-nhat/' . $id)->with('alert', 'Edit success');
        else
            return redirect('admin/slider/danh-sach/cap-nhat/' . $id)->with('alert', 'Edit not success');
    }
    public function destroyslider($id)
    {

        $slider = Slider::find($id);
        $slider->delete();
        return redirect('admin/slider/danh-sach')->with('alert', 'Delete success');
    }

    // Tin Tức Controller

    public function viewnews()
    {

        $tin_tuc = Tin_tuc::orderBy('id')->get();
        return view('admin.news.tableviewnews', ['tin_tuc' => $tin_tuc]);
    }

    public function createnews()
    {
        return view('admin.news.tablecreatenews');
    }

    public function storenews(StoreTinTucPost $request)
    {
        $validated = $request->validated();
        $name_hinh = '';
        if ($request->hasFile('hinh')) {
            if ($request->file('hinh')->isValid()) {
                $file = $request->file('hinh');
                $name = $file->getClientOriginalName();
                $file->move('resources/pharma/hinh/hinh_tin_tuc', $name);
                $name_hinh = $name;
            }
        }
        $tin_tuc_moi = new Tin_tuc();
        $tin_tuc_moi->tieu_de = $request->tieu_de;
        $tin_tuc_moi->hinh_tin_tuc = $name_hinh;
        $tin_tuc_moi->tom_tat = $request->tom_tat;
        $tin_tuc_moi->chi_tiet = $request->chi_tiet;
        $tin_tuc_moi->tac_gia = $request->tac_gia;
        $tin_tuc_moi->nhan_vien = $request->nhan_vien;
        $tin_tuc_moi->trang_thai = isset($request->trang_thai) ? $request->trang_thai : false;

        $result = $tin_tuc_moi->save();
        if ($result)
            return redirect('admin/tin-tuc/danh-sach/them-tin-tuc')->with('alert', 'Add success');
        else
            return redirect('admin/tin-tuc/danh-sach/them-tin-tuc')->with('alert', 'Add not success');
    }

    public function editnews($id)
    {
        $tin_tuc = Tin_tuc::find($id);
        return view('admin.news.tableeditnews', ['tin_tuc' => $tin_tuc]);
    }

    public function updatenews(Request $request, $id)
    {
        // Ràng buộc một số điều kiện, nếu không nhập sẽ báo errors
        $this->validate($request, [
            'tieu_de' => 'required',

        ]);
        // Quá trình upload file lên server

        $tin_tuc = Tin_tuc::find($id);

        $name_hinh = $tin_tuc->hinh_tin_tuc;
        if ($request->hasFile('hinh')) {
            if ($request->file('hinh')->isValid()) {
                $file = $request->file('hinh');
                $name = $file->getClientOriginalName();
                $file->move('resources/pharma/hinh/hinh_tin_tuc', $name);
                $name_hinh = $name;
            }
        }
        $tin_tuc->tieu_de = $request->tieu_de;
        $tin_tuc->hinh_tin_tuc = $name_hinh;
        $tin_tuc->tom_tat = $request->tom_tat;
        $tin_tuc->chi_tiet = $request->chi_tiet;
        $tin_tuc->tac_gia = $request->tac_gia;
        $tin_tuc->nhan_vien = $request->nhan_vien;
        $tin_tuc->trang_thai = isset($request->trang_thai) ? $request->trang_thai : false;

        $result = $tin_tuc->save();
        if ($result)
            return redirect('admin/tin-tuc/danh-sach/cap-nhat/' . $id)->with('alert', 'Edit success');
        else
            return redirect('admin/tin-tuc/danh-sach/cap-nhat/' . $id)->with('alert', 'Edit not success');
    }

    public function destroynews($id)
    {
        $xoa = Tin_tuc::find($id);
        $xoa->delete();
        return redirect('admin/tin-tuc/danh-sach')->with('alert', 'Delete success');
    }


    // Xử Lý Thành Viên Controller
    public function viewmenber()
    {
        $member = Thanh_vien::orderBy('id')->get();

        return view('admin.member.tableviewmember', [
            'member' => $member,
        ]);
    }
    public function viewmenberdetail($id)
    {

        $ho_so = Thanh_vien::where('id', $id)->first();
        $ma_thanh_vien = $ho_so->ma_thanh_vien;
        $lich_su_don_hang = DB::table('hoa_don')
            ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_ma_kh')
            ->select(DB::raw('hoa_don.nhap_coupon,hoa_don.ma_coupon, hoa_don.id as so_hd,khach_hang.thanh_vien,khach_hang.id,CONCAT((`ho_kh`)," " ,(`ten_kh`)) as ho_ten ,email,dia_chi,dien_thoai,tong_tien,ngay_hoa_don, trang_thai,con_lai'))
            ->where('khach_hang.thanh_vien', $ma_thanh_vien)
            ->get();

        return view('admin.member.tableviewmemberdetail', [
            'lich_su_don_hang' => $lich_su_don_hang,
            'ho_so' => $ho_so,
        ]);
    }


    // Xử Lý Đơn Hàng Controller
    public function vieworder()
    {
        $order = Hoa_don::orderBy('id', 'DESC')->paginate(10);
        $order_new = DB::table('hoa_don')->where('trang_thai', 0)->orderByDesc('created_at')->get();
        return view('admin.order.tablevieworder', [
            'order' => $order,
            'order_new' => $order_new,
        ]);
    }
    public function vieworderdetail($id)
    {
        $ma_kh = Hoa_don::where('id', $id)->first();
        $khach_hang = DB::table('hoa_don')
            ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_ma_kh')
            ->select(DB::raw('khach_hang.id,CONCAT((`ho_kh`)," " ,(`ten_kh`)) as ho_ten ,email,dia_chi,dien_thoai,tong_tien,ngay_hoa_don, trang_thai'))
            ->where('khach_hang.id', $ma_kh->id_ma_kh)
            ->get();

        $order_detail = Ct_hoa_don::where('id_sohd', $id)->get();

        return view('admin.order.tableshoworder', ['khach_hang' => $khach_hang, 'order_detail' => $order_detail,]);
    }
    public function editorder($id)
    {
        $ma_kh = Hoa_don::where('id', $id)->first();
        $khach_hang = DB::table('hoa_don')
            ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_ma_kh')
            ->select(DB::raw('khach_hang.id,CONCAT((`ho_kh`)," " ,(`ten_kh`)) as ho_ten ,email,dia_chi,dien_thoai,tong_tien,ngay_hoa_don, trang_thai'))
            ->where('khach_hang.id', $ma_kh->id_ma_kh)
            ->get();
        $xuat_kho = DB::table('hoa_don')->find($id);
        $order_detail =  DB::table('ct_hoa_don')->where('id_sohd', $id)->get();


        return view('admin.order.tableeditorder', ['xuat_kho' => $xuat_kho, 'order_detail' => $order_detail, 'khach_hang' => $khach_hang,]);
    }
    public function updateorder(Request $request, $id)
    {
        // Ràng buộc một số điều kiện, nếu không nhập sẽ báo errors
        $this->validate($request, [
            'trang_thai' => 'required',
        ]);
        // Quá trình upload file lên server

        $order_detail =  DB::table('ct_hoa_don')->where('id_sohd', $id)->first();
        $so_luong_sp =  $order_detail->so_luong;


        //$count = count($Kho);

        $today = date('Y-m-d');
        $so_luong_kha_dung = DB::table('hang_trong_kho')
            ->where('ma_san_pham', $order_detail->ma_san_pham)
            ->where('han_su_dung', '>', $today)
            ->where('sl_trong_kho', '>', 0)
            ->orderBy('han_su_dung')
            ->first();

        $con_lai = $so_luong_kha_dung->sl_trong_kho - $so_luong_sp;

        if ($con_lai >= 0) {
            DB::table('hang_trong_kho')
                ->where('ma_san_pham', $order_detail->ma_san_pham)
                ->where('han_su_dung', '>', $today)
                ->where('sl_trong_kho', '>', 0)
                ->orderBy('han_su_dung')
                ->take(1)
                ->update([
                    'sl_trong_kho' =>  $so_luong_kha_dung->sl_trong_kho - $so_luong_sp,
                    'sl_da_ban' =>  $so_luong_kha_dung->sl_da_ban + $so_luong_sp,
                ]);
        } else {
            DB::table('hang_trong_kho')
                ->where('ma_san_pham', $order_detail->ma_san_pham)
                ->where('han_su_dung', '>', $today)
                ->orderBy('han_su_dung')
                ->take(1)
                ->update([
                    'sl_trong_kho' => 0,
                    'sl_da_ban' =>  $so_luong_kha_dung->sl_da_ban +  $so_luong_kha_dung->sl_trong_kho,
                ]);

            $so_luong_sp = (-$con_lai);
            $today = date('Y-m-d');
            $so_luong_kha_dung = DB::table('hang_trong_kho')
                ->where('ma_san_pham', $order_detail->ma_san_pham)
                ->where('han_su_dung', '>', $today)
                ->where('sl_trong_kho', '>', 0)
                ->orderBy('han_su_dung')
                ->first();
            //$con_lai_tt = $so_luong_kha_dung->sl_trong_kho - $so_luong_sp;
            DB::table('hang_trong_kho')
                ->where('ma_san_pham', $order_detail->ma_san_pham)
                ->where('han_su_dung', '>', $today)
                ->where('sl_trong_kho', '>', 0)
                ->orderBy('han_su_dung')
                ->take(1)
                ->update([
                    'sl_trong_kho' =>  $so_luong_kha_dung->sl_trong_kho - $so_luong_sp,
                    'sl_da_ban' =>  $so_luong_kha_dung->sl_da_ban + $so_luong_sp,
                ]);
        }
        //echo "<pre>";print_r($con_lai_tt );  die;


        // Tính điểm thành viên
        $hoa_don = Hoa_don::where('id', $id)->first();
        $id_kh = $hoa_don->id_ma_kh;
        $khach_hang = Khach_hang::where('id', $id_kh)->first();
        $ma_thanh_vien = $khach_hang->thanh_vien;

        $tich_luy = DB::table('hoa_don')
            //->where('trang_thai', 1)
            ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_ma_kh')
            ->where('khach_hang.thanh_vien', $ma_thanh_vien)
            ->select(DB::raw('sum(`con_lai`) as tich_luy'))
            ->first();

        Thanh_vien::where('ma_thanh_vien',  $ma_thanh_vien)->update(['tong_chi' => $tich_luy->tich_luy]);
        if ($tich_luy->tich_luy <= 1000000) {
            Thanh_vien::where('ma_thanh_vien',  $ma_thanh_vien)->update(['hang_thanh_vien' => 'ĐỒNG']);
        }
        if ($tich_luy->tich_luy > 1000000 && $tich_luy->tich_luy <= 3000000) {
            Thanh_vien::where('ma_thanh_vien',  $ma_thanh_vien)->update(['hang_thanh_vien' => 'BẠC']);
        }
        if ($tich_luy->tich_luy > 3000000 && $tich_luy->tich_luy <= 10000000) {
            Thanh_vien::where('ma_thanh_vien',  $ma_thanh_vien)->update(['hang_thanh_vien' => 'VÀNG']);
        }
        if ($tich_luy->tich_luy > 10000000) {
            Thanh_vien::where('ma_thanh_vien',  $ma_thanh_vien)->update(['hang_thanh_vien' => 'KIM CƯƠNG']);
        }

        $xac_nhan_xuat_kho = Hoa_don::find($id);
        $xac_nhan_xuat_kho->trang_thai = isset($request->trang_thai) ? $request->trang_thai : false;
        $result = $xac_nhan_xuat_kho->save();

        if ($result)
            return redirect('admin/order/danh-sach/cap-nhat/' . $id)->with('alert', 'Edit success');
        else {
            return redirect('admin/order/danh-sach/cap-nhat/' . $id)->with('alert', 'Edit not success');
        }
    }

    //controller kho hàng Controller
    public function viewstock()
    {
        $san_pham_rank = DB::table('hang_trong_kho')->join('san_pham', 'san_pham.id', '=', 'hang_trong_kho.ma_san_pham')->select('hang_trong_kho.*', 'san_pham.*')->orderby('sl_da_ban', 'DESC')->take(3)->get();
        $kho = DB::table('hang_trong_kho')
            ->join('san_pham', 'san_pham.id', '=', 'hang_trong_kho.ma_san_pham')
            ->select('hang_trong_kho.*', 'san_pham.*')
            ->orderBy('hang_trong_kho.ma_san_pham')
            ->get();

        return view('admin.stock.tableviewstock', ['kho' => $kho, 'san_pham_rank' => $san_pham_rank]);
    }
    public function createreceipt(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = $request->all();
            $id = $data['get_id'];
            $check = San_pham::where('id', $id)->first();
            if (!empty($check)) {
                return view('admin.stock.tablecreatereceipt', ['check' => $check]);
            } else {
                return redirect()->back()->with('alert', 'Không tìm thấy mã sản phẩm');
            }
        }
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $nhap_hang = new SP_trong_kho();
            //$nhap_hang->ten_san_pham = $data['ten_san_pham'];
            $nhap_hang->ma_san_pham = $data['ma_san_pham'];
            $nhap_hang->sl_trong_kho = $data['so_luong'];
            $nhap_hang->sl_da_ban = 0;
            $nhap_hang->nguon_nhap = $data['nguon_nhap'];
            $nhap_hang->ma_lo_hang = $data['ma_lo_hang'];
            $nhap_hang->ngay_nhap = $data['ngay_nhap'];
            $nhap_hang->han_su_dung = $data['han_su_dung'];
            $nhap_hang->save();
            return redirect()->back()->with('alert', 'Add success');
        }
        return redirect()->back();
    }


    //controller coupons Controller

    public function viewcoupon()
    {
        $coupon = Coupon::get();
        return view('admin.coupon.tableviewcoupon', ['coupon' => $coupon]);
    }
    public function addcoupon(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            //echo "<pre>";print_r($data);  die;
            $coupon = new Coupon();
            $coupon->ma_code = $data['ma_code'];
            $coupon->loai_code = $data['loai_code'];
            $coupon->gia_tri = $data['gia_tri'];
            $coupon->han_su_dung = $data['han_su_dung'];
            $coupon->pham_vi_ap_dung = $data['pham_vi_ap_dung'];
            $coupon->trang_thai = $data['trang_thai'];
            $coupon->save();
            return redirect('admin/coupons/them-ma-giam-gia')->with('alert', 'Add success');
        }
        return view('admin.coupon.tableaddcoupon');
    }
    public function editcoupon(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            //echo "<pre>";print_r($data);  die;
            $coupon_detail = Coupon::find($id);
            $coupon_detail->ma_code = $data['ma_code'];
            $coupon_detail->loai_code = $data['loai_code'];
            $coupon_detail->gia_tri = $data['gia_tri'];
            $coupon_detail->han_su_dung = $data['han_su_dung'];
            $coupon_detail->pham_vi_ap_dung = $data['pham_vi_ap_dung'];
            if (empty($data['trang_thai'])) {
                $data['trang_thai'] = 0;
            }
            $coupon_detail->trang_thai = $data['trang_thai'];
            $coupon_detail->save();
            return redirect('admin/coupons/them-ma-giam-gia')->with('alert', 'edit success');
        }
        $coupon_detail = Coupon::find($id);
        return view('admin.coupon.tableeditcoupon', ['coupon_detail' => $coupon_detail]);
    }
    public function destroycoupon($id)
    {
        $xoa = Coupon::find($id);
        $xoa->delete();
        return redirect('admin/coupons/danh-sach')->with('alert', 'Delete success');
    }

    // Liên Hệ Tư Vấn Controller
    public function viewmessenger()
    {
        $y_kien = Y_kien_KH::where('muc_dich','ý kiến')->paginate(10);
        $tu_van = Y_kien_KH::where('muc_dich','tư vấn')->orderby('id','DESC')->paginate(10);
        return view('admin.contact.tableviewmess', [
            'y_kien' => $y_kien,
            'tu_van' => $tu_van,
        ]);
    }
    public function sendmessenger(Request $request, $id)
    {
        $phan_hoi = Y_kien_KH::where('id',$id)->first();
        if ($request->isMethod('POST')) {
            $data = $request->all();

            $phan_hoi = Y_kien_KH::find($id);
            $phan_hoi->noi_dung_tra_loi = $data['noi_dung_tra_loi'];
            if (empty($data['trang_thai'])) {
                $data['trang_thai'] = 0;
            }
            $phan_hoi->trang_thai = 1;
            $phan_hoi->save();
            
            $send_phan_hoi = Y_kien_KH::where('id',$id)->get();
            Mail::to($send_phan_hoi[0]->email)->send(new SendEmailPhanHoi($send_phan_hoi));
            return redirect()->back()->with('alert', 'Send Success');
        }
        return view('admin.contact.tablesendmess',['phan_hoi'=>$phan_hoi]);
    }

    // Xử Lý Ghi Log Controller
    public function viewlog()
    {
        $logfile = DB::table('ghi_log')->orderBy('Time', 'DESC')->paginate(10);

        return view('admin.logfile.tableviewlog', [
            'logfile' => $logfile,
        ]);
    }
    
    // Báo Cáo Đồ Thị Controller
    public function report(Request $request)
    {

        $today = date('Y-m-d');
        $san_pham_het_hsd= DB::table('hang_trong_kho')
        ->join('san_pham', 'san_pham.id', '=', 'hang_trong_kho.ma_san_pham')
        ->select('hang_trong_kho.*', 'san_pham.*')
        ->where('han_su_dung', '<', $today)
        ->orderBy('san_pham.id')
        ->get();
       

        $so_luong_san_pham_het_hsd = DB::table('hang_trong_kho')
        ->where('han_su_dung','<',$today)
        ->select(DB::raw('sum(`sl_trong_kho`) as so_luong_san_pham_het_hsd'))
        ->first();

        $so_luong_san_pham_da_ban = DB::table('hang_trong_kho')
        ->select(DB::raw('sum(`sl_da_ban`) as so_luong_san_pham_da_ban'))
        ->first();

        $so_luong_san_pham_con_hsd = DB::table('hang_trong_kho')
        ->where('han_su_dung','>',$today)
        ->select(DB::raw('sum(`sl_trong_kho`) as so_luong_san_pham_con_hsd'))
        ->first();

        $doanh_thu = DB::table('hoa_don')
        ->select(DB::raw('CONCAT(month(`ngay_hoa_don`),"-" , year(`ngay_hoa_don`) ) as ngay, sum(`tong_tien`) as tong_tien'))
        ->where('trang_thai', 1)
        ->groupBy('ngay')
        ->get();
        $so_luot_truy_cap = DB::table('ghi_log')->count();
        $so_thanh_vien = DB::table('thanh_vien')->count();
        return view('admin.report.report',[
            
            'san_pham_het_hsd'=>$san_pham_het_hsd,
            'so_luong_san_pham_het_hsd'=>$so_luong_san_pham_het_hsd,
            'so_luong_san_pham_da_ban'=>$so_luong_san_pham_da_ban,
            'so_luong_san_pham_con_hsd'=>$so_luong_san_pham_con_hsd,
            'doanh_thu'=>$doanh_thu,
            'so_luot_truy_cap'=>$so_luot_truy_cap,
            'so_thanh_vien'=>$so_thanh_vien,
        
        
        ]);
    }
}
