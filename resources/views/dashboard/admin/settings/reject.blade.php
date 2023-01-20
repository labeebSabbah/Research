<x-layout.app>

    <x-slot:title>لوحة التحكم</x-slot>
  
    <x-slot:style>
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
              <h1 class="h3 mb-0 text-gray-800">اسباب الرفض</h1>
            </div>
  
            <!-- Content Row -->
            <div style="width: 100%">
  
              <div class="card">
  
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary text-right">تعديل</h6>
                    <a data-toggle="modal" data-target="#addModal" class="d-none d-sm-inline-block btn btn-sm btn-primary text-white shadow-sm" onclick="add(4)">اضافة</a>
                  </div>
                  <div class="card-body">
                    <div>
                      @foreach ($reject as $r)
                      <form class="form text-right" action="{{ route('dashboard.reasons.destroy', ['reason' => $r->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="mb-3">
                          <input type="text" readonly value="{{ $r->name }}" class="form-control mb-2">
                          <button type="button" class="btn btn-primary" onclick="change({{ $r->id }}, '{{ $r->name }}', '{{ $r->description ?? '' }}')" data-toggle="modal" data-target="#updateModal">تعديل</button>
                          <button type="submit" class="btn btn-primary">حذف</a>
                        </div>
                      </form>
                        @endforeach
                      </div>
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
  
    <x-addModal />
  
    <!-- Bootstrap core JavaScript-->
    <x-slot:script>
    </x-slot>
  
  </x-layout.app>