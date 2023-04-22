@extends('layouts.master')
@section('admin')
<script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Password Change</h4><br>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif

                       <form action="{{route('update.password')}}" method="POST" enctype="multipart/form-data">
                         @csrf
                        <div class="row mb-3">
                            <label for="oldpassword" class="col-sm-2 col-form-label">Current Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="current_password" value="" id="oldpassword">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="password" value="" id="password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="password_confirmation" value="" id="confirm_password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light float-end" >Change Password</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection