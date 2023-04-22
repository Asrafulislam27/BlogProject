@extends('layouts.master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit User 
                        <a href="{{route('admin.users')}}" class="btn btn-danger btn-rounded waves-effect waves-light float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">


                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-10">
                                <p class="form-control">{{$user->name}}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label">Email Id</label>
                            <div class="col-sm-10">
                                <p class="form-control">{{$user->email}}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label">Created At</label>
                            <div class="col-sm-10">
                                <p class="form-control">{{$user->created_at->format('d/m/Y')}}</p>
                            </div>
                        </div>

                        <form action="{{url('admin/update/'.$user->id)}}" method="POST" enctype="multipart/form-data">
                         @csrf
                         @method('patch')
                            <div class="row mb-3">
                                <label  class="col-sm-2 col-form-label">Role As</label>
                                <div class="col-sm-10">
                                    <select name="role_as" class="form-control">
                                        <option value="1" {{ $user->role_as == '1' ? 'selected':''}}>Admin</option>
                                        <option value="0" {{ $user->role_as == '0' ? 'selected':''}}>User</option>
                                        <option value="2" {{ $user->role_as == '2' ? 'selected':''}}>Blogger</option>
                                    </select>
                                </div>
                            </div>


                        <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light float-end" >Update User</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
 
@endsection