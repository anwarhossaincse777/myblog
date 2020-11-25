@extends('layouts.admin')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('homewebsite')}}">Home</a></li>
                        <li class="breadcrumb-item active">User List</li>
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

                            <h3 class="card-title">User list</h3>

                                <a  class="btn btn-primary" href="{{route('user.create')}}">Create User</a>

                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>image</th>
                                    <th>Description</th>

                                    <th style="width: 40px">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($users->count()>0)

                                @foreach($users as $user)
                                <tr>


                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>

                                    <td>

                                        <div style="max-width: 70px; max-height: 70px;overflow: hidden">

                                            <img src="  {{$user->image}}"  class="img-fluid" alt="">
                                        </div>

                                    </td>

                                    <td>{{$user->description}}</td>

                                    <td class="d-flex">
                                        <a href="{{route('user.edit',[$user->id])}}" class="btn btn-sm  btn-primary mr-1"> <i class="fa fa-edit"></i> </a>
{{--                                        <a href="{{route('category.show',[$user->id])}}" class="btn btn-sm  btn-success mr-1"> <i class="fa fa-eye"></i> </a>--}}

                                        <form method="post" action="{{route('user.destroy',[$user->id])}}" class="mr-1">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>

                                        </form>



                                    </td>
                                </tr>



                                @endforeach

                                @else
                                    <tr>
                                        <td colspan="5">

                                            <h5 class="text-center">!! Sorry!! NO Category Found</h5>
                                        </td>

                                    </tr>


                                @endif


                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>




@endsection
