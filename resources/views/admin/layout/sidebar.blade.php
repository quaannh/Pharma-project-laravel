<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
    <div class="sidebar-sticky pt-3 ">
        <ul class="nav flex-column" id="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/dashboard/danh-sach') }}">
                    <span data-feather="monitor"></span>
                    <span>Dashboard</span>

                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('admin/order/danh-sach') }}">
                    <span data-feather="file"></span>
                    Đơn Hàng
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/san-pham/danh-sach') }}">
                    <span data-feather="package"></span>
                    Sản Phẩm
                </a>
            </li>

            <li class="nav-item">

                <a class="nav-link" href="{{ url('admin/loai-san-pham/danh-sach') }}">
                    <span data-feather="layers"></span>
                    Loại Sản Phẩm

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/stock/danh-sach') }}">
                    <span data-feather="home"></span>
                    Quản Lý Kho
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/member/danh-sach') }}">
                    <span data-feather="users"></span>
                    Thành Viên
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/coupons/danh-sach') }}">
                    <span data-feather="gift"></span>
                    Coupon
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/slider/danh-sach') }}">
                    <span data-feather="sliders"></span>
                    Slider
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/tin-tuc/danh-sach') }}">
                    <span data-feather="tv"></span>
                    Tin Tức
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/mess/danh-sach') }}">
                    <span data-feather="mail"></span>
                    Liên Hệ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/log/danh-sach') }}">
                    <span data-feather="activity"></span>
                    Log
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/report/danh-sach') }}">
                    <span data-feather="bar-chart"></span>
                    Báo Cáo
                </a>
            </li>
        </ul>

        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <!--
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="alert-circle"></span>
                   
                   
                </a>
                
            </li>
         
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                </a>
            </li>
             -->
        </ul>

    </div>
</nav>