<x-layout.landing>


        <!-- Page Title -->
        <section class="page-title centred" style="background-image: url({{ url('landing/images/background/page-title') }}.jpg);">
            <div class="auto-container">
                <div class="content-box">
                    <div class="shape" style="background-image: url({{ url('landing/images/shape/shape-63') }}.png);"></div>
                    <div class="title">
                        <h1>{{ $page->name }}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">الرئيسية</a></li>
                        <li>{{ $page->name }}</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        {!! $page->content !!}



</x-layout.landing>