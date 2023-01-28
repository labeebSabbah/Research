 <!-- main header -->
 <header class="main-header style-two">
    <!-- header-top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="top-inner clearfix">
                <ul class="social-links pull-left clearfix">
                    <li><h6>تواصل معنا:</h6></li>
                    <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-pinterest-p"></i></a></li>
                </ul>
                <div class="text pull-right">
                    <p><i class="icon-22"></i>Every day: 9:00am - 6:00pm</p>
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
                        <i class="icon-28"></i>
                        <h5>اتصل بنا</h5>
                        <p><a href="tel:357984538">+357 984538</a></p>
                    </li>
                    <li>
                        <i class="icon-29"></i>
                        <h5>البريد الالكتروني</h5>
                        <p><a href="mailto:info@example.com">info@example.com</a></p>
                    </li>

                    @if(auth()->user())
                        <li class="btn-box"><a href="{{route('dashboard.index')}}" class="theme-btn-one">لوحة التحكم</a></li>
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
                    {{--<li class="nav-btn nav-toggler navSidebar-button clearfix">
                        <button><i class="icon-30"></i></button>
                    </li>--}}
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->