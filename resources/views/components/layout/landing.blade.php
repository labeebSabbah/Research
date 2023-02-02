<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>مجلة أبحاث المعرفة الإنسانية الجديدة</title>

<!-- Fav Icon -->
<link rel="icon" href="{{ url('landing/images/favicon.ico') }}" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&amp;display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="{{ url('landing/css/font-awesome-all.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/flaticon.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/owl.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/jquery.fancybox.min.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/animate.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/color.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/rtl.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/style.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/responsive.css') }}" rel="stylesheet">

</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper rtl">

        <x-landing.preloader />

        <x-landing.search />

        <x-landing.header />


        {{ $slot }}

        <x-landing.footer />


    <!-- jequery plugins -->
    <script src="{{ url('landing/js/jquery.js') }}"></script>
    <script src="{{ url('landing/js/popper.min.js') }}"></script>
    <script src="{{ url('landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('landing/js/owl.js') }}"></script>
    <script src="{{ url('landing/js/wow.js') }}"></script>
    <script src="{{ url('landing/js/validation.js') }}"></script>
    <script src="{{ url('landing/js/jquery.fancybox.js') }}"></script>
    <script src="{{ url('landing/js/appear.js') }}"></script>
    <script src="{{ url('landing/js/isotope.js') }}"></script>
    <script src="{{ url('landing/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ url('landing/js/nav-tool.js') }}"></script>

    <!-- main-js -->
    <script src="{{ url('landing/js/script.js') }}"></script>

</body><!-- End of .page_wrapper -->

<!-- Mirrored from azim.commonsupport.com/Laborex/index-rtl.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Jan 2023 15:04:23 GMT -->
</html>
