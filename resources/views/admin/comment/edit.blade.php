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
                        <form action="{{route('comment.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$blog->id}}" class="form-control" id=""
                                placeholder="">
                            <div class="card-body">


                             

                               



                                <div class="form-group">
                                    <label for="title">Comment</label>
                                    <textarea name="comment" class="form-control" id="comment"
                                        placeholder="Enter content">{{ old('comment', $blog->comment) }}</textarea>
                                    <div style="color: red">{{ $errors->first('comment') }}</div>
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