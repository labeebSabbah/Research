<!DOCTYPE html>
<html>
<head>
    <title>مجلة أبحاث المعرفة الإنسانية الجديدة</title>
</head>
<body>

<h1 style="text-align: right;direction: rtl">مرحبا بك في مجلة أبحاث المعرفة الإنسانية الجديدة , {{$user->name}}</h1>
<p style="text-align: right;direction: rtl;font-size: 18px;">اضغط <a style="cursor: pointer;font-weight: bold" href="{{route('user.verifyEmail',$user->verifyuser->token)}}">هنا</a> لتفعيل حسابك</p>

</body>
</html>
