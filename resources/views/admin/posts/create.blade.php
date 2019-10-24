@extends('layouts.backend.app')


@section('styles')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    @endsection


@section('content')


    {{ Form::open( ['method' => 'POST' , 'action' => 'Admin\PostController@store','files'=>true ]) }}


    <div class="row clearfix">

        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
            <div class="card">
                <div class="header">
                    <h2>
                       ADD NEW POST
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">




                    <div class="form-group">
                        <div class="form-line">
                            <label for="email_address">Post Title</label>
                            {{ Form::text('title', null , ['class'=> 'form-control','placeholder'=> 'Post Title']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">Featured Image</label>
                            {{ Form::file('image' , ['class'=> 'form-control']) }}

                    </div>

                    <div class="form-group">

                        <input type="checkbox" id="publish" class="filled-in" name="status" value="1">
                        <label for="publish">Publish</label>

                    </div>










                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
            <div class="card">
                <div class="header">
                    <h2>
                        BLOG TAG EDIT
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">



                    <div class="form-group" >
                        <label for="Tags">Select Tag</label>


                        <select class="form-control show-tick" name="tag_id" id="tag" data-live-search="true" multiple>

                            @foreach($tags as $tag)

                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>

                            @endforeach

                        </select>




                    </div>


                    <div class="form-group" >
                        <label for="category">Select Category</label>

                        <select class="form-control show-tick" name="category_id" id="categories" data-live-search="true" multiple>

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                            @endforeach

                        </select>


                    </div>


                    <a href="{{ route('admin.posts.index') }}"><button type="button" class="btn btn-danger m-t-15 waves-effect">Back </button></a>


                    {{ Form::submit('Create Posts', ['class' => 'btn btn-primary m-t-15 waves-effect']) }}


                </div>
            </div>
        </div>
    </div>







    <div class="row clearfix">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        BLOG POST CREATE
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">





                    <div class="form-group">
                        <div class="form-line">
                            <label for="email_address">Post Body</label>
                            {{ Form::textarea('body', null , ['class'=> 'form-control','id'=>'summary-ckeditor','placeholder'=> 'Post Body']) }}
                        </div>
                    </div>
















                </div>
            </div>
        </div>
    </div>


    {{ Form::close() }}

@stop


@section('scripts')


    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace( 'summary-ckeditor', {
            filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>

    @stop
