@extends('layout.master')
@section('title',
    'Công ty Cổ phần Dược phẩm NQH cung cấp sản phẩm theo tiêu chí Natural Life - Healthy Care - Quality
    Medical',)
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ url('/') }}">Trang Chủ</a> <span class="mx-2 mb-0">/</span> <a
                        href="{{ url('san-pham/danh-sach') }}">Sản Phẩm </a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">{{ $sanpham->ten_san_pham }}</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mr-auto">
                    <div class="border text-center">
                        <img src="{{ URL::asset('resources/pharma/hinh/hinh_san_pham/' . $sanpham->hinh_san_pham) }}"
                            alt="{{ $sanpham->ten_san_pham }}" class="img-fluid p-5">
                    </div>
                </div>

                <div class="col-md-6">

                    <h2 class="text-black">{{ $sanpham->ten_san_pham }}</h2>
                    <?php
                    $check_so_luong = $so_luong_kha_dung->so_luong;
                    if ($check_so_luong > 50) {
                        $trang_thai = 'Còn Hàng';
                    } elseif ($check_so_luong < 50 && $check_so_luong > 0) {
                        $trang_thai = 'Còn Ít';
                    } else {
                        $trang_thai = 'Hết Hàng';
                    }
                    ?>
                    <input type="hidden" id="sl_trong_kho" value="{{ $check_so_luong }}">
                    <p> Trạng Thái: {{ $trang_thai }}</p>



                    <?php
                    $gia = '';
                    $dvt = $sanpham->don_vi;
                    $giam_gia = $sanpham->giam_gia;
                    $gia_san_pham = $sanpham->gia_san_pham;
                    if ($sanpham->giam_gia > 0) {
                        echo ' <h2 class="text-primary">' . number_format($giam_gia) . ' VNĐ/ ' . $dvt . '</h2>';
                        echo '<del> <p>Giá Gốc: ' . number_format($gia_san_pham) .  ' VNĐ</p> </del>';
                    } else {
                        echo ' <h2 class="text-primary">' . number_format($gia_san_pham) . ' VNĐ/ ' . $dvt . '</h2>';
                    }
                    ?>

                    <!-- ADD TO CART -->
                    <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 220px;">
                            <input type="hidden" value="{{ $sanpham->id }}" id="Lay_id_sp">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>

                            <input id="Them_soluong" type="text" class="form-control text-center" value="1" placeholder="">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>
                    </div>


                    <p><a href="#" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" id="btnAddToCart">Thêm Vào
                            Giỏ Hàng</a></p>



                    <!-- END ADD TO CART -->
                    <div class="mt-5">
                        <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">Tóm Tắt</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                    role="tab" aria-controls="pills-profile" aria-selected="false">Chi Tiết</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <p>{{ $sanpham->mo_ta_tom_tat }}</p>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                {!! $sanpham->chi_tiet !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2>Sản Phẩm <strong class="text-primary">Liên Quan</strong></h2>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12 block-3 products-wrap">
                    <div class="nonloop-block-3 owl-carousel">

                        @foreach ($sanphamlienquan as $sp)
                            <div class="text-center item mb-4 item-v2">
                                @php
                                    $sale = $sp->giam_gia;
                                    $giam_gia = '';
                                    if ($sale > 0) {
                                        $spansale = 'Sale';
                                        $giam_gia = $sale;
                                    } else {
                                        $spansale = ' ';
                                        $giam_gia = 0;
                                    }
                                @endphp

                                <span class="onsale">{{ $spansale }} </span>
                                <a href="{{ url('san-pham/danh-sach/' . $sp->ten_url . '-' . $sp->id) }}">
                                    <img width="270"
                                        src="{{ URL::asset('resources/pharma/hinh/hinh_san_pham/' . $sp->hinh_san_pham) }}"
                                        alt="{{ $sp->ten_san_pham }}"></a>
                                <h5 class="text-dark"><strong>{{ $sp->ten_san_pham }}</strong></h5>
                                <?php
                                $giam_gia = $sp->giam_gia;
                                $gia_san_pham = $sp->gia_san_pham;
                                if ($sp->giam_gia > 0) {
                                    echo ' <h3 class="text-primary">' . number_format($giam_gia) . ' VNĐ</h3>';
                                    echo '<del><p>Giá Gốc: ' . number_format($gia_san_pham) . ' VNĐ</p> </del>';
                                } else {
                                    echo ' <h3 class="text-primary">' . number_format($gia_san_pham) . ' VNĐ</h3>';
                                    echo '<p></br></p>';
                                }
                                ?>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('layout.signup')
@endsection
<!--- Sử dụng JQUERY-->
@section('script')
    <script>
        $(document).ready(function() {

            $("#btnAddToCart").click(function() {
                let soluong = $("#Them_soluong").val()
                let id = $("#Lay_id_sp").val()

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "{{ url('khach-hang/them-vao-gio-hang') }}/" + id,
                    data: {
                        _token: '<?php echo csrf_token(); ?>',
                        sl: soluong
                    },
                    success: function(data) {
                        if (data.n == 0)
                            alert('Hàng trong kho không đủ, để lại thông tin liên hệ, có hàng Cửa hàng sẽ liên hệ bạn!');
                        else

                            alert('Đã Thêm Sản Phẩm Thành Công');
                        location.reload();
                    }
                });
                return false;
            });
        });
    </script>
@endsection
