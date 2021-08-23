@extends('admin.master')
@section('content')
@if (session('alert'))
<div class="alert alert-secondary alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ session('alert') }}
</div>
@endif
<div class="py-5">
<div class="container">
    <div class="row d-flex justify-content-center">
        <h2>Nhập Hàng Mới</h2>
    </div>
    <div class="row border border-primary">
        <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data">
                @csrf
               
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="ten_san_pham" value="{{ $check->ten_san_pham }}">
                            @error('ten_san_pham')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                       
                        <div class="form-group">
                            <label>Mã sản phẩm</label>
                            <input type="text" class="form-control" name="ma_san_pham" value="{{ $check->id }}">
                            @error('ma_san_pham')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input type="text" class="form-control" name="so_luong" value="{{ old('so_luong') }}">
                            @error('so_luong')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Nhà cung cấp sản phẩm</label>
                            <input type="text" class="form-control" name="nguon_nhap" value="{{ old('nguon_nhap') }}">
                            @error('nguon_nhap')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Mã lô hàng</label>
                            <input type="text" class="form-control" name="ma_lo_hang" value="{{ old('nguon_nhap') }}">
                            @error('ma_lo_hang')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ngày Nhập</label>
                            <input type="text" class="form-control" id="ngay_nhap" name="ngay_nhap"
                                aria-describedby="ngay_nhap" value="{{ old('ngay_nhap') }}" autocomplete="off">
                            @error('ngay_nhap')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Hạn Sử Dụng</label>
                            <input type="text" class="form-control" id="date" name="han_su_dung"
                                aria-describedby="han_su_dung" value="{{ old('han_su_dung') }}" autocomplete="off">
                            @error('han_su_dung')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>           
            </form>
        </div>
    </div>
</div>
</div>

@endsection