@php
    use App\Models\Category;
    $categories = Category::all();
@endphp

<x-layout.landing>
<?php
/*if(extension_loaded('gd') && function_exists('gd_info')){
    echo 'GD Install';
}else{
    echo 'GD Not Install';
}

//echo gd_info();
echo phpinfo();
*/?>

        <!-- banner-section -->
        <section class="banner-section style-two">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url({{ url('landing/images/shape/shape-15') }}.png);"></div>
                <div class="pattern-2"></div>
            </div>
            <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
                <div class="slide-item">
                    <div class="auto-container">
                        <div class="content-box">
                            <div class="text">
                                <h2 style="font-size: 35px">أول مشروع للنشر الذاتي في تاريخ المجلات العلمية المحكمة</h2>
                                <p></p>
                            </div>
                            <div class="image-box">
                                <figure class="image"><img src="{{ url('landing/images/banner/1.png') }}" alt=""></figure>
                                <div class="shape">
                                    <div class="shape-1"></div>
                                    <div class="shape-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="auto-container">
                        <div class="content-box">
                            <div class="text">
                                <h2 style="font-size: 35px">لا أحد وصي على أحد: انْشُر بحثك بنفسك واحْصُل على ترقيتك</h2>
                                <p></p>

                            </div>
                            <div class="image-box">
                                <figure class="image"><img src="{{ url('landing/images/banner/2.png') }}" alt=""></figure>
                                <div class="shape">
                                    <div class="shape-1"></div>
                                    <div class="shape-2"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="auto-container">
                        <div class="content-box">
                            <div class="text">
                                <h2 style="font-size: 35px">أول مجلة دولية تعتمد النشر الإلكتروني بالمعنى الحرفي للكلمة</h2>
                                <p></p>

                            </div>
                            <div class="image-box c1">
                                <figure class="image"><img src="{{ url('landing/images/banner/3.png') }}" alt=""></figure>
                                <div class="shape">
                                    <div class="shape-1"></div>
                                    <div class="shape-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="auto-container">
                        <div class="content-box">
                            <div class="text">
                                <h2 style="font-size: 35px">عندما تكون باحثاً فإنّ القراء هم الذين يحكمون على بحثك وليس شخصاً أو اثنين</h2>
                                <p></p>

                            </div>
                            <div class="image-box">
                                <figure class="image"><img src="{{ url('landing/images/banner/1.png') }}" alt=""></figure>
                                <div class="shape">
                                    <div class="shape-1"></div>
                                    <div class="shape-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="auto-container">
                        <div class="content-box">
                            <div class="text">
                                <h2 style="font-size: 35px">يتوجب على النشر العلمي والأكاديمي أنْ يفتح آفاقاً جديدة في هذا المجال: وهذا بالضبط ما نفعله</h2>
                                <p></p>

                            </div>
                            <div class="image-box">
                                <figure class="image"><img src="{{ url('landing/images/banner/2.png') }}" alt=""></figure>
                                <div class="shape">
                                    <div class="shape-1"></div>
                                    <div class="shape-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="auto-container">
                        <div class="content-box">
                            <div class="text">
                                <h2 style="font-size: 35px">يجب على المجلات العلمية أنْ تثق بالباحثين وأنْ تترك مؤسساتهم البحثية والقراء يحكمون على أعمالهم، وهذا ما نقوم به اليوم</h2>
                                <p></p>
                            </div>
                            <div class="image-box c1">
                                <figure class="image"><img src="{{ url('landing/images/banner/3.png') }}" alt=""></figure>
                                <div class="shape">
                                    <div class="shape-1"></div>
                                    <div class="shape-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="auto-container">
                        <div class="content-box">
                            <div class="text">
                                <h2 style="font-size: 35px">أول مجلة تتحدى جمود أساليب النشر العلمي وتعمل على إصلاح المسار والمسيرة</h2>
                                <p></p>
                            </div>
                            <div class="image-box">
                                <figure class="image"><img src="{{ url('landing/images/banner/1.png') }}" alt=""></figure>
                                <div class="shape">
                                    <div class="shape-1"></div>
                                    <div class="shape-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-section end -->


        <!-- feature-section -->
        <section class="feature-section sec-pad">
            <div class="pattern">
                <div class="pattern-1 wow zoomIn animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="background-image: url({{ url('landing/images/shape/shape-16') }}.png);"></div>
                <div class="pattern-2 wow zoomIn animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="background-image: url({{ url('landing/images/shape/shape-17') }}.png);"></div>
            </div>
            <div class="auto-container">
                <div class="sec-title centred">
                    {{--<h6>Info</h6>--}}
                    <h2>مجلة أبحاث المعرفة الإنسانية الجديدة</h2>
                </div>
                <div class="inner-content">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <div class="feature-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-31"></i></div>
                                    <h4><a href="{{route('page',5)}}">رسالتنا</a></h4>
                                    <p>ترى مجلة أبحاث المعرفة الإنسانية الجديدة بأنّ من واجبها المساهمة في تطوير العلوم المختلفة مِن أجل رفاه البشرية، وإيجاد الحلول المناسبة للمشاكل التي تواجه البشرية من خلال البحث العلمي.</p>
                                    <div class="btn-box"><a href="{{route('page',5)}}" class="theme-btn-one">قراءة المزيد</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <div class="feature-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-32"></i></div>
                                    <h4><a href="{{route('page',5)}}">رؤيتنا</a></h4>
                                    <p>بالعِلم والدراسات العِلميَّة الجادة يتغير وجه العالم إلى الأفضل.</p>
                                    <div class="btn-box"><a href="{{route('page',5)}}" class="theme-btn-one">قراءة المزيد</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <div class="feature-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-33"></i></div>
                                    <h4><a href="{{route('page',5)}}">فلسفتنا</a></h4>
                                    <p>الحياد، والموضوعية، والأمانة العلمية منهجنا وفلسفتنا.</p>
                                    <div class="btn-box"><a href="{{route('page',5)}}" class="theme-btn-one">قراءة المزيد</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- feature-section end -->


        <!-- about-style-two -->
        <section class="about-style-two">
            <div class="auto-container">
                <div class="row align-items-center clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_3">
                            <div class="image-box">
                                <div class="shape">
                                    <div class="shape-1 rotate-me" style="background-image: url({{ url('landing/images/shape/shape-18') }}.png);"></div>
                                    <div class="shape-2" style="background-image: url({{ url('landing/images/shape/shape-19') }}.png);"></div>
                                    <div class="shape-3" style="background-image: url({{ url('landing/images/shape/shape-20') }}.png);"></div>
                                </div>
                                <figure class="image"><img src="{{ url('landing/images/resource/about-2') }}.png" alt=""></figure>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_1">
                            <div class="content-box">
                                <div class="sec-title">
                                   {{-- <h6></h6>--}}
                                    <h2>تطلعاتنا</h2>
                                </div>
                                <div class="bold-text">
                                    <p></p>
                                </div>
                                <div class="text">
                                    <p></p>
                                    <ul class="list-style-one clearfix">
                                        <li>مواكبة التطورات العلمية في التخصصات الأكاديمية والبحثية، وتعريف العامة والمتخصصين بهذه المستجدات والتطورات.</li>
                                        <li>تكريس قيم الاعتماد على الذات وحرية البحث العلمي لدى الباحثين.</li>
                                        <li>الاهتمام بالاتجاهات الحالية والمستقبلية التي مِن شأنها الارتقاء بالإنسانية، ونشر المعرفة والوعي في كل مكان.</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-style-two end -->


        <!-- chooseus-section -->
        <section class="chooseus-section sec-pad bg-color-1">
            <div class="pattern-layer" style="background-image: url({{ url('landing/images/shape/shape-21') }}.png);"></div>
            <div class="bg-layer" style="background-image: url({{ url('landing/images/background/chooseus-1') }}.jpg);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-12 col-sm-12 content-column">
                        <div class="content_block_6">
                            <div class="content-box">
                                <div class="sec-title">
                                    {{--<h6>Why Choose</h6>--}}
                                    <h2>انشر بحثك بعدة خطوات بسيطة واحصل على شهادة النشر فوراً</h2>
                                </div>
                                <div class="inner-box">
                                    <div class="single-item">
                                        <div class="icon-box"><i class="icon-36"></i></div>
                                        <h4>سجل اشتراكك في الموقع</h4>
                                        <p>بعدة خطوات بسيطة يمكنك التسجيل في الموقع لتحصل على اسم الدخول وكلمة المرور المعتمدة.</p>
                                    </div>
                                    <div class="single-item">
                                        <div class="icon-box"><i class="icon-37"></i></div>
                                        <h4>تصفح المجال الذي ترغب بنشر بحثك فيه</h4>
                                        <p>تصفح قائمة المجالات المعتمدة للنشر ثم قم بتحميل قالب البحث المعتمد لتنسيق البحث.</p>
                                    </div>
                                    <div class="single-item">
                                        <div class="icon-box"><i class="icon-38"></i></div>
                                        <h4>حمل بحثك عبر نموذج النشر المعتمد</h4>
                                        <p>حول بحثك الى تنسيق PDF ثم حمله عبر نموذج النشر، حيث سيتم نشر بحثك في مجلتنا خلال 48ساعة بشكل آلي.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- chooseus-section end -->


        <!-- service-style-two -->
        <section class="service-style-two sec-pad centred">
            <div class="auto-container">
                <div class="sec-title centred">
                    {{--<h6>Clinical Services</h6>--}}
                    <h2>التصنيفات</h2>
                </div>
                <div class="row clearfix">
                    @foreach ($categories as $c)
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-two wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="{{ $c->image }}" alt=""></figure>
                                <div class="lower-content">
                                    <h4><a href="{{ route('category', ['category' => $c->id]) }}">{{ $c->title }}</a></h4>
                                    <p>{{ $c->description }}</p>
                                    <div class="btn-box"><a href="{{ route('category', ['category' => $c->id]) }}" class="theme-btn-two">تصفح</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- service-style-two end -->

        <!-- team-style-two -->
        <section class="team-style-two bg-color-1">
            <div class="pattern-layer" style="background-image: url({{ url('landing/images/shape/shape-22') }}.png);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 content-column">
                        <div class="sec-title text-dark">
                           {{-- <h6>Team Member</h6>--}}
                            <h2 >   هيئة التحرير ومستشاروه</h2>
                            <p class="bold-text"  style="color: #000"><b>المدير العام:</b> الأستاذ الدكتور أحمد النعيمي/ الأردن</p>
                            <p  class="bold-text" style="color: #000"><b>رئيس التحرير:</b> الأستاذ الدكتور العيد جلولي/ الجزائر</p>
                            <p  class="bold-text" style="color: #000"><b>مدير التحرير: </b>الدكتوره انصاف بدر</p>
                            <p  class="bold-text" style="color: #000"><b>سكرتير التحرير: </b>الأستاذة مرام رحمون</p>
                            <br>
                            <p  class="bold-text" style="direction: rtl"><b> <<<< </b> <b>الهيئة والمستشارون</b></p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 inner-column">
                        <div class="inner-content centred">
                            <div class="three-item-carousel owl-carousel owl-theme owl-dots-none">
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ url('landing/images/team/1.png') }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <h4><a >الأستاذ الدكتور محمد ثناء الله الندوي</a></h4>
                                            <span class="designation bold-text">الهند/ جامعة علي قراه الإسلامية</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ url('landing/images/team/2.png') }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <h4><a >الأستاذة الدكتوره أوميدا غفارواه</a></h4>
                                            <span class="designation bold-text">طاجكستان/ عميدة معهد العلوم الاجتماعية في جامعة خجند</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ url('landing/images/team/3.png') }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <h4><a >الدكتور أحمد أحمد وسيدات</a></h4>
                                            <span class="designation bold-text">موريتانيا/ جامعة نوكشوط العصرية</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ url('landing/images/team/4.png') }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <h4><a >الأستاذ الدكتور العيد جلولي</a></h4>
                                            <span class="designation bold-text">الجزائر/ جامعة قاصدي مرباح-ورقلة</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ url('landing/images/team/5.png') }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <h4><a >الأستاذ الدكتور بروس ستوارت هال</a></h4>
                                            <span class="designation bold-text">الولايات المتحدة الأمريكية/ جامعة كاليفورنيا</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ url('landing/images/team/6.png') }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <h4><a >الدكتورة آمنة محمود أبو حطب</a></h4>
                                            <span class="designation bold-text">فلسطين/ وزارة التربية والتعليم العالي الفلسطينية</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ url('landing/images/team/7.png') }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <h4><a >الأستاذ الدكتور محمد شهيد ماتي</a></h4>
                                            <span class="designation bold-text">جنوب إفريقيا/ جامعة جوهانسبورغ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ url('landing/images/team/8.png') }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <h4><a >الأستاذ الدكتور رفعت عبدالله سليمان حسين</a></h4>
                                            <span class="designation bold-text">مصر/ جامعة قناة السويس</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ url('landing/images/team/9.png') }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <h4><a >الدكتور حسين حسين زيدان الخلف</a></h4>
                                            <span class="designation bold-text">العراق/ وزارة التربية والتعليم العراقية</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ url('landing/images/team/10.png') }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <h4><a >الدكتورة ضياء نوالي</a></h4>
                                            <span class="designation bold-text">المغرب/ جامعة ابن زهر</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ url('landing/images/team/11.png') }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <h4><a >الدكتور حسام العفوري</a></h4>
                                            <span class="designation bold-text">الأردن/ الجامعة العربية المفتوحة</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ url('landing/images/team/12.png') }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <h4><a >الأستاذ الدكتور عبد الرحمن الفواز</a></h4>
                                            <span class="designation bold-text">الأردن/ جامعة البلقاء التطبيقية</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ url('landing/images/team/13.png') }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <h4><a >الدكتور حبيب أخروف</a></h4>
                                            <span class="designation bold-text">فرنسا/ جامعة السوربون</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ url('landing/images/team/14.png') }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <h4><a >الأستاذ الدكتور أحمد النعيمي</a></h4>
                                            <span class="designation bold-text">الأردن/ جامعة البلقاء التطبيقية</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- team-style-two end -->




</x-layout.landing>
