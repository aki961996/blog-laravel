@extends('admin.layouts.app')
@section('title','Category List')
@section('style')
@endsection
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Blog</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>

            </ol>
        </nav>
    </div><!-- End Page Title -->

   
    @include('msg')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">
                            Blog List
                            <a href="{{route('comment.create')}}" class="btn btn-primary"
                                style="float: right;margin-top: -12px;">Add New
                                comment</a>
                        </h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>

                                    <th scope="col">Comment</th>
                                    
                                    <th scope="col">Created at</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($comment as $blogs)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $blogs->name }}</td> <!-- Added name field to match table header -->
                                   
                                  
                                    <td>{{ $blogs->created_at_formatted }}</td>
                                    <!-- Fixed typo from 'crated_at' to 'created_at' -->
                                    <td><a href="{{route('comment.edit', encrypt($blogs->id))}}"
                                            class="btn btn-primary">Edit</a></td>
                                    <td>
                                        <form action="{{route('comment.destroy', $blogs->id )}}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No records found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>

                    <div style="padding: 10px; float:right;">
                        {{-- {!!
                        $category->appends(\Illuminate\Support\Facades\Request::except('page'))->links()
                        !!} --}}
                    </div>
                </div>



            </div>


        </div>
    </section>

</main><!-- End #main -->


@endsection

@section('script')
@endsection