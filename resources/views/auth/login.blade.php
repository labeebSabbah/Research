<x-layout.app>

    <x-slot:title>تسجيل الدخول</x-slot>

    <x-slot:style>
    <style>
      .card {width: 30%;}
    </style>
    </x-slot>
      <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('{{ url('landing/images/shape/shape-69.png'), }}'),url('{{ url('landing/images/shape/shape-33.png'), }}');">
          <span class="mask bg-gradient-dark opacity-6"></span>
          <div class="container my-auto">
            <div class="d-flex justify-content-center align-items-center min-vh-100">

              <div class="card z-index-0 fadeIn3 fadeInBottom col-lg-5 col-md-8 col-sm-12">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1" style="background: #22b6af;">
                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">تسجيل الدخول</h4>
                  </div>
                </div>
                <div class="card-body">
                  <form role="form" class="text-start" method="POST" action="{{ route('login') }}">
                      @csrf
                      @if (\Session::has('success'))
                          <p class="text-center text-success font-weight-bold">{{Session::get('success')}}</p>
                      @endif

                    <div class="input-group input-group-outline my-3">
                      <input type="text" name="info" class="form-control" placeholder="اسم المستخدم / البريد الالكتروني">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="password" name="password" class="form-control" placeholder="كلمة السر">
                    </div>
                      <p class="w-100 text-right text-danger font-weight-bold">{!! session()->get('error') !!}</p>
                      @if (\Session::has('view_resend-active'))
                          <div class="text-center">
                              <button type="button" class="btn bg-gradient-primary w-100 text-white bg-warning"
                                      onclick="document.getElementById('resend').submit()"
                              >ارسال رابط التفعيل</button>
                          </div>
                      @endif
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2 text-white" style="background: #22b6af;">تسجيل الدخول</button>
                    </div>

                    <p class="mt-4 text-sm text-center">
                      ليس لديك حساب ؟
                      <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold" >سجل</a>
                    </p>

                    <p class="mt-4 text-sm text-center">
                      نسيت كلمة السر ؟
                      <a href="{{ route('password.request') }}" class="text-primary text-gradient font-weight-bold" >تغيير كلمة المرور</a>
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
      </main>

        @if (\Session::has('view_resend-active'))
            <form id="resend" class="d-none" method="POST" action="{{ route('login.login_send_again') }}">
                @csrf
                <input type="hidden" value="{{Session::get('view_resend-active')}}" name="email">
            </form>
        @endif

    <x-slot:script></x-slot>

</x-layout.app>
