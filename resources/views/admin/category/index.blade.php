@extends('layouts.admin')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Category List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('homewebsite')}}">Home</a></li>
                        <li class="breadcrumb-item active">Category List</li>
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

                            <h3 class="card-title">Category list</h3>

                                <a  class="btn btn-primary" href="{{route('category.create')}}">Create Category</a>

                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Post Count</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($categories->count()>0)

                                @foreach($categories as $category)
                                <tr>


                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>{{$category->id}}</td>

                                    <td class="d-flex">
                                        <a href="{{route('category.edit',[$category->id])}}" class="btn btn-sm  btn-primary mr-1"> <i class="fa fa-edit"></i> </a>
{{--                                        <a href="{{route('category.show',[$category->id])}}" class="btn btn-sm  btn-success mr-1"> <i class="fa fa-eye"></i> </a>--}}

                                        <form method="post" action="{{route('category.destroy',[$category->id])}}" class="mr-1">
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
