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
  <body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    
    <!-- BEGIN: Content-->
      @yield('content')
    <!-- END: Content-->


   @include('layouts.admin.partials._footer-script')   

  </body>
  <!-- END: Body-->

</html>