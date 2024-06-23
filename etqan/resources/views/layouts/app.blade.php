
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

  @yield('style')

  @livewireStyles

</head>

<body>

    @include('layouts.includes.header')

  @yield('content')

  @include('layouts.includes.footer')
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  @yield('js')
  @livewireScripts
</body>
</html>
