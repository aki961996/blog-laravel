@extends('admin.layouts.app')
@section('title','Blog Add')
@section('style')
@endsection
@section('content')


<main id="main" class="main">
    <div class="pagetitle">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blog Add</h1>
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
                        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <!-- Title Input -->
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                        id="name" placeholder="Enter name">
                                    <div style="color: red">{{ $errors->first('name') }}</div>
                                </div>

                              

                                <!-- Image Input -->
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    <div style="color: red">{{ $errors->first('image') }}</div>
                                </div>

                           
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" class="form-control tinymce-editor" id="content"
                                        placeholder="Enter content">{{ old('content') }}</textarea>
                                    <div style="color: red">{{ $errors->first('content') }}</div>
                                </div>

                             

                              



                                <!-- Author Input -->
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" name="author" value="{{ old('author') }}" class="form-control"
                                        id="author" placeholder="Enter author's name">
                                    <div style="color: red">{{ $errors->first('author') }}</div>
                                </div>

                                <!-- Publish Date Input -->
                                <div class="form-group">
                                    <label for="publish_date"> Date</label>
                                    <input type="date" name="date" value="{{ old('date') }}"
                                        class="form-control" id="publish_date">
                                    <div style="color: red">{{ $errors->first('publish_date') }}</div>
                                </div>

                                <!-- Status Select -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="0" {{ old('status')==0 ? 'selected' : '' }}>Active</option>
                                        <option value="1" {{ old('status')==1 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary">Add</button>
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