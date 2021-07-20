<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-static-top navbar-brand-center">
    <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item"><a class="navbar-brand" href="{{route('dashboard')}}">
                    <div class="brand-logo"><img class="logo"
                                                 src="{{ config('settings.admin_logo') ? asset(config('constants.SETTING_IMAGE_URL').config('settings.admin_logo')) : asset('admin/images/logo/hometrack_admin_logo.png')}}"
                                                 alt="avatar" width="175">

                    </div>
                </a></li>
        </ul>
    </div>
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu mr-auto"><a class="nav-link nav-menu-main menu-toggle"
                                                                    href="javascript:void(0);"><i
                                        class="bx bx-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip"
                                                                  data-placement="top" title="Email"><i
                                        class="ficon bx bx-envelope"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip"
                                                                  data-placement="top" title="Calendar"><i
                                        class="ficon bx bx-calendar-alt"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon bx bx-fullscreen"></i></a></li>
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label"
                                                                           href="javascript:void(0);"
                                                                           data-toggle="dropdown"><i
                                    class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i><span
                                    class="badge badge-pill badge-danger badge-up">0</span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header px-1 py-75 d-flex justify-content-between">
                                    <span class="notification-title">0 new Notification</span>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="javascript:void(0);" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span
                                        class="user-name">{{ Auth::user()->name }}</span><span
                                        class="user-status text-muted">Available</span></div>
                            <span>
                    <div class="avatar mr-1">
                      <span class="avatar-content">A</span>
                    </div>
                  </span></a>
                        <div class="dropdown-menu dropdown-menu-right pb-0">
                            <a class="dropdown-item" href="#"><i class="bx bx-user mr-50"></i> Edit
                                Profile</a>
                            <a class="dropdown-item" href="#"><i class="bx bx-envelope mr-50"></i> My Inbox</a>
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="bx bx-power-off mr-50"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>