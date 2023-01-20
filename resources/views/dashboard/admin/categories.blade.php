<x-layout.app>

    <x-slot:title>التصنيفات</x-slot>

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
              <h6 class="m-0 font-weight-bold text-primary text-right">التصنيفات</h6>
              <a data-toggle="modal" data-target="#addModal" class="btn btn-primary text-white">اضافة</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-right" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>الصورة</th>
                      <th>الاسم</th>
                      <th>الوصف</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>الصورة</th>
                      <th>الاسم</th>
                      <th>الوصف</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($categories as $c)
                      <tr>
                        <td><img src="{{ url($c->image ?? '') }}" alt="#" width="20px" height="20px"></td>
                        <td>{{ $c->title }}</td>
                        <td>{{ $c->description }}</td>
                        <td>
                          <form action="{{ route('dashboard.categories.destroy', ['c' => $c->id]) }}" method="POST" class="form text-center">
                            @csrf
                            @method('DELETE')
                            <button type="button" data-target="#updateModal" data-toggle="modal"
                             class="btn btn-primary" onclick="choose('{{ $c->id }}', '{{ $c->title }}', '{{ $c->description }}', '{{ $c->num_of_posts }}')">تعديل</button>
                            <button type="submit" class="btn btn-primary">حذف</button>
                          </form>
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

  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header d-sm-flex align-items-center justify-content-between">
          <h5 class="modal-title" id="exampleModalLabel">اضافة</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('dashboard.categories.store') }}" method="POST" id="add" class="form text-right" enctype="multipart/form-data">
                @csrf
                <div>
                <div class="mb-3">
                    <label for="title" class="form-label">الاسم</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                  <label for="num_of_posts" class="form-label">عدد المنشورات</label>
                  <input type="text" class="form-control" name="num_of_posts">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">الوصف (اختياري)</label>
                    <textarea class="form-control" name="description" cols="30" rows="10" style="resize: none !important;"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">الصورة (اختياري)</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="mb-3">
                  <label for="cover_file" class="form-label">ملف الغلاف</label>
                  <input type="file" class="form-control" name="cover_file">
                </div>
                <div class="mb-3">
                  <label for="description_file" class="form-label">ملف الوصف</label>
                  <input type="file" class="form-control" name="description_file">
                </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
          <a class="btn btn-primary text-white" onclick="$('#add').submit()">اضافة</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header d-sm-flex align-items-center justify-content-between">
          <h5 class="modal-title" id="exampleModalLabel">تعديل</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('dashboard.categories.update') }}" method="POST" id="update" class="form text-right" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id">
                <div>
                <div class="mb-3">
                    <label for="title" class="form-label">الاسم</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="mb-3">
                  <label for="num_of_posts" class="form-label">عدد المنشورات</label>
                  <input type="text" class="form-control" name="num_of_posts" id="num_of_posts">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">الوصف (اختياري)</label>
                    <textarea class="form-control" name="description" cols="30" rows="10" style="resize: none !important;" id="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">الصورة (اختياري)</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="mb-3">
                  <label for="cover_file" class="form-label">ملف الغلاف</label>
                  <input type="file" class="form-control" name="cover_file">
                </div>
                <div class="mb-3">
                  <label for="description_file" class="form-label">ملف الوصف</label>
                  <input type="file" class="form-control" name="description_file">
                </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
          <a class="btn btn-primary text-white" onclick="$('#update').submit()">حفظ</a>
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
          function choose(id, title, description, num_of_posts){
            $('#id').val(id);
            $('#title').val(title);
            $('#num_of_posts').val(num_of_posts);
            $('#description').html(description);
          }
        </script>
    </x-slot>
    
</x-layout.app>