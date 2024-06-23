<div class="nk-header-tools">
    <ul class="nk-quick-nav">
        <li class="dropdown user-dropdown">
            <a href="#" class="dropdown-toggle me-lg-n1" data-bs-toggle="dropdown">
                <div class="user-toggle">
                    <div class="user-avatar sm">
                        <em class="icon ni ni-user-alt"></em>
                    </div>
                </div>
            </a>
            @php
                $avatar = substr(auth()->user()->name, 0, 2);
            @endphp
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                    <div class="user-card">
                        <div class="user-avatar">
                            <span>{{ $avatar }}</span>
                        </div>
                        <div class="user-info">
                            <span class="lead-text">{{ auth()->user()->name }}</span>
                        </div>
                        <div class="user-action">
                            <a class="btn btn-icon me-n2" href="#"><em class="icon ni ni-sign-xem"></em></a>
                        </div>
                    </div>
                </div>
                <div class="dropdown-inner">
                    <ul class="link-list">
                        <li><a href="html/changePassword.html"><em class="icon ni ni-sign-xem"></em><span>Change
                                    Password</span></a></li>
                        <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark
                                    Mode</span></a></li>
                    </ul>
                </div>
                <div class="dropdown-inner">
                    <ul class="link-list">
                        <li><a href="{{ route('logout') }}"><em class="icon ni ni-signout"></em><span>Sign
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
