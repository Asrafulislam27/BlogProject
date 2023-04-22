@extends('layouts.master')
@section('admin')
<script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Setting</h4>
                        
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                       <form action="{{route('admin.setting.update')}}" method="POST" enctype="multipart/form-data">
                         @csrf

                         @method('patch')
                        <div class="row mb-3">
                            <label for="site_name" class="col-sm-2 col-form-label"> Website Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="site_name" value="{{$settings->site_name}}" id="site_name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="copyright_name" class="col-sm-2 col-form-label">Copyright Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="copyright_name" value="{{$settings->copyright_name}}" id="copyright_name">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="logo" class="col-sm-2 col-form-label">Website Logo</label>
                            <div class="col-sm-10">
                                <input type="file" name="logo" class="form-control" id="image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="logo" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img id="showimage" class="rounded me-2" width="200" src="{{(!empty($settings->logo))? url('Upload/Logo/'.$settings->logo):url('Upload/no_image.jpg')}}" alt="image">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="address" class="col-sm-2 col-form-label">Contact Address </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" type="text" name="address" rows="5" cols="10">{!! $settings->address !!}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="phone_number" value="{{$settings->phone_number}}" id="phone_number">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="email" value="{{$settings->email}}" id="email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="favicon" class="col-sm-2 col-form-label">Website Favicon</label>
                            <div class="col-sm-10">
                                <input type="file" name="favicon" class="form-control" id="image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="favicon" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img id="showimage" class="rounded me-2" width="200" src="{{(!empty($settings->favicon))? url('Upload/Logo/'.$settings->favicon):url('Upload/no_image.jpg')}}" alt="image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" type="text" name="footer_description" rows="5" cols="10">{!! $settings->footer_description !!}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light float-end" >Setting Save</button>
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