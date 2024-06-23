<div id="header" class="container-fluid">
    <div class="d-flex flex-wrap justify-content-md-between py-3">
        <a href="/" class="d-flex align-items-center mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="{{ asset('assets/images/logo.png') }}" height="100"/>
        </a>
        <form class="header-input justify-content-center col-md-4 mrl-auto align-self-center" id="search-form">
            <input type="text" class="form-control" placeholder="ابحث في المتجر" style="height: 70%;">
        </form>
        <ul id="header-nav" class="nav mb-2 justify-content-center mb-md-0 align-self-center">
            @auth
                <li class="px-1"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل الخروج</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth
            @guest
                <li class="px-1"><a href="{{url('login')}}">تسجيل الدخول</a></li>
            @endguest
            <li class="px-1">|</li>
        </ul>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-color">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav ms-auto" id="mynav-ul">
                <li class="nav-item">
                    <a class="nav-link active" href="#">الصفحة الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">جميع المنتجات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">توصيل سريع</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">غرفة
                        المعيشة</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Link</a></li>
                        <li><a class="dropdown-item" href="#">Another link</a></li>
                        <li><a class="dropdown-item" href="#">A third link</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">الاضاءة</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">غرف النوم</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Link</a></li>
                        <li><a class="dropdown-item" href="#">Another link</a></li>
                        <li><a class="dropdown-item" href="#">A third link</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">تجهيزات
                        الحمام</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Link</a></li>
                        <li><a class="dropdown-item" href="#">Another link</a></li>
                        <li><a class="dropdown-item" href="#">A third link</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">غرف الطعام</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Link</a></li>
                        <li><a class="dropdown-item" href="#">Another link</a></li>
                        <li><a class="dropdown-item" href="#">A third link</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">ديكور
                        المنزل</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a class="dropdown-item" href="#">رابط</a></li>
                        <li><a class="dropdown-item" href="#">Another link</a></li>
                        <li><a class="dropdown-item" href="#">A third link</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">جميع التصنيفات</a>
                </li>
            </ul>
        </div>
        <div class="d-flex">
            <button type="button" class="btn btn-outline-brown">خيارات الدفع والتوصيل</button>
        </div>
    </div>
</nav>
