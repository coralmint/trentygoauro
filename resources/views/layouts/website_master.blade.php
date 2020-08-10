<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Trenty.Go</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="{{ asset('public/assets/home_screen/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('public/assets/home_screen/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- Vendor CSS Files -->
  <link href="{{ asset('public/assets/home_screen/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/home_screen/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/home_screen/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/home_screen/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/home_screen/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/home_screen/assets/vendor/aos/aos.css') }}" rel="stylesheet">


    <link href="{{ asset('theme_files/plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme_files/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme_files/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />         
    <link href="{{ asset('theme_files/plugins/clockpicker/css/bootstrap-clockpicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme_files/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <!--<link href="{{ asset('theme_files/plugins/fullcalendar/css/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />-->



  <!-- Template Main CSS File -->
  <link href="{{ asset('public/assets/home_screen/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Scaffold - v2.0.0
  * Template URL: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
    
@yield('content')
  <script src="{{ asset('public/assets/home_screen/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('public/assets/home_screen/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('public/assets/home_screen/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('public/assets/home_screen/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('public/assets/home_screen/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('public/assets/home_screen/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('public/assets/home_screen/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('public/assets/home_screen/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('public/assets/home_screen/assets/vendor/js/main.js') }}"></script>
  
  
<script src="{{ asset('theme_files/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('theme_files/plugins/timepicker/bootstrap-timepicker.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  
  
  @yield('script')
</body>
</html>