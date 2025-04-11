<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Post">
    <meta name="author" content="Vinsensius Alvianto">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Doorbell</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <!-- Additional page-specific style -->
    @stack('styles')

  </head>
  <body class="hold-transition sidebar-mini sidebar-collapse {{ session('theme', 'light') == 'dark' ? 'dark-mode' : '' }}" id="body-element">
    <div class="wrapper">
      <x-dashboard.nav-bar2></x-dashboard.nav-bar2>
      <x-dashboard.sidebar></x-dashboard.sidebar>
      <div class="content-wrapper">
        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          {{ $slot }}
        </main>
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Custom js for this template -->
    <script src="{{ asset('/js/dashboard2.js') }}"></script>

    <!-- Additional page-specific scripts -->
    @stack('scripts')

		<!-- Bootstrap -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/9dfd87037d.js" crossorigin="anonymous"></script>

  </body>
</html>
