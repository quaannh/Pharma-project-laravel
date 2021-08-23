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
                    <strong class="text-black">Đăng Ký</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        @if (session('alert'))
        <div class="alert alert-secondary alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('alert') }}
        </div>
    @endif
        @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
        <div class="alert alert-secondary alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ $error }}
          </div>
        @endforeach                                        
@endif

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="h3 mb-5 text-center">Đăng Ký Tài Khoản</h1>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="p-3 p-lg-5 border">
                            @csrf
                            <div class="form-group ">
                                <div class="col-md-12">
                                    <label>Họ Tên</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Hình</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="nhập email..."
                                        value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-12">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="nhập pass..."
                                        value="{{ old('password') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Re Password</label>
                                    <input type="password" class="form-control" name="repassword"
                                        placeholder="nhập lại pass...">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Đăng Ký</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
