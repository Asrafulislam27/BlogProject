@extends('layouts.master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Tag</h4>
                        
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                       <form action="{{route('admin.store.add-tag')}}" method="POST" enctype="multipart/form-data">
                         @csrf
                        <div class="row mb-3">
                            <label for="tag" class="col-sm-2 col-form-label">Tag</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="tag" value="" id="name">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light float-end" >Save</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
 
@endsection