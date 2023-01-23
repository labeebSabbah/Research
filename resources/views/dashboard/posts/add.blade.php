<x-layout.app>

    <x-slot:title>اضافة منشور</x-slot>

    <x-slot:style>
        <style>
            textarea {
                resize: none !important;
            }
        </style>
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
            <h1 class="h3 mb-0 text-gray-800">اضافة منشور جديد</h1>
          </div>

          <!-- Content Row -->
          <div style="width: 100%">

            <div class="card">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-right">اضافة</h6>
                </div>
                <div class="card-body">
                  <form class="form text-right" id="update" action="{{ route('dashboard.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="author_id" value="{{ auth()->user()->id }}">
                    <div>
                      <div class="mb-3">
                        <label for="name" class="form-label">اسم المؤلف</label>
                        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                      </div>
                      <div class="mb-3">
                        <label for="title" class="form-label">عنوان المنشور</label>
                        <input type="text" name="title" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="university" class="form-label">اسم الجامعة</label>
                        <input type="text" name="university" class="form-control">
                      </div>
                    </div>
                    <div>
                      <div class="mb-3">
                        <label for="specialty" class="form-label">اسم التخصص</label>
                        <input type="text" name="specialty" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="supervisor" class="form-label">اسم المشرف</label>
                        <input type="text" name="supervisor" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="pages" class="form-label">عدد الصفحات</label>
                        <input type="text" name="pages" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="category_id" class="form-label">التصنيف</label>
                        <select name="category_id" class="form-control">
                          @foreach ($categories as $c)
                              <option value="{{ $c->id }}">{{ $c->title }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="keywords" class="from-label">كلمات مفتاحية</label>
                        <input type="text" class="form-control" name="keywords">
                      </div>
                      <div class="mb-3">
                        <label for="description">الوصف (اختياري)</label>
                        <textarea name="description" cols="10" rows="5" class="form-control"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="file" class="form-label">ملف المنشور</label>
                        <input type="file" name="file" class="form-control" accept=".pdf">
                      </div> 
                      <div class="mb-3" style="font-size: large">
                        <input type="checkbox" id="share" name="share" class="form-check-input" checked>
                        <label for="share" class="form-check-label mr-3"> اوافق على </label> <a href="{{ route('dashboard.policy') }}" target="_blank">سياسة النشر</a>
                      </div>                    
                    </div>
                  </form>
              </div>
              <div class="card-footer">
                <button type="button" class="btn btn-primary" onclick="$('#update').submit()">ارسال</button>
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

    <x-slot:script>
      <script>

          $('#update').submit( (e) => {

              if (!$('input[name="share"]').is(':checked'))
              {
                e.preventDefault();
              }
              
            } );
      
      </script>
    </x-slot>

</x-layout.app>