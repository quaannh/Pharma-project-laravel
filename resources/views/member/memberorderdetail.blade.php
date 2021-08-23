@extends('layout.master')
@section('title',
    'Công ty Cổ phần Dược phẩm NQH cung cấp sản phẩm theo tiêu chí Natural Life - Healthy Care - Quality
    Medical',)
@section('content')
    <div class="site-section bg-light py-3">
        <div class="container">
            <div class="title-section text-center col-12">
                <h2 class="h3 mb-3 text-black">Chi Tiết Đơn Hàng</h2>
            </div>
            <div class="row">


                <div class="site-blocks-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%">Số Hóa Đơn</th>
                                <th style="width:15%">Tên Sản Phẩm</th>
                                <th style="width: 10%">Số Lượng</th>
                                <th style="width: 10%">ĐVT</th>
                                <th style="width: 15%">Đơn Giá</th>
                                <th style="width: 15%">Tổng Tiền</th>
                                <th style="width: 15%">Nhập Coupon</th>
                                <th style="width: 15%">Thanh Toán</th>
                                <th style="width: 15%">Hình Sản Phẩm</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderdetail as $item)
                                <tr>
                                    <td>{{ $item->id_sohd }} </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">
                                        <a href="{{ url('san-pham/danh-sach/' . $item->ten_url . '-' . $item->ma_san_pham) }}">
                                        {{ $item->ten_san_pham }} </h2>

                                    </td>
                                    <td>{{ $item->so_luong }} </td>
                                    <td>{{ $item->don_vi }} </td>
                                    <td>{{ number_format($item->don_gia) }} VNĐ </td>
                                    <td>{{ number_format($item->tong_tien) }} VNĐ </td>
                                    <td>{{ number_format($item->nhap_coupon) }} VNĐ </td>
                                    <td>{{ number_format($item->con_lai) }} VNĐ </td>

                                    <td class="product-thumbnail">
                                        <img src="{{ URL::asset('resources/pharma/hinh/hinh_san_pham/' . $item->hinh_san_pham) }}"
                                            alt="{{ $item->ten_san_pham }}" class="img-fluid">
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
