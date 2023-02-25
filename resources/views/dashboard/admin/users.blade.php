<x-layout.app>

    <x-slot:title>المستخدمين</x-slot>

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
              <h6 class="m-0 font-weight-bold text-primary text-right">المستخدمين</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-right" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>الصورة</th>
                      <th>الاسم</th>
                      <th>البريد الالكتروني</th>
                      <th>تاريخ آخر دخول </th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($users as $u)
                      <tr>
                        <td>
                            <img src="@if($u->image != null) {{url($u->image)}} @else {{url('user-avatar.png')}} @endif" alt="#" width="40px" height="40px">
                            @if($u->activated)
                                <i class="fa fa-check text-success"></i>
                            @else
                                <i class="fa fa-times text-danger"></i>
                            @endif

                        </td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                          <td>@if(isset($u->last_login)) {{$u->last_login}} @else - @endif</td>
                        <td>
                          <a class="btn btn-primary" href="{{ route('dashboard.user', ['u' => $u->id]) }}">تعديل</a>
                            @if($u->activated)
                                <a class="btn btn-danger" href="{{ route('dashboard.user.activated', ['u' => $u->id]) }}">تعطيل الحساب</a>
                            @else
                                <a class="btn btn-success" href="{{ route('dashboard.user.activated', ['u' => $u->id]) }}">تفعيل الحساب</a>
                            @endif

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

    <x-slot:script>
        <!-- Page level plugins -->
        <script src="{{ url('/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ url('/js/demo/datatables-demo.js') }}"></script>
    </x-slot>

</x-layout.app>
