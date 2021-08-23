@extends('admin.master')
@section('content')
    <div class="py-5">
        <div class="row">
            <div class="col-md-5 mb-5 mb-md-0">
                <?php
                $hang_thanh_vien = $ho_so->hang_thanh_vien;
                if ($hang_thanh_vien == 'ĐỒNG') {
                        $mau = 'background:linear-gradient(to bottom left, #ffffcc 0%, #cc6600 100%)';
                    }
                    if ($hang_thanh_vien == 'BẠC') {
                        $mau = 'background:linear-gradient(to bottom left, #f5f5f5 20%, #d4d2d2 50%)';
                    }
                    if ($hang_thanh_vien == 'VÀNG') {
                        $mau = 'background:linear-gradient(to top right, #ccccff 0%, #ffffcc 100%)';
                    }
                    if ($hang_thanh_vien == 'KIM CƯƠNG') {
                        $mau = 'background:  conic-gradient(at 0% 30%, rgb(247, 220, 220) 10%, rgb(255, 255, 255) 30%, rgb(135, 135, 135) 50%);';
                    }
                
                ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters" style="{{$mau}}">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h5 class="text-black">Thẻ Thành Viên </h5>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <p class="text-black">{{ $ho_so->ho_thanh_vien }}
                                            {{ $ho_so->ten_thanh_vien }}</p>
                                        <p class="text-black"><small>P-ID: {{ $ho_so->ma_thanh_vien }}</small></p>
                                        <p class="text-black">Hạng: <strong>{{ $ho_so->hang_thanh_vien }}</strong>
                                        </p>
                                        <p class="text-black">Điểm tích lũy: {{ number_format($ho_so->tong_chi) }} <span class="icon icon-product-hunt"></span>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <img src="{{ URL::asset('resources/pharma/hinh/hinh_thanh_vien/' . $ho_so->hinh_dai_dien) }}"
                                            class="card-thumbnail" width="144px" alt="{{ $ho_so->ma_thanh_vien }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <h2>Lịch Sử Đơn Hàng</h2>
        </div>
        <div class="table-responsive ">
            <table class="table table-bordered table-hover" style="text-align: center">
                <caption>List of users</caption>
                <thead>
                    <tr>
                        <th style="width: 10%">Số Hóa Đơn</th>
                        <th style="width: 10%">Ngày Hóa Đơn</th>
                        <th style="width: 15%">Mã Thành Viên</th>
                        <th style="width: 15%">Tổng Tiền</th>
                        <th style="width: 15%">Coupon</th>
                        <th style="width: 10%">Mã Coupon</th>
                        <th style="width: 15%">Thanh Toán</th>
                        <th style="width: 10%">Trạng Thái</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($lich_su_don_hang as $item)
                        <tr>
                            <th scope="row">{{ $item->so_hd }}</th>
                            <td>{{ $item->ngay_hoa_don }}</td>
                            <td>{{ $item->thanh_vien }}</td>
                            <td>{{ number_format($item->tong_tien)}} VNĐ</td>
                            <td>{{ number_format($item->nhap_coupon)}} VNĐ</td>
                            <td>{{ $item->ma_coupon }}</td>
                            <td>{{ number_format($item->con_lai)}} VNĐ</td>
                            
                            <td>
                                <?php if ($item->trang_thai == 0) {
                                echo 'chưa giao';
                                } else {
                                echo 'đã giao';
                                } ?>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
