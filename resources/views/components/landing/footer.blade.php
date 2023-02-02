<!-- main-footer -->

@php
    use App\Models\Page;
    use App\Models\Category;
    $route = Route::currentRouteName();
    $pages = Page::all(['id', 'name']);
    $categories = Category::all(['id', 'title']);
@endphp

<footer class="main-footer border-top-10 bg-color-1 ">
    <div class="footer-top d-none">
        <div class="shape">
            <div class="shape-1 rotate-me" style="background-image: url({{ url('landing/images/shape/shape-14') }}.png);"></div>
            <div class="shape-2 rotate-me" style="background-image: url({{ url('landing/images/shape/shape-14') }}.png);"></div>
            <div class="shape-3"></div>
            <div class="shape-4"></div>
        </div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget logo-widget">
                        <div class="footer-logo">
                            <figure class="logo"><a href="index.html"><img src="{{ url('landing/images/footer-logo.png') }}" alt=""></a></figure>
                        </div>
                        <div class="text">
                            <p>للتواصل</p>
                            <ul class="info clearfix">
                                <li><i class="icon-25"></i><a href="mailto:info@global-journal.org">info@global-journal.org</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-70">
                        <div class="widget-title">
                            <h4>الصفحات</h4>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                @foreach ($pages as $p)
                                    <li><a href="{{ route('page', ['page' => $p->id]) }}">{{ $p->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom centred">
        <div class="auto-container">
            <div class="copyright">

                <p>جميع الحقوق محفوظة  &copy; 2022- مجلة أبحاث المعرفة الإنسانية الجديدة</p>
                <p>ISSN:2708-7239 Print & ISSN:2710-5059 Online</p>
            </div>
        </div>
    </div>
</footer>
<!-- main-footer end -->


        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>
