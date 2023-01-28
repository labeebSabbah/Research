<x-layout.landing>


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


</x-layout.landing>
