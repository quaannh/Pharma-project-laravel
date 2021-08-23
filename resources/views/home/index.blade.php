@extends('layout.master')
@section('title',
    'Công ty Cổ phần Dược phẩm NQH cung cấp sản phẩm theo tiêu chí Natural Life - Healthy Care - Quality
    Medical',)
@section('content')

    <div class="owl-carousel owl-single px-0">
        @foreach ($slider as $item)
            <div class="site-blocks-cover overlay"
                style="background-image: url({{ URL::asset('resources/pharma/hinh/hinh_silder/' . $item->hinh_slider) }})">
                <div class="container ">
                    <div class="row">
                        <div class="col-lg-12 mx-auto align-self-center">
                            <div class="site-block-cover-content text-center">
                                <h1 class="mb-0 text-light">{{ $item->tieu_de }}</h1>
                                <div class="row justify-content-center mb-5">
                                    <div class="col-lg-6 text-center">
                                        <p>{!! $item->noi_dung !!}</p>
                                    </div>
                                </div>
                                <p><a href="{{ $item->url }}" class="btn btn-primary px-5 py-3">Xem Thêm</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-balance-scale text-primary"></span>
                    </div>
                    <div class="text">
                        <h2>Thuốc Chất Lượng</h2>
                        <p>Chúng tôi đề cao chất lượng thuốc và hạn sử dụng của thuốc. Đặt chữ Tâm của người thầy thuốc lên
                            hàng đầu.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-truck text-primary"></span>
                    </div>
                    <div class="text">
                        <h2>Miễn Phí Giao Hàng</h2>
                        <p>Miễn phí vận chuyển cho các đơn hàng trên 300,000VNĐ và nhận hàng nhanh chóng.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-help text-primary"></span>
                    </div>
                    <div class="text">
                        <h2>Hỗ Trợ Khách Hàng</h2>
                        <p>Dịch vụ chăm sóc khách hàng chuyên nghiệp luôn sẵn sàng giải đáp mọi thắc mắc của bạn. Hotline
                            miễn phí: 1800 2001</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2>DEAL HOT <strong class="text-primary">MÙA COVI</strong></h2>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12 block-3 products-wrap">
                    <div class="nonloop-block-3 owl-carousel">

                        @foreach ($dssp as $sp)
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
                                    echo '<del> <p>Giá Gốc: ' . number_format($gia_san_pham) . ' VNĐ</p></del>';
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
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2>TOP <strong class="text-primary">SELLER</strong></h2>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12 block-3 products-wrap">
                    <div class="nonloop-block-3 owl-carousel">

                        @foreach ($TopBuy as $sp)
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
                                    echo '<del> <p>Giá Gốc: ' . number_format($gia_san_pham) . ' VNĐ</p></del>';
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

    <div class="site-section">
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="title-section">
                        <h2>Feed<strong class="text-primary">Back</strong></h2>
                    </div>
                    <div class="block-3 products-wrap">
                        <div class="owl-single no-direction owl-carousel">
                            @foreach ($feedback as $comment)
                                <div class="testimony">
                                    <blockquote>
                                        <img src="{{ URL::asset('resources/pharma/hinh/hinh_y_kien/' . $comment->hinh) }}"
                                            alt="{{ $comment->ho_ten_khach_hang }}" class="img-fluid">
                                        <p>&ldquo;{{ $comment->noi_dung }}&rdquo;</p>
                                    </blockquote>

                                    <p class="author">&mdash; {{ $comment->ho_ten_khach_hang }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="title-section">
                        <h2 class="mb-5">Phương <strong class="text-primary">Châm</strong></h2>
                        <div class="step-number d-flex mb-4">
                            <span>N</span>
                            <h5><strong class="text-primary">Natural:</strong> Thuốc có thành phần chiết suất tự nhiên.</h5>
                        </div>

                        <div class="step-number d-flex mb-4">
                            <span>Q</span>
                            <h5><strong class="text-primary">Quality:</strong> Thuốc đạt chất lượng, không bán thuốc không
                                còn hạn sử dụng.</h5>
                        </div>

                        <div class="step-number d-flex mb-4">
                            <span>H</span>
                            <h5><strong class="text-primary">Health:</strong> Tất cả sẽ mang đến một viên thuốc tốt chăm sóc
                                sức khỏe tốt.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
