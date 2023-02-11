<x-layout.landing>

    <style>
        .custom-page-html table{
            width: 100% !important;
            margin: 15px 0;
        }
    </style>

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
    <div class="sidebar-page-container p-5 custom-page-html" style="direction: rtl;text-align: right">
        {!! $page->content !!}
    </div>




</x-layout.landing>
