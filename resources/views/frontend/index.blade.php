@extends('layouts.frontend')

@section('title',"The World Cove")
@section('meta_description',"The World Cove Blogging Website")
@section('meta_keyword',"The World Cove Blogging Website")

@section('content')

<!--====== BINDUZ NEWS SLIDER PART START ======-->
    @include('frontend.homeslider')
<!--====== BINDUZ NEWS SLIDER PART ENDS ======-->


    <section class="binduz-er-main-posts-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="binduz-er-video-post-topbar">
                        <div class="binduz-er-video-post-title">
                            <h3 class="binduz-er-title">Posts</h3>
                        </div>
                    </div>


                    <div class="row">

                        @forelse($mainPost as $mainitem)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="binduz-er-main-posts-item">
                                <div class="binduz-er-trending-news-list-box">
                                    <div class="binduz-er-thumb">
                                        <img src="{{asset('Upload/Post/'.$mainitem->post_image)}}" alt="">
                                    </div>
                                    <div class="binduz-er-content">
                                        <div class="binduz-er-meta-item">
                                            <div class="binduz-er-meta-categories">
                                                <a href="{{url('categories/'.$mainitem->category->slug)}}">{{$mainitem->category->name}}</a>
                                            </div>
                                            <div class="binduz-er-meta-date">
                                                <span><i class="fal fa-calendar-alt"></i> {{$mainitem->created_at->toFormattedDateString()}}</span>
                                            </div>
                                        </div>
                                        <div class="binduz-er-trending-news-list-title">
                                        <h4 class="binduz-er-title"><a href="{{url('categories/'.$mainitem->category->slug.'/'.$mainitem->slug)}}">{{$mainitem->name}}</a></h4>
                                            <p>{!! Str::limit( $mainitem->description, 200) !!} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="card card-shadow mt-4">
                                <div class="card-body">
                                    <h2> No Post Available</h2>
                                </div>
                            </div>
                        @endforelse

                    </div>

                    <div class="mt-4">
                        {{$mainPost->links()}}
                    </div>

                    <div class="binduz-er-add pt-10">
                        <img src="assets/images/space-thumb.jpg" alt="">
                    </div>
                </div>

                <!--====== BINDUZ MAIN POSTS Sidebar PART  ======-->
                    @include('frontend.post.sidebar')
                <!--====== BINDUZ MAIN POSTS Sidebar PART ENDS ======-->
            </div>
        </div>
    </section>

    <!--====== BINDUZ MAIN POSTS PART ENDS ======-->


@endsection