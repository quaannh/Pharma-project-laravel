<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    @include('admin/layout/head')
</head>

<body>
    @include('admin/layout/nav')
    <div class="container-fluid">
        <div class="row">
            @include('admin/layout/sidebar')
            <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </div>
        </div>
    </div>
    @include('admin/layout/script')
    @yield('script')
</body>

</html>
