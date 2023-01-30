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
                        <div class="arrow" style="background-image: url({{ url('/landing') }}/images/icons/decor-3.png);"></div>
                        <h5>
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
                    </div>
                </div>
            </div>
        </section>
        <!-- books-page-section end -->


        <!-- cta-style-two -->
        <section class="cta-style-two bg-color-4">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url({{ url('/landing') }}/images/shape/shape-61.png);"></div>
                <div class="pattern-2" style="background-image: url({{ url('/landing') }}/images/shape/shape-62.png);"></div>
            </div>
            <div class="auto-container">
                <div class="inner-box clearfix">
                    <div class="text pull-left">
                        <h2>Accurate Product Testing <br />by Expert Scientists</h2>
                    </div>
                    <div class="btn-box pull-right">
                        <a href="index-4.html" class="theme-btn-one">Book Free Sampling Here</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta-style-two end -->

</x-layout.landing>