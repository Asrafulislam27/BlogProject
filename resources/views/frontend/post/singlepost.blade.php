@extends('layouts.frontend')
@section('title',"$post->meta_title")
@section('meta_description',"$post->meta_description")
@section('meta_keyword',"$post->meta_keyword")

@section('content')

    <div class="binduz-er-breadcrumb-area">
        <div class=" container">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="binduz-er-breadcrumb-box">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href=" {{url('categories/'.$post->category->slug)}}">{{$post->category->name}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$post->name}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--====== BINDUZ HEADER PART ENDS ======-->

    <!--====== BINDUZ AUTHOR USER PART START ======-->
    <div class="binduz-er-blog-bg-area"></div>
    <section class="binduz-er-author-item-area binduz-er-author-item-layout-1 pb-20">
        <div class=" container">
            <div class="row">
                <div class=" col-lg-9">
                    <div class="binduz-er-author-item mb-40">
                        <div class="binduz-er-content">
                            <div class="binduz-er-meta-item">
                                <div class="binduz-er-meta-categories">
                                    <a href="{{url('categories/'.$post->category->slug)}} ">{{$post->category->name}}</a>
                                </div>
                                <div class="binduz-er-meta-date">
                                    <span><i class="fal fa-calendar-alt"></i> {{$post->created_at->toFormattedDateString()}}</span>
                                </div>
                            </div>
                            <h3 class="binduz-er-title"> {{$post->name}} </h3>

                            <div class="binduz-er-meta-author">
                                <div class="binduz-er-author">
                                    <img src="{{asset('Upload/Profile/'.$post->user->Profile_image)}}" alt="">
                                    <span>By <span>{{$post->user->name}}.</span></span>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                          
                            <div class=" col-lg-12">
                                <div class="binduz-er-blog-details-box">

                                    <div class="binduz-er-text">
                                        {!! $post->description !!}
                                    </div>

                                    <div class="binduz-er-social-share-tag d-block d-sm-flex justify-content-between align-items-center">
                                        <div class="binduz-er-tag">
                                            <ul>
                                                @foreach($post->tags as $tag)
                                                    <li><a href="{{url('tags/'.$post->category->slug.'/'.$post->slug. '/' .$tag->id)}}">{{$tag->tag}}</a></li>                                                    
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                      
                                    <div class="binduz-er-blog-post-title">
                                        <h3 class="binduz-er-title">Leave a Reply</h3>
                                    </div>

                                        @if(session('message'))
                                            <h6 class="alert alert-primary mb-3">{{session('message')}}</h6>
                                        @endif

                                @forelse($post->comments as $comment)
                                    <div class="card card-body shadow-sm mt-3 comment-deleted-com">
                                        <div class="detail-area">
                                            <h6> @if($comment->user)
                                                    {{$comment->user->name}}
                                                @endif
                                                <small class="ms-3 text-primary"> {{$comment->created_at->diffForHumans()}}</small>
                                            </h6>
                                            <p>{!!$comment->comment_body!!}</p>
                                        </div>
                                        @if(Auth::check() && Auth::id() == $comment->user_id)
                                            
                                            <div>
                                                <button type="button" value="{{$comment->id}}" class="btn btn-danger btn-sm  deletecomment">Deleted</a>
                                            </div>
                                            
                                        @endif
                                    </div>

                                @empty
                                    <h6 class="alert alert-warning "> No Comments Yet.</h6>
                                @endforelse          
                                    <div class="binduz-er-blog-post-form">
                                        <form action="{{url('comments')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="post_slug" value="{{$post->slug}}">

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="binduz-er-input-box">
                                                        <textarea name="comment_body"  rows="3" required></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-sm me-2 float-end">Post Comment</button>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--====== BINDUZ MAIN POSTS Sidebar PART  ======-->
                @include('frontend.post.sidebar')
                <!--====== BINDUZ MAIN POSTS Sidebar PART ENDS ======-->

            </div>
        </div>
    </section>


 


@endsection

@section('script')
<script text="text/javasecript">
        $(document).ready(function(){
            $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
            $(document).on('click','.deletecomment',function(){

                if(confirm('Are you sure you want to delete this comment?')){
                    var thisClicked = $(this);
                    var comment_id = thisClicked.val();
                    $.ajax({
                            type:"POST",
                            url: "/delete-comment",
                            data: {
                                'comment_id': comment_id
                            },
                            success: function(res){
                                if(res.status == 200){
                                    thisClicked.closest('.comment-deleted-com').remove();
                                    alert(res.message);
                                }else{
                                    alert(res.message);
                                }
                            }
                        });
                }

            });
        });

    </script>

@endsection
