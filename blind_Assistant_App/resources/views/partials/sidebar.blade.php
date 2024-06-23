<div class="nk-aside" data-content="sideNav" data-toggle-overlay="true" data-toggle-screen="lg" data-toggle-body="true">
    <div class="nk-sidebar-menu" data-simplebar>
        <ul class="nk-menu">
            <li class="nk-menu-heading">
                <h6 class="overline-title text-primary-alt">Main Panel Links</h6>
            </li><!-- .nk-menu-heading -->
            <li class="nk-menu-item">
                <a href="{{ route('home') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                    <span class="nk-menu-text">Dashboard</span>
                </a>
            </li><!-- .nk-menu-item -->
            <li class="nk-menu-item">
                <a href="{{ route('monies.index') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-list"></em></span>
                    <span class="nk-menu-text">Cash Money List</span>
                </a>
            </li><!-- .nk-menu-item -->
            <li class="nk-menu-item">
                <a href="{{ route('monies.create') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-plus"></em></span>
                    <span class="nk-menu-text">Add Cash Money</span>
                </a>
            </li><!-- .nk-menu-item -->
            <li class="nk-menu-item">
                <a href="{{ route('setting') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                    <span class="nk-menu-text">App Settings</span>
                </a>
            </li><!-- .nk-menu-item -->

        </ul><!-- .nk-menu -->
    </div><!-- .nk-sidebar-menu -->
    <div class="nk-aside-close">
        <a href="#" class="toggle" data-target="sideNav"><em class="icon ni ni-cross"></em></a>
    </div><!-- .nk-aside-close -->
</div><!-- .nk-aside -->
