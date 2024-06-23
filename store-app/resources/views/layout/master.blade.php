<!DOCTYPE html>
@php
    $locale = app()->getLocale();
    $dir = ($locale == 'ar') ? 'rtl' : 'ltr';
@endphp
<html dir="{{ $dir }}">

<head>
    <!-- Page Head Starts-->
        @include('layout.head')
    <!-- Page Head End-->

    <!-- Page Css Start-->
        @include('layout.css')
    <!-- Page Css End-->

</head>

<body class="{{ $dir }}">
    <!-- tap on top starts-->
        <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->

    <!-- Loader starts-->
        <div class="loader-wrapper">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    <!-- Loader ends-->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        <!-- Page Header Start-->
            @include('layout.header')
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper horizontal-menu">

            <!-- Page Sidebar Start-->
                @include('layout.sidebar')
            <!-- Page Sidebar Ends-->

            <div class="page-body">

            {{-- Main content Start --}}
                @yield('main-content')
            {{-- Main content End --}}

            </div>
            <!-- footer start-->
                @include('layout.footer')
            <!-- footer end-->
        </div>
    </div>

    <!-- Script Start-->
        @include('layout.script')
    <!-- Script End-->
    @include('sweetalert::alert')

</body>

</html>
