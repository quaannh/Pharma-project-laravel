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
                    <strong class="text-black">Tin Tức</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light" data-aos="fade">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2><span class="icon-gift"></span><strong class="text-dark"> Coupon Khuyến Mãi</strong></h2>
                </div>
            </div>
           
            <div class="row ">
                @foreach ($coupon as $item)
                <div class="col-md-4">
                    <div class="card border-primary mb-3">
                        <?php 
                        if($item->pham_vi_ap_dung == 'KHÁCH')
                        $pham_vi = 'KHÁCH';
                        else{
                        $pham_vi = 'Thành Viên '. $item->pham_vi_ap_dung;
                        }
                            
                        ?>
                        <div class="card-header">Ưu đãi dành cho {{$pham_vi}}</div>
                        <div class="card-body text-primary">
                          <h5 class="card-title">Mã Code: {{$item->ma_code}}</h5>
                          <?php 
                          if($item->loai_code == "tỷ lệ phần trăm"){
                            $gia_tri = $item->gia_tri." %";
                          }else{
                            $gia_tri = number_format( $item->gia_tri)." VNĐ";
                          }
                        
                          ?>
                          <p class="card-text">Giá Trị {{$gia_tri}}</p>
                          <p class="card-text">Thời Gian Sử Dụng Đến: {{$item->han_su_dung}}</p>
                        </div>
                      </div>
                </div>
                @endforeach

            </div>
            <br>
      

            <div class="row">
                <div class="title-section text-center col-12">
                    <h2><span class="icon-newspaper-o"></span><strong class="text-dark"> Sức Khỏe Mỗi Ngày</strong></h2>
                </div>
            </div>

            @foreach ($tin_tuc as $tin_tuc)
                <div class="row ">
                    <div class="col-md-5 ">
                        <div class="border text-center"><img class="img-thumbnail"
                                src="{{ URL::asset('resources/pharma/hinh/hinh_tin_tuc/' . $tin_tuc->hinh_tin_tuc) }}"
                                alt="{{ $tin_tuc->tieu_de }}">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <h3 class="text-primary">{{ $tin_tuc->tieu_de }}</h3>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <p><i class="fa fa-user"></i> {{ $tin_tuc->nhan_vien }}</p>
                            </div>
                            <div class="col-md-6">
                                <p style="text-align: end">{{ $tin_tuc->created_at }}</p>
                            </div>
                        </div>
                        <div class="rowt">
                            <p>{{ $tin_tuc->tom_tat }}</p>
                        </div>
                        <div class="row ">
                            <a class="btn btn-sm btn-outline-primary" href="{{ url('tin-tuc/' . $tin_tuc->id) }}">Chi
                                Tiết</a>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
        </div>


        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2><strong class="text-dark"><span class="icon-youtube-play"></span> Video Truyền Thông</strong>
                    </h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-9">
                    @foreach ($video as $item)
                        <div class="row">
                            <h3 class="text-dark"><strong>{{ $item->ten_video }}</strong></h3>

                        </div>
                        <div class="row justify-content-center">
                            @php
                                echo $item->ma_nhung;
                            @endphp
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>

        </div>

    </div>


@endsection
