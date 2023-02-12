<x-layout.app>

    <x-slot:title>البحوث </x-slot:title>

    <x-slot:style>
        <link href="{{ url('/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    </x-slot:style>

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
                            <h6 class="m-0 font-weight-bold text-primary text-right">البحوث</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-right" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>الاسم</th>
                                        <th> عنوان البحث</th>
                                        <th> الدفع </th>
                                        <th> حالة البحث </th>
                                        <th> تاريخ النشر  </th>
                                        <th>اعدادات</th>
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
                                                @if ($p->published_on === NULL)
                                                    -
                                                @else
                                                    {!! date_format($p->published_on, 'Y-m-d') !!}
                                                @endif
                                            </td>
                                            <td>
                                                @if($p->paid && $p->status == 1)
                                                    <a
                                                            data-toggle="modal" data-target="#approveModal" role="button"
                                                            class="btn btn-primary text-white"
                                                            att_id="{{ $p->id }}"
                                                            att_name="{{ $p->user->name }}"
															att_email="{{ $p->user->email }}"
                                                            att_title="{{ $p->title }}"
                                                            att_university="{{ $p->university }}"
                                                            att_pages="{{ $p->pages }}"
                                                            att_keywords="{{ $p->keywords }}"
                                                            att_description="{{ $p->description }}"
                                                            att_file="{{ $p->file }}"
                                                            att_file="{{ $p->file }}"
                                                            att_research_major="{{ $p->research_major }}"
                                                            att_exact_specialty_research="{{ $p->exact_specialty_research }}"
                                                            att_search_language="{{ $p->search_language }}"
                                                            att_category="{{ $p->category->title }}"

                                                            onclick="clicked(this)"
                                                    >
                                                        تدقيق البحث
                                                    </a>
                                                @else
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

    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-sm-flex align-items-center justify-content-between">
                    <h5 class="modal-title" id="exampleModalLabel">تدقيق البحث</h5>
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
                        <input type="hidden" name="reason" id="reason">
                        <input type="hidden" name="desc" id="desc">
                        <div class="mb-3">
                            <label class="form-label">اسم المؤلف</label>
                            <input type="text" class="form-control" id="name" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">عنوان البحث</label>
                            <input type="text" class="form-control" id="title" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="from-label">التخصص الرئيسي للبحث</label>
                            <input type="text" class="form-control" id="research_major" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="from-label">التخصص الدقيق للبحث</label>
                            <input type="text" class="form-control" id="exact_specialty_research" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="from-label">لغة البحث</label>
                            <input type="text" class="form-control" id="search_language" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">اسم الجامعة</label>
                            <input type="text" class="form-control" id="university" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">عدد الصفحات</label>
                            <input type="text" class="form-control" id="pages" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">المجلة</label>
                            <input type="text" class="form-control" id="category" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="from-label">كلمات مفتاحية</label>
                            <input type="text" class="form-control" id="keywords" readonly>
                        </div>

                        <div class="mb-3">
                            <label>الوصف </label>
                            <textarea cols="10" rows="5" class="form-control" id="description" style="resize: none !important" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <a href="" target="_blank" class="btn btn-primary" id="file">ملف البحث</a>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger"  onclick="view_reject()" type="button"  >رفض</button>
                    <a class="btn btn-success text-white" onclick="$('#accepted').val('1');$('#add').submit()">قبول</a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="declineModal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >رفض</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3 text-right">
                            <p>عند النقر على زر الرفض سيتم ارسال ايميل للعنوان <span id='email_rg'></span>
                                لاشعار الباحث بنتيجة التدقيق وسبب رفض بحثه والاجراء المالي الذي سيتم اتخاذه حسب تعليمات قبول ورفض الابحاث.</p>
                        </div>
                        <div class="mb-3 text-right">

                            <label class="form-label">سبب الرفض</label>
                            <select class="form-control reason">
                                @foreach ($reasons as $r)
                                    <option value="{{ $r->name }}">{{ $r->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 text-right">
                            <label class="form-label">وصف (اختياري)</label>
                            <textarea cols="30" rows="10" class="form-control desc" style="resize: none;"></textarea>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
                    <a class="btn btn-danger text-white" onclick="
          $('#accepted').val('0');
          $('#reason').val( $('.reason').val() );
          $('#desc').val( $('.desc').val() );
          $('#add').submit();
          ">رفض</a>
                </div>
            </div>
        </div>
    </div>

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
            function clicked(e) {
                var f = $(e);
                $('#id').val(f.attr('att_id'));
                $('#name').val(f.attr('att_name'));
                $('#title').val(f.attr('att_title'));
                $('#university').val(f.attr('att_university'));
                $('#email_rg').html(f.attr('att_email'));


                $('#pages').val(f.attr('att_pages'));
                $('#keywords').val(f.attr('att_keywords'));
                $('#description').html(f.attr('att_description'));
                $('#research_major').val(f.attr('att_research_major'));
                $('#exact_specialty_research').val(f.attr('att_exact_specialty_research'));
                $('#search_language').val(f.attr('att_search_language'));
                $('#category').val(f.attr('att_category'));
                $('#file').attr('href', "../" + f.attr('att_file'))
            }

            function user(e){
                var f = $(e);
                $('#user_name').val(f.attr('att_name'));
                $('#user_email').val(f.attr('att_email'));
                $('#user_phone').val(f.attr('att_phone'));
                $('#userModal').modal('show');
            }

            function view_reject(){
                $('#approveModal').modal('hide');
                setTimeout(function () {
                    $('#declineModal').modal('show');
                },500)

            }
        </script>
    </x-slot:script>

</x-layout.app>
