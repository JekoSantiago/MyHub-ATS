<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="dropdown d-none d-lg-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                    <i class="fe-maximize noti-icon"></i>
                </a>
            </li>
            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('assets/images/app_thumbnail.jpg')}}" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        {{  base64_decode(Session::get('Emp_Name')) }} <i class="mdi mdi-chevron-down"></i> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <a class="dropdown-item notify-item" href="{{ URL::to('/logout') }}" >
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
    
        <!-- 
        <div class="logo-box">
            <a href="{{ config('app.myhub_url') }}" class="logo logo-light text-center">
                <span class="logo-sm logo-text-sm">ATS</span>
                <span class="logo-lg">
                    <img src="{{asset('assets/images/myhub-logo-white.png')}}" alt="MyHub Logo" height="65">
                </span>
            </a>
        </div>
         -->
    
        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>
            <li>
                <!-- LOGO -->
                <div class="app-logo">
                    <a href="{{ config('app.myhub_url') }}" class="logo logo-light text-center">
                        <img src="{{asset('assets/images/myhub-logo-white.png')}}" alt="MyHub Logo" height="60">
                        <span>Applicant Tracking</span>
                    </a>
                </div>
            </li>

        </ul>
        <div class="clearfix"></div>
    </div>
</div>
