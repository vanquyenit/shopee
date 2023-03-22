<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AdminLTE 3 | Dashboard 2</title>
  @section('css')
    <!-- Font Awesome Icons -->
    {{ Html::style('plugins/fontawesome-free/css/all.min.css') }}
    <!-- overlayScrollbars -->
    {{ Html::style('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}
    <!-- Theme style -->
    {{ Html::style('plugins/daterangepicker/daterangepicker.css') }}
    {{ Html::style('plugins/select2/css/select2.min.css') }}
    {{ Html::style('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}
    {{ Html::style('plugins/toastr/toastr.min.css') }}
    {{ Html::style('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}
    {{ Html::style('dist/css/adminlte.min.css') }}
  @show
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed control-sidebar-slide-open">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
    @include('admin.layouts.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('admin.layouts.leftbar')

  <!-- Main content -->
  @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@section('footerscript')
{{ Html::script('plugins/jquery/jquery.min.js') }}
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
{{ Html::script('plugins/bootstrap/js/bootstrap.bundle.min.js') }}
{{ Html::script('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}
{{ Html::script('plugins/daterangepicker/daterangepicker.js') }}
{{ Html::script('plugins/sweetalert2/sweetalert2.min.js') }}
{{ Html::script('plugins/toastr/toastr.min.js') }}
{{ Html::script('dist/js/adminlte.js') }}
{{ Html::script('dist/js/demo.js') }}

<script>
  $(function() {

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    @if(Session::has('info'))
        msg= "{{ Session::get('info') }}";
        toastr.info(msg);
    @elseif(Session::has('success'))
        msg= "{{ Session::get('success') }}";
        toastr.success(msg);
    @elseif(Session::has('warning'))
        msg= "{{ Session::get('warning') }}";
        toastr.warning(msg);
    @elseif(Session::has('error'))
        msg= "{{ Session::get('error') }}";
        toastr.error(msg);
    @endif
  });
</script>

@show
