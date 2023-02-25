<x-layout.app>

    <x-slot:title>الدافعين </x-slot>

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
                                    <h6 class="m-0 font-weight-bold text-primary text-right">الدافعين</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-right" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th> الاسم </th>
                                                <th> عنوان البحث</th>
                                                <th> اسم المجلة  </th>
                                                <th> الدفع </th>
                                                <th> حالة البحث </th>
                                                <th> تاريخ الدفع  </th>
                                                <th> القيمة المدفوعة </th>
                                                <th> الشهادات </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($posts as $p)
                                                <tr>
                                                    <td>
                                                        <a onclick="user(this)" style="cursor: pointer" class="font-weight-bold text-primary"
                                                           att_name="{{$p->user->name}}"
                                                           att_email="{{$p->user->email}}"
                                                           att_phone="{{$p->user->phone}}"
                                                        >
                                                            {{ $p->user->name }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $p->title }}</td>
                                                    <td>{{ $p->category->title }}</td>
                                                    <td>
                                                        @if($p->paid)
                                                            <span class="btn-circle btn-sm btn-success"><i class="fas fa-check"></i> </span>
                                                            <span>مسدد</span>
                                                        @else
                                                            <span class="btn-circle btn-sm btn-danger"><i class="fas fa-times"></i> </span>
                                                            <span>غير مسدد</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @switch($p->status)
                                                        @case(0)
                                                        <span class="btn-circle btn-sm btn-danger"><i class="fas fa-times"></i> </span>
                                                        <span> مرفوض</span>
                                                        @break

                                                        @case(1)
                                                        @if($p->paid)
                                                            <span class="btn-circle btn-sm btn-warning"><i class="fas fa-clock"></i> </span>
                                                            <span> قيد التدقيق  </span>
                                                        @else
                                                            <span class="btn-circle btn-sm btn-warning"><i class="fas fa-clock"></i> </span>
                                                            <span>غير مسدد</span>
                                                        @endif
                                                        @break

                                                        @case(2)
                                                        <span class="btn-circle btn-sm btn-success"><i class="fas fa-check"></i> </span>
                                                        <span> منشور</span>
                                                        @break

                                                        @endswitch


                                                    </td>
                                                    <td>
                                                        @if ($p->paid_at !== null)
                                                        {!! date_format($p->paid_at, 'Y-m-d') !!}
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @isset($p->pay_amount)
                                                            @if($p->pay_amount == 0)
                                                                مجاني
                                                            @else
                                                                {!! $p->pay_amount ?? '' !!}$
                                                            @endif
                                                        @else
                                                            -
                                                        @endif

                                                    </td>

                                                    <td>
                                                        @if($p->status == 2)
                                                            <a target="_blank" href="../{{ $p->certificate_file }}" class="btn btn-sm btn-primary">شهادة النشر</a>

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



            <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userModalTitle">المستخدم</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('dashboard.admin.post') }}" method="POST" id="add" class="form text-right">
                                <div class="mb-3">
                                    <label class="form-label"> الاسم</label>
                                    <input type="text" class="form-control" id="user_name" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> البريد الالكتروني</label>
                                    <input type="text" class="form-control" id="user_email" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> رقم الهاتف</label>
                                    <input type="text" class="form-control" id="user_phone" readonly>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
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


                        function user(e){
                            var f = $(e);
                            $('#user_name').val(f.attr('att_name'));
                            $('#user_email').val(f.attr('att_email'));
                            $('#user_phone').val(f.attr('att_phone'));
                            $('#userModal').modal('show');
                        }
                    </script>
                    </x-slot>

</x-layout.app>
