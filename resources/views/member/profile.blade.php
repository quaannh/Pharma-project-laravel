@extends('layout.master')
@section('title',
    'Công ty Cổ phần Dược phẩm NQH cung cấp sản phẩm theo tiêu chí Natural Life - Healthy Care - Quality
    Medical',)
@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <?php
                if ($ho_so->gioi_tinh == 'nam') {
                    $loi_chao = 'anh';
                } else {
                    $loi_chao = 'chị';
                }
                ?>
                <h2 class="h3 mb-3 text-black">Chào {{ $loi_chao }} {{ $ho_so->ten_thanh_vien }} !</h2>
            </div>
            <div class="row">
                <div class="col-md-7 mb-5 mb-md-0">
                    <div class="card border mb-3">
                        <h3 class="h6 mb-0"><a class="d-block">Xem Hồ Sơ</a></h3>

                        <div class=" py-2 px-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ URL::asset('resources/pharma/hinh/hinh_thanh_vien/' . $ho_so->hinh_dai_dien) }}"
                                        class="card-thumbnail" width="200px" alt="{{ $ho_so->ma_thanh_vien }}">
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0">{{ $ho_so->ho_thanh_vien }} {{ $ho_so->ten_thanh_vien }}</p>
                                    <p class="mb-0">{{ $ho_so->sinh_nhat }} | {{ $ho_so->gioi_tinh }}</p>
                                    <p class="mb-0">Mã Thành Viên {{ $ho_so->ma_thanh_vien }}</p>
                                    <p class="mb-0">Thành Viên Từ: {{ $ho_so->created_at }}</p>
                                    <hr>
                                    <p class="mb-0">Địa Chỉ: {{ $ho_so->dia_chi }}</p>
                                    <p class="mb-0">Số Điện Thoại: {{ $ho_so->dien_thoai }}</p>
                                    <p class="mb-0">Email: {{ $ho_so->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <div class="row no-gutters" style="{!! $mau !!}">
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
                                            <p class="text-black">Điểm tích lũy: {{ number_format($tich_luy->tich_luy) }}
                                                <span class="icon icon-product-hunt"></span>
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


            <div class="row">
                <div class="col-md-12">
                    <div class="border mb-5">
                        <h3 class="h6 mb-0"><a class="d-block">Xem Nhanh Lịch Sử Đơn Hàng</a></h3>
                        <div class="py-2 px-4">
                            <div class="site-blocks-table">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Ngày Đặt</th>
                                        <th scope="col">Tổng Tiền</th>
                                        <th scope="col">Trạng Thái</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if (isset($_GET['page']))
                                        @php
                                            $i = ($_GET['page'] - 1) * 5 + 1;
                                        @endphp

                                    @else
                                        @php
                                            $i = 1;
                                        @endphp
                                    @endif
                                    @foreach ($lich_su_don_hang as $item)
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $item->so_hd }}</td>
                                            <td>{{ $item->ngay_hoa_don }}</td>
                                            <td>{{ number_format($item->tong_tien) }} VNĐ</td>
                                            <td>
                                                <?php if ($item->trang_thai == 0) {
                                                    echo 'chưa giao';
                                                } else {
                                                    echo 'đã giao';
                                                } ?></td>

                                            <td>
                                                <a href="{{ url('thanh-vien/ho-so/xem_don-hang/' . $item->so_hd) }}">
                                                    <button type="button" class="btn btn-primary">Xem</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                        ?>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                {{ $lich_su_don_hang->links() }}
            </div>
            <hr><br>
            <div class="row justify-content-center">
                <h2 class="h3 mb-3 text-black">HẠNG THÀNH VIÊN</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5 mb-5 mb-md-0">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters"
                            style="background: linear-gradient(to bottom left, #ffffcc 0%, #cc6600 100%)">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h5 class="text-black">Thẻ Thành Viên </h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-black">{{ $ho_so->ho_thanh_vien }}
                                                {{ $ho_so->ten_thanh_vien }}</p>
                                            <p class="text-black"><small>P-ID: {{ $ho_so->ma_thanh_vien }}</small>
                                            </p>
                                            <p class="text-black">Hạng: <strong>ĐỒNG</strong>
                                            </p>
                                            <p class="text-black">Điểm tích lũy: 0 </p>
                                            <p class="text-black"><span class="icon icon-product-hunt"></span></p>
                                           
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
                    <h5 class="text-black">Thẻ Đồng </h5>
                    <p class="text-black">Ưu đãi: <strong class="text-danger">giảm 3%</strong> giá trị đơn hàng </p>
                    <p class="text-black">ĐIều kiện áp dụng: Bạn là thành viên mới </p>
                </div>

                <div class="col-md-5 mb-5 mb-md-0">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters"
                            style="background:linear-gradient(to bottom left, #f5f5f5 20%, #d4d2d2 50%)">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h5 class="text-black">Thẻ Thành Viên </h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-black">{{ $ho_so->ho_thanh_vien }}
                                                {{ $ho_so->ten_thanh_vien }}</p>
                                            <p class="text-black"><small>P-ID: {{ $ho_so->ma_thanh_vien }}</small>
                                            </p>
                                            <p class="text-black">Hạng: <strong>BẠC</strong>
                                            </p>
                                            <p class="text-black">Điểm tích lũy: 1,000,000 </p>
                                            <p class="text-black"><span class="icon icon-product-hunt"></span> </p>
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
                    <h5 class="text-black">Thẻ Bạc </h5>
                    <p class="text-black">Ưu đãi: <strong class="text-danger">giảm 5%</strong> giá trị đơn hàng </p>
                    <p class="text-black">ĐIều kiện áp dụng: Điểm tích lũy đạt <strong class="text-danger">1
                            triệu</strong> <span class="icon icon-product-hunt"></span> </p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-5 mb-5 mb-md-0">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters"
                            style="background:linear-gradient(to top right, #ffcc00 0%, #ffffcc 100%) ">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h5 class="text-black">Thẻ Thành Viên </h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-black">{{ $ho_so->ho_thanh_vien }}
                                                {{ $ho_so->ten_thanh_vien }}</p>
                                            <p class="text-black"><small>P-ID: {{ $ho_so->ma_thanh_vien }}</small></p>
                                            <p class="text-black">Hạng: <strong>VÀNG</strong></p>
                                            <p class="text-black">Điểm tích lũy: 3,000,000 </p>
                                            <p class="text-black"><span class="icon icon-product-hunt"></span></p>
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
                    <h5 class="text-black">Thẻ Vàng </h5>
                    <p class="text-black">Ưu đãi: <strong class="text-danger">giảm 10% </strong> giá trị đơn hàng </p>
                    <p class="text-black">ĐIều kiện áp dụng: Điểm tích lũy đạt <strong class="text-danger">3
                            triệu</strong> <span class="icon icon-product-hunt"></span> </p>
                </div>
                <div class="col-md-5 mb-5 mb-md-0">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters"
                            style=" background: conic-gradient(at 0% 30%, rgb(247, 220, 220) 10%, rgb(255, 255, 255) 30%, rgb(135, 135, 135) 50%)">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h5 class="text-black">Thẻ Thành Viên </h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-black">{{ $ho_so->ho_thanh_vien }}
                                                {{ $ho_so->ten_thanh_vien }}</p>
                                            <p class="text-black"><small>P-ID: {{ $ho_so->ma_thanh_vien }}</small>
                                            </p>
                                            <p class="text-black">Hạng: <strong>KIM CƯƠNG</strong>
                                            </p>
                                            <p class="text-black">Điểm tích lũy: 10,000,000  </p>
                                           <p class="text-black"> <span class="icon icon-product-hunt"></span> </p>
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
                    <h5 class="text-black">Thẻ Kim Cương </h5>
                    <p class="text-black">Ưu đãi: <strong class="text-danger">giảm 15% </strong> giá trị đơn hàng </p>
                    <p class="text-black">ĐIều kiện áp dụng: Điểm tích lũy đạt <strong class="text-danger">10
                            triệu</strong> <span class="icon icon-product-hunt"></span> </p>
                </div>
            </div>

        </div>
    @endsection
