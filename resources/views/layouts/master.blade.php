<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME') }}</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.css">
  
  @livewireStyles
  @yield('css')
  @stack('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts.navbar-menu')

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('main') }}" class="brand-link">
      <img src="{{ asset('assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ env("APP_NAME") }}</span>
    </a>

    <div class="sidebar ">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ ucfirst(auth()->user()->nama) }}</a>
        </div>
        <div class="btn">
          <a href="{{ route('logout') }}" class="btn btn-block btn-outline-secondary btn-xs" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span><i class="fas fa-power-off"></i></span>&ensp;
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </div>
      </div> 

      <nav class="mt-2 ">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
        {{-- <ul class="nav nav-pills nav-sidebar flex-column" id="vert-tabs-tab" role="tablist" aria-orientation="vertical" data-widget="treeview" data-accordion="false"> --}}
          @include('layouts.sidebar') 
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    {{-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="content pt-2">
      <div class="container-fluid">
        <div class="row">
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>{{ env('APP_DESC') }}</h5>
      <p>By. Me Maess</p>
    </div>
  </aside>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      What you need, it's here folks
    </div>
    <strong>Copyright &copy; 2021-<script>document.write(new Date().getFullYear())</script>&ensp;<a href="{{ url('http://localhost') }}">Sistem Informasi Kepegawaian - BPKPD </a>&nbsp;</strong> All rights reserved.
  </footer>
</div>

<script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets') }}/dist/js/adminlte.min.js"></script>
<script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>
@if (Session::has('success'))
  <script>
    toastr.success("{{ Session::get('success') }}");
  </script>
@endif

@if (Session::has('error'))
  <script>
    toastr.error("{{ Session::get('error') }}");
  </script>
@endif

@if (Session::has('info'))
  <script>
    toastr.info("{{ Session::get('info') }}");
  </script>
@endif

@if (Session::has('warning'))
  <script>
    toastr.warning("{{ Session::get('warning') }}");
  </script>
@endif

@livewireScripts
@yield('script')
@stack('script')
</body>
</html>
