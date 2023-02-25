@php
use App\Models\User;
use App\Models\Post;
$users = count(User::where('admin', 0)->get());
$posts = count(Post::where('published_on', '!=', NULL)->get());
$request = count(Post::where('status', 1)->where('paid', 1)->get());
$paid = count(Post::where('paid', 1)->get());
$notPaid = count(Post::where('paid', 0)->get());
$amount = Post::where('paid', 1)->sum('pay_amount');
@endphp
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
                <h1 class="h3 mb-0 text-gray-800">لوحة التحكم</h1>
                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
              </div>

              @if (auth()->user()->admin)

                      <!-- Content Row -->
              <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <a href="{{ route('dashboard.users') }}">
                    <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                          </div>
                          <div class="col mr-2">
                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1">عدد المستخدمين</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>

                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <a href="{{ route('dashboard.users.users_pay') }}">
                    <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                          </div>
                          <div class="col mr-2">
                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">مسددين</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" dir="ltr"><i class="fa fa-user"></i>{{ $paid }} = {{ $amount }}$</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>

                </div>

                  <div class="col-xl-3 col-md-6 mb-4">
                      <a href="{{ route('dashboard.users.users_not_pay') }}">
                          <div class="card border-left-success shadow h-100 py-2">
                              <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col-auto">
                                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                      </div>
                                      <div class="col mr-2">
                                          <div class="text-s font-weight-bold text-success text-uppercase mb-1">غير مسددة</div>
                                          <div class="h5 mb-0 font-weight-bold text-gray-800" dir="ltr"><i class="fa fa-user"></i>{{ $notPaid }}</div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </a>

                  </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <a href="{{ route('dashboard.admin.posts') }}">
                    <div class="card border-left-info shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                          </div>
                          <div class="col mr-2">
                            <div class="text-s font-weight-bold text-success text-uppercase mb-1"> عدد البحوث</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $posts }}</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>

                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <a href="{{ route('dashboard.users.users_request') }}">
                    <div class="card border-left-warning shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                          </div>
                          <div class="col mr-2">
                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">طلبات النشر</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $request }}</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>

                </div>
              </div>

              @endif



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
