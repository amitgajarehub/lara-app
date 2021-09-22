@extends('layout.dashboard')
{{-- @section('viewRegister', 'active') --}}
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
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
                <div class="card">
                    <div class="card-header text-bold">
                        User List
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-danger" role="alert">
                                {{Session::get('success')}}
                                <button type="button" class="close text-danger" data-dismiss="alert">×</button>
                            </div>
                        @endif
                        <table class="table table-bordered text-center">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Action</th>
                            </thead>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


