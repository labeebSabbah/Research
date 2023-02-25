<x-layout.app>

    <x-slot:title>الحساب موقوف</x-slot>

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
                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">الحساب معطّل</h4>
                  </div>
                </div>
                <div class="card-body">
                  <form role="form" class="text-start">


                    <p class="mt-4 text-sm text-center">
                        لمزيد من المعلومات الرجاء التواصل مع
                      <a href="{{ route('contact') }}" class="text-primary text-gradient font-weight-bold" >قسم الدعم الفني</a>
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
