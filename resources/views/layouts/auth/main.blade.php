<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">  
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta name="author" content="Hometrack">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>{!! App::environment() != 'production' ? App::environment().' -- ' : '' !!}Hometrack</title>
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
  @include('layouts.auth.partials._head')
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

  <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @yield('content')
        </div>
      </div>
    </div>
  <!-- END: Content-->
    @include('layouts.auth.partials._footer-script')   

    <!-- BEGIN: Page JS-->
    @yield('page-script')
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>