<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from azim.commonsupport.com/Laborex/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Jan 2023 15:04:45 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>Laborex - HTML 5 Template Preview</title>

<!-- Fav Icon -->
<link rel="icon" href="{{ url('landing/images/favicon.ico') }}" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&amp;display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="{{ url('landing/css/font-awesome-all.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/flaticon.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/owl.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/jquery.fancybox.min.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/animate.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/color.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/rtl.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/style.css') }}" rel="stylesheet">
<link href="{{ url('landing/css/responsive.css') }}" rel="stylesheet">

</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper rtl">


        <!-- preloader -->
        <div class="loader-wrap">
            <div class="preloader">
              {{--  <div class="preloader-close">Preloader Close</div>--}}
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        {{--<div class="txt-loading">
                            <span data-text-preloader="l" class="letters-loading">
                                l
                            </span>
                            <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                            <span data-text-preloader="b" class="letters-loading">
                                b
                            </span>
                            <span data-text-preloader="o" class="letters-loading">
                                o
                            </span>
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="x" class="letters-loading">
                                x
                            </span>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- preloader end -->


        <!-- search-popup -->
        <div id="search-popup" class="search-popup">
            <div class="close-search"><span>x</span></div>
            <div class="popup-inner">
                <div class="overlay-layer"></div>
                <div class="search-form">
                    <form method="post" action="https://azim.commonsupport.com/Laborex/index.html">
                        <div class="form-group">
                            <fieldset>
                                <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >
                                <input type="submit" value="Search Now!" class="theme-btn style-four">
                            </fieldset>
                        </div>
                    </form>
                    <h3>Recent Search Keywords</h3>
                    <ul class="recent-searches">
                        <li><a href="index.html">Finance</a></li>
                        <li><a href="index.html">Idea</a></li>
                        <li><a href="index.html">Service</a></li>
                        <li><a href="index.html">Growth</a></li>
                        <li><a href="index.html">Plan</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- search-popup end -->


        <!-- sidebar cart item -->
        <div class="xs-sidebar-group info-group info-sidebar">
            <div class="xs-overlay xs-bg-black"></div>
            <div class="xs-sidebar-widget">
                <div class="sidebar-widget-container">
                    <div class="widget-heading">
                        <a href="#" class="close-side-widget"><i class="fal fa-times"></i></a>
                    </div>
                    <div class="sidebar-textwidget">
                        <div class="sidebar-info-contents">
                            <div class="content-inner">
                                <div class="logo">
                                    <a href="index.html"><img src="{{ url('landing/images/logo-2.png') }}" alt="" /></a>
                                </div>
                                <div class="content-box">
                                    <h4>Book Now</h4>
                                    <form action="https://azim.commonsupport.com/Laborex/index-2.html" method="post" class="booking-form">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Name" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email" required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Text"></textarea>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn-one">Send Now</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="contact-info">
                                    <h4>Contact Info</h4>
                                    <ul>
                                        <li>Chicago 12, Melborne City, USA</li>
                                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                                    </ul>
                                </div>
                                <ul class="social-box">
                                    <li class="facebook"><a href="index.html" class="fab fa-facebook-f"></a></li>
                                    <li class="twitter"><a href="index.html" class="fab fa-twitter"></a></li>
                                    <li class="linkedin"><a href="index.html" class="fab fa-linkedin-in"></a></li>
                                    <li class="instagram"><a href="index.html" class="fab fa-instagram"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END sidebar widget item -->


        <!-- main header -->
        <header class="main-header style-two">
            <!-- header-top -->
            <div class="header-top">
                <div class="auto-container">
                    <div class="top-inner clearfix">
                        <ul class="social-links pull-left clearfix">
                            <li><h6>Share with on:</h6></li>
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
                            <figure class="logo"><a href="index.html"><img src="{{ url('landing/images/logo.png') }}" alt=""></a></figure>
                        </div>
                        <ul class="info-box pull-right clearfix">
                            <li>
                                <i class="icon-28"></i>
                                <h5>Call Us</h5>
                                <p><a href="tel:357984538">+357 984538</a></p>
                            </li>
                            <li>
                                <i class="icon-29"></i>
                                <h5>E-mail Us</h5>
                                <p><a href="mailto:info@example.com">info@example.com</a></p>
                            </li>
                            <li class="btn-box"><a href="research.html" class="theme-btn-one">Request A Quote</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <x-navbar />

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
                            <li class="nav-btn nav-toggler navSidebar-button clearfix">
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
                <div class="nav-logo"><a href="index.html"><img src="{{ url('landing/images/logo-2.png') }}" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End Mobile Menu -->


        <!-- Page Title -->
        <section class="page-title centred" style="background-image: url({{ url('landing/images/background/page-title') }}.jpg);">
            <div class="auto-container">
                <div class="content-box">
                    <div class="shape" style="background-image: url({{ url('landing/images/shape/shape-63') }}.png);"></div>
                    <div class="title">
                        <h1>Contact Us</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('home')}}">الرئيسية</a></li>
                        <li>تواصل معنا</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->





        <!-- contact-style-two -->
        <section class="contact-style-two sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h6>Research Topic</h6>
                    <h2>Have Any Questins Contact With Us</h2>
                </div>
                <div class="form-inner">
                    <form method="post" action="{{ route('contact') }}" id="contact-form" class="default-form">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="name" placeholder="Full Name" required="">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Email Address" required="">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="phone" required="" placeholder="Phone">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="subject" required="" placeholder="Subject">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <textarea name="message" placeholder="Your Message"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                                <button class="theme-btn-one" type="submit" name="submit-form">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- contact-style-two end -->


        <!-- cta-style-two -->
        <section class="cta-style-two bg-color-4">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url({{ url('landing/images/shape/shape-61') }}.png);"></div>
                <div class="pattern-2" style="background-image: url({{ url('landing/images/shape/shape-62') }}.png);"></div>
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


        <!-- main-footer -->
        <footer class="main-footer bg-color-1">
            <div class="footer-top">
                <div class="shape">
                    <div class="shape-1 rotate-me" style="background-image: url({{ url('landing/images/shape/shape-14') }}.png);"></div>
                    <div class="shape-2 rotate-me" style="background-image: url({{ url('landing/images/shape/shape-14') }}.png);"></div>
                    <div class="shape-3"></div>
                    <div class="shape-4"></div>
                </div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget logo-widget">
                                <div class="footer-logo">
                                    <figure class="logo"><a href="index.html"><img src="{{ url('landing/images/footer-logo.png') }}" alt=""></a></figure>
                                </div>
                                <div class="text">
                                    <p>Nostrud exertation ullamco labor aliquip commodo duis.</p>
                                    <ul class="info clearfix">
                                        <li><i class="icon-26"></i>Flat 20, Reynolds Neck, <br />FV77 8WS</li>
                                        <li><i class="icon-24"></i>Call Us: <a href="tel:3336660001">333-666-0001</a></li>
                                        <li><i class="icon-25"></i><a href="mailto:info@example.com">info@example.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget post-widget ml-70">
                                <div class="widget-title">
                                    <h4>Latest Events</h4>
                                </div>
                                <div class="post-inner">
                                    <div class="post">
                                        <h5><a href="blog-details.html">A New World View Our Global Impact.</a></h5>
                                        <span class="post-date">27 May, 2021</span>
                                    </div>
                                    <div class="post">
                                        <h5><a href="blog-details.html">Proper Self-collection of Nasal Swabs.</a></h5>
                                        <span class="post-date">26 May, 2021</span>
                                    </div>
                                    <div class="post">
                                        <h5><a href="blog-details.html">Evidence Lacking for Widespread Vitamin.</a></h5>
                                        <span class="post-date">25 May, 2021</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget ml-70">
                                <div class="widget-title">
                                    <h4>Usefull Link</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="index.html">About Company</a></li>
                                        <li><a href="index.html">Services</a></li>
                                        <li><a href="index.html">How It Works</a></li>
                                        <li><a href="index.html">Our Blog</a></li>
                                        <li><a href="index.html">Contact Us</a></li>
                                        <li><a href="index.html">Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget subscribe-widget">
                                <div class="widget-title">
                                    <h4>Subscribe</h4>
                                </div>
                                <div class="widget-content">
                                    <p>Lorem ipsum dlor sit amet, conect adipisicing elit sed do eiusmod.</p>
                                    <form action="https://azim.commonsupport.com/Laborex/contact.html" method="post" class="subscribe-form">
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Your Email" required="">
                                            <button type="submit"><i class="icon-27"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom centred">
                <div class="auto-container">
                    <div class="copyright">
                        <p><a href="index.html">Laborex</a> &copy; 2022 All Right Reserved</p>
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


    <!-- jequery plugins -->
    <script src="{{ url('landing/js/jquery.js') }}"></script>
    <script src="{{ url('landing/js/popper.min') }}.js"></script>
    <script src="{{ url('landing/js/bootstrap.min') }}.js"></script>
    <script src="{{ url('landing/js/owl.js') }}"></script>
    <script src="{{ url('landing/js/wow.js') }}"></script>
    <script src="{{ url('landing/js/validation.js') }}"></script>
    <script src="{{ url('landing/js/jquery.fancybox') }}.js"></script>
    <script src="{{ url('landing/js/appear.js') }}"></script>
    <script src="{{ url('landing/js/isotope.js') }}"></script>
    <script src="{{ url('landing/js/jquery.nice') }}-select.min.js"></script>
    <script src="{{ url('landing/js/nav-tool') }}.js"></script>
    <script src="{{ url('landing/js/jquery.paroller') }}.min.js"></script>

    <!-- main-js -->
    <script src="{{ url('landing/js/script.js') }}"></script>

</body><!-- End of .page_wrapper -->

<!-- Mirrored from azim.commonsupport.com/Laborex/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Jan 2023 15:04:45 GMT -->
</html>