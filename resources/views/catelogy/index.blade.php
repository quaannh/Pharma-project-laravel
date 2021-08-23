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
                    <span class="mx-2 mb-0">/</span> <strong class="text-black">Loại Sản Phẩm </strong>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <h2>Danh Sách Loại Sản Phẩm</h2>
            </div>
        </div>
    </div>
    <div class="container">
        @foreach ($dslsp as $item)
        <div class="row ">
            <div class="col-md-5 mr-auto">
                <div class="border text-center"><img class="img-thumbnail"
                        src="{{ URL::asset('resources/pharma/hinh/hinh_loai_san_pham/'. $item->hinh) }}"
                        alt="{{ $item->ten_loai }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="row justify-content-start">
                    <h3 class="text-primary">{{ $item->ten_loai }}</h3>
                </div>
                <div class="row justify-content-start">
                    <p>{!!$item->ghi_chu !!}</p>
                </div>
                <div class="row justify-content-start">
                    <a class="btn btn-sm btn-outline-primary" href="{{ url('loai-san-pham/danh-sach/' . $item->id) }}">Chi Tiết</a>
                </div>
            </div>
        </div>
        <br>
        @endforeach
    </div>

@endsection
