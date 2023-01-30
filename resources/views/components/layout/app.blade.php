<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="{{ url('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    {{ $style }}
    <link href="{{ url('/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ url('/css/rtl.css') }}" rel="stylesheet">
</head>
<body lang="ar" dir="rtl" class="rtl page-top">
    {{ $slot }}
    <script src="{{ url('/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ url('/js/sb-admin-2.min.js') }}"></script>
    {{ $script }}
    <script>
        $('.btn').addClass('m-1');
    </script>
</body>
</html>