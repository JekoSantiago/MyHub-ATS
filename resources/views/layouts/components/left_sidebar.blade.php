<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ URL::to('/dashboard') }}">
                        <i data-feather="airplay"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('/applicants') }}">
                        <i data-feather="users"></i>
                        <span> Applicants </span>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('/trainings') }}">
                        <i data-feather="award"></i>
                        <span> Trainings </span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ URL::to('/reports') }}">
                        <i data-feather="bar-chart-2"></i>
                        <span> Reports </span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="{{ URL::to('/maintenance') }}">
                        <i data-feather="settings"></i>
                        <span> Maintenance </span>
                    </a>
                </li> --}}
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>