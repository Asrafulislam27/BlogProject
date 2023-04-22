@extends('layouts.master')
@section('admin')
<script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Post 
                        <a href="{{route('admin.posts')}}" class="btn btn-danger btn-rounded waves-effect waves-light float-end">Back</a>
                        </h4>
                    </div> 
                        
                    <div class="card-body">
                            
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                        
                       <form action="{{url('admin/update-post/'.$posts->id)}}" method="POST" enctype="multipart/form-data">
                         @csrf
                        @method('patch')
                         
                        <div class="row mb-3">
                            <label for="category_id" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
            
                                <select name="category_id" class="form-control">
                                    <option>----Select a Category----</option>
                                 
                                    @foreach($category as $categoryitem)
                                        <option value="{{$categoryitem->id}}" 
                                        {{ $categoryitem->id === $posts->category_id ? ' selected' : '' }}
                                           >{{$categoryitem->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Post Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" value="{{$posts->name}}" id="name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="slug" value="{{$posts->slug}}" id="slug">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" type="text" id="mynote" name="description" rows="5" cols="10">{{$posts->description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="post_image" class="col-sm-2 col-form-label">Post Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="post_image" class="form-control" id="image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="napost_imageme" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img id="showimage" class="rounded me-2" width="200" src="{{(!empty($posts->post_image))? url('Upload/Post/'.$posts->post_image):url('Upload/no_image.jpg')}}" alt="image">
                            </div>
                        </div>

                                                
                        <div class="form-group">
                            <label for="meta_title" class="col-sm-2 col-form-label">Select Tag </label>
                            <div class="col-md-3 mb-3">
                                
                                @foreach($tags as $tag)
                                    <label><input  type="checkbox" name="tags[]" value="{{$tag->id}}" 
                                        @foreach($posts->tags as $t)
                                            @if($tag->id == $t->id)
                                                checked
                                            @endif
                                        @endforeach
                                    
                                    >{{$tag->tag}}</label>
                                @endforeach
                            </div>


                        </div>
                        
                        <hr>
                        <h6>SEO Tag</h6>
                        <br>
                        <div class="row mb-3">
                            <label for="meta_title" class="col-sm-2 col-form-label">Meta Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="meta_title" value="{{$posts->meta_title}}" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="meta_description" class="col-sm-2 col-form-label">Meta Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" type="text" name="meta_description" rows="5" cols="10">{{$posts->meta_description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="meta_keyword" class="col-sm-2 col-form-label">Meta Keyword</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" type="text" name="meta_keyword" rows="5" cols="10">{{$posts->meta_keyword}}</textarea>
                            </div>
                        </div>


                        <h6>Status Mode</h6>
                        <br>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="status">Status</label>
                                <input  type="checkbox" name="status" {{ $posts->status == '1' ? 'checked':''}}  >
                            </div>


                        </div>


                        <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light float-end" >Update Post</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showimage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection