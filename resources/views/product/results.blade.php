@extends('layout.master')
@section('title','Công ty Cổ phần Dược phẩm NQH cung cấp sản phẩm theo tiêu chí Natural Life - Healthy Care - Quality Medical',)
@section('content')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ url('/') }}">Trang Chủ</a> <span class="mx-2 mb-0">/</span> <a
                        href="{{ url('san-pham/danh-sach') }}">Sản Phẩm </a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Sản Phẩm Tìm Kiếm</strong></div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <h2>Danh Sách Tìm Kiếm: <strong class="text-primaty">{{ $_GET['gia_tri_tim'] }}</strong></h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>Kết quả tìm kiếm:
                        @php
                            echo count($tim_sp);
                        @endphp món </p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section bg-light">
        <div class="container">



            @if (count($tim_sp) > 0)
                <div class="row">
                    @foreach ($tim_sp as $item)
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
            @else
                <div class="row d-flex justify-content-center">
                    <img src="{{ URL::asset('resources/pharma/hinh/hinh_store/no-search-found.png') }}"
                        alt="no-search-found" class="rounded mx-auto d-block">

                </div>

            @endif


        </div>
    </div>

@endsection
