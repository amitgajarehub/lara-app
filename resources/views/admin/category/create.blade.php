@extends('layout.dashboard')
<!-- @section('banner_menu','menu-open')
@section('banner', 'active')
@section('banner_add', 'active') -->
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
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center pb-4">
            <div class="col-sm-8">
                @if(session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        <span>{{ session()->get('message') }}</span>            
                    </div>            
                @endif
                <form action="create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-5">
                        <label for="inputTitle" class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                <span style="color: red">{{$message}} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-5">
                            <label class="col-sm-3" for="parent_category">Parent Category</label>
                            <select class="form-control col-sm-9" name="parent_category">
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </form>
            </div>
        </div>    
    </div>
</section>
@endsection
