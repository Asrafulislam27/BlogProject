@extends('layouts.master')
@section('admin')
<script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Profile</h4>
                       <form action="{{route('store.profile')}}" method="POST" enctype="multipart/form-data">
                         @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" value="{{$editprofile->name}}" id="name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" name="email" value="{{$editprofile->email}}" id="email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="descriptione-email-input" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" type="text" name="description" id="description" rows="5" cols="10">{{$editprofile->description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="Profile_image" class="form-control" id="image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img id="showimage" class="rounded me-2" width="200" src="{{(!empty($editprofile->Profile_image))? url('Upload/Profile/'.$editprofile->Profile_image):url('Upload/no_image.jpg')}}" alt="image">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light float-end" > Update Profile</button>
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