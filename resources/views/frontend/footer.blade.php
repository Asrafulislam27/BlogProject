<footer class="binduz-er-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="binduz-er-footer-widget-style-1">
                                <div class="binduz-er-footer-title">
                                    <h3 class="binduz-er-title">Categories</h3>
                                </div>
                                @php
                                    $categor = App\Models\Category::where('status','0')->take(4)->latest()->get();
                                @endphp
                                <div class="binduz-er-footer-menu-list">
                                    <ul>
                                        @foreach($categor as $cate)
                                            <li><a href="{{url('categories/'.$cate->slug)}}">{{$cate->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="binduz-er-footer-widget-style-3">
                                <div class="binduz-er-footer-title">
                                    <h3 class="binduz-er-title">Recent Feeds</h3>
                                </div>

                                @php
                                    $recent = App\Models\Post::where('status','0')->take(2)->latest()->get();
                                @endphp
                                <div class="binduz-er-footer-widget-feeds">
                                    <div class="binduz-er-sidebar-latest-post-box">
                                        @foreach($recent as $res)
                                            <div class="binduz-er-sidebar-latest-post-item">
                                                <div class="binduz-er-thumb">
                                                    <img src="{{asset('Upload/Post/'.$res->post_image)}}" alt="latest">
                                                </div>
                                                <div class="binduz-er-content">
                                                    <span><i class="fal fa-calendar-alt"></i> 24th February 2020</span>
                                                    <h4 class="binduz-er-title"><a href="{{url('categories/'.$res->category->slug.'/'.$res->slug)}}">{{$res->name}}</a></h4>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="binduz-er-footer-widget-info">

                    @php 
                        $footer = App\Models\Setting::first();
                    @endphp
                        <div class="binduz-er-logo">
                            <a href="{{url('/')}}"><img src="{{asset('Upload/Logo/'.$footer->logo)}}" alt=""></a>
                        </div>
                        <div class="binduz-er-text">
                            <p>{{$footer->footer_description}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="binduz-er-back-to-top">
            <p>BACK TO TOP <i class="fal fa-long-arrow-right"></i></p>
        </div>
    </footer>
    <div class="binduz-er-footer-copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    @php 
                        $footer = App\Models\Setting::first();
                    @endphp
                    <div class="binduz-er-copyright-text">
                        <p>Copyright By @ <span>{{$footer->copyright_name}}</span></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="binduz-er-copyright-menu float-lg-end float-none">
                        <ul>
                            <li><a href="{{route('privacy-policy')}}">Privacy & Policy</a></li>
                            <li><a href="{{route('terms-of-Use')}}">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>