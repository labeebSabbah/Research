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
                <a href="" data-toggle="modal" data-target="#downloadTemplateModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">تحميل النماذج</a>
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
                            <a class="btn btn-primary" href="{{ route('dashboard.pay', ['post' => $p->id]) }}">ادفع</a>
                          @endif
                        </td>
                        <td>
                          @if ($p->status != 2)
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


        <!-- Modal template download -->
        <div class="modal fade" id="downloadTemplateModal" tabindex="-1" role="dialog" aria-labelledby="downloadTemplateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="downloadTemplateModalLabel">النماذج</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <table class="table table-bordered text-right">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">التصنيف</th>
                                <th scope="col">تحميل</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($categories as $c)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$c->title}}</td>
                                    <td class="text-center">
                                        <a href="../{{ $c->template_file }}" type="button" class="btn btn-primary">
                                             تحميل / عربي <i class="fa fa-download" aria-hidden="true"></i>
                                        </a>

                                        <a href="../{{ $c->template_file_en }}" type="button" class="btn btn-primary">
                                            تحميل / انجليزي <i class="fa fa-download" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>
            </div>
        </div>

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
