<x-layout.app>

    <x-slot:title>تسجيل الدخول</x-slot>

    <x-slot:style>
    <style>
      .card {width: 30%;}
    </style>
    </x-slot>
      <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
          <span class="mask bg-gradient-dark opacity-6"></span>
          <div class="container my-auto">
            <div class="d-flex justify-content-center align-items-center min-vh-100">
              <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">تسجيل الدخول</h4>
                  </div>
                </div>
                <div class="card-body">
                  <form role="form" class="text-start" method="POST" action="{{ route('login') }}">
                      @csrf
                    <div class="input-group input-group-outline my-3">
                      <input type="text" name="info" class="form-control" placeholder="اسم المستخدم / البريد الالكتروني">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="password" name="password" class="form-control" placeholder="كلمة السر">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2 text-white">تسجيل الدخول</button>
                    </div>
                    <p class="mt-4 text-sm text-center">
                      ليس لديك حساب ؟
                      <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">سجل</a>
                    </p>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

    <x-slot:script></x-slot>

</x-layout.app>