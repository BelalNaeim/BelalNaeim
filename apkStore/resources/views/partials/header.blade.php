<div class="nk-header-tools">
    <ul class="nk-quick-nav">
        <li class="dropdown language-dropdown d-none d-sm-block me-n1">
            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                <div class="quick-icon border border-light">
                    <img class="icon" src="{{ asset('images/flags/english-sq.png') }}" alt="">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1">
                <ul class="language-list">
                    <li>
                        <a href="#" class="language-item">
                            <img src="{{ asset('images/flags/english.png') }}" alt="" class="language-flag">
                            <span class="language-name">English</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="language-item">
                            <img src="{{ asset('images/flags/arabic.png') }}" alt="" class="language-flag">
                            <span class="language-name">Arabic (Soon)</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li><!-- .dropdown -->
        <li class="dropdown notification-dropdown">
            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end dropdown-menu-s1">
                <div class="dropdown-head">
                    <span class="sub-title nk-dropdown-title">Notifications</span>
                    <a href="#">Mark All as Read</a>
                </div>
                <div class="dropdown-body">
                    <div class="nk-notification">
                        <div class="nk-notification-item dropdown-inner">
                            <div class="nk-notification-icon">
                                <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                            </div>
                            <div class="nk-notification-content">
                                <div class="nk-notification-text">You have requested to
                                    <span>Widthdrawl</span>
                                </div>
                                <div class="nk-notification-time">2 hrs ago</div>
                            </div>
                        </div>
                    </div><!-- .nk-notification -->
                </div><!-- .nk-dropdown-body -->
                <div class="dropdown-foot center">
                    <a href="#">View All</a>
                </div>
            </div>
        </li><!-- .dropdown -->
        <li class="dropdown user-dropdown">
            <a href="#" class="dropdown-toggle me-lg-n1" data-bs-toggle="dropdown">
                <div class="user-toggle">
                    <div class="user-avatar sm">
                        <em class="icon ni ni-user-alt"></em>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                    <div class="user-card">
                        <div class="user-avatar">
                            <span>Name</span>
                        </div>
                        <div class="user-info">
                            <span class="lead-text">{{ Auth::user()->name }}</span>
                        </div>
                        <div class="user-action">
                            <a class="btn btn-icon me-n2" href="html/changePassword.html"><em
                                    class="icon ni ni-sign-xem"></em></a>
                        </div>
                    </div>
                </div>
                <div class="dropdown-inner">
                    <ul class="link-list">
                        <li><a href="html/changePassword.html"><em class="icon ni ni-sign-xem"></em><span>Change
                                    Password</span></a></li>
                        <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark
                                    Mode</span></a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown-inner">
                    <ul class="link-list">
                        <li><a href="{{ route('admin.logout') }}"><em class="icon ni ni-signout"></em><span>Sign
                                    out</span></a></li>
                    </ul>
                </div>
            </div>
        </li><!-- .dropdown -->
        <li class="d-lg-none">
            <a href="#" class="toggle nk-quick-nav-icon me-n1" data-target="sideNav"><em
                    class="icon ni ni-menu"></em></a>
        </li>
    </ul><!-- .nk-quick-nav -->
</div><!-- .nk-header-tools -->
