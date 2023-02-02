<x-layout.landing>


        <!-- Page Title -->
        <section class="page-title centred" style="background-image: url({{ url('/landing') }}/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box">
                    <div class="shape" style="background-image: url({{ url('/landing') }}/images/shape/shape-63.png);"></div>
                    <div class="title">
                        <h1>قوالب البحث</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('home')}}">الصفحة الرئيسية</a></li>
                        <li>قوالب البحث</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->



    <!-- research-section -->
    <section class="research-section bg-color-1">
        <div class="pattern">
            <div class="pattern-1 wow zoomIn animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="background-image: url(assets/images/shape/shape-6.png);"></div>
            <div class="pattern-2 wow zoomIn animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="background-image: url(assets/images/shape/shape-7.png);"></div>
        </div>
        <div class="auto-container">
            <div class="sec-title centred">
                <h6>قوالب البحث المعتمدة</h6>
                <h2> قم بتحميل قالب البحث المناسب</h2>
            </div>
            <div class="row clearfix">

                @foreach($categories as $category)
                <div class="col-lg-6 col-md-6 col-sm-12 research-block">
                    <div class="research-block-one wow fadeInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box text-right">
                            <h4>{{$category->title}}</h4>
                            <span></span>
                            <p>{{$category->description}}</p>
                            <div class="btn-box">
                                <a download href="{{asset($category->template_file)}}" class="theme-btn-two">تحميل قالب عربي</a>
                                <a download href="{{asset($category->template_file_en)}}" class="theme-btn-two">تحميل قالب انجليزي</a>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- research-section end -->








</x-layout.landing>
