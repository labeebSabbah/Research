<!-- main header -->
<header class="main-header style-two">
    <!-- header-top -->
    <div class="header-top" >
        <div class="auto-container">
            <div class="top-inner clearfix">
                <ul class="social-links pull-left clearfix">
                    <li><h6>مجلة أبحاث المعرفة الإنسانية الجديدة، تصدر عن: المحور الإنساني العالمي للتنمية والأبحاث </h6></li>
                    <li class="d-none"><a href=""><i class="fab fa-facebook-f"></i></a></li>

                </ul>
                <div class="text pull-right">
                    <p><i class="icon-22 d-none"></i> ISSN:2708-7239 Print & ISSN:2710-5059 Online</p>
                </div>
            </div>
        </div>
    </div>
    <!-- header-upper -->
    <div class="header-upper-two">
        <div class="auto-container">
            <div class="upper-inner clearfix">
                <div class="logo-box pull-left">
                    <figure class="logo"><a href="{{ route('home') }}"><img src="{{ url('landing/images/logo.png') }}" alt=""></a></figure>
                </div>
                <ul class="info-box pull-right clearfix">

                    <li>
                        <i class="icon-29"></i>
                        <h5>البريد الالكتروني</h5>
                        <p><a href="mailto:info@global-journal.org">info@global-journal.org</a></p>
                    </li>

                    @if(auth()->user())

                        <li class="btn-box">
                            <a href="{{route('dashboard.index')}}" class="theme-btn-one">لوحة التحكم</a>
                            @if(auth()->user()->admin == 0)
                                <a href="{{route('dashboard.posts.create')}}" class="theme-btn-one">انشر بحثك</a>
                            @endif

                        </li>

                    @else
                        <li class="btn-box">
                            <a href="{{route('login')}}" class="theme-btn-one">تسجيل الدخول </a>
                            <a href="{{route('register')}}" class="theme-btn-one">انشاء حساب  </a>
                        </li>

                    @endif

                </ul>
            </div>
        </div>
    </div>
    <!-- header-lower -->
    <x-landing.navbar />

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box clearfix">
                <div class="menu-area pull-left">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <ul class="menu-right-content pull-right clearfix">
                    <li class="search-btn">
                        <button type="button" class="search-toggler"><i class="icon-1"></i></button>
                    </li>
                    <li class="nav-btn nav-toggler navSidebar-button clearfix d-none">
                        <button><i class="icon-30"></i></button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>

    <nav class="menu-box">
        <div class="nav-logo"><a href="index.html"><img src="assets/images/logo-2.png" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info text-center pt-5">
            <h4>تواصل معنا</h4>
            <ul >
                <li>Global Humanitarian Pivot for Development and Research
                    P.O.BOX: 711661 AMMAN 11171 JORDAN</li>
                <li><a >P.O.BOX: 711661 AMMAN 11171 JORDAN</a></li>
                <li><a href="info@humanitarianpivot.org">info@humanitarianpivot.org</a></li>
            </ul>
        </div>

    </nav>
</div>
<!-- End Mobile Menu -->
