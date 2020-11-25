
@extends('layouts.admin')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create User </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('homewebsite')}}">Home</a></li>
                        <li class="breadcrumb-item "> <a href="{{route('user.index')}}">Category List</a></li>
                        <li class="breadcrumb-item active">Create Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">

                                <h3 class="card-title">Create User</h3>

                                <a  class="btn btn-primary" href="{{route('user.index')}}"> Users List</a>

                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="row">
                                <!-- general form elements -->
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{route('user.store')}}" method="post">
                                        @csrf
                                        <div class="card-body">

                                            @include('includes.errors')
                                            <div class="form-group">
                                                <label for="name">User Name</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                                            </div>

                                            <div class="form-group">
                                                <label for="name">User Email</label>
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                                            </div>

                                            <div class="form-group">
                                                <label for="des">Passwored</label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                                            </div>

                                            <div class="form-group">
                                                <label for="des">Description</label>
                                                <input type="text" name="description" class="form-control" id="description" placeholder="Enter description">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->

                                <!-- Form Element sizes -->

                                </div>
                                <!-- /.card -->

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
