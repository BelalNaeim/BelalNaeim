<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="{{ route('index') }}"><img class="img-fluid for-light"
                    src="{{ asset('assets/images/logo/logo.png') }}"alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"></i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('index') }}">
                <div class="icon-box-sidebar"><i data-feather="grid"></i></div>
            </a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="menu-box">
                        <ul>
                            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i
                                        data-feather="home"></i><span>{{ __('admin.settings') }}</span></a>
                                <ul class="sidebar-submenu">
                                    <li><a  href="{{ route('dashboard.settings.index') }}">{{ __('admin.settings') }}</a></li>
                                    <li><a class="lan-5" href="">Ecommerce</a></li>
                                </ul>
                            </li>

                            <li class="sidebar-list"><a class="sidebar-link sidebar-title"
                                    href="https://pixelstrap.freshdesk.com/support/solutions" target="_blank"><i
                                        data-feather="headphones"></i><span>Raise Support</span></a></li>
                            <li class="sidebar-list"><a class="sidebar-link sidebar-title"
                                    href="https://admin.pixelstrap.com/tivo/documentation/document/index.html"><i
                                        data-feather="file-text"></i><span>Documentation </span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
