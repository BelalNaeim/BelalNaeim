<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>




    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{URL::asset('assets/css/design.css')}}" rel="stylesheet">


</head>
<body>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src='../assets/js/designn.js'></script>
</body>
</html>
