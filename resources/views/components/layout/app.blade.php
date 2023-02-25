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

<div class="modal fade" id="rotateDevice" tabindex="-1" role="dialog" aria-labelledby="rotateDeviceLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rotateDeviceLabel">قم بتدوير جهازك</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="text-align: center;direction: rtl">من الأفضل عرض هذه الصفحة في الاتجاه العمودي</p>
                <img class="w-50 m-auto d-block" src="{{url('img/rotate.png')}}">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

            </div>
        </div>
    </div>
</div>
<button class="d-none"  data-toggle="modal" data-target="#rotateDevice" id="view-rotate"></button>

{{ $slot }}

<!-- rotate device -->


<script src="{{ url('/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ url('/js/sb-admin-2.min.js') }}"></script>
{{ $script }}
<script>
    $('.btn').addClass('m-1');
    $(document).ready(function(){
        if($(window).width() < 768){
            $('#view-rotate').click();
        }
    })
</script>
</body>

</html>
