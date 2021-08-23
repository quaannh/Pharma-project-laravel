@extends('layout.master')
@section('title',
    'Công ty Cổ phần Dược phẩm NQH cung cấp sản phẩm theo tiêu chí Natural Life - Healthy Care - Quality
    Medical',)

@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/') }}">Trang Chủ</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Đăng Ký Thành Viên</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        @if (session('alert'))
            <div class="alert alert-secondary  alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('alert') }}
            </div>
        @endif


        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="h3 mb-5 text-center">Đăng Ký Tài Khoản Thành Viên</h1>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="p-3 p-lg-5 border">
                            @csrf
                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label>Họ </label>
                                    <input type="text" class="form-control" name="ho_thanh_vien"
                                        value="{{ old('ho_thanh_vien') }}">
                                        <small class="form-text text-danger">
                                            @if ($errors->has('ho_thanh_vien'))
                                                {{ $errors->first('ho_thanh_vien') }}
                                            @endif
                                        </small>
                                </div>
                                <div class="col-md-6">
                                    <label>Tên</label>
                                    <input type="text" class="form-control" name="ten_thanh_vien"
                                        value="{{ old('ten_thanh_vien') }}">
                                        <small class="form-text text-danger">
                                            @if ($errors->has('ten_thanh_vien'))
                                                {{ $errors->first('ten_thanh_vien') }}
                                            @endif
                                        </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Giới Tính</label>
                                    <select class="form-control" name="gioi_tinh">
                                        <option value="nam">Nam</option>
                                        <option value="nữ">Nữ</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Sinh Nhật</label>
                                    <input type="text" class="form-control" id="sinh_nhat" name="sinh_nhat"
                                        aria-describedby="sinh_nhat" value="{{ old('sinh_nhat') }}" autocomplete="off"
                                        placeholder="nhập năm - tháng - ngày">
                                        <small class="form-text text-danger">
                                            @if ($errors->has('sinh_nhat'))
                                                {{ $errors->first('sinh_nhat') }}
                                            @endif
                                        </small>  
                                </div>
                                <div class="col-md-4">
                                    <label>Hình Đại Diện</label>
                                    <input type="file" class="form-control" name="image">
                                    <small class="form-text text-danger">
                                        @if ($errors->has('file'))
                                            {{ $errors->first('file') }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Địa Chỉ</label>
                                    <input type="text" class="form-control" name="dia_chi" placeholder="nhập địa chỉ..."
                                        value="{{ old('dia_chi') }}">
                                        <small class="form-text text-danger">
                                            @if ($errors->has('dia_chi'))
                                                {{ $errors->first('dia_chi') }}
                                            @endif
                                        </small>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-4">
                                    <label>Số Điện Thoại</label>
                                    <input type="text" class="form-control" name="dien_thoai"
                                        value="{{ old('dien_thoai') }}" placeholder="nhập số điện thoại...">
                                        <small class="form-text text-danger">
                                            @if ($errors->has('dien_thoai'))
                                                {{ $errors->first('dien_thoai') }}
                                            @endif
                                        </small>
                                </div>
                                <div class="col-md-8">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="nhập email..."
                                        value="{{ old('email') }}">
                                        <small class="form-text text-danger">
                                            @if ($errors->has('email'))
                                                {{ $errors->first('email') }}
                                            @endif
                                        </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="nhập pass..."
                                        value="{{ old('password') }}">
                                        <small class="form-text text-danger">
                                            @if ($errors->has('password'))
                                                {{ $errors->first('password') }}
                                            @endif
                                        </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Re Password</label>
                                    <input type="password" class="form-control" name="repassword"
                                        placeholder="nhập lại pass..." value="{{ old('repassword') }}">
                                        <small class="form-text text-danger">
                                            @if ($errors->has('repassword'))
                                                {{ $errors->first('repassword') }}
                                            @endif
                                        </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Đăng Ký">

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
