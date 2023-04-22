@extends('layouts.master')
@section('admin')
<script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">About</h4>
                        
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                       <form action="{{route('admin.about-us.update')}}" method="POST" enctype="multipart/form-data">
                         @csrf

                         @method('patch')
                        <div class="row mb-3">
                            <label for="about_name" class="col-sm-2 col-form-label"> About Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="about_name" value="{{$about->about_name}}" id="about_name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="about_description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="mynote" type="text" name="about_description" rows="5" cols="10">{!! $about->about_description !!}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light float-end" >About Save</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>


 
@endsection