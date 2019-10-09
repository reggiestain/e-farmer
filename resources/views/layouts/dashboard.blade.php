<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>E-Farmer - Login</title>

        <!-- Custom fonts for this template-->
        <link href="{{ URL::asset('js/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.css') }}">        
    </head>        
    <body id="page-top">
    <div id="wrapper">
    <!-- Sidebar -->
    @include('includes.sidebar')
    <!-- End of Sidebar -->
    @yield('content')  
    
  <!-- Page Wrapper -->
    <!-- Bootstrap core JavaScript-->
  <script src="{{ URL::asset('js/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ URL::asset('js/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ URL::asset('js/sb-admin-2.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ URL::asset('js/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ URL::asset('js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ URL::asset('js/demo/chart-pie-demo.js') }}"></script>
  </body>
</html>