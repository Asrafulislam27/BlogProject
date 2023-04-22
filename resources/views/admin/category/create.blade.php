@extends('layouts.master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Category</h4>
                        
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                       <form action="{{route('admin.store.add-category')}}" method="POST" enctype="multipart/form-data">
                         @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" value="" id="name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="slug" value="" id="slug">
                            </div>
                        </div>

                        <h6>SEO Tag</h6>
                        
                        <br>
                        <div class="row mb-3">
                            <label for="meta_title" class="col-sm-2 col-form-label">Meta Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="meta_title" value="" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="meta_description" class="col-sm-2 col-form-label">Meta Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" type="text" name="meta_description" rows="5" cols="10"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="meta_keyword" class="col-sm-2 col-form-label">Meta Keyword</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" type="text" name="meta_keyword" rows="5" cols="10"></textarea>
                            </div>
                        </div>

                        <hr>
                        <h6>Status Mode</h6>
                        <br>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="navbar_status">Navbar Status</label>
                                <input  type="checkbox" name="navbar_status" value="" >
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="status">Status</label>
                                <input  type="checkbox" name="status" value="" >
                            </div>


                        </div>


                        <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light float-end" >Save</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
 
@endsection