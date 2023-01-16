<x-layout.app>

    <x-slot:title>اخر المنشورات</x-slot>

    <x-slot:style>
        <link href="{{ url('/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary text-right">اخر المنشورات</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-right" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>الاسم</th>
                      <th>رقم الهاتف</th>
                      <th>البريد الالكتروني</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>الاسم</th>
                      <th>رقم الهاتف</th>
                      <th>البريد الالكتروني</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($posts as $p)
                      <tr>
                        <td>{{ $p->user->name }}</td>
                        <td>{{ $p->user->phone }}</td>
                        <td>{{ $p->user->email }}</td>
                        <td>
                          <a 
                          data-toggle="modal" data-target="#approveModal" role="button" 
                          class="btn btn-primary text-white"
                          onclick="clicked('{{ $p->id }}', '{{ $p->user->name }}', '{{ $p->title }}', '{{ $p->university }}', '{{ $p->specialty }}',
                          '{{ $p->supervisor }}', '{{ $p->pages }}', '{{ $p->keywords }}', '{{ $p->description }}', '{{ $p->file }}')"
                          >
                          نشر
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
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

  <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header d-sm-flex align-items-center justify-content-between">
          <h5 class="modal-title" id="exampleModalLabel">نشر</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('dashboard.admin.post') }}" method="POST" id="add" class="form text-right">
                @csrf
                @method('PUT')
                <input type="hidden" id="accepted" name="accepted" value="0">
                <input type="hidden" id="id" name="id">
                <div class="mb-3">
                    <label class="form-label">اسم المؤلف</label>
                    <input type="text" class="form-control" id="name" readonly>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">عنوان المنشور</label>
                    <input type="text" class="form-control" id="title" readonly>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">اسم الجامعة</label>
                    <input type="text" class="form-control" id="university" readonly>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">اسم التخصص</label>
                    <input type="text" class="form-control" id="specialty" readonly>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">اسم المشرف</label>
                    <input type="text" class="form-control" id="supervisor" readonly>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">عدد الصفحات</label>
                    <input type="text" class="form-control" id="pages" readonly>
                  </div>
                  <div class="mb-3">
                    <label class="from-label">كلمات مفتاحية</label>
                    <input type="text" class="form-control" id="keywords" readonly>
                  </div>
                  <div class="mb-3">
                    <label>الوصف (اختياري)</label>
                    <textarea cols="10" rows="5" class="form-control" id="description" style="resize: none !important" readonly></textarea>
                  </div>
                  <div class="mb-3">
                    <a href="" target="_blank" class="btn btn-primary" id="file">ملف المنشور</a>
                  </div>
            </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" data-dismiss="modal" onclick="$('#accepted').val('0'); $('#add').submit()">رفض</button>
          <a class="btn btn-success text-white" onclick="$('#accepted').val('1');$('#add').submit()">قبول</a>
        </div>
      </div>
    </div>
  </div>

    <x-slot:script>
        <!-- Page level plugins -->
        <script src="{{ url('/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ url('/js/demo/datatables-demo.js') }}"></script>

        <script>
            function clicked(id, name, title, university, specialty, supervisor, pages, keywords, description, file) {
                $('#id').val(id);
                $('#name').val(name);
                $('#title').val(title);
                $('#university').val(university);
                $('#specialty').val(specialty);
                $('#supervisor').val(supervisor);
                $('#pages').val(pages);
                $('#keywords').val(keywords);
                $('#description').html(description);
                $('#file').attr('href', "../" + file)
            }
        </script>
    </x-slot>
    
</x-layout.app>