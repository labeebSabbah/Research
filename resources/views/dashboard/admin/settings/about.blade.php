<x-layout.app>

    <x-slot:title>لوحة التحكم</x-slot>
    
    <x-slot:style>
      <script src="{{ url('js/ckeditor/ckeditor.js') }}"></script>
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
              <h1 class="h3 mb-0 text-gray-800">نبذة عنا</h1>
            </div>
  
            <!-- Content Row -->
            <div style="width: 100%">
  
              <div class="card">
  
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary text-right">تعديل</h6>
                  </div>
                  <div class="card-body">
                    <form class="form text-right" id="update" action="{{ route('dashboard.settings.update') }}" method="POST">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="page" value="3">
                      <div>
                        <div class="mb-3">
                          <label for="title" class="form-label">العنوان</label>
                          <input type="text" name="title" class="form-control" value="{{ $about[0]->value ?? '' }}">
                          @error('title')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="description" class="form-label">الوصف</label>
                          <textarea class="form-control" id="editor" name="description" cols="30" rows="10" style="resize: none;">{!! $about[1]->value ?? '' !!}</textarea>
                          @error('description')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                    </form>
                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-primary" onclick="$('#update').submit()">حفظ</button>
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
  
    
    <!-- Bootstrap core JavaScript-->
    <x-slot:script>
      <script>
        CKEDITOR.replace( 'editor' );
      </script>
    </x-slot>
  
  </x-layout.app>