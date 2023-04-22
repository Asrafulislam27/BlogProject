@extends('layouts.master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">Category All View 
                        <a href="{{route('admin.add-category')}}" class="btn btn-info btn-rounded waves-effect waves-light float-end">Add New Category</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr>
                                    <th>@ID</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
               
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>{{$category->status == '1' ? 'Hidden':'Active'}}</td>
                                        <td>
                                            <a href="{{url('admin/edit-category/'.$category->id)}}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{url('admin/delete-category/'.$category->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
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