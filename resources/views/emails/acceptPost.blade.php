<!DOCTYPE html>
<html>
<head>
    <title>مجلة أبحاث المعرفة الإنسانية الجديدة</title>
</head>
<body>

<div style="text-align: right;direction: rtl;font-size: 18px">
    <div >عناية السيد/ة: {{$data['name']}}</div>
    <div >
        نشكر لكم ثقتكم بمجلة أبحاث المعرفة الإنسانية الجديدة، ونود اعلامكم بقبول نشر بحثكم ({{$data['title']}}) بنجاح
        في مجلة ({{$data['category']}}) المجلد ({{$data['version']}}) العدد الاول.<br>
        يمكنك الان مشاهدة وتحميل نسختك المعتمدة ونسخة الاصدار الكامل بواسطة الروابط المرفقة ادناه او على الموقع الإلكتروني للمجلة، كما يمكنك تحميل شهادة النشر بعد تسجيل دخولك للموقع الإلكتروني ثم فتح لوحة التحكم.

    </div>

    <div >الإصدار الكامل : <a href = "{{url($data['version_file'])}}" target = "_blank">تحميل</a></div>
    <div >شهادة النشر : <a href = "{{url($data['certificate'])}}" target = "_blank">تحميل</a></div>

    <div>مع تحيات</div>
    <div>إدارة الموقع الإلكتروني</div>
    <div>أبحاث المعرفة الإنسانية الجديدة</div>
    <div>www.global-journal.org</div>
</div>


</body>
</html>
