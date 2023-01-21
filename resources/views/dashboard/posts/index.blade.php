<x-layout.app>

    <x-slot:title>منشوراتي</x-slot>

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
              <h6 class="m-0 font-weight-bold text-primary text-right">منشوراتي</h6>
              <div>
                <a href="{{ route('dashboard.posts.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">اضافة</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-right" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>العنوان</th>
                      <th>تاريخ الانشاء</th>
                      <th>الحالة</th>
                      <th>تاريخ النشر</th>
                      <th>الدفع</th>
                      <th>تعديل</th>
                      <th>الشهادة</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>العنوان</th>
                      <th>تاريخ الانشاء</th>
                      <th>الحالة</th>
                      <th>تاريخ النشر</th>
                      <th>الدفع</th>
                      <th>تعديل</th>
                      <th>الشهادة</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($posts as $p)
                      <tr>
                        <td>{{ $p->title }}</td>
                        <td>{!! date_format($p->created_at, 'Y-m-d') !!}</td>
                        <td>
                          @if ($p->status == 1)
                            <span class="btn-circle btn-sm btn-warning"><i class="fas fa-clock"></i></span>
                          @elseif ($p->status == 2)
                            <span class="btn-circle btn-sm btn-success"><i class="fas fa-check"></i></span>
                          @else
                            <span class="btn-circle btn-sm btn-danger"><i class="fas fa-times"></i></span>
                          @endif
                        </td>
                        <td>
                          @if ($p->published_on === NULL)
                            -
                          @else
                            {!! date_format($p->published_on, 'Y-m-d') !!}
                          @endif
                        </td>
                        <td>
                          @if ($p->paid)
                            <span class="btn-circle btn-sm btn-success mx-2"><i class="fas fa-check"></i></span>تم الدفع
                          @else
                            <button class="btn btn-primary">ادفع</button>
                          @endif
                        </td>
                        <td>
                          @if ($p->status != 0)
                            <a role="button" class="btn btn-primary" href="{{ route('dashboard.posts.edit', ['post' => $p->id]) }}">تعديل</a>
                          @endif
                        </td>
                        <td>
                          @if ($p->status === 2)
                          <a target="_blank" href="{{ route('certificate', ['p' => $p->id]) }}" class="btn btn-primary">اصدر</a>
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

        <script>
          $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *
		 *      // Sort immediately with columns 0 and 1
		 *      oTable.fnSort( [ [0,'asc'], [1,'asc'] ] );
		 *    } );
        </script>
    </x-slot>
    
</x-layout.app>