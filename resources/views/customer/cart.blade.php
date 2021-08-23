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
                    <strong class="text-black">Giỏ Hàng</strong>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        @if (Cart::count() === 0)
            <div class="container">
                <div class="row mb-5 ">
                    <div class="col-md-12">
                        <h3 style="text-align: center;">Giỏ hàng rỗng, <a href="{{ url('/san-pham/danh-sach') }}">Tiếp tục
                                mua hàng</a></h3>
                        <img src="{{ URL::asset('resources/pharma/hinh/hinh_store/no-cart.png') }}" alt="no-cart"
                            class="rounded mx-auto d-block">

                    </div>
                </div>
            </div>

        @else
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('alert'))
                        <div class="alert alert-secondary alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('alert') }}
                        </div>
                    @endif
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="site-blocks-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">Hình</th>
                                        <th style="width: 15%">Tên</th>
                                        <th style="width: 10%">Giá</th>
                                        <th style="width: 15%">Số Lượng</th>
                                        <th style="width: 10%">ĐVT</th>
                                        <th style="width: 10%">Tổng Tiền</th>
                                        <th style="width: 10%">Cập Nhật</th>
                                        <th style="width: 10%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::content() as $row)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <img src="{{ URL::asset('resources/pharma/hinh/hinh_san_pham/' . $row->options->hinh_san_pham) }}"
                                                    alt="{{ $row->ten_san_pham }}" class="img-fluid">
                                            </td>
                                            <td class="product-name">
                                                <h2 class="h5 text-black">{{ $row->name }}</h2>
                                            </td>
                                            <td>
                                                {{ number_format($row->price) }} VNĐ
                                            </td>
                                            <form method="post" action="{{ url('khach-hang/cap-nhat-gio-hang') }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" value="{{ $row->rowId }}" name="Th_rowID">
                                                <td>

                                                    <div class="input-group mb-3" style="max-width: 180px;">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-outline-primary js-btn-minus"
                                                                type="button">&minus;</button>
                                                        </div>
                                                        <input name="Th_soluong" type="text"
                                                            class="form-control text-center" value="{{ $row->qty }}"
                                                            placeholder="" aria-label="Example text with button addon"
                                                            aria-describedby="button-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-primary js-btn-plus"
                                                                type="button">&plus;</button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $row->options->don_vi }} </td>
                                                <td>{{ number_format($row->qty * $row->price) }} </td>
                                                <td><button name="Th_submit" class="btn btn-primary btn-sm"><span
                                                            class="icons icon-refresh"></span></button></td>
                                            </form>
                                            <td>
                                                <form action="{{ url('/khach-hang/xoa-mat-hang/' . $row->rowId) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-primary btn-sm" type="submit"><span
                                                            class="icons icon-delete"></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <a href="{{ url('/san-pham/danh-sach') }}" class="btn btn-primary btn-md btn-block">Tiếp
                                    tục mua hàng</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-4">
                                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="text-black">Tổng Tiền</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black"><?php echo Cart::subtotal(); ?> VNĐ</strong>

                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="text-black">Thanh Toán</span>
                                    </div>
                                    <div class="col-md-6 text-right">

                                        <strong class="text-black"> <?php echo Cart::total(); ?> VNĐ</strong>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ url('/khach-hang/tien-hanh-dat-hang') }}"
                                            class="btn btn-primary btn-lg btn-block">Tiến hành đặt hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endif
    </div>


@endsection
