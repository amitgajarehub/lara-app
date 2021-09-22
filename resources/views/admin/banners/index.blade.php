@extends('layout.dashboard')
{{-- @section('viewRegister', 'active') --}}
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Banners</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">banner</li>
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
                    <a href="banner/add" class="btn btn-primary float-right"><span>Add Banner</span></a>
                </div>
            </div>
        </div>
        <div class="row p-4">
            <div class="col-md-12">
                <div class="banner-table border bg-white">
                    <div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">
                        <table class="table table-hover">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Title</th>
                              <th scope="col">Image</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($banners as $item)
                            <tr>
                              
                              <td>{{ $item->id }}</td>
                              <td>{{ $item->title }}</td>
                              <td>
                                <img src="{{asset('banners/'.$item->image)}}" style="max-width: 100px;" />
                              </td>
                              <td>
                                <a href="/admin/banner/edit/{{$item->id}}" class="btn-sm btn-info ">Edit</a>
                                <a href="/admin/banner/delete/{{$item->id}}" class="btn-sm btn-danger ">Delete</a>
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


