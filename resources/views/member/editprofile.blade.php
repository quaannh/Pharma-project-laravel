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
                    <strong class="text-black">Cập Nhật Thông Tin</strong>
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
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-secondary  alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="h3 mb-5 text-center">Cập Nhật Thông Tin</h1>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="p-3 p-lg-5 border">
                            @csrf
                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label>Họ </label>
                                    <input type="text" class="form-control" name="ho_thanh_vien"
                                        value="{{ $ho_so->ho_thanh_vien }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Tên</label>
                                    <input type="text" class="form-control" name="ten_thanh_vien"
                                        value="{{ $ho_so->ten_thanh_vien }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Giới Tính</label>
                                    <select class="form-control" name="gioi_tinh">
                                        <option @if ($ho_so->gioi_tinh == 'nam') selected @endif value="nam">Nam</option>
                                        <option @if ($ho_so->gioi_tinh == 'nữ') selected @endif value="nữ">Nữ</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Sinh Nhật</label>
                                    <input type="text" class="form-control" id="sinh_nhat" name="sinh_nhat"
                                        aria-describedby="sinh_nhat" value="{{ $ho_so->sinh_nhat }}" autocomplete="off"
                                        placeholder="nhập năm - tháng - ngày">
                                </div>
                                <div class="col-md-4">
                                    <label>Hình Đại Diện</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Địa Chỉ</label>
                                    <input type="text" class="form-control" name="dia_chi" placeholder="nhập địa chỉ..."
                                        value="{{ $ho_so->dia_chi }}">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-4">
                                    <label>Số Điện Thoại</label>
                                    <input type="text" class="form-control" name="dien_thoai"
                                        value="{{ $ho_so->dien_thoai }}" placeholder="nhập số điện thoại...">
                                </div>
                                <div class="col-md-8">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="nhập email..."
                                        value="{{ $ho_so->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Cập Nhật">

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
