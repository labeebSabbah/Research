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
              <h1 class="h3 mb-0 text-gray-800">الاشعارات</h1>
            </div>
  
            <div class="row">

                @foreach ($notifications as $n)
  
              <div class="col-lg-12 text-right">
  
                <!-- Default Card Example -->
                <div class="card mb-4">
                  <div class="card-header text-primary">
                    {{ $n->sender->name }} {{ $n->message }}
                  </div>
                  <div class="card-body">
                    {{ $n->details }} <small style="position: absolute; bottom:0; left:0;">{!! date_format($n->created_at, 'Y-m-d') !!}</small>
                </div>
                </div>
  
              </div>

              @endforeach
  
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
    </x-slot>
  
  </x-layout.app>