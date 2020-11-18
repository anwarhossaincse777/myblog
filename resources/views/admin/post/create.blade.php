
@extends('layouts.admin')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Post </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                        <li class="breadcrumb-item "> <a href="{{route('post.index')}}">Post List</a></li>
                        <li class="breadcrumb-item active">Create Post</li>
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

                                <h3 class="card-title">Create Post</h3>

                                <a  class="btn btn-primary" href="{{route('post.index')}}"> Post List</a>

                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="row">
                                <!-- general form elements -->
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">

                                            @include('includes.errors')
                                            <div class="form-group">
                                                <label for="name">Post Title</label>
                                                <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder="Enter Title">
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Select Category</label>

                                                <select name="category" id="category" class="form-control">

                                                    <option value="" style="display: none" selected>Select Category</option>

                                                    @foreach($categories as $category)

                                                    <option value="{{$category->id}}">

                                                       {{$category->name}}
                                                    </option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="image">Upload Image</label>
                                               <div class="custom-file">
                                                   <input type="file" name="image"  class="custom-file-input" id="image">
                                                   <label class="custom-file-label"  for="image">Chose file</label>
                                               </div>
                                            </div>






                                            <div class="form-group">
                                                <label>Choose Post Tags</label>
                                                <div class=" d-flex flex-wrap">
                                                    @foreach($tags as $tag)
                                                        <div class="custom-control custom-checkbox" style="margin-right: 20px">
                                                            <input class="custom-control-input" name="tags[]" type="checkbox" id="tag{{ $tag->id}}" value="{{ $tag->id }}">
                                                            <label for="tag{{ $tag->id}}" class="custom-control-label">{{ $tag->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>








                                            <div class="form-group">
                                                <label for="des">Description</label>
                                                <textarea name="description" id="description" class="form-control" placeholder="Enter Description">{{old('description')}}</textarea>
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



@section('style')

    <link rel="stylesheet" href="{{asset('admin')}}/dist/css/alt/summernote-bs4.min.css">


@endsection


@section('script')
    <script src="{{asset('admin')}}/dist/js/summernote-bs4.min.js"></script>

    <script>
        $('#description').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 100
        });
    </script>



@endsection
