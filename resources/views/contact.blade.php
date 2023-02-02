<x-layout.landing>


        <!-- Page Title -->
        <section class="page-title centred" style="background-image: url({{ url('landing/images/background/page-title') }}.jpg);">
            <div class="auto-container">
                <div class="content-box">
                    <div class="shape" style="background-image: url({{ url('landing/images/shape/shape-63') }}.png);"></div>
                    <div class="title">
                        <h1>اتصل بنا</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('home')}}">الرئيسية</a></li>
                        <li>تواصل معنا</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


    <!-- google-map-section -->
    <section class="google-map-section">

        <div class="info-section">
            <div class="auto-container">
                <div class="info-inner clearfix" style="margin-top: 20px">

                    <div class="single-info-box">
                        <div class="icon-box"><i class="icon-26"></i></div>
                        <h4>P.O.BOX</h4>
                        <p>711661 AMMAN 11171 JORDAN</p>
                    </div>
                    <div class="single-info-box">
                        <div class="icon-box"><i class="icon-60"></i></div>
                        <h4>Email Address</h4>
                        <p>
                            <a href="info@humanitarianpivot.org">info@humanitarianpivot.org</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- google-map-section end -->


        <!-- contact-style-two -->
        <section class="contact-style-two mt-5 mb-5">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h5>على الرغم من أنّ عملنا تم تجهيزه بالكامل لتقديم الخدمة لكم دون تدخل بشري، فإنّنا نترك لكم وسائل اتصال أخرى من بينها نموذج يتم تعبئته مِن داخل الموقع، إضافة إلى إيميل وصندوق بريد، ونأمل أنْ لا يتم استخدام وسائل الاتصال هذه إلاّ للظروف الطارئة والقاهرة، نظراً لحجم  العمل الكبير المُلقى على كاهلنا.
                        مجلة أبحاث المعرفة الإنسانية الجديدة تصدر عن المحور الإنساني العالمي للتنمية والأبحاث</h5>
                </div>
                <div class="form-inner">
                    @if (\Session::has('success'))
                        <div class="alert alert-success text-right" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif

                    <form method="post" action="{{ route('contact') }}" id="contact-form" class="default-form text-right">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="name" placeholder="الاسم الكامل" required="">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="البريد الإلكتروني" required="">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="phone" required="" placeholder="رقم العاتف">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="subject" required="" placeholder="العنوان">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <textarea name="message" placeholder="رسالتك"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                                <button class="theme-btn-one" type="submit" name="submit-form">إرسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- contact-style-two end -->





</x-layout.landing>
