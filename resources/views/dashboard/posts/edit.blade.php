<x-layout.app>

    <x-slot:title>تعديل البحث</x-slot>

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
           <h1 class="h3 mb-0 text-gray-800">تعديل البحث</h1>
          </div>
          
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

          <!-- Content Row -->
          <div style="width: 100%">

            <div class="card">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-right">تعديل</h6>
                </div>
                <div class="card-body">
                  <form class="form text-right" id="update" action="{{ route('dashboard.posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="author_id" value="{{ auth()->user()->id }}">

                      <div class="mb-3">
                          <label for="name" class="form-label">*اسم المؤلف</label>
                          <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                      </div>
                      <div class="mb-3">
                          <label for="title" class="form-label">* عنوان البحث</label>
                          <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                      </div>
                      <div class="mb-3">
                          <label for="research_major" class="from-label">*التخصص الرئيسي للبحث </label>
                          <input type="text" class="form-control" name="research_major" value="{{ $post->research_major }}">
                          @error('research_major')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="exact_specialty_research" class="from-label">*التخصص الدقيق للبحث</label>
                          <input type="text" class="form-control" name="exact_specialty_research" value="{{ $post->exact_specialty_research }}">
                          @error('exact_specialty_research')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="search_language" class="from-label">*لغة البحث</label>
                          <select name="search_language" class="form-control">
                              <option value="عربي" @if($post->search_language == 'عربي') selected @endif>عربي</option>
                              <option value="انجليزي" @if($post->search_language == 'انجليزي') selected @endif>انجليزي</option>
                              <option value="فرنسي"  @if($post->search_language == 'فرنسي') selected @endif>فرنسي</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="university" class="form-label">اسم الجامعة</label>
                          <input type="text" name="university" class="form-control" value="{{ $post->university }}">
                      </div>
                      
                      <div class="mb-3">
                          <label for="pages" class="form-label">عدد الصفحات</label>
                          <input type="text" name="pages" class="form-control" value="{{ $post->pages }}">
                      </div>
                      <div class="mb-3">
                          <label for="category_id" class="form-label">*المجلة</label>
                          <select name="category_id" class="form-control">
                              @foreach ($categories as $c)
                                  <option value="{{ $c->id }}" @if($post->category_id == $c->id) selected @endif>{{ $c->title }}</option>
                              @endforeach
                          </select>
                      </div>
                      
                      <div class="mb-3">
                          <label for="keywords" class="from-label">كلمات مفتاحية</label>
                           <p>استخدام كلمات مفتاحية ذات صلة بالمحتوى الذي تقدمه والفصل بينها باشارة <strong>(-)</strong> . </p>
                          <p>مثال : الهوايات - كرة القدم - كرة السلة - كرة اليد ..الخ</p>
                          <input type="text" class="form-control" name="keywords" value="{{ $post->keywords }}">
                      </div>
                      <div class="mb-3">
                          <label for="description">الوصف </label>
                          <textarea name="description" cols="10" rows="5" class="form-control">{{ $post->description }}</textarea>
                      </div>
                      <div class="mb-3">
                          <label for="file" class="form-label">* ملف البحث</label>
                          <a href="{{ url($post->file) }}" target="_blank" class="btn btn-primary">الملف</a>
                          <input type="file" name="file" class="form-control" accept=".pdf">
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

    <x-slot:script></x-slot>

</x-layout.app>
