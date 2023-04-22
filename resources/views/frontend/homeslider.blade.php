    <!--====== BINDUZ NEWS SLIDER PART START ======-->

    <div class="binduz-er-news-slider-area pb-60">
        <div class=" container">
            <div class="binduz-er-news-slider-box">
                <div class="row g-0 align-items-center">
    
                    <div class=" col-lg-6">
                        <div class="binduz-er-news-slider-item">
                        @foreach($posts as $allslider)
                            <div class="binduz-er-item">
                                <img src="{{asset('Upload/Post/'.$allslider->post_image)}}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class=" col-lg-6">
                        <div class="binduz-er-news-slider-content-slider">
                            @foreach($posts as $allslider)
                                <div class="binduz-er-item">
                                    <div class="binduz-er-meta-item">
                                        <div class="binduz-er-meta-categories">
                                            <a href="{{url('categories/'.$allslider->category->slug)}}">{{$allslider->category->name}}</a>
                                        </div>
                                        <div class="binduz-er-meta-date">
                                            <span><i class="fal fa-calendar-alt"></i> {{$allslider->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                    <div class="binduz-er-news-slider-content">
                                        <h3 class="binduz-er-title"><a href="{{url('categories/'.$allslider->category->slug.'/'.$allslider->slug)}}">{{$allslider->name}}</a></h3>
                                    </div>
                                    <div class="binduz-er-meta-author">
                                        <div class="binduz-er-author">
                                            <img src="{{asset('Upload/Profile/'.$allslider->user->Profile_image)}}" alt="">
                                            <span>By <span> {{$allslider->user->name}}</span></span>
                                        </div>

                                    </div>
                                </div>
                             @endforeach
                        </div>
                    </div>
               
                </div>
            </div>
        </div>
    </div>

    <!--====== BINDUZ NEWS SLIDER PART ENDS ======-->
