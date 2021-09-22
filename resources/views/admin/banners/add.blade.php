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
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center pb-4">
            <div class="col-sm-8">
                @if(session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        <span>{{ session()->get('message') }}</span>            
                    </div>            
                @endif
                <form action="/banner/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-5">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control">
                            @error('title')
                                <span style="color: red">{{$message}} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-5">
                        <label for="link" class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-10">
                          <input type="text" name="url" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-5">
                        <label for="Image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image">
                            @error('image')
                                <span style="color: red">{{$message}} </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Banner</button>
                </form>
            </div>
        </div>    
    </div>
</section>
@endsection
