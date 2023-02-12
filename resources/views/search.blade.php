<x-layout.landing>


        <!-- Page Title -->
        <section class="page-title centred" style="background-image: url({{ url('/landing') }}/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box">
                    <div class="shape" style="background-image: url({{ url('/landing') }}/images/shape/shape-63.png);"></div>
                    <div class="title">
                        <h1>البحث</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">الرئيسية</a></li>
                        <li>البحث</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- journal-section -->
        <section class="journal-section">
            <div class="pattern-layer" style="background-image: url({{ url('/landing') }}/images/shape/shape-67.png);"></div>
            <div class="auto-container text-center">
                <div class="sec-title">
                    <h6>البحث</h6>
                </div>
                @if (count($posts) > 0)
                <div class="tabs-box">
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="row clearfix">
                                @foreach($posts as $p)
                                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                    <div class="single-item text-right">
                                        <h4>{{ $p->title }}</h4>
                                        <div class="discription">
                                            @if ($p->published_on != null)
                                            <p> تاريخ النشر : {{ date_format($p->published_on, 'Y-m-d') }}</p>
                                            @endif
                                        </div>
                                        <div class="text">
                                            <p>{{ $p->description }}</p>
                                        </div>
                                        <div class="odi-code">
                                            <p>اسم الناشر : {{ $p->user->name }}</p>
                                        </div>
                                        <div class="download-option mb-2" dir="ltr">
                                            <a href="../{{ $p->file }}" download><i class="icon-55"></i> تحميل</a>
                                        </div>
                                        @if (isset($p->versions[0]))
                                        <div class="download-option" dir="ltr">
                                            <a href="{{ route('version', ['version' => $p->versions[0]->id]) }}"><i class="icon-55"></i> الاصدار</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>                        
                    </div>
                </div>
                @else
                <div class="sec-title">
                    <h2>لا يوجد نتائج</h2>
                </div>
                @endif
                @if (count($posts) > 0)
                {{ $posts->appends(Request::only('search'))->links('components.landing.pagination') }}
                @endif
            </div>
        </section>
        <!-- journal-section end -->




</x-layout.landing>
