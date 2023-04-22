@extends('layouts.master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card"><br>
                                    <center>
                                        <img class="rounded-circle avatar-xl" src="{{(!empty($profile->Profile_image)) ? url('Upload/Profile/'.$profile->Profile_image):url('Upload/no_image.jpg')}}" alt="image">
                                    </center>
                                    <div class="card-body">
                                        <h4 class="card-title">Name : {{$profile->name}}</h4>
                                        <hr>
                                        <h4 class="card-title">Email : {{$profile->email}}</h4>
                                        <hr>
                                        <h4 class="card-title">Description : {{$profile->description}}</h4>
                                        <hr>
                                        <a href="{{route('edit.profile')}}" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>

                                    </div>
                                </div>
                            </div>
        
    
        
                        </div>
    </div>
</div>
@endsection