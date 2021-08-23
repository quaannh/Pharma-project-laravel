<?php

namespace App\Http\Controllers;

use App\Models\Khach_hang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Hoa_don;
use App\Models\Ct_hoa_don;
use App\Models\Coupon;
use App\Models\Thanh_vien;
use Session;
use Cookie;
class ThanhVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dangkythanhvien(Request $request)
    {       
        if ($request->isMethod('POST')) {
            
            $data = $request->all();
            //echo "<pre>";print_r($data);  die;
            $this->validate($request, [
                'ho_thanh_vien' => 'required|max:255',
                'ten_thanh_vien' => 'required|max:255',
                'dia_chi' => 'required|min:5|max:255',
                'dien_thoai' => 'required|numeric|digits:10',
                'email' => 'required',
                'password' => 'required|min:8|max:255',
                'repassword' => 'required|min:8|max:255|same:password',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'sinh_nhat'=>'date',
            ],[
                'ho_thanh_vien.required' =>'Vui lòng nhập Họ',
                'ten_thanh_vien.required' =>'Vui lòng nhập Tên',
                'ho_thanh_vien.alpha' =>'Vui lòng nhập Họ là chữ',
                'ten_thanh_vien.alpha' =>'Vui lòng nhập Tên là chữ',
                'dia_chi.required' =>'Vui lòng nhập Địa chỉ',
                'dia_chi.min' =>'Vui lòng nhập Địa chỉ nhiều hơn 5 ký tự',
                'dien_thoai.required' =>'Vui lòng nhập Điện thoại',
                'email.required' =>'Vui lòng nhập Email',
                'dien_thoai.numeric' =>'Số điện thoại là số',
                'dien_thoai.digits' => 'Vui lòng nhập Điện thoại 10 số',
                'password.required' =>'Vui lòng nhập Password',
                'password.min' =>'Vui lòng nhập Password ít nhất 8 kí tự',
                'repassword.required' =>'Vui lòng nhập Điện thoại',
                'image.required' =>'Vui lòng chọn Ảnh',
                'repassword.same'=>'re-passworl không khớp',
                'date'=>'Nhập đúng định dạng năm - tháng - ngày',
                
            ]);
            
			$name_hinh = '';
            if ($request->hasFile('image')) {
                if ($request->file('image')->isValid()) {
                    $file = $request->file('image');
                    $name = $file->getClientOriginalName();
                    $file->move('resources/pharma/hinh/hinh_thanh_vien', $name);
                    $name_hinh = $name;
                }
            }
    
            $check_mail = Thanh_vien::where('email', $data['email'] )->count();
            if($check_mail > 0){
                return redirect()->back()->with('alert', 'Mail đã được sử dụng, chọn mail khác');
            }
            $check_dien_thoai = Thanh_vien::where('dien_thoai', $data['dien_thoai'] )->count();
            if($check_dien_thoai > 0){
                return redirect()->back()->with('alert', 'Số điện thoại đã được sử dụng, chọn số điện thoại khác');
            }
            $member = new Thanh_vien;
            $member->hinh_dai_dien = $name_hinh;
            $member->ma_thanh_vien = 'Pharma-'.$data['dien_thoai'];
            $member->ho_thanh_vien = $data['ho_thanh_vien'];
            $member->ten_thanh_vien = $data['ten_thanh_vien'];
            $member->gioi_tinh = $data['gioi_tinh'];
            $member->sinh_nhat = $data['sinh_nhat'];
            $member->dia_chi = $data['dia_chi'];
            $member->dien_thoai = $data['dien_thoai'];
            $member->email = $data['email'];
            $member->password = $data['password'];
            $member->tong_chi = 0;
            $member->hang_thanh_vien = 'ĐỒNG';
            $member->save();
            return redirect()->back()->with('alert', 'Đăng Ký Thành Công');
        }
        return view('member.register');
    }


    
    public function dangnhap()
    {
       
        return view('member.login');
    }

    public function xacnhandangnhap(Request $request){

        $request->session()->forget('ma_code');
        $request->session()->forget('gia_tri_coupon');
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Phải nhập email ',
            'password.required'=>'Phải nhập password'
        ]
    
        );

        $email = $request->input('email');
        $password = $request->input('password');
        $thanh_vien = Thanh_vien::where(['password'=>$password,'email'=>$email])->first();
        if($thanh_vien){
            $request->session()->put('id_thanh_vien',$thanh_vien->id);
            $request->session()->put('hinh_dai_dien',$thanh_vien->hinh_dai_dien);
            if ($request->has('ghi_nho')) {
                return redirect('/trang-chu')->cookie('id_thanh_vien',$thanh_vien->id,300)->cookie('hinh_dai_dien',$thanh_vien->hinh_dai_dien,300);
            }
            return redirect('/trang-chu');
        }
        else return redirect()->back()->with('alert','Đăng nhập không thành công');            
    }
    public function dangxuat(Request $request){
        if($request->session()->has('id_thanh_vien')){
            $request->session()->forget('id_thanh_vien');
            $request->session()->forget('hinh_dai_dien');
            $request->session()->forget('visit_member');
            $request->session()->forget('visit');
            if(Session::has('ma_code')){
                $request->session()->forget('ma_code');
                $request->session()->forget('gia_tri_coupon');
            }
        }
        if(\Cookie::has('id_thanh_vien')){
            $id = \Cookie::forget('id_thanh_vien');
            $hinh_dai_dien =\Cookie::forget('hinh_dai_dien');
            return redirect('/')->withCookie($id)->withCookie($hinh_dai_dien);
        }else
        return redirect('/');      
    }

    public function xemhoso()
    {
        if(Session::has('id_thanh_vien')){
            $id = Session::get('id_thanh_vien');
            $ho_so = Thanh_vien::where('id',$id )->first();      
            $ma_thanh_vien = $ho_so->ma_thanh_vien;
            $lich_su_don_hang = DB::table('hoa_don')
                ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_ma_kh')
                ->select(DB::raw('hoa_don.id as so_hd,khach_hang.thanh_vien,khach_hang.id,CONCAT((`ho_kh`)," " ,(`ten_kh`)) as ho_ten ,email,dia_chi,dien_thoai,tong_tien,ngay_hoa_don, trang_thai'))
                ->where('khach_hang.thanh_vien', $ma_thanh_vien)
                ->orderBy('id','DESC')
                ->paginate(5);
            $order_detail = Ct_hoa_don::where('id_sohd', $id)->get();
            $tich_luy = DB::table('hoa_don')
            ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_ma_kh')
            ->where('khach_hang.thanh_vien', $ma_thanh_vien)
            ->select(DB::raw('sum(`con_lai`) as tich_luy'))
            ->first();
            
            return view('member.profile',['ho_so'=> $ho_so, 'lich_su_don_hang'=> $lich_su_don_hang,'tich_luy'=> $tich_luy]);
        }else{
            return redirect('thanh-vien/dang-nhap');             
        }


    }
    public function xemdonhang(Request $request,$id)
    { 
        if(Session::has('id_thanh_vien')){
        $orderdetail = DB::table('ct_hoa_don')
        ->join('hoa_don','hoa_don.id', '=', 'ct_hoa_don.id_sohd' )
        ->join('san_pham', 'san_pham.id', '=', 'ct_hoa_don.ma_san_pham')
        ->where('ct_hoa_don.id_sohd',$id)
        ->select(DB::raw('ct_hoa_don.*,san_pham.*,hoa_don.*'))
       
        ->get();
        return view('member.memberorderdetail',['orderdetail'=> $orderdetail]);
        }else{
            return redirect('thanh-vien/dang-nhap');             
        }
    }

    public function capnhathosothanhvien(Request $request,$id)
    {    
        if(Session::has('id_thanh_vien')){
            $ho_so = Thanh_vien::where('id',$id )->first();
            if ($request->isMethod('POST')) {
                
                $data = $request->all();
                //echo "<pre>";print_r($data);  die;
                $this->validate($request, [
                    'ho_thanh_vien' => 'required|max:255',
                    'ten_thanh_vien' => 'required|max:255',
                    'dia_chi' => 'required|min:5|max:255',
                    'dien_thoai' => 'required|numeric|digits:10',
                    'email' => 'required',
                    'sinh_nhat'=>'date',
                ],[
                    'ho_thanh_vien.required' =>'Vui lòng nhập Họ',
                    'ten_thanh_vien.required' =>'Vui lòng nhập Tên',
                    'ho_thanh_vien.alpha' =>'Vui lòng nhập Họ là chữ',
                    'ten_thanh_vien.alpha' =>'Vui lòng nhập Tên là chữ',
                    'dia_chi.required' =>'Vui lòng nhập Địa chỉ',
                    'dien_thoai.required' =>'Vui lòng nhập Điện thoại',
                    'email.required' =>'Vui lòng nhập Email',
                    'dien_thoai.numeric' =>'Số điện thoại là số',
                    'dien_thoai.max' => 'Vui lòng nhập Điện thoại nhỏ hơn 11 số',
                    'date'=>'Nhập đúng định dạng năm - tháng - ngày',
                    
                ]);

                $ho_so_edit = Thanh_vien::find($id);
                $name_hinh = $ho_so_edit->hinh_dai_dien;
                if ($request->hasFile('image')) {
                    if ($request->file('image')->isValid()) {
                        $file = $request->file('image');
                        $name = $file->getClientOriginalName();
                        $file->move('resources/pharma/hinh/hinh_thanh_vien', $name);
                        $name_hinh = $name;
                    }
                }
                
                $mail_gui_di =  $data['email'];
                $mail_edit = $ho_so_edit->email;
                if($mail_gui_di != $mail_edit){
                    $check_db = Thanh_vien::where('id','<>',$id )->get();
                    if(count($check_db)>0){
                        foreach ($check_db as $key => $value) {   
                            if($mail_gui_di == $value ->email){
                                return redirect('/thanh-vien/cap-nhat-ho-so/' . $id)->with('alert', 'Mail đã được sử dụng, chọn mail khác');
                            }   
                        }
                    }
                }
                $dien_thoai_gui_di =  $data['dien_thoai'];
                $dien_thoai_edit = $ho_so_edit->dien_thoai;
                if($dien_thoai_gui_di != $dien_thoai_edit){
                    $check_db = Thanh_vien::where('id','<>',$id )->get();
                    if(count($check_db)>0){
                        foreach ($check_db as $key => $value) {   
                            if($dien_thoai_gui_di == $value ->dien_thoai){
                                return redirect('/thanh-vien/cap-nhat-ho-so/' . $id)->with('alert', 'Số điện thoại đã được sử dụng, chọn số điện thoại khác');
                            }   
                        }
                    }
                }
                $ho_so_edit->hinh_dai_dien = $name_hinh;
                $ho_so_edit->ho_thanh_vien =$data ['ho_thanh_vien'];
                $ho_so_edit->ten_thanh_vien =$data ['ten_thanh_vien'];
                $ho_so_edit->dien_thoai =$data ['dien_thoai'];
                $ho_so_edit->email =$data ['email'];
                $ho_so_edit->dia_chi =$data ['dia_chi'];
                $result = $ho_so_edit->save();  
                return redirect('/thanh-vien/cap-nhat-ho-so/' . $id)->with('alert', 'Edit success');
            }
            return view('member.editprofile',['ho_so'=>$ho_so]);
        }else{
            return redirect('thanh-vien/dang-nhap');             
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
