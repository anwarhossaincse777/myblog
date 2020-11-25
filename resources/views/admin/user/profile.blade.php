
@extends('layouts.admin')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Profile </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('homewebsite')}}">Home</a></li>
                        <li class="breadcrumb-item "> <a href="{{route('user.index')}}">User List</a></li>
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

                                <h3 class="card-title"> User Profile</h3>

                                <a  class="btn btn-primary" href="{{route('user.index')}}"> Users Profile</a>

                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="row">
                                <!-- general form elements -->
                                <div class="col-12 col-lg-9">
                                    <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">

                                            <div class="row">

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name">User Name</label>
                                                        <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="name">User Email</label>
                                                        <input type="email" name="email" class="form-control" id="email"  value="{{$user->email}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password">User password <small class="text-danger">(Enter password if you want change.)</small></label>
                                                        <input type="password" name="password" class="form-control" id="password"  value="{{$user->password}}">
                                                    </div>


                                                </div>

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="image">User Image</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="image"  class="custom-file-input" id="image">
                                                            <label class="custom-file-label"  for="image">Chose file</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="des">User Description</label>
                                                        <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="write your profile descrioption"></textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            @include('includes.errors')

                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Update Profile</button>
                                        </div>
                                    </form>
                                </div>

                            <div class="col-lg-3">

                                <div class="card-">

                                    <div class="card-body text-center">

                                        <div style="height: 200px; width:200px; overflow: hidden" class="m-auto">
                                            <img src="{{asset($user->image)}}" alt="" class="img-fluid  rounded-circle  img-rounded">

                                        </div>

                                        <div class="mt-2">
                                            <h5>{{$user->name}}</h5>
                                            <p>{{$user->email}}</p>


                                        </div>




                                    </div>

                                </div>

                            </div>
                            <!-- /.card -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    </div>




@endsection
