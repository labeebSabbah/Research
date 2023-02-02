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
                        <li><a href="index.html">الصفحة الرئيسية</a></li>
                        <li>{{ $category->title }}</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- books-page-section -->
        <section class="books-page-section sec-pad">
            <div class="auto-container">
                <div class="title-inner clearfix row">
                    <div class="sec-title text-center col-lg-12">
                        <h6>Latest Books</h6>
                        <h2>{{ $category->title }}</h2>
                    </div>
                </div>
                <div class="inner-content">
                    <div class="inner-box">
                        @isset($version)
                            <div class="arrow" style="background-image: url({{ url('/landing') }}/images/icons/decor-3.png);"></div>
                        
                        <div class="col-6"></div>
                        <div class="col-6"></div>
                            <h5>
                                <canvas id="pdfViewer"></canvas>
                                <a href="../{{ $version->file}}"
                                   class="btn btn-lg btn-primary"
                                   role="button"
                                   download> <i class="fa fa-download"></i> تحميل الاصدار</a>
                            </h5>
                            @foreach ($version->posts as $p)
                                <div class="single-item">
                                    <figure class="image-box"><img src="{{ url('/landing') }}/images/resource/book-1.jpg" alt=""></figure>
                                    <h4><a href="../{{ $p->file }}" download>{{ $p->title }}</a></h4>
                                    <p>by {{ $p->user->name }} ({!! date_format($p->created_at, 'Y-m-d') !!})</p>
                                    <a href="../{{ $p->file }}"
                                       class="btn btn-lg btn-primary"
                                       role="button"
                                       style="position: absolute;bottom: 20px;right: 10px;"
                                       download> <i class="fa fa-download"></i> تحميل</a>
                                </div>
                            @endforeach
                        @endisset

                    </div>
                </div>
            </div>
        </section>
        <!-- books-page-section end -->






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

</x-layout.landing>
