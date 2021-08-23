@extends('admin.master')
@section('content')
<?php $today = date('Y-m-d'); ?>
    <div class="py-5"  id='printMe'>
        <div class="container">
            <div class="row justify-content-center">
                <h2>BÁO CÁO</h2><br>
                
            </div>
            <hr><p>Ngày: {{ $today}}</p> <hr>
            <div class="row">
                <div class="col-md-12">
                    <h2>1. Tổng số sản phẩm:</h2>
                    <p>Tổng số sản phẩm đã bán: <strong class="text-danger">{{ $so_luong_san_pham_da_ban->so_luong_san_pham_da_ban }}</strong> sản phẩm</p>
                    <p>Tổng số sản phẩm hết hạn sử dụng: <strong class="text-danger">{{ $so_luong_san_pham_het_hsd->so_luong_san_pham_het_hsd }}</strong> sản phẩm</p>
                    <p>Tổng số sản phẩm còn hạn sử dụng: <strong class="text-danger">{{ $so_luong_san_pham_con_hsd->so_luong_san_pham_con_hsd }}</strong> sản phẩm</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>2. Danh sách sản phẩm hết hạn sử dụng</h2>
                    <div class="table-responsive ">
                        <table class="table table-bordered table-hover" style="text-align: center">
                            <thead>
                                <tr>
                                    <th style="width: 5%">Mã SP </th>
                                    <th style="width: 15%">Tên SP</th>
                                    <th style="width: 10%">SL Còn</th>
                                    <th style="width: 10%">SL Đã Bán</th>
                                    <th style="width: 15%">Ngày Nhập</th>
                                    <th style="width: 10%">Mã Lô Hàng</th>
                                    <th style="width: 15%">Nguồn Nhập</th>
                                    <th style="width: 15%">HSD</th>
                                    <th style="width: 10%">Trạng Thái</th>
                                </tr>
                            </thead>

                            <tbody id="myTable">

                                @foreach ($san_pham_het_hsd as $item)
                                    <tr>

                                        <td>{{ $item->ma_san_pham }}</td>
                                        <td>{{ $item->ten_san_pham }}</td>
                                        <td>{{ $item->sl_trong_kho }}</td>
                                        <td>{{ $item->sl_da_ban }}</td>
                                        <td>{{ $item->ngay_nhap }}</td>
                                        <td>{{ $item->ma_lo_hang }}</td>
                                        <td>{{ $item->nguon_nhap }}</td>
                                        <td>{{ $item->han_su_dung }}</td>
                                        <td>
                                            <?php if ($item->han_su_dung < date('Y-m-d')) {
                                                echo '<p class="text-danger">Hết HSD</p>';
                                            } else {
                                                echo '<p class="text-black">Còn HSD</p>';
                                            } ?>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>3. Doanh thu</h2>
                    @foreach ($doanh_thu as $item)
                    <p>Giai đoạn {{ $item->ngay}}: Doanh thu<strong><b> {{number_format( $item->tong_tien) }} VNĐ </b></strong></p>
                  
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>4. Số lượt truy cập</h2>
                    <p>Đã có <strong><b> {{ $so_luot_truy_cap}} </b></strong> lượt truy cập</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>5. Số thành viên mới</h2>
                    <p>Đã có <strong><b> {{ $so_thanh_vien}} </b></strong> thành viên tham gia</p>
                </div>
            </div>
        </div>
    </div>
    <button class=" icon icon-print btn btn-primary" onclick="printDiv('printMe')"> </button>
@endsection

