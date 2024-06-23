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
                             <span>ME</span>
                         </div>
                         <div class="user-info">
                             <span class="lead-text">Mahmoud</span>
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
                                     Mode</span></a></li>
                     </ul>
                 </div>
                 <div class="dropdown-inner">
                     <ul class="link-list">
                         <li><a href="{{ route('logout') }}"><em class="icon ni ni-signout"></em><span>Sign
                                     out</span></a>
                         </li>
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
