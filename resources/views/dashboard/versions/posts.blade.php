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
              <button type="button" class="btn btn-primary text-white" onclick="$('#updateForm').submit()">حفظ</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <form class="form" method="POST" action="{{ route('dashboard.versions.update', ['version' => $version->id]) }}" id="updateForm">
                    @csrf
                    @method('PUT')
                <table class="table table-bordered text-right" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>اسم المستخدم</th>
                        <th>العنوان</th>
                        <th>الوصف</th>
                        <th>تاريخ النشر</th>
                        <th>الملف المنشور</th>
                      <th>اختيار</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>اسم المستخدم</th>
                        <th>العنوان</th>
                        <th>الوصف</th>
                        <th>تاريخ النشر</th>
                        <th>الملف المنشور</th>
                      <th>اختيار</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($posts as $p)
                      <tr>
                        <td>{{ $p->user->name }}</td>
                        <td>{{ $p->title }}</td>
                        <td>{{ $p->description }}</td>
                        <td>
                            @if ($p->published_on === NULL)
                            -
                          @else
                            {!! date_format($p->published_on, 'Y-m-d') !!}
                          @endif
                        </td>
                        <td><a href="{{ url($p->file) }}" class="btn btn-primary" target="_blank">الملف</a></td>
                        <td>
                            <input class="form-control" type="checkbox" name="posts[]" value="{{ $p->id }}" @if(in_array($p->id, $selected)) checked @endif>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
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
        <!-- Page level plugins -->
        <script src="{{ url('/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ url('/js/demo/datatables-demo.js') }}"></script>
    </x-slot>
    
</x-layout.app>