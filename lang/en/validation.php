<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'يجب قبول :attribute',
    'active_url'           => ':attribute ليس عنوان URL صالحا',
    'after'                => 'يجب أن يكون تاريخ :attribute بعد :date.',
    'after_or_equal'       => 'يجب أن يكون تاريخ :attribute بعد أو يساوي :date.',
    'alpha'                => 'قد يحتوي :attribute على أحرف فقط',
    'alpha_dash'           => 'قد يحتوي :attribute على أحرف وأرقام وشرطات فقط',
    'alpha_num'            => 'قد يحتوي :attribute على أحرف وأرقام فقط',
    'array'                => 'يجب أن يكون :attribute ًمصفوفة',
    'before'               => 'يجب أن يكون تاريخ :attribute قبل :date.',
    'before_or_equal'      => 'يجب أن يكون تاريخ :attribute قبل أو يساوي :date.',
    'between'              => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'string'  => 'يجب أن يكون عدد الأحرف في :attribute بين :min و :max حرفاً/حروف.',
        'array'   => 'يجب أن يكون عدد, العناصر في :attribute بين :min و :max عنصراً/عناصر.',
    ],
    'boolean'              => 'يجب أن تكون قيمة :attribute إما true أو false',
    'confirmed'            => 'حقل التأكيد غير مُطابق للحقل :attribute',
    'date'                 => ':attribute ليس تاريخاً صحيحاً',
    'date_format'          => 'لا يتوافق :attribute مع الشكل :format.',
    'different'            => 'يجب أن يكون الحقلان :attribute و :other مُختلفان',
    'digits'               => 'يجب أن يحتوي :attribute على :digits رقم/أرقام',
    'digits_between'       => 'يجب أن يحتوي :attribute بين :min و :max رقماً/أرقام',
    'dimensions'           => 'الـ :attribute له أبعاد صورة غير صالحة.',
    'distinct'             => 'للحقل :attribute قيمة مُكرّرة.',
    'email'                => 'يجب على :attribute أن يكون عنوان بريد إلكتروني صحيحاً',
    'exists'               => 'الـ :attribute المحدد غير صالح',
    'file'                 => 'الـ :attribute يجب أن يكون ملفاً.',
    'filled'               => 'يجب تعبئة الحقل :attribute',
    'image'                => 'يجب أن يكون :attribute صورةً',
    'in'                   => 'الـ :attribute المحدد غير صالح',
    'in_array'             => 'الحقل :attribute غير موجود في :other.',
    'integer'              => 'يجب أن يكون :attribute عددًا صحيحًا',
    'ip'                   => 'يجب أن يكون :attribute عنوان IP صحيحًا',
    'ipv4'                 => 'يجب أن يكون :attribute عنوان IPv4 صحيحًا',
    'ipv6'                 => 'يجب أن يكون :attribute عنوان IPv6 صحيحًا',
    'json'                 => 'يجب أن يكون :attribute نصآ من نوع JSON',
    'max'                  => [
        'numeric' => 'قد لا يكون :attribute أكبر من :max.',
        'file'    => 'قد لا يكون حجم الملف :attribute أكبر من :max كيلوبايت.',
        'string'  => 'قد لا يكون عدد الأحرف في :attribute أكبر من :max حرفاً/حروف.',
        'array'   => 'قد لا يكون عدد العناصر في :attribute أكبر من :max عنصراً/عناصر.',
    ],
    'mimes'                => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes'            => 'يجب أن يكون ملفًا من نوع : :values.',
    'min'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute على الأقل :min.',
        'file'    => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على الأقل على :min حرفًا/حروف.',
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :min عنصرًا/عناصر.',
    ],
    'not_in'               => 'الـ :attribute المحدد غير صالح',
    'numeric'              => 'يجب على :attribute أن يكون رقمًا',
    'present'              => 'يجب تقديم الحقل :attribute',
    'regex'                => 'صيغة الـ :attribute .غير صحيحة',
    'required'             => 'حقل :attribute إجباري.',
    'required_if'          => 'حقل :attribute إجباري عندما تكون قيمة :other هي :value.',
    'required_unless'      => 'حقل :attribute إجباري ما لم :other تكون في :values.',
    'required_with'        => 'حقل :attribute إجباري عندما تكون قيمة :values موجودة.',
    'required_with_all'    => 'حقل :attribute إجباري عندما تكون قيم :values موجودة.',
    'required_without'     => 'حقل :attribute إجباري عندما تكون قيمة :values غير موجودة.',
    'required_without_all' => 'حقل :attribute إجباري عندما لا تكون قيم :values موجودة.',
    'same'                 => 'يجب أن يتطابق :attribute مع :other.',
    'size'                 => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية لـ :size.',
        'file'    => 'يجب أن يكون حجم الملف :attribute مساوياً لـ :size كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على :size حرفًا/حروفًا واحدًا/اثنين.',
        'array'   => 'يجب أن يحتوي :attribute على :size عنصرًا/عناصر.',
    ],
    'string'               => 'يجب أن يكون :attribute نصآ.',
    'timezone'             => 'يجب أن تكون المنطقة :attribute زمنية صحيحة.',
    'unique'               => 'قيمة :attribute مُستخدمة من قبل.',
    'uploaded'             => 'فشل في تحميل :attribute',
    'url'                  => 'صيغة الرابط :attribute غير صحيحة.',
    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],



    'attributes' => [

        'name'                  => 'الاسم',
        'username'              => 'اسم المستخدم',
        'email'                 => 'البريد الإلكتروني',
        'password'              => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'newpassword'           => 'كلمة المرور الجديدة',
        'confirmnew'            => 'تأكيد كلمة المرور',
        'city'                  => 'المدينة',
        'country'               => 'الدولة',
        'address'               => 'العنوان',
        'phone'                 => 'الهاتف',
        'mobile'                => 'الجوال',
        'title'                 => 'العنوان',
        'content'               => 'المحتوى',
        'description'           => 'الوصف',
        'university'            => 'الجامعة',
        'specialty'             => 'التخصص',
        'supervisor'            => 'المشرف',
        'pages'                 => 'الصفحات',
        'keywords'              => 'الكلمات الدلالية',
        'file'                  => 'الملف',
        'image'                 => 'الصورة',
        'num_of_posts'          => 'عدد المنشورات',
        'cover_file'            => 'ملف الغلاف',
        'description_file'      => 'الصفحات الاولى',
        'certificate_file'      => 'ملف الشهادة',
        'template_file'         => 'ملف النموذج',
        'template_file_en'      => 'ملف النموذج بالانجليزية',
        'index_file'            => 'ملف الفهرس',
        'value'                 => 'القيمة',

    ],

];


