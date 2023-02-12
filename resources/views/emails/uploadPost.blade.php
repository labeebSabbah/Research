<!DOCTYPE html>
<html>
<head>
    <title>مجلة أبحاث المعرفة الإنسانية الجديدة</title>
</head>
<body>

<h1 style="text-align: right;direction: rtl"> بحث جديد ({{$data->title}})</h1>


<p style="text-align: right;direction: rtl;font-size: 18px;">الاسم : {{auth()->user()->name}}</p>
<div style="text-align: right;direction: rtl;font-size: 18px;">ملف البحث : <a target="_blank" href='{{url($data->file)}}'>عرض الملف</a></div>
<p style="text-align: right;direction: rtl;font-size: 18px;">التخصص الرئيسي للبحث : {{$data->research_major}}</p>
<p style="text-align: right;direction: rtl;font-size: 18px;">التخصص الدقيق للبحث : {{$data->exact_specialty_research}}</p>

</body>
</html>
