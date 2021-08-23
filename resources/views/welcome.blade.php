@extends('layout.master')
@section('title',
    'Công ty Cổ phần Dược phẩm NQH cung cấp sản phẩm theo tiêu chí Natural Life - Healthy Care - Quality
    Medical',)
@section('content')
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 mb-md-0">
                    <div class="card border mb-3">
                        <h3 class="h6 mb-0"><a class="d-block">Về tôi</a></h3>
                        <div class=" py-2 px-4">
                            <div class="row">
                                <div class="col-md-5">
                                    <img  src="{{ URL::asset('resources/pharma/hinh/hinh_thanh_vien/quannh.JPG') }}"
                                        class="card-thumbnail" width="200px" alt="nguyenhongquan">
                                </div>
                                <div class="col-md-7">
                                    <p class="mb-0">NGUYỄN HỒNG QUÂN</p>
                                    <p class="mb-0">06-01-1997 | nam</p>
                                    <p class="mb-0">An Giang</p>
                                    <p class="mb-0"></p>
                                    <hr>
                                    <p class="mb-0"><i class="fas fa-mobile-alt"></i> Số Điện Thoại: 0352 996 792</p>
                                    <p class="mb-0"><i class="far fa-envelope"></i> Email: nguyenhongquan060197@gmai.com </p>
                                    <p class="mb-0"><i class="fas fa-map-marker-alt"></i> Địa Chỉ: Quận 7, Hồ Chí Minh</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card border-secondary  mb-3" >
                        <div class="card-header">Về Website</div>
                        <div class="card-body">
                          <h5 class="card-title">Đồ án: Website Bán Và Quản Lý Thuốc</h5>
                          <p class="card-text"> Nền Tảng: <i class="fab fa-laravel"></i> Laravel | <i class="fas fa-database"></i> Database | <i class="fab fa-php"></i> PHP </p>
                        </div>
                      </div>
                </div>
                <div class="col-md-5">
                    <div class="card border-secondary  mb-3" >
                        <div class="card-header">Đại Học</div>
                        <div class="card-body">
                          <h5 class="card-title"> Viễn Thông </h5>
                          <p class="card-text"> <i class="fas fa-school"></i> Học viện Công Nghệ Bưu CHính Viễn Thông </p>
                          <p class="card-text"> <i class="fas fa-graduation-cap"></i> Kỹ sư Viễn Thông | <i class="fas fa-hourglass-half"></i> 2015 - 2020</p>
                        </div>
                      </div>
                </div>
                <div class="col-md-5">
                    <div class="card border-secondary  mb-3" >
                        <div class="card-header">Học Thêm</div>
                        <div class="card-body">
                          <h5 class="card-title"> Lập Trình Viên PHP Mã Nguồn Mở </h5>
                          <p class="card-text"> <i class="fas fa-school"></i> Trung Tâm Tin Học ĐH Khoa Học Tự Nhiên </p>
                          <p class="card-text"> <i class="fab fa-laravel"></i> Laravel | <i class="fas fa-database"></i> Database | <i class="fab fa-php"></i> PHP </p>
                          <p class="card-text"> <i class="far fa-calendar-alt"></i> 3/2021 - Nay</p>
                        </div>
                      </div>
                </div>
                <div class="col-md-5">
                    <div class="card border-secondary  mb-3" >
                        <div class="card-header">Sở Thích</div>
                        <div class="card-body">
                          <h5 class="card-title"> </h5>
                          <p class="card-text"> <i class="fas fa-route"></i> Du Lịch </p>
                          <p class="card-text"> <i class="fas fa-gamepad"></i> Chơi Game </p>
                          <p class="card-text"> <i class="fas fa-coffee"></i> Coffee | <i class="fas fa-music"></i> Nghe Nhạc</p>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
