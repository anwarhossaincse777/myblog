@extends('layouts.admin')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Post List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('homewebsite')}}">Home</a></li>
                        <li class="breadcrumb-item active">Post List</li>
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

                            <h3 class="card-title">Post list</h3>

                                <a  class="btn btn-primary" href="{{route('post.create')}}">Create Post</a>

                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Author</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($post->count()>0)

                                @foreach($post as $post)
                                <tr>


                                    <td>{{$post->id}}</td>

                                    <td>

                                        <div style="max-width: 70px; max-height: 70px;overflow: hidden">

                                            <img src="  {{$post->image}}"  class="img-fluid" alt="">
                                        </div>

                                    </td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->category->name}}</td>
                                    <td>
                                       @foreach($post->tag as $tag)

                                       <span class="badge badge-primary">{{$tag->name}}</span>

                                        @endforeach


                                    </td>
                                    <td>{{$post->user->name}}</td>

                                    <td class="d-flex">


                                        <a href="{{route('post.show',[$post->id])}}"class="btn btn-sm  btn-success mr-1"> <i class="fa fa-eye"></i> </a>

                                        <a href="{{route('post.edit',[$post->id])}}" class="btn btn-sm  btn-primary mr-1"> <i class="fa fa-edit"></i> </a>


                                        <form method="post" action="{{route('post.destroy',[$post->id])}}" class="mr-1">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>

                                        </form>



                                    </td>
                                </tr>



                                @endforeach

                                @else
                                    <tr>
                                        <td colspan="6">

                                            <h5 class="text-center">!! Sorry!! NO Post Found</h5>
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
