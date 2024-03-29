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
                  <form role="form" class="text-start" method="POST" action="{{ route('password.reset') }}">
                      @csrf
                    <input type="hidden" name="token" value="{{ $_GET['token'] }}">
                    <div class="input-group input-group-outline my-3">
                      <input type="text" name="email" class="form-control" value="{{ $_GET['email'] }}" readonly>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <input type="password" name="password" class="form-control" placeholder="كلمة السر">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="تأكيد كلمة المرور">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2 text-white" style="background: #22b6af;">تغيير الكلمة</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

    <x-slot:script></x-slot>

</x-layout.app>
