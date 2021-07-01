<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto">
          <a class="navbar-brand" href="{{route('dashboard')}}">
            <div class="brand-logo">
              <img class="logo" src="{{asset('admin/images/logo/hometrack_admin_logo.png')}}" alt="avatar" height="26" width="185">
            </div>
            <!-- <h2 class="brand-text mb-0">Hometrack</h2> -->
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
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
        <li class="active nav-item">
          <a href="{{route('dashboard')}}">
           <i class="bx bx-desktop"></i>
            <span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span>
          </a>
        </li>

        <li class=" nav-item"><a href="#"><i class="bx bx-receipt"></i><span class="menu-title text-truncate" data-i18n="Billing">Billing</span></a>
          <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Open Billing">Open Billing</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Open Billing - Products">Open Billing - Products</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Closed Billing">Closed Billing</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Billing Dashboard">Billing Dashboard</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Discounts">Discounts</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Service Pricing">Service Pricing</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Product Pricing">Product Pricing</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Sales Tax">Sales Tax</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Client Pricing">Client Pricing</span></a>
            </li>
          </ul>
        </li>

        <li class=" nav-item"><a href="#"><i class="bx bx-user"></i><span class="menu-title text-truncate" data-i18n="Clients">Clients</span></a>
          <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="View All">View All</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="New">New</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Import from RazorSync">Import from RazorSync</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Clients Report">Clients Report</span></a>
            </li>
          </ul>
        </li>

        <li class=" nav-item"><a href="#"><i class="bx bx-building-house"></i><span class="menu-title text-truncate" data-i18n="Properties">Properties</span></a>
          <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="View All">View All</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="New">New</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Image Upload">Image Upload</span></a>
            </li>
          </ul>
        </li>

        <li class=" nav-item"><a href="#"><i class="bx bx-support"></i><span class="menu-title text-truncate" data-i18n="Service Requests">Service Requests</span></a>
          <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="View All">View All</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="New">New</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="View Archived">View Archived</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Calendar">Calendar</span></a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#">
          <i class="bx bx-photo-album"></i>
            <span class="menu-title text-truncate" data-i18n="Photos">Photos</span>
          </a>
        </li>

        <li class=" nav-item"><a href="#"><i class="bx bx-photo-album"></i><span class="menu-title text-truncate" data-i18n="Products">Products</span></a>
          <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="View All">View All</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="New">New</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Product Settings">Product Settings</span></a>
            </li>
          </ul>
        </li>

        <li class=" nav-item"><a href="#"><i class="bx bxs-wrench"></i><span class="menu-title text-truncate" data-i18n="Settings">Settings</span></a>
          <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="{{route('settings.index')}}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="General Settings">General Settings</span></a>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Email Templates">Email Templates</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Appointment Reminder Logs">Appointment Reminder Logs</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="RazorSync">RazorSync</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Photographers">Photographers</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="{{route('users.index')}}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Users">Users</span></a>
            <li><a class="d-flex align-items-center" href="{{route('roles.index')}}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Roles">Roles</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Billing">Billing</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Appointment Tracker Options">Appointment Tracker Options</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="SMS Notifications">SMS Notifications</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="System Info">System Info</span></a>
            </li>
          </ul>
        </li>

        <li class=" nav-item"><a href="#"><i class="bx bx-purchase-tag"></i><span class="menu-title text-truncate" data-i18n="Sales">Sales</span></a>
          <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Commission Report">Commission Report</span></a>
            </li>
          </ul>
        </li>

        <li class=" nav-item"><a href="#"><i class="bx bx-receipt"></i><span class="menu-title text-truncate" data-i18n="Reports">Reports</span></a>
          <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Inactive Clients Report">Inactive Clients Report</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Property's Mistakes Report">Property's Mistakes Report</span></a>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </div>