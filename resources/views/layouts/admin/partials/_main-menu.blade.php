<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-sticky navbar-light navbar-without-dd-arrow"
     role="navigation" data-menu="menu-wrapper">
    <div class="navbar-header d-xl-none d-block">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{route('dashboard')}}">
                    <div class="brand-logo">
                        <img class="logo"
                             src="{{ config('settings.admin_logo') ? asset(config('constants.SETTING_IMAGE_URL').config('settings.admin_logo')) : asset('admin/images/logo/hometrack_admin_logo.png')}}"
                             alt="avatar" width="175">
                    </div>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i>
                    <i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="navbar-container main-menu-content" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="filled">
            <li class="{{ \Route::is('dashboard')  ? 'active' : '' }} nav-item"><a class=" nav-link"
                                                                                   href="{{route('dashboard')}}"><i
                            class="bx bxs-dashboard"></i><span data-i18n="Dashboard">Dashboard</span></a>
            </li>
            <li class="{{ \Route::is('clients.*')  ? 'active' : '' }} nav-item"><a class=" nav-link"
                                                                                   href="{{route('clients.index')}}"><i
                            class="bx bx-user"></i><span data-i18n="Clients">Clients</span></a>
            </li>

            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                                                                  data-toggle="dropdown"><i class="bx bx-dollar"></i><span
                        data-i18n="Service Pricing">Service Pricing</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ \Route::is('services.*')  ? 'active' : '' }}"><a
                            class="dropdown-item align-items-center" data-toggle="dropdown"
                            href="{{route('services.index')}}"><i class="bx bx-right-arrow-alt text-hena"></i><span
                                class="menu-item text-truncate" data-i18n="Services">Services</span></a>
                    <li class="{{ \Route::is('regions.*')  ? 'active' : '' }}"><a
                            class="dropdown-item align-items-center" data-toggle="dropdown"
                            href="{{route('regions.index')}}"><i
                                class="bx bx-right-arrow-alt text-hena"></i><span class="menu-item text-truncate"
                                                                                  data-i18n="Regions">Regions</span></a>
                    <li class="{{ \Route::is('service-types.*')  ? 'active' : '' }}"><a
                            class="dropdown-item align-items-center" data-toggle="dropdown"
                            href="{{route('service-types.index')}}"><i
                                class="bx bx-right-arrow-alt text-hena"></i><span class="menu-item text-truncate"
                                                                                  data-i18n="Service Types">Service Types</span></a>
                    </li>
                </ul>
            </li>

            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                                                                  data-toggle="dropdown"><i class="bx bx-cog"></i><span
                            data-i18n="Settings">Settings</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ \Route::is('settings.*')  ? 'active' : '' }}"><a
                                class="dropdown-item align-items-center" data-toggle="dropdown"
                                href="{{route('settings.index')}}"><i class="bx bx-right-arrow-alt text-hena"></i><span
                                    class="menu-item text-truncate" data-i18n="General Settings">General Settings</span></a>
                    <li class="{{ \Route::is('email-templates.*')  ? 'active' : '' }}"><a
                                class="dropdown-item align-items-center" data-toggle="dropdown"
                                href="{{route('email-templates.index')}}"><i
                                    class="bx bx-right-arrow-alt text-hena"></i><span class="menu-item text-truncate"
                                                                                      data-i18n="Email Templates">Email Templates</span></a>
                    <li class="{{ \Route::is('sms-templates.*')  ? 'active' : '' }}"><a
                                class="dropdown-item align-items-center" data-toggle="dropdown"
                                href="{{route('sms-templates.index')}}"><i
                                    class="bx bx-right-arrow-alt text-hena"></i><span class="menu-item text-truncate"
                                                                                      data-i18n="SMS Templates">SMS Templates</span></a>
                    </li>
                    <li class="{{ \Route::is('states.*')  ? 'active' : '' }}"><a
                                class="dropdown-item align-items-center" data-toggle="dropdown"
                                href="{{route('states.index')}}"><i class="bx bx-right-arrow-alt text-hena"></i><span
                                    class="menu-item text-truncate" data-i18n="States">States</span></a>
                    <li class="{{ \Route::is('users.*')  ? 'active' : '' }}"><a class="dropdown-item align-items-center"
                                                                                data-toggle="dropdown"
                                                                                href="{{route('users.index')}}"><i
                                    class="bx bx-right-arrow-alt text-hena"></i><span class="menu-item text-truncate"
                                                                                      data-i18n="Users">Users</span></a>
                    <li class="{{ \Route::is('roles.*')  ? 'active' : '' }}"><a class="dropdown-item align-items-center"
                                                                                data-toggle="dropdown"
                                                                                href="{{route('roles.index')}}"><i
                                    class="bx bx-right-arrow-alt text-hena"></i><span class="menu-item text-truncate"
                                                                                      data-i18n="Roles">Roles</span></a>
                    </li>
                    <li class="{{ \Route::is('sales-tax.*')  ? 'active' : '' }}"><a
                                class="dropdown-item align-items-center"
                                data-toggle="dropdown"
                                href="{{route('sales-tax.index')}}"><i
                                    class="bx bx-right-arrow-alt text-hena"></i><span class="menu-item text-truncate"
                                                                                      data-i18n="Roles">Sales Tax</span></a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>
</div>
