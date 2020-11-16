@extends('layouts.admin')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tag List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tag List</li>
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

                            <h3 class="card-title">Tag list</h3>

                                <a  class="btn btn-primary" href="{{route('tag.create')}}">Create Tags</a>

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

                                @if($tags->count())
                                @foreach($tags as $tag)
                                <tr>


                                    <td>{{$tag->id}}</td>
                                    <td>{{$tag->name}}</td>
                                    <td>{{$tag->slug}}</td>
                                    <td>{{$tag->id}}</td>

                                    <td class="d-flex">
                                        <a href="{{route('tag.edit',[$tag->id])}}" class="btn btn-sm  btn-primary mr-1"> <i class="fa fa-edit"></i> </a>
{{--                                        <a href="{{route('category.show',[$category->id])}}" class="btn btn-sm  btn-success mr-1"> <i class="fa fa-eye"></i> </a>--}}

                                        <form method="post" action="{{route('tag.destroy',[$tag->id])}}" class="mr-1">
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

                                        <h5 class="text-center">!! Sorry!! NO Tags Found</h5>
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
