<x-layout.landing>


        <!-- Page Title -->
        <section class="page-title centred" style="background-image: url({{ url('/landing') }}/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box">
                    <div class="shape" style="background-image: url({{ url('/landing') }}/images/shape/shape-63.png);"></div>
                    <div class="title">
                        <h1>{{ $category->title }}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('home')}}">الصفحة الرئيسية</a></li>
                        <li>{{ $category->title }}</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

    <!-- sidebar-page-container -->
    <section class="sidebar-page-container blog-details sec-pad-2">
        <div class="auto-container">
            <div class="row clearfix">

                @if(!isset($version))

                    <h1 class="text-center w-100">لا توجد اي مجلات </h1>
                @endif
                @isset($version)
                    <div class="col-lg-6 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content">
                            <div class="news-block-three">
                                <div class="inner-box">
                                    <div class="lower-content text-right">

                                        <div class="inner p-0">
                                            <h3 class="text-center">{{ $category->title }}</h3>
                                            <canvas id="pdfViewer" style="width: 100%"></canvas>
                                            <div class="post-info text-center">
                                                <a href="../{{ $version->file}}" download="" class="theme-btn-two"><i class="fa fa-download"></i> تحميل الاصدار</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 sidebar-side">
                        <div class="row clearfix">
                            @foreach ($version->posts as $p)
                                <div class="col-lg-12 news-block">
                                    <div class="news-block-one">
                                        <div class="inner-box">
                                            <div class="lower-content text-right">
                                                <h4><a >{{ $p->title }}</a></h4>
                                                <div class="post-info">
                                                    <p>الباحث : {{ $p->user->name }} </p>
                                                    <p> {!! date_format($p->created_at, 'Y-m-d') !!} </p>
                                                </div>
                                                <p>{{ $p->description }}</p>
                                                <div class="btn-box"><a href="../{{ $p->file }}" download class="theme-btn-two">تحميل</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>

                @endisset


            </div>
        </div>
    </section>
    <!-- sidebar-page-container end -->


    <!-- cta-style-two -->
    <section class="cta-style-two bg-color-4">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url({{ url('landing/images/shape/shape-61') }}.png);"></div>
            <div class="pattern-2" style="background-image: url({{ url('landing/images/shape/shape-62') }}.png);"></div>
        </div>
        <div class="auto-container">
            <div class="inner-box clearfix">
                <div class="text pull-left text-right">
                    <h2>قوالب البحث المعتمدة <br />قم بتحميل قالب البحث المناسب</h2>
                </div>
                <div class="btn-box pull-right">
                    <a href="{{route('templates')}}" class="theme-btn-one">تحميل قوالب البحث</a>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-style-two end -->




    @isset($version)

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

        <script>
            // Loaded via <script> tag, create shortcut to access PDF.js exports.
            var pdfjsLib = window['pdfjs-dist/build/pdf'];
            // The workerSrc property shall be specified.
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

            var loadingTask = pdfjsLib.getDocument('../{{$version->file}}');
            loadingTask.promise.then(function(pdf) {

                pdf.getPage(1).then(function(page) {
                    // Fetch the first page
                    var pageNumber = 1;
                    pdf.getPage(pageNumber).then(function(page) {
                        console.log('Page loaded');

                        var scale = 1.5;
                        var viewport = page.getViewport({scale: scale});

                        // Prepare canvas using PDF page dimensions
                        var canvas = $("#pdfViewer")[0];
                        var context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        // Render PDF page into canvas context
                        var renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };
                        var renderTask = page.render(renderContext);
                        renderTask.promise.then(function () {
                            console.log('Page rendered');
                        });
                    });

                });

            });
        </script>

    @endisset





</x-layout.landing>
