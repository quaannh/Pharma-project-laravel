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
            <div class="row">
                <div class="col-md-12">
                    <h1 style="text-align: center">Xử Lý Đơn Hàng: <strong
                            class="text-primary">{{ $xuat_kho->id }}</strong></h1>
                    <h5 class="text-black">Khách Hàng</h5>
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
                                        <td>{{ $item->dia_chi}}</td>
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
                    <br>
                    <h5 class="text-black">Đơn Hàng</h5>
                    <div class="table-responsive ">
                        <table class="table table-bordered table-hover" style="text-align: center">
                            <thead>
                                <tr>

                                    <th style="width: 15%">Mã Sản Phẩm</th>
                                    <th style="width: 15%">Số Lượng </th>
                                    <th style="width: 15%">Đơn Giá</th>
                                    <th style="width: 40%">Ngày Đặt</th>
                                </tr>
                            </thead>

                            <tbody id="myTable">
                                @foreach ($order_detail as $item)
                                    <tr>

                                        <td>{{ $item->ma_san_pham }}</td>
                                        <td>{{ $item->so_luong }}</td>
                                        <td>{{ number_format($item->don_gia) }} VNĐ</td>
                                        <td>{{ $item->created_at }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

            <div class="row border border-primary">
                <div class="col-md-12">
                    <form method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Xuất Kho</label>
                            <input type="checkbox" name="trang_thai" <?php echo $xuat_kho->trang_thai ?
                            'checked="checked"' : ''; ?> value= "1"> 
                        </div>
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
