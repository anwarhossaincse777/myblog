
@extends('layouts.admin')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">View post </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                        <li class="breadcrumb-item "> <a href="{{route('post.index')}}">post List</a></li>
                        <li class="breadcrumb-item active">Edit post</li>
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

                                <h3 class="card-title">View post</h3>

                                <a  class="btn btn-primary" href="{{route('post.index')}}">Go BackTo post List</a>

                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                           <table class="table table-bordered ">

                               <tbody>


                               <tr>
                                   <th class="width:200px">Image</th>
                                   <td>
                                       <div style="max-width:200px; max-height:200px;overflow: hidden">

                                           <img src="  {{$post->image}}"  class="img-fluid" alt="">
                                       </div>

                                   </td>
                               </tr>

                                   <tr>
                                      <th class="width:200px">Title</th>
                                       <td>{{$post->title}}</td>
                                   </tr>

                                   <tr>
                                       <th class="width:200px">Category Name</th>
                                       <td>{{$post->category->name}}</td>
                                   </tr>

                                   <tr>
                                       <th class="width:200px">Post Tag</th>
                                       <td>

                                           @foreach($post->tag as $tag)

                                               <span class="badge badge-primary">{{$tag->name}}</span>

                                           @endforeach

                                       </td>
                                   </tr>

                                   <tr>
                                       <th class="width:200px">Author Name</th>
                                       <td>{{$post->user->name}}</td>
                                   </tr>

                                   <tr>
                                       <th class="width:200px">Description</th>
                                       <td>{!! $post->description !!}</td>
                                   </tr>

                               </tbody>

                           </table>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    </div>




@endsection

