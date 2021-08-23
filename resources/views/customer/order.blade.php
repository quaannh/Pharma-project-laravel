@extends('layout.master')
@section('title',
    'Công ty Cổ phần Dược phẩm NQH cung cấp sản phẩm theo tiêu chí Natural Life - Healthy Care - Quality
    Medical',)
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/trang-chu') }}">Trang Chủ</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Đặt Hàng</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                  <div class="bg-light rounded p-3">
                    <p class="mb-0">Bạn chưa là thành viên, hãy bấm <a href="{{ url('thanh-vien/dang-ky') }}" class="d-inline-block">ĐĂNG KÝ</a>. Bạn sẽ nhận nhiều ưu đãi dành cho thành viên PHARMANQH</p>
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Thông Tin Đơn Hàng </h2>
                    <div class="p-3 p-lg-5 border">

                        <form action="" method="post" role="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Họ khách hàng<span class="text-danger">*</span></label>
                                    <input type="text" name="ho_kh" class="form-control select2"
                                        value="{{ old('ho_kh') }}">
                                    <small id="ho_khHelp" class="form-text text-danger">
                                        @if ($errors->has('ho_kh'))
                                            {{ $errors->first('ho_kh') }}
                                        @endif
                                    </small>
                                </div>
                                <div class="col-md-6">
                                    <label>Tên KH<span class="text-danger">*</span></label>
                                    <input type="text" name="ten_kh" class="form-control select2"
                                        value="{{ old('ten_kh') }}">
                                    <small id="ten_khHelp" class="form-text text-danger">
                                        @if ($errors->has('ten_kh'))
                                            {{ $errors->first('ten_kh') }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ<span class="text-danger">*</span></label>
                                <input type="text" name="dia_chi" class="form-control select2"
                                    value="{{ old('dia_chi') }}">
                                    <small id="ten_khHelp" class="form-text text-danger">
                                        @if ($errors->has('dia_chi'))
                                            {{ $errors->first('dia_chi') }}
                                        @endif
                                    </small>
                            </div>
                            <div class="form-group">
                                <label>Điện thoại<span class="text-danger">*</span></label>
                                <input type="text" name="dien_thoai" class="form-control select2"
                                    value="{{ old('dien_thoai') }}">
                                    <small id="ten_khHelp" class="form-text text-danger">
                                        @if ($errors->has('dien_thoai'))
                                            {{ $errors->first('dien_thoai') }}
                                        @endif
                                    </small>
                            </div>
                            <div class="form-group">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control select2" value="{{ old('email') }}">
                                <small id="ten_khHelp" class="form-text text-danger">
                                    @if ($errors->has('email'))
                                        {{ $errors->first('email') }}
                                    @endif
                                </small>
                            </div>
                            <!-- -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Sản Phẩm Bạn Chọn</h2>
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Sản Phẩm</th>
                                        <th>Giá</th>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $row)
                                            <tr>
                                                <td><p> {{ $row->name }}
                                                    </p>
                                                   
                                                    <p> <strong class="mx-2">x</strong>{{ $row->qty }} {{$row->options->don_vi}}</p>
                                                   
                                                </td>
                                                <td>{{ number_format($row->price) }} VNĐ</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Tổng Tiền</strong></td>
                                            <td class="text-black font-weight-bold"><?php echo
                                                Cart::subtotal(); ?> VNĐ</td>
                                        </tr>

                                        @if (Session::has('ma_code'))
                                            <tr>
                                                <td class="text-black font-weight-bold">
                                                    <strong>Voucher: {{ Session::get('ma_code') }}</strong>
                                                    <a class="icons icon-delete" href="/khach-hang/xoa-ma-giam-gia"> dùng mã khác</a>
                                                </td>
                                                <td class="text-black font-weight-bold">
                                                    - {{ number_format(Session::get('gia_tri_coupon')) }} VNĐ
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Thanh Toán</strong>
                                                </td>
                                                <td class="text-black font-weight-bold">
                                                    <strong>{{ number_format(Session::get('total')) }}</strong> VNĐ
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Thanh Toán</strong></td>
                                                <td class="text-black font-weight-bold"><strong>
                                                    <?php
                                                        $total = Cart::total();
                                                        echo $total;
                                                    ?> VNĐ
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg btn-block">Đặt Hàng</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </form> -->
            <div class="row mb-5">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Sử Dụng Mã Giảm Giá</h2>
                    <form action="{{ url('khach-hang/nhap-ma-giam-gia') }}" method="POST">
                        @csrf
                        <div class="p-3 p-lg-5 border">
                            <label for="c_code" class="text-black mb-3">Nếu bạn có mã giả giá hãy nhập ở đây</label>
                            <div class="input-group w-100">
                                <input type="text" class="form-control py-3" id="coupon" name="code"
                                    placeholder="Nhập code có dạng: abcd.xyz">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-md px-4">Áp Dụng</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if (session('alert'))
                        <div class="alert alert-secondary alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('alert') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Chính Sách</h2>
                    <div class="border mb-3">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button"
                                aria-expanded="false" aria-controls="collapsebank">Chính Sách Giao
                                Hàng</a></h3>
                        <div class="collapse" id="collapsebank">
                            <div class="py-2 px-4">
                                <p class="mb-0">Giao hàng đến nhà bạn miễn phí cho đơn hàng từ 300.000đ (Áp dụng
                                    từ 06/01/2021) khu vực nội thành. Phí 30.000đ cho đơn hàng liên tỉnh.</p>
                            </div>
                        </div>
                    </div>
                    <div class="border mb-5">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button"
                                aria-expanded="false" aria-controls="collapsepaypal">Thanh
                                Toán</a></h3>

                        <div class="collapse" id="collapsepaypal">
                            <div class="py-2 px-4">
                                <p class="mb-0">Thực hiện thanh toán của bạn trực tiếp khi nhận hàng.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
