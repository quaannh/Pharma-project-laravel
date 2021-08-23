<!-- Tìm Kiếm-->
@php
if (isset($_GET['gia_tri_tim'])) {
    $gia_tri_tim = $_GET['gia_tri_tim'];
} else {
    $gia_tri_tim = 'Bạn tìm kiếm sản phẩm gì...';
}
@endphp

<div class="site-navbar  py-2">
        <div class="search-wrap">
            <div class="container">
                <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                <form action="/san-pham/tim-kiem/" method="GET">
                    <input name="gia_tri_tim" type="text" class="form-control" placeholder="@php
                        echo $gia_tri_tim;
                    @endphp"
                        required="required">
                </form>
            </div>
        </div>
    
        <div class="container " >
            <div class="d-flex align-items-center justify-content-between">
                <div class="logo">
                    <div class="site-logo">
                        <a href="{{ url('/trang-chu') }}" class="js-logo-clone"><strong
                                class="text-primary">Pharma</strong>NQH</a>
                    </div>
                </div>
    
                <div class="main-nav d-none d-lg-block">
                    <nav class="site-navigation  text-right text-md-center" role="navigation">
                        <ul class="site-menu js-clone-nav d-none d-lg-block" id="nav">
                            <li><a href="{{ url('/trang-chu') }}">Trang Chủ</a></li>
                            <li class="has-children">
                                <a href="#">Danh Mục</a>
                                <ul class="dropdown">
                                    @foreach ($dslsp as $item)
                                        <li><a href="{{ url('loai-san-pham/danh-sach/' . $item->id) }}">{{ $item->ten_loai }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ url('san-pham/danh-sach') }}">Sản Phẩm</a></li>
                            <li><a href="{{ url('/tin-tuc') }}">Tin Tức</a></li>
                            <li><a href="{{ url('/lien-he') }}">Liên Hệ</a></li>
                        </ul>
                    </nav>
					
                </div>
    
                <div class="icons">
                    <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
                    <a href="{{ url('khach-hang/gio-hang') }}" class="icons-btn d-inline-block bag">
                        <span class="icon-shopping-bag"></span>
                        <span class="number"><?php echo Cart::count(); ?></span>
                    </a>
    
                    @if (Session::has('id_thanh_vien'))
	
					<div class="btn-group" >
					  <img src="{{ URL::asset('resources/pharma/hinh/hinh_thanh_vien/' . Session::get('hinh_dai_dien')) }}"  class="rounded-circle " style="cursor:pointer" data-toggle="dropdown" width="28px">
					  <div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" type="link" href="{{ url('thanh-vien/ho-so')}}">Xem Hồ Sơ</a>
						<a class="dropdown-item" type="link" href="{{ url('thanh-vien/cap-nhat-ho-so/'.Session::get('id_thanh_vien'))}}">Cập Nhật</a>
						<a class="dropdown-item" type="link" href="{{ url('thanh-vien/dang-xuat')}}">Đăng Xuất</a>
					  </div>
					</div>
					
                    @elseif(Cookie::has('id_thanh_vien'))
					<div class="btn-group" >
					  <img style="cursor:pointer" data-toggle="dropdown" width="28px" src="{{ URL::asset('resources/pharma/hinh/hinh_thanh_vien/' . Cookie::get('hinh_dai_dien')) }}"  class="rounded-circle">
					  <div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" type="link" href="{{ url('thanh-vien/ho-so')}}">Xem Hồ Sơ</a>
						<a class="dropdown-item" type="link" href="{{ url('thanh-vien/cap-nhat-ho-so/'.Cookie::get('id_thanh_vien'))}}">Cập Nhật</a>
						<a class="dropdown-item" type="link" href="{{ url('thanh-vien/dang-xuat')}}">Đăng Xuất</a>
					  </div>
					</div>
                    @else
                    <a class="icons-btn d-inline-block sign-in" href="{{ url('thanh-vien/dang-nhap') }}" data-toggle="tooltip" data-placement="bottom" title="Đăng Nhập">
						<span class="icon-sign-in" ></span>
					</a>
                    @endif
                    <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                            class="icon-menu"></span></a>
				
				</div>
            </div>
        </div>
   
</div>
