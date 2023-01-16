@php
  $route = Route::currentRouteName();
@endphp
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" dir="ltr">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.index') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active" dir="rtl">
    <a class="nav-link" href="{{ route('dashboard.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Components:</h6>
        <a class="collapse-item" href="buttons.html">Buttons</a>
        <a class="collapse-item" href="cards.html">Cards</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  @if (auth()->user()->admin)
  <li class="nav-item" id="settings">
    <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>الاعدادات</span>
  
    </a>
    <div id="collapseUtilities" class="collapse @if($route == 'dashboard.about' || $route == 'dashboard.contact' || $route == 'dashboard.social') show @endif" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">الاعدادات</h6>
        <a class="collapse-item @if($route == 'dashboard.social') active @endif" href="{{ route('dashboard.social') }}" id="social">التواصل الاجتماعي</a>
        <a class="collapse-item @if($route == 'dashboard.contact') active @endif" href="{{ route('dashboard.contact') }}" id="contact">اتصل بنا</a>
        <a class="collapse-item @if($route == 'dashboard.about') active @endif" href="{{ route('dashboard.about') }}" id="about">نبذة عنا</a>
      </div>
    </div>
  </li>
  @endif

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Addons
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Login Screens:</h6>
        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Other Pages:</h6>
        <a class="collapse-item" href="404.html">404 Page</a>
        <a class="collapse-item" href="blank.html">Blank Page</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Charts -->
  @if (auth()->user()->admin)
  <li class="nav-item @if($route == 'dashboard.users') active @endif" id="users">
    <a class="nav-link" href="{{ route('dashboard.users') }}">
      <i class="fa fa-user"></i>
      <span>
      المستخدمين
      </span>
    </a>
  </li>
  <li class="nav-item @if($route == 'dashboard.categories.index') active @endif">
    <a href="{{ route('dashboard.categories.index') }}" class="nav-link">
      <i class="fa fa-list-alt"></i>
      <span>
        التصنيفات
      </span>
    </a>
  </li>
  <li class="nav-item @if($route == 'dashboard.admin.posts') active @endif">
    <a class="nav-link" href="{{ route('dashboard.admin.posts') }}">
      <i class="fa fa-file"></i>
      <span>
        اخر المنشورات
      </span>
    </a>
  </li>
  <li class="nav-item @if($route == 'dashboard.versions.index') active @endif">
    <a href="{{ route('dashboard.versions.index') }}" class="nav-link">
      <i class="fa fa-tags"></i>
      <span>
        الاصدارات
      </span>
    </a>
  </li>
  @else
  <li class="nav-item">
    <a href="{{ route('dashboard.posts.index') }}" class="nav-link">
      <i class="fa fa-file"></i>
      منشوراتي
    </a>
  </li>
  @endif

  <!-- Nav Item - Tables -->
  <li class="nav-item @if($route == 'dashboard.profile') active @endif">
    <a class="nav-link" href="{{ route('dashboard.profile') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>حسابي</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>



<!-- End of Sidebar -->