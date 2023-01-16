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
        <section>
          <div class="page-header min-vh-100">
            <div class="container">
              <div class="row">
                <div class="col-6 d-lg-flex d-none h-100 my-auto pw-0 position-absolute top-0 text-center justify-content-center flex-column end">
                  <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('{{ url('/assets/img/illustrations/illustration-signup.jpg') }}'); background-size: cover;">
                  </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                  <div class="card card-plain">
                    <div class="card-header">
                      <h4 class="font-weight-bolder">التسجيل</h4>
                    </div>
                    <div class="card-body">
                      <form role="form" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="input-group input-group-outline mb-3">
                          <input type="text" name="name" class="form-control" placeholder="الاسم">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                          <input type="email" name="email" class="form-control" placeholder="البريد الاكتروني">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="رقم الهاتف">
                          </div>
                          <div class="input-group input-group-outline mb-3">
                            <input type="text" name="username" class="form-control" placeholder="اسم المستخدم">
                          </div>
                          <div class="input-group input-group-outline mb-3">
                            <input type="password" name="password" class="form-control" placeholder="كلمة السر">
                          </div>
                          <div class="input-group input-group-outline mb-3">
                            <input type="password" name="confirm" class="form-control" placeholder="تأكيد كلمة السر">
                          </div>
                        <div class="text-center">
                          <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0 text-white">التسجيل</button>
                        </div>
                      </form>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                      <p class="mb-2 text-sm mx-auto">
                        لديك حساب ؟
                        <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">سجل الدخول</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>

    <x-slot:script>
        <script>
            $('body').removeClass('bg-gray-200');
        </script>
    </x-slot>

</x-layout.app>