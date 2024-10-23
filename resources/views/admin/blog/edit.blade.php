@extends('admin.layouts.app')
@section('title','Category Edit')
@section('style')
@endsection
@section('content')


<main id="main" class="main">
    <div class="pagetitle">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blog Edit</h1>
                    </div>

                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{route('blog.list')}}" class="btn btn-primary">Back</a>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div><!-- End Page Title -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('blog.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$blog->id}}" class="form-control" id=""
                                placeholder="">
                            <div class="card-body">


                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{old('name', $blog->name)}}"
                                        class="form-control" id="" placeholder="Enter name">
                                    <div style="color: red">{{$errors->first('name')}}</div>

                                </div>

                               



                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    <div style="color: red">{{ $errors->first('image') }}</div>
                                    <img style="width:100px;" src="{{ asset('storage/images/' . $blog->image) }}"
                                        alt="Blog Image">
                                </div>

                                <div class="form-group">
                                    <label for="title">Content</label>
                                    <textarea name="content" class="form-control" id="description"
                                        placeholder="Enter content">{{ old('content', $blog->content) }}</textarea>
                                    <div style="color: red">{{ $errors->first('description') }}</div>
                                </div>


                             

                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" name="author" value="{{ old('author', $blog->author) }}"
                                        class="form-control" id="author" placeholder="Enter author's name">
                                    <div style="color: red">{{ $errors->first('author') }}</div>
                                </div>

                              

                                <div class="form-group">
                                    <label for="date"> Date</label>
                                    <input type="date" name="date"
                                        value="{{ old('date', $blog->date) }}" class="form-control"
                                        id="date">
                                    <div style="color: red">{{ $errors->first('date') }}</div>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                  
                                    <select class="form-control" value="{{$blog->status}}" name=" status">
                                        <option value="0" @if($blog->status == 0) selected="selected" @endif>Active
                                        </option>
                                        <option value="1" @if($blog->status == 1) selected="selected" @endif>
                                            Inactive
                                        </option>
                                    </select>

                                </div>




                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->


@endsection

@section('script')
@endsection