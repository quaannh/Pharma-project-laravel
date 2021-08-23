@extends('layout.master')
@section('title',
    'Công ty Cổ phần Dược phẩm NQH cung cấp sản phẩm theo tiêu chí Natural Life - Healthy Care - Quality
    Medical',)
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/') }}">Trang Chủ</a> <span class="mx-2 mb-0">/</span> 
                    <strong class="text-black">Loại Sản Phẩm: {{ $loaisanpham->ten_loai }}</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mr-auto">
                    <div class="border text-center">
                        <img src="{{ URL::asset('resources/pharma/hinh/hinh_loai_san_pham/' . $loaisanpham->hinh) }}"
                            alt="{{ $loaisanpham->ten_loai }}" class="img-thumbnail">
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="text-black">{{ $loaisanpham->ten_loai }}</h2>
                    <p>{!! $loaisanpham->ghi_chu !!}</p>
                </div>
            </div>
            
        </div>
    </div>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2>Danh Sách <strong class="text-primary">{{$loaisanpham->ten_loai}}</strong></h2>
                </div>
            </div>
            <div class="row justify-content-center" data-aos="fade-right">
                @foreach ($sanpham as $item)
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
                            <img width="270"
                                src="{{ URL::asset('resources/pharma/hinh/hinh_san_pham/' . $item->hinh_san_pham) }}"
                                alt="Image"></a>
                        <h3 class="text-dark"><a
                                href="{{ url('san-pham/danh-sach/' . $item->ten_url . '-' . $item->id) }}">{{ $item->ten_san_pham }}</a>
                        </h3>
                        <p class="price">{{ number_format($item->gia_san_pham) }} VNĐ</p>
                        <p class="price"> <strong class="text-danger">
                                @php
                                    if ($giam_gia > 0) {
                                        echo 'SALE ' . number_format($giam_gia) . ' VNĐ';
                                    } else {
                                        echo '';
                                    }
                                @endphp </strong></p>
                    </div>
                @endforeach

            </div>
            <div class="row mt-5 justify-content-center">
                {{ $sanpham->links() }}
            </div>
        </div>
    </div>
@endsection
