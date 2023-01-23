<x-layout.app>

  <x-slot:title>لوحة التحكم</x-slot>
  
  <x-slot:style>
  </x-slot>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <x-sidenav />

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <x-topbar />

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">معلومات الحساب</h1>
          </div>

          <!-- Content Row -->
          <div style="width: 100%">

            <div class="card">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-right">تعديل</h6>
                </div>
                <div class="card-body">
                  <form class="form text-right" id="update" action="{{ route('user.update', ['u' => auth()->user()->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                      <div class="mb-3">
                        <label for="name" class="form-label">الاسم</label>
                        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">البريد الالكتروني</label>
                        <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
                      </div>
                      <div class="mb-3">
                        <label for="phone" class="form-label">رقم الهاتف</label>
                        <input type="text" name="phone" class="form-control" value="{{ auth()->user()->phone }}">
                      </div>
                    </div>
                    <div>
                      <div class="mb-3">
                        <label for="username" class="form-label">اسم المستخدم</label>
                        <input type="text" name="username" class="form-control" value="{{ auth()->user()->username }}">
                      </div>
                      <div class="mb-3">
                        <label for="newpassword" class="form-label">كلمة السر الجديدة</label>
                        <input type="password" name="newpassword" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="confirmnew" class="form-label">تأكيد كلمة السر الجديدة</label>
                        <input type="password" name="confirmnew" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="image" class="form-label">صورة</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                      </div>
                    </div>
                  </form>
              </div>
              <div class="card-footer">
                <button type="button" class="btn btn-primary" onclick="$('#update').submit()">حفظ</button>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <x-slot:script>
  </x-slot>

</x-layout.app>