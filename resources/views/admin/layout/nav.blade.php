<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#"><strong
            class="text-primary">Pharma</strong>NQH</a></a>

    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
        data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search..." aria-label="Search"
        id="filter">



    @guest
        <div class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a href="{{ url('user/dang-ky-user') }}"><span data-feather="log-in"></span></a>
            </li>
        </div>
    @else

        <div class="navbar-nav px-3">
            <li class="nav-item text-nowrap ">
                <img src="{{ URL::asset('resources/pharma/hinh/hinh_nhan_vien/' . Auth::user()->image) }}"
                    alt="{{ Auth::user()->name }}" width="36px" class="rounded-circle">
            </li>

        </div>
        <div class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ url('user/dang-xuat') }}">
                    <span data-feather="log-out"></span></a>
            </li>
        </div>

    @endguest
</nav>