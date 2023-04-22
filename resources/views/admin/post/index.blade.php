@extends('layouts.master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Post All View 
                        <a href="{{route('admin.add-post')}}" class="btn btn-info btn-rounded waves-effect waves-light float-end">Add New Post</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr>
                                    <th>@ID</th>
                                    <th>Category Name</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Tags</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
               
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->category->name}}</td>
                                        <td>
                                            <img src="{{asset('Upload/Post/'.$post->post_image)}}" width="100px" alt="">
                                        </td>
                                        <td>{{$post->name}}</td>
                                        <td>
                                            @foreach ($post->tags as $tag)
                                            {{ $tag->tag }}
                                            @endforeach
                                        </td>
                                        <td>{{$post->status == '1' ? 'Hidden':'Active'}}</td>
                                
                                        <td>
                                            <a href="{{url('admin/edit-post/'.$post->id)}}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{url('admin/delete-post/'.$post->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
            
                    </div>
                </div>
            </div> <!-- end col -->
        </div>     
    </div> 
</div>
 
@endsection