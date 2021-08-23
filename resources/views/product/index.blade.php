@extends('layout.master')
@section('title',
    'Công ty Cổ phần Dược phẩm NQH cung cấp sản phẩm theo tiêu chí Natural Life - Healthy Care - Quality
    Medical',)

@section('content')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/trang-chu') }}">Trang Chủ</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Sản Phẩm</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-image" style="background-image: url({{ URL::asset('resources/pharma/images/sale.jpg') }})">
        <div class="container">
          <div class="row justify-content-center text-center">
           <div class="col-lg-7">
             <h3 class="text-white">Thoải Mái Mua Sắm Cùng Mã Coupon</h3>
             <p class="text-white">Mã Coupon Được Để Ở Coupon Khuyến Mãi Tại Mục Tin Tức</p>
             <p class="mb-0"><a href="{{ url('/tin-tuc') }}" class="btn btn-outline-white">Xem Ngay</a></p>
           </div>
          </div>
        </div>
      </div>


  
 <div class="site-section bg-light">

    <div class="container">
        <div class="title-section text-center col-12">
            <h2>Danh Sách <strong class="text-primary">Sản Phẩm</strong></h2>
        </div>
        <div class="row justify-content-center" data-aos="fade-right">
            @foreach ($dssp as $item)
                <div class="col-sm-6 col-lg-4 text-center item mb-4 item-v2">
                    @php
                        $sale = $item->giam_gia;
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
                    <a href="{{ url('san-pham/danh-sach/' . $item->ten_url . '-' . $item->id) }}">
                        <img width="270"  src="{{ URL::asset('resources/pharma/hinh/hinh_san_pham/' . $item->hinh_san_pham) }}" alt="Image"></a>
                    <h3 class="text-dark"><a href="{{ url('san-pham/danh-sach/' . $item->ten_url . '-' . $item->id) }}">{{ $item->ten_san_pham }}</a>
                    </h3>
                    <p class="price">{{ number_format($item->gia_san_pham) }} VNĐ</p>
                    <p class="price">
                        <strong class="text-danger">
                            @php
                                if ($giam_gia > 0) {
                                    echo 'SALE ' . number_format($giam_gia) . ' VNĐ';
                                } else {
                                    echo '';
                                }
                            @endphp
                        </strong>
                    </p>
                
                </div>

            @endforeach
        </div>
        <!-- Phân trang -->
        <div class="row mt-5 justify-content-center">
            {{ $dssp->links() }}
        </div>
    </div>
</div>
@endsection
