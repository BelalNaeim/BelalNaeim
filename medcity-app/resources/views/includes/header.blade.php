<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                @if (Auth::user()->lang == 'ar')
                    <a class="" href="{{ route('change.language', 'en') }}">
                        <img src="{{ asset('uploads/flags/united-states.png') }}" alt="">
                        English</a>
                @else
                    <a class="" href="{{ route('change.language', 'ar') }}">
                        <img src="{{ asset('uploads/flags/saudi-arabia.png') }}" alt="">

                        العربية</a>
                @endif
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
            <li class="nav-item dropdown">




            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

    </nav>
    <!-- /.navbar -->
    @php
        $site_settings = DB::table('settings')->first();
        // dd($site_settings);
    @endphp
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
            <img src="{{ URL::asset('pics/' . $site_settings->logo) }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">{{ $site_settings->app_name }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ URL::asset(\Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="" class="nav-link" id="dashboardList">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                {{ __('dashboard') }}
                            </p>
                        </a>
                    </li>



                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link" id="adminsList">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                {{ __('Sliders') }}
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="{{ route('sliders.index') }}" class="nav-link">
                                    <i class="far fa-eye nav-icon"></i>
                                    <p>{{ __('All Sliders') }}</p>


                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('sliders.create') }}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>{{ __('add slider') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link" id="adminsList">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                {{ __('Files') }}
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="{{ route('files.index') }}" class="nav-link">
                                    <i class="far fa-eye nav-icon"></i>
                                    <p>{{ __('All Files') }}</p>


                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('files.create') }}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>{{ __('add Files') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link" id="adminsList">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                {{ __('Services') }}
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="{{ route('services.index') }}" class="nav-link">
                                    <i class="far fa-eye nav-icon"></i>
                                    <p>{{ __('show_services') }}</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('services.create') }}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>{{ __('create_service') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link" id="adminsList">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                {{ __('Orders') }}
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="{{ route('orders.index') }}" class="nav-link">
                                    <i class="far fa-eye nav-icon"></i>
                                    <p>{{ __('show_order') }}</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('orders.create') }}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>{{ __('create_order') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link" id="adminsList">
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                {{ __('Gallery') }}
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="{{ route('galleries.index') }}" class="nav-link">
                                    <i class="far fa-eye nav-icon"></i>
                                    <p>{{ __('show_galleries') }}</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('galleries.create') }}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>{{ __('create_galleries') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>




                    <li class="nav-item">
                        <a href="{{ route('profile.index') }}" class="nav-link" id="profileList">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                {{ __('profile') }}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link" id="adminsList">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                {{ __('Users') }}
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="far fa-eye nav-icon"></i>
                                    <p>{{ __('show_users') }}</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('users.create') }}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>{{ __('create_users') }}</p>
                                </a>
                            </li>





                        </ul>
                    </li>



                    <li class="nav-header">{{ __('options') }}</li>
                    <li class="nav-item">
                        <a href="{{ route('settings.index') }}" id="settingsList" class="nav-link">
                            <i class="fas fa-cogs nav-icon text-warning"></i>
                            <p>{{ __('settings') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="logout_a" class="nav-link" style="color:white;cursor:pointer">
                            <i class="nav-icon fa fa-power-off text-danger"></i>
                            <p class="text">{{ __('logout') }}</p>
                        </a>
                    </li>
                    <form id="logoutForm" action="{{ route('admin.logout') }}" method="GET"
                        style="display: none">
                        @csrf
                    </form>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ __('dashboard') }}</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href='@yield('link')'>@yield('page')</a></li>
                            <li class="breadcrumb-item active">{{ __('dashboard') }}</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
