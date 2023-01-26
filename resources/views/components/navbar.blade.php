@php
    use App\Models\Page;
    $route = Route::currentRouteName();
    $pages = Page::all(['id', 'name']);
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
                            <li class="@if($route == 'home') current @endif dropdown"><a href="{{ route('home') }}">Home</a>
                                <ul>
                                    <li><a href="index.html">Home Page 01</a></li>
                                    <li><a href="index-2.html">Home Page 02</a></li>
                                    <li><a href="index-3.html">Home Page 03</a></li>
                                    <li><a href="index-4.html">Home Page 04</a></li>
                                    <li><a href="index-5.html">Home Page 05</a></li>
                                    <li><a href="index-onepage.html">OnePage Home</a></li>
                                    <li><a href="index-rtl.html">RTL Home</a></li>
                                    <li class="dropdown"><a href="index.html">Header Style</a>
                                        <ul>
                                            <li><a href="index.html">Header Style 01</a></li>
                                            <li><a href="index-2.html">Header Style 02</a></li>
                                            <li><a href="index-4.html">Header Style 03</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a>Pages</a>
                                <ul>
                                    @foreach ($pages as $p)
                                        <li><a href="{{ route('page', ['page' => $p->id]) }}">{{ $p->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"><a href="index.html">Team</a>
                                <ul>
                                    <li><a href="team.html">Our Team</a></li>
                                    <li><a href="team-details.html">Team Details</a></li>
                                </ul>
                            </li> 
                            <li class="dropdown"><a href="index.html">Events</a>
                                <ul>
                                    <li><a href="events.html">Our Events</a></li>
                                    <li><a href="event-details.html">Event Details</a></li>
                                </ul>
                            </li> 
                            <li class="dropdown"><a href="index.html">Elements</a>
                                <div class="megamenu">
                                    <div class="row clearfix">
                                        <div class="col-xl-4 column">
                                            <ul>
                                                <li><h4>Elements 1</h4></li>
                                                <li><a href="about-element-1.html">About Block 01</a></li>
                                                <li><a href="about-element-2.html">About Block 02</a></li>
                                                <li><a href="about-element-3.html">About Block 03</a></li>
                                                <li><a href="about-element-4.html">About Block 04</a></li>
                                                <li><a href="about-element-5.html">About Block 05</a></li>
                                                <li><a href="service-element-1.html">Service Block 01</a></li>
                                                <li><a href="service-element-2.html">Service Block 02</a></li>
                                                <li><a href="service-element-3.html">Service Block 03</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-4 column">
                                            <ul>
                                                <li><h4>Elements 2</h4></li>
                                                <li><a href="service-element-4.html">Service Block 04</a></li>
                                                <li><a href="team-element-1.html">Team Block 01</a></li>
                                                <li><a href="team-element-2.html">Team Block 02</a></li>
                                                <li><a href="team-element-3.html">Team Block 03</a></li>
                                                <li><a href="team-element-4.html">Team Block 04</a></li>
                                                <li><a href="event-element-1.html">Event Block 01</a></li>
                                                <li><a href="event-element-2.html">Event Block 02</a></li>
                                                <li><a href="news-element-1.html">News Block 01</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-4 column">
                                            <ul>
                                                <li><h4>Elements 3</h4></li>
                                                <li><a href="news-element-2.html">News Block 02</a></li>
                                                <li><a href="news-element-3.html">News Block 03</a></li>
                                                <li><a href="news-element-4.html">News Block 04</a></li>
                                                <li><a href="funfact-element-1.html">Funfact Block 01</a></li>
                                                <li><a href="funfact-element-2.html">Funfact Block 02</a></li>
                                                <li><a href="chooseus-element.html">Chooseus Block</a></li>
                                                <li><a href="video-element.html">Video Block</a></li>
                                                <li><a href="cta-element.html">Cta Block</a></li>
                                            </ul>
                                        </div>                                   
                                    </div>                                        
                                </div>
                            </li> 
                            <li class="dropdown"><a href="index.html">Gallery</a>
                                <ul>
                                    <li><a href="gallery.html">Gallery 01</a></li>
                                    <li><a href="gallery-2.html">Gallery 02</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="index.html">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Blog 01</a></li>
                                    <li><a href="blog-2.html">Blog 02</a></li>
                                    <li><a href="blog-3.html">Blog 03</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>  
                            <li class="@if($route == 'contact') current @endif"><a href="{{ route('contact') }}">Contact</a></li>   
                        </ul>
                    </div>
                </nav>
            </div>
            <ul class="menu-right-content pull-right clearfix">
                <li class="search-btn">
                    <button type="button" class="search-toggler"><i class="icon-1"></i></button>
                </li>
                <li class="nav-btn nav-toggler navSidebar-button clearfix">
                    <button><i class="icon-30"></i></button>
                </li>
            </ul>
        </div>
    </div>
</div>