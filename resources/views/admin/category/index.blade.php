@extends('layout.dashboard')
{{-- @section('viewRegister', 'active') --}}
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">category</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        <span>{{ session()->get('message') }}</span>            
                    </div>            
                @endif
                <div class="mr-4">
                    <a href="admin/category/create" class="btn btn-primary float-right"><span>Create Category</span></a>
                </div>
            </div>
        </div>
        <div class="row p-4">
            <div class="col-md-12">
                <div class="banner-table border bg-white">
                    <div class="table-responsive">
                        <table class="table table-hover">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Category Name</th>
                              <th scope="col">Parent Category</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($categories as $category)
                            <tr>
                              
                              <td>{{ $category->id }}</td>
                              <td>{{ $category->name}}</td>
                              <td>  
                                    @if ($category->parent)
                                        {{ $category->parent->name}}
                                    @endif
                              </td>
                              <td>
                                <a href="/admin/category/edit/{{$category->id}}" class="btn-sm btn-info ">Edit</a>

                                <a href="/admin/category/delete/{{$category->id}}" class="btn-sm btn-danger ">Delete</a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


