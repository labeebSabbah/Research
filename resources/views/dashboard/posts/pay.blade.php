<x-layout.app>

    <x-slot:title>تأكيد عملية الدفع</x-slot>

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
                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">تأكيد عملية الدفع</h4>
                  </div>
                </div>
                <div class="card-body">
                  <div role="form" class="text-start container">
                    <div class="input-group input-group-outline my-3">
                        <h2 class="text-right">عنوان البحث: <br> {{$post->title}}</h2>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <h3 class="text-right">السعر: <br> 20$</h3>
                    </div>
                    <div class="text-center row">
                        <a class="btn btn-secondary my-4 mb-2 text-white col-md" href="{{ route('pay.cancel') }}">الغاء</a>
                      <a class="btn bg-gradient-primary my-4 mb-2 text-white col-md" style="background: #22b6af;" href="{{ route('dashboard.pay', ['post' => $post->id]) }}">تأكيد</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

    <x-slot:script></x-slot>

</x-layout.app>
