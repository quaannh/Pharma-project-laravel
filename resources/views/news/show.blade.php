@extends('layout.master')
@section('title',
    'Công ty Cổ phần Dược phẩm NQH cung cấp sản phẩm theo tiêu chí Natural Life - Healthy Care - Quality
    Medical',)

@section('content')
<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{ url('/trang-chu') }}">Trang Chủ</a> <span class="mx-2 mb-0">/</span> <a
                    href="{{ url('tin-tuc/') }}">Tin Tức </a> <span class="mx-2 mb-0">/</span> <strong
                    class="text-black">{{ $tin_tuc->tieu_de}}</strong></div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12 ">
                <div class="p-3 p-lg-5 border" style="font-family: Arial, sans-serif">
                    <h3 style="text-align: center"><strong class="text-primary ">{{ $tin_tuc->tieu_de}}</strong></h3><br>
                    <div class="row ">
                        <div class="col-md-2">
                            <p style="text-align: start"><i class="fa fa-user"></i> {{ $tin_tuc->nhan_vien }}</p>
                        </div>
                        <div class="col-md-3">
                            <p style="text-align: start">{{ $tin_tuc->created_at }}</p>
                        </div>
                    </div>
                    <h5><strong>{{ $tin_tuc->tom_tat}}</strong></h5><br>
                    <div class=" text-center"><img class="img-thumbnail" src="{{ URL::asset('resources/pharma/hinh/hinh_tin_tuc/'.$tin_tuc->hinh_tin_tuc) }}" alt="{{ $tin_tuc->tieu_de }}">
                    </div>
                    <p>{!! $tin_tuc->chi_tiet !!}</p>
                    <p style="text-align: end"><i>{{ $tin_tuc->nhan_vien }}</i></p>
                </div>
            </div>
        </div>
    </div>
</div>  

@endsection