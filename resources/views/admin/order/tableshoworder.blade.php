@extends('admin.master')

@section('content')
    <div class="py-5" id='printMe'>

        <div class="row d-flex justify-content-center">
            <h2>Thông Tin Khách Hàng </h2>
        </div>
        <div class="table-responsive ">
            <table class="table table-bordered table-hover" style="text-align: center">
                <thead>
                    <tr>
                        <th style="width: 15%">Họ Tên</th>
                        <th style="width: 15%">Địa Chỉ </th>
                        <th style="width: 15%">Email</th>
                        <th style="width: 15%">Điện Thoại</th>
                        <th style="width: 15%">Tổng Tiền</th>
                        <th style="width: 15%">Ngày Hóa Đơn</th>
                        <th style="width: 10%">Trạng Thái</th>
                    </tr>
                </thead>

                <tbody id="myTable">
                    @foreach ($khach_hang as $item)
                        <tr>
                            <td>{{ $item->ho_ten }}</td>
                            <td>{{ $item->dia_chi }}</td>
                            <td>{{ $item->email }}</td>

                            <td>{{ $item->dien_thoai }}</td>
                            <td>{{ number_format($item->tong_tien) }} VNĐ</td>
                            <td>{{ $item->ngay_hoa_don }}</td>
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

        <div class="row d-flex justify-content-center">
            <h2>Chi Tiết Hóa Đơn</h2>
        </div>
        <div class="table-responsive ">
            <table class="table table-bordered table-hover" style="text-align: center">
                <thead>
                    <tr>
                        <th style="width: 15%">Mã Hóa Đơn</th>
                        <th style="width: 15%">Mã Sản Phẩm</th>
                        <th style="width: 15%">Số Lượng </th>
                        <th style="width: 15%">ĐVT </th>
                        <th style="width: 15%">Đơn Giá</th>
                        <th style="width: 40%">Ngày Đặt</th>
                    </tr>
                </thead>

                <tbody id="myTable">
                    @foreach ($order_detail as $item)
                        <tr>
                            <td>{{ $item->id_sohd }}</td>
                            <td>{{ $item->ma_san_pham }}</td>
                            <td>{{ $item->so_luong }}</td>
                            <td>{{ $item->don_vi }}</td>
                            <td>{{ number_format($item->don_gia) }} VNĐ</td>
                            <td>{{ $item->created_at }}</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

@foreach($khach_hang as $item)
	@if($item ->trang_thai == 1)
        
		<button class=" icon icon-print btn btn-primary" onclick="printDiv('printMe')"> </button>
	@endif
@endforeach
@endsection
