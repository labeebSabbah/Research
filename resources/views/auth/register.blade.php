<x-layout.app>

    <x-slot:title>تسجيل</x-slot>

    <x-slot:style>
        <style>
            .end {
                left: 0 !important;
            }
        </style>
    </x-slot>

      <main class="main-content mt-0">
          <div class="page-header align-items-start min-vh-100" style="background-image: url('{{ url('landing/images/shape/shape-69.png'), }}'),url('{{ url('landing/images/shape/shape-33.png'), }}');">
              <span class="mask bg-gradient-dark opacity-6"></span>

          <div class="container my-auto">
              <div class="d-flex justify-content-center align-items-center min-vh-100" >
                  <div class="card z-index-0 fadeIn3 fadeInBottom col-lg-5 col-md-8 col-sm-12" style="margin: 100px 0">
                      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                          <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1" style="background: #22b6af;">
                              <h4 class="text-white font-weight-bolder text-center mt-2 mb-0" > انشاء حساب</h4>
                          </div>
                      </div>
                      <div class="col-lg-12 m-auto">
                          <div class="card-body">
                              <form role="form" class="text-start" action="{{ route('register') }}" method="POST">
                                  @csrf
                                  <div class="form-group input-group-outline mb-3">
                                      <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="الاسم" required>
                                      @error('name')
                                      <small  class="form-text text-danger w-100 text-right">{{$message}}</small>
                                      @enderror

                                      <p class="text-right p-1 text-primary">ادخل اسمك الكامل بشكل مطابق لوثائقك الرسمية لانه سيظهر بهذا الشكل تماما في شهادة البحث.</p>

                                  </div>
                                  <div class="form-group input-group-outline mb-3">
                                      <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="البريد الاكتروني" required>
                                      @error('email')
                                      <small  class="form-text text-danger w-100 text-right">{{$message}}</small>
                                      @enderror
                                      <p  class="text-right p-1 text-primary">تأكد من ادخال عنوان بريدك الإلكتروني بشكل صحيح، سيتم ارسال كود التحقق إليه بعد عملية التسجيل مباشرةً. تأكد من تفحص "مجلد البريد الوارد" وكذلك "مجلد السبام" وانقر على رابط التحقق من اجل تأكيد تسجيلك بنجاح.</p>
                                  </div>
                                  <div class="form-group input-group-outline mb-3">
                                      <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="رقم الهاتف">
                                      @error('phone')
                                      <small  class="form-text text-danger w-100 text-right">{{$message}}</small>
                                      @enderror
                                  </div>
                                  <div class="form-group input-group-outline mb-3">
                                      <input type="text" name="username" class="form-control" value="{{old('username')}}" placeholder="اسم المستخدم" required>
                                      @error('username')
                                      <small  class="form-text text-danger w-100 text-right">{{$message}}</small>
                                      @enderror
                                  </div>
                                  <div class="form-group input-group-outline mb-3">
                                      <input type="password" name="password" class="form-control" placeholder="كلمة السر" required>
                                      @error('password')
                                      <small  class="form-text text-danger w-100 text-right">{{$message}}</small>
                                      @enderror
                                  </div>
                                  <div class="form-group input-group-outline mb-3">
                                      <input type="password" name="confirm" class="form-control" placeholder="تأكيد كلمة السر" required>
                                      @error('confirm')
                                      <small  class="form-text text-danger w-100 text-right">{{$message}}</small>
                                      @enderror
                                  </div>
                                  <div class="text-center">
                                      <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2 text-white" style="background: #22b6af;">التسجيل</button>
                                  </div>
                                  <p class="mt-4 text-sm text-center">
                                      لديك حساب ؟
                                      <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold" >سجل الدخول</a>
                                  </p>
                                  <p class="mt-4 text-sm text-center">
                                      <a href="{{ route('home') }}" class="text-primary text-gradient font-weight-bold" >الصفحة الرئيسة</a>
                                  </p>
                              </form>
                          </div>

                      </div>
                  </div>
              </div>

              </div>
          </div>
      </main>

    <x-slot:script>
        <script>
            $('body').removeClass('bg-gray-200');
        </script>
    </x-slot>

</x-layout.app>
