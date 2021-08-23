@extends('layout.master')
@section('title', 'Công ty Cổ phần Dược phẩm NQH cung cấp sản phẩm theo tiêu chí Natural Life - Healthy Care - Quality Medical',)
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/') }}">Trang Chủ</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Liên Hệ</strong>
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
        <div class="container">
            <div class="row justify-content-center">
                <div class="title-section text-center col-12">
                    <h2><span class="icon-comment"></span><strong class="text-dark"> Feedback</strong></h2>
                </div>
                <div class="col-md-12">
                    <form method="POST" enctype="multipart/form-data">
                        <?php
                        if (Session::has('id_thanh_vien')) {
                            $ho_ten_thanh_vien = $thanh_vien->ho_thanh_vien . ' ' . $thanh_vien->ten_thanh_vien;
                            $dia_chi = $thanh_vien->dia_chi;
                            $email = $thanh_vien->email;
                            $dien_thoai = $thanh_vien->dien_thoai;
                        } else {
                            $ho_ten_thanh_vien = old('ho_ten_khach_hang');
                            $dia_chi = old('dia_chi');
                            $email = old('email');
                            $dien_thoai = old('dien_thoai');
                        }
                        ?>
                        @csrf
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="text-black">Họ Tên Khách Hàng <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="ho_ten_khach_hang"
                                        value="{{ $ho_ten_thanh_vien }}">
                                    @error('ho_ten_khach_hang')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-8">
                                    <label class="text-black">Địa Chỉ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="dia_chi" value="{{ $dia_chi }}">
                                    @error('dia_chi')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="text-black">Điện Thoại</label>
                                    <input type="text" class="form-control" name="dien_thoai" value="{{ $dien_thoai }}">
                                    @error('dien_thoai')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-8">
                                    <label class="text-black">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ $email }}">
                                    @error('email')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="text-black">Nội Dung </label>
                                    <textarea id="noi_dung" name="noi_dung"
                                        class="form-control">{{ old('noi_dung') }}</textarea>
                                    @error('noi_dung')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="text-black">Mục Đích</label>
                                    <select class="form-control" name="muc_dich">
                                        <option value="ý kiến">Ý Kiến</option>
                                        <option value="tư vấn">Tư Vấn</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black">Hình</label>
                                    <small><i>(Hình đại diện, đơn thuốc, hóa đơn,..)</i> </small>
                                    <input type="file" class="form-control" id="hinh" name="hinh" aria-describedby="hinh">
                                    @error('hinh')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Gửi Ý Kiến">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2><span class="icon-map-signs"></span><strong class="text-dark"> Cửa Hàng</strong></h2>
                </div>
            </div>
            <div class="row ">

                @foreach ($dscuahang as $cuahang)
                    @php
                        $i = $cuahang->id;
                    @endphp
                    <div class="col-lg-4 ">
                        <div class="p-4 bg-white mb-2 rounded ">
                            <span class="d-block text-black h6 text-uppercase">{{ $cuahang->ten_cua_hang }}</span>
                            <div class="block-5">
                                <ul class="list-unstyled">
                                    <li class="address">{{ $cuahang->dia_chi }}</li>
                                    <li class="phone">{{ $cuahang->dien_thoai }}</li>
                                    <li class="email">{{ $cuahang->email }}</li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalCustom{{ $i }}">
                                Hiển Thị Bản Đồ
                            </button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade " id="modalCustom{{ $i }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <h2 class="text-black mb-3" style="text-align: center"><strong
                                        class="text-primary">{{ $cuahang->ten_cua_hang }}</strong></h2>
                                <div class="modal-body mb-0 p-0">
                                    <div id="map-container-google-18" class="z-depth-1-half map-container-11"
                                        style="height: 400px">
                                        @php
                                            echo $cuahang->ma_nhung;
                                        @endphp
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <h3 class="text-black h4" style="text-align: center">{{ $cuahang->dia_chi }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
