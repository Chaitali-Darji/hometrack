<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta name="author" content="Hometrack">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{config('settings.name')}}</title>
  
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
  @include('layouts.admin.partials._head')
</head>
<!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
      @include('layouts.admin.partials._header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
      @include('layouts.admin.partials._main-menu')
    <!-- END: Main Menu-->

    @yield('content')

    <!-- BEGIN: Footer-->
      @include('layouts.admin.partials._footer')
    <!-- END: Footer-->

      @include('layouts.admin.partials._footer-script')   

    <!-- BEGIN: Page JS-->
      @yield('page-script')
    <!-- END: Page JS-->

  </body>
</html>