<!DOCTYPE html>
<html>
<head>
    <title>مجلة أبحاث المعرفة الإنسانية الجديدة</title>
</head>
<body>

<h1 style="text-align: right;direction: rtl"> لقد تم رفض بحثك ({{$data['title']}})</h1>
<div style="text-align: right;direction: rtl;font-size: 18px;">ملف البحث : <a href = "{{url($data['file'])}}" target = "_blank">عرض الملف</a></div>
<p style="text-align: right;direction: rtl;font-size: 18px;">{{$data['reason']}}</p>
<p style="text-align: right;direction: rtl;font-size: 18px;">{{$data['desc']}}</p>

</body>
</html>
