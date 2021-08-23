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
                    <strong class="text-black">Hóa Đơn</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center border-bottom mb-4">
                    <h3 class="text-black h4 text-uppercase">Thông Tin Đơn Hàng</h3>
                </div>

                <div class="row mb-5">
                    <div class="col-md-4">
                        <p class="text-black">Số Hóa Đơn: {{ $DonDatHang[0]->id }} </p>
                        <p class="text-black">Ngày Hóa Đơn: {{ $DonDatHang[0]->ngay_hoa_don }}</p>
                    </div>
                    <div class="col-md-4 ">
                        <p class="text-black">Khách Hàng: {{ $DonDatHang[0]->ho_kh }}&nbsp;{{ $DonDatHang[0]->ten_kh }} </p>
                        <p class="text-black">Điện Thoại: {{ $DonDatHang[0]->dien_thoai }} </p>
                        <p class="text-black">Email: {{ $DonDatHang[0]->email }} </p>
                        <p class="text-black">Địa Chỉ: {{ $DonDatHang[0]->dia_chi }} </p>
                    </div>
                    
                    <div class="col-md-4">
                        @if (Session::has('id_thanh_vien'))
                        <p class="text-black">Thành Viên: {{ $DonDatHang[0]->thanh_vien }}</p>
                        <p class="text-black">Ưu Đãi: {{ $DonDatHang[0]->uu_dai_thanh_vien }}%</p>
                        @endif
                    </div>

                   

                    <div class="col-md-12">
                        <div class="site-blocks-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="row">SST</th>
                                        <th class="product-thumbnail">Mã Sản Phẩm</th>
                                        <th class="product-name">Tên Sản Phẩm</th>
                                        <th class="product-quantity">Số Lượng</th>
                                        <th class="product-total">ĐVT</th>
                                        <th class="product-price">Giá Sản Phẩm</th>
                                        <th class="product-total">Thành Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($DonDatHang as $dh)
                                        <tr>
                                            <td scope="row"><?php echo $i; ?></td>
                                            <td>{{ $dh->MaSP }}</td>
                                            <td>{{ $dh->ten_san_pham }}</td>
                                            <td>{{ $dh->so_luong }}</td>
                                            <td>{{ $dh->don_vi }} </td>
                                            <td>{{ number_format($dh->don_gia) }}</td>
                                            <td>{{ number_format($dh->so_luong * $dh->don_gia) }}</td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>Tổng Hóa Đơn</td>
                                        <td>{{ number_format($DonDatHang[0]->tong_tien) }} VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td>Mã Giảm Giá</td>
                                        <td>{{ number_format($DonDatHang[0]->nhap_coupon) }} VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td>Thanh Toán</td>
                                        <td>{{ number_format($DonDatHang[0]->con_lai) }} VNĐ</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="icon-check_circle display-3 text-primary"></span>
                    <h2 class="display-3 text-black">Thank you!</h2>
                    <p class="lead mb-5">Đơn hàng của bạn đã được đặt. Nhân viên giao hàng sẽ gọi cho bạn trước khi
                        giao.
                    </p>
                    <p><a href="{{ url('/trang-chu') }}" class="btn btn-md height-auto px-4 py-3 btn-primary">Trở về
                            trang
                            chủ</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    @parent
    <script>
    </script>
@endsection
