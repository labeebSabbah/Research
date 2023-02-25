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
                          <input type="file" name="file" id="myPdf" class="form-control" accept=".pdf">
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

      <x-slot:script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
          <script>
              var pdfjsLib = window['pdfjs-dist/build/pdf'];
              pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';
              $("#myPdf").on("change", function(e){
                  var file = e.target.files[0]
                  if(file.type == "application/pdf"){
                      var fileReader = new FileReader();
                      fileReader.onload = function() {
                          var pdfData = new Uint8Array(this.result);
                          // Using DocumentInitParameters object to load binary data.
                          var loadingTask = pdfjsLib.getDocument({data: pdfData});
                          loadingTask.promise.then(function(pdf) {
                              console.log('PDF loaded');
                              var numPages = pdf.numPages;
                              if(numPages > 20){
                                  alert('الحد الاعلى من عدد صفحات البحث التي يتم الموافقة هي 20 صفحة ');
                                  $("#myPdf").val('')
                              }

                              /* // Fetch the first page
                               var pageNumber = 1;
                               pdf.getPage(pageNumber).then(function(page) {
                                   console.log('Page loaded');

                                   var scale = 1.5;
                                   var viewport = page.getViewport({scale: scale});

                                   // Prepare canvas using PDF page dimensions
                                   var canvas = $("#pdfViewer")[0];
                                   var context = canvas.getContext('2d');
                                   canvas.height = viewport.height;
                                   canvas.width = viewport.width;

                                   // Render PDF page into canvas context
                                   var renderContext = {
                                       canvasContext: context,
                                       viewport: viewport
                                   };
                                   var renderTask = page.render(renderContext);
                                   renderTask.promise.then(function () {
                                       console.log('Page rendered');
                                   });
                               });*/

                          }, function (reason) {
                              // PDF loading error
                              console.error(reason);
                          });
                      };
                      fileReader.readAsArrayBuffer(file);
                  }
              });
          </script>
      </x-slot:script>

</x-layout.app>
