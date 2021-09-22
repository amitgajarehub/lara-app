@extends('layout.dashboard')
{{-- @section('viewRegister', 'active') --}}
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">product</li>
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
                    <a href="{{ route('product.create') }}" class="btn btn-primary float-right"><span>Create Product</span></a>
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
                              <th scope="col">Image</th>
                              <th scope="col">Name</th>
                              <th scope="col">category</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($products as $product)
                            <tr>
                              
                              <td>{{ $product->id }}</td>
                              <td><img src="{{asset('products/'.$product->image)}}" style="max-width: 100px;" /></td>
                              <td>{{ $product->name}}</td>
                              <td>{{ $product->category}}</td>
                              <td>
                                <a href="{{ route('product.edit', ['product'=> $product->id]) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('product.destroy', ['product'=> $product->id]) }}" method="POST" style="display: inline-block;">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
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


