@php
    use App\Models\Page;
    use App\Models\Category;
    $route = Route::currentRouteName();
    $pages = Page::all(['id', 'name']);
    $categories = Category::all(['id', 'title']);
@endphp
<!-- header-lower -->
<div class="header-lower">
    <div class="auto-container">
        <div class="outer-box clearfix">
            <div class="menu-area pull-left clearfix">
                <!--Mobile Navigation Toggler-->
                <div class="mobile-nav-toggler">
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                </div>
                <nav class="main-menu navbar-expand-md navbar-light">
                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            <li class="@if($route == 'home') current @endif"><a href="{{ route('home') }}">الرئيسية</a></li>
                            <li class="dropdown">
                                <a>الصفحات</a>
                                <ul>
                                    @foreach ($pages as $p)
                                        <li><a href="{{ route('page', ['page' => $p->id]) }}">{{ $p->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>


                            <li class="dropdown"><a >المجالات</a>
                                <ul style="max-height: 310px;overflow: auto;">
                                    @foreach ($categories as $category)
                                        <li><a href="{{route('category',$category->id)}}">{{ $category->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="d-none"><a href="{{route('templates')}}">القوالب</a></li>

                            <li class="dropdown d-none"><a >الاصدارات</a>
                                <ul>
                                    <li><a >تصنيف 1</a></li>
                                    <li><a >تصنيف 1</a></li>
                                </ul>
                            </li>


                            <li class="@if($route == 'contact') current @endif"><a href="{{ route('contact') }}"> تواصل معنا </a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <ul class="menu-right-content pull-right clearfix">
                <li class="search-btn">
                    <button type="button" class="search-toggler"><i class="icon-1"></i></button>
                </li>
                {{--<li class="nav-btn nav-toggler navSidebar-button clearfix">
                    <button><i class="icon-30"></i></button>
                </li>--}}
            </ul>
        </div>
    </div>
</div>
