<x-layout.app>

    <x-slot:title>اضافة بحث</x-slot>

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
            <h1 class="h3 mb-0 text-gray-800">اضافة  بحث جديد</h1>
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

                      <div class="mb-3">
                          <label for="name" class="form-label">*اسم المؤلف</label>
                          <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" readonly>
                          <p style="margin-top: 10px;direction: rtl">لتعديل اسم المؤلف الرجاء <a href='{{route('dashboard.profile')}}'>فتح شاشة البروفايل</a> والقيام بادخال اسمك تماما كما يظهر في وثائقك الرسمية لان هذا الاسم هو الذي سيظهر في شهادة النشر وفي اصدار المجلة.</p>
                          @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="title" class="form-label"> *عنوان البحث</label>
                          <input type="text" name="title" class="form-control">
                          @error('title')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="research_major" class="from-label">*التخصص الرئيسي للبحث </label>
                          <input type="text" class="form-control" name="research_major">
                          @error('research_major')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="exact_specialty_research" class="from-label">*التخصص الدقيق للبحث</label>
                          <input type="text" class="form-control" name="exact_specialty_research">
                          @error('exact_specialty_research')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="search_language" class="from-label">*لغة البحث</label>
                          <select name="search_language" class="form-control">
                              <option value="عربي">عربي</option>
                              <option value="انجليزي">انجليزي</option>
                              <option value="فرنسي">فرنسي</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="university" class="form-label">اسم الجامعة</label>
                          <input type="text" name="university" class="form-control">
                          @error('university')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="pages" class="form-label">عدد الصفحات</label>
                          <input type="number" name="pages" class="form-control">
                          @error('pages')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="category_id" class="form-label">* المجلة</label>
                          <select name="category_id" class="form-control">
                              @foreach ($categories as $c)
                                  <option value="{{ $c->id }}">{{ $c->title }}</option>
                              @endforeach
                          </select>
                          @error('category_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="keywords" class="from-label">كلمات مفتاحية</label>
                          <p>استخدام كلمات مفتاحية ذات صلة بالمحتوى الذي تقدمه والفصل بينها باشارة <strong>(-)</strong> . </p>
                          <p>مثال : الهوايات - كرة القدم - كرة السلة - كرة اليد ..الخ</p>
                          <input type="text" class="form-control" name="keywords">
                          @error('keywords')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="description">الوصف </label>
                          <textarea name="description" cols="10" rows="5" class="form-control"></textarea>
                          @error('description')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="file" class="form-label">*ملف البحث</label>
                          <p>ملاحظة هامة: تأكد من انك قمت <a class="text-info" data-toggle="modal" data-target="#downloadTemplateModal" style="text-decoration: underline;font-weight: bold;cursor: pointer">بتحميل ملف قالب البحث المعتمد</a> في المجلة وتضمين محتوى بحثك فيه قبل تحويله إلى تنسيق PDF وارفاقه في هذا النموذج، لأن عدم اتباعك لهذا الشرط يعتبر سبباً وجيها لرفض طلب النشر.</p>
                          <input type="file" name="file" class="form-control" accept=".pdf">
                          @error('file')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3" style="font-size: large">
                          <input type="checkbox" id="share" name="share" class="form-check-input" checked>
                          <label for="share" class="form-check-label mr-3"> اوافق على </label> <a href="{{ route('dashboard.policy') }}" target="_blank">سياسة النشر</a>
                          @error('share')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
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


      <!-- Modal template download -->
      <div class="modal fade" id="downloadTemplateModal" tabindex="-1" role="dialog" aria-labelledby="downloadTemplateModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="downloadTemplateModalLabel">قوالب الابحاث</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">

                      <table class="table table-bordered text-right">
                          <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">المجلة</th>
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
