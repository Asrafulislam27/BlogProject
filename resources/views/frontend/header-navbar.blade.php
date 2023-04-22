      <!--====== OFFCANVAS MENU PART START ======-->

      <div class="binduz-er-news-off_canvars_overlay"></div>
    <div class="binduz-er-news-offcanvas_menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="binduz-er-news-offcanvas_menu_wrapper">
                        <div class="binduz-er-news-canvas_close">
                            <a href="javascript:void(0)"><i class="fal fa-times"></i></a>
                        </div>

                        <div id="menu" class="text-left ">
                        @php
                            $categories = App\Models\Category::where('navbar_status','0')->where('status','0')->get();
                        @endphp
                            <ul class="binduz-er-news-offcanvas_main_menu">

                                       <li class="nav-item ">
                                           <a class="nav-link" href="{{url('/')}}">Home</a>
                                       </li>

                                        @foreach($categories as $category)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{url('categories/'.$category->slug)}}">{{$category->name}}</a>
                                            </li>
                                        @endforeach

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('about-us')}}">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('contact-us')}}">Contact</a>
                                        </li>
                                        @if(Auth::check())
                                            <li><a class="text-light btn btn-danger btn-sm" 
                                            href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        
                                        </li>
                                        @endif
                            </ul>
                        </div>
                        <div class="binduz-er-news-offcanvas_footer">
                            <div class="binduz-er-news-logo text-center mb-30 mt-30">
                            @php 
                                $heards = App\Models\Setting::first();
                            @endphp
                                <a href="{{url('/')}}">
                                    <img src="{{asset('Upload/Logo/'.$heards->logo)}}')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== OFFCANVAS MENU PART ENDS ======-->


@php
      $categories = App\Models\Category::where('navbar_status','0')->where('status','0')->get();
@endphp
    <!--====== BINDUZ HEADER PART START ======-->

<header class="binduz-er-header-area">
        <div class="binduz-er-header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navigation">
                            <nav class="navbar navbar-expand-lg">
                            @php 
                                $head = App\Models\Setting::first();
                            @endphp
                                <div class="navbar-brand logo">
                                    <a href="{{url('/')}}">
                                        <img src="{{asset('Upload/Logo/'.$head->logo)}}" alt="">
                                    </a>
                                </div> <!-- logo -->
                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul class="navbar-nav m-auto">

                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{url('/')}}">Home</a>
                                        </li>
                                       
                                        @foreach($categories as $category)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{url('categories/'.$category->slug)}}">{{$category->name}}</a>
                                            </li>
                                        @endforeach
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('about-us')}}">About Us</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('contact-us')}}">Contact Us</a>
                                        </li>
                                    </ul>
                                </div> <!-- navbar collapse -->
                                <div class="binduz-er-navbar-btn d-flex">
                                    <div class="binduz-er-widget d-flex">
                                        
                                        @if(Auth::check())
                                            <a class="text-light bg-danger text-uppercase btn-sm" 
                                                href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                        @endif
                                    </div>
                                    <span class="binduz-er-toggle-btn binduz-er-news-canvas_open d-block d-lg-none">
                                        <i class="fal fa-bars"></i>
                                        
                                    </span>
                                </div>
                            </nav>
                        </div> <!-- navigation -->
                    </div>
                </div> <!-- row -->
            </div>
        </div>
    </header>