<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    @include('layout/head')
</head>

<body>
    <div class="site-wrap">
        @include('layout/nav')
        <!-- Content Container -->
       
        @yield('content')
        
        <!-- Footer -->
        @include('layout/footer')
    </div>
    @include('layout/script')
    @yield('script')
</body>

</html>
