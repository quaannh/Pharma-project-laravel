<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSanPhamPost;
use App\Models\San_pham;
use App\Models\Loai_san_pham;
use App\Models\Khach_hang;
use App\Http\Requests\StoreKhachHangPost;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Models\User;
use Cart;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function DangKyUser()
    {  
        return view('user.register');
  
    }
    public function DangKyUserStore(Request $request)
    {   //Ràng buộc một số điều kiện, nếu không nhập sẽ báo errors
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'repassword' => 'required|same:password',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'repassword.same'=>'repassword is wrong',
        ]
    );
        
        $name_hinh='';
        if ( $request->hasFile('image')){
            if ($request->file('image')->isValid()){
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $file->move('resources/pharma/hinh/hinh_nhan_vien' , $name);
                $name_hinh = $name;
            }
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->image = $name_hinh;
        $user ->save();
        return redirect('user/dang-ky-user')->with('alert','Add success');
        
    }
    public function DangNhap()
    {  
        return view('user.login');
  
    }
    public function XacNhanDangNhap(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Nhập Email',
            'password.required' => 'Nhập Password'
        ]);
        if(Auth::attempt(['email' =>$request-> email, 'password' =>$request-> password])){
            return redirect('admin')->with('alert','Login success');
        }else{
            return redirect('user/dang-nhap')->with('alert','Login fail');
        }

    }
    public function DangXuat(Request $request)
    {  
        Auth::logout();
        $request->session()->forget('menus');
        $request->session()->forget('edit_delete');
        $request->session()->flush();
        return redirect('user/dang-nhap');
  
    }
    public function QuanTri(){
        return view('quantri');
    }



}
