@extends('layouts.frontend')

@section('title',"$category->meta_title")
@section('meta_description',"$category->meta_description")
@section('meta_keyword',"$category->meta_keyword")


@section('content')
    <!--====== BINDUZ MAIN POSTS PART START ======-->

    <section class="binduz-er-main-posts-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="binduz-er-video-post-topbar">
                        <div class="binduz-er-video-post-title">
                            <h3 class="binduz-er-title">{{$category->name}}</h3>
                        </div>
                    </div>
                    <div class="row">
                    @forelse($post as $postitem) 
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="binduz-er-main-posts-item">
                                <div class="binduz-er-trending-news-list-box">
                                    
                                        <div class="binduz-er-thumb">
                                            <img src="{{asset('Upload/Post/'.$postitem->post_image)}}" alt="">
                                        </div>
                                        <div class="binduz-er-content">
                                            <div class="binduz-er-meta-item">
                                                <div class="binduz-er-meta-categories">
                                                    <a href=" {{url('categories/'.$postitem->slug)}} ">{{$postitem->category->name}}</a>
                                                </div>
                                                <div class="binduz-er-meta-date">
                                                    <span><i class="fal fa-calendar-alt"></i> {{$postitem->created_at->toFormattedDateString()}}</span>
                                                </div>
                                            </div>
                                            <div class="binduz-er-trending-news-list-title">
                                                <h4 class="binduz-er-title"><a href="{{url('categories/'.$postitem->category->slug.'/'.$postitem->slug)}}">{{$postitem->name}}</a></h4>
                                                <p>{!! Str::limit($postitem->description, 200) !!}</p>
                                                
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
                        {{$post->links() }}
                    </div>

                    <div class="binduz-er-add pt-10">
                        <img src="{{asset('frontend/assets/images/space-thumb.jpg')}}" alt="">
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