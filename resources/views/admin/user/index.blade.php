@extends('layouts.master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User All</h4>

                            <p class="card-title-desc">
                                
                            </p><br>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr>
                                    <th>@ID</th>
                                    <th>UserName</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
               
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role_as == '1' ? 'Admin':'User'}}</td>
                                        <td>
                                            <a href="{{url('admin/edit/'.$user->id)}}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            
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