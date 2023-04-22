<div class="col-lg-3">
    
<div class="binduz-er-sidebar-latest-post">
    <div class="binduz-er-sidebar-categories">
        <div class="binduz-er-sidebar-title">
            <h4 class="binduz-er-title">Categories</h4>
        </div>
        @php
            $categor = App\Models\Category::where('status','0')->take(5)->latest()->get();
        @endphp
        <div class="binduz-er-categories-list">
            @foreach($categor as $cate)
                <div class="binduz-er-item">
                    <a href="{{url('categories/'.$cate->slug)}} ">
                        <span>{{$cate->name}}</span>
                        <span class="binduz-er-number">{{$cate->posts->count()}}</span>
                    </a>
                </div> 
            @endforeach     
        </div>
    </div>

                    <div class="binduz-er-sidebar-latest-post">
                    
                        <div class="binduz-er-sidebar-title">
                            <h4 class="binduz-er-title">Latest Post</h4>
                        </div>
                        @php
                            $latest = App\Models\Post::where('status','0')->take(4)->latest()->get();
                        @endphp
                        <div class="binduz-er-sidebar-latest-post-box">
                        @foreach($latest as $latestpost)
                            <div class="binduz-er-sidebar-latest-post-item">
                                <div class="binduz-er-thumb">
                                    <img src="{{asset('Upload/Post/'.$latestpost->post_image)}}" alt="latest">
                                </div>
                                <div class="binduz-er-content">
                                    <span><i class="fal fa-calendar-alt"></i> {{$latestpost->created_at->diffForHumans()}}</span>
                                    <h4 class="binduz-er-title"><a href="{{url('categories/'.$latestpost->category->slug.'/'.$latestpost->slug)}}">{{$latestpost->name}}</a></h4>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    
                    </div>
                    
                    <div class="binduz-er-sidebar-add-box mt-40">
                        <div class="binduz-er-logo">
                            <a href="#"><img src="assets/images/logo-2.png" alt=""></a>
                        </div>
                        <p>Built with amazing platform & framwork. You can use anyway in blog, news & magazine.</p>
                        <a class="binduz-er-main-btn" href="#">Purchase Now</a>
                    </div>
                </div>