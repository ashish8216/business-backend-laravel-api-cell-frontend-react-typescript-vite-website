<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  @stack('meta')

  <title>@yield('app.name')  || {{ config('app.name', 'Laravel') }}</title>


  <link rel="apple-touch-icon" sizes="180x180" href="{{url('assets/images/favicons/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{url('assets/images/favicons/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{url('assets/images/favicons/favicon-16x16.png')}}">
  <link rel="manifest" href="{{url('assets/images/favicon/site.webmanifest')}}">

 <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css')}}">

  @stack('styles')

</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
  <!-- Navbar -->
 @include("admin::includes/sidebar")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

                          @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include ("admin::includes/footer")

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js')}}"></script>

<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>

<script>
  document.getElementById("year").innerHTML = new Date().getFullYear();

    $('#lfm').filemanager('file');
  $('#lf').filemanager('file');
  $('#l').filemanager('file');
  $('#f').filemanager('file');
  $('#q').filemanager('file')
</script>

@stack('scripts')
</body>
</html>
