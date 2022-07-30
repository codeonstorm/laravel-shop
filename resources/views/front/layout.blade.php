<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>@yield('page_title')</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/custom/style.css')}}">
  <!--style-link-->
  @section('stylesheet')
  @show
  <!--//style-link-->
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

<!--header-->
@section('header')
@show
<!--//header-->

<!-- Main Sidebar Container -->
@section('main-sidebar')
@show
<!-- //Main Sidebar Container -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrappers">
    <!-- Main content -->

        @section('container')

        @show
    <!-- /.content-wrapper -->


  <!--<div class="">
    <img src="file:///C:/Users/user/Pictures/Camera%20Roll/New%20Project%20(5).jpg" alt="">
  </div>-->

  <!--footer-->
  @section('footer')
  @show
  <!--//footer-->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS-->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('dist/js/front-custom.js')}}"></script>
<script src="{{asset('dist/js/custom/carousel.js')}}"></script>
</body>
</html>
