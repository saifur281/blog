@extends('layouts.backend.app')


@section('styles')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endsection


@section('content')

    <!----BLOG POST SINGLE IMAGE/ BANNER----------->

    <div class="row clearfix">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">

                    <h2 style="color:darkblue;">

                        {{$post->title}}
                        <i class="bg-danger material-icons ">edit</i>
                    </h2>

                </div>
                <div class="body text-center">

                    <img width="350px" class="img-rounded " src="/images/{{$post->image ? $post->image : 'default.png'}}" alt="">



                </div>
            </div>
        </div>
    </div>

    <!----BLOG POST SINGLE IMAGE/ BANNER END----------->


    {{ Form::model($post, ['method' => 'PATCH' , 'action' => ['Admin\PostController@update',$post->id],'files'=>true ]) }}

<!--------------------TITLE AND CATEGORY SECTION START FROM HERE--------------------->

    <div class="row clearfix">

        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
            <div class="card">
                <div class="header">
                    <h2>
                        EDIT TITLE AND IMAGE
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

                        <input type="checkbox" id="publish" class="filled-in" name="status" value="{{ $post->status == true ? 'checked' : $post->status == false  }}">
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


                        {{ Form::select('tag_id', $tags, null, [ 'class'=>'form-control show-tick' ]) }}




                    </div>


                    <div class="form-group" >
                        <label for="category">Select Category</label>



                        {{ Form::select('category_id', $categories, null, [ 'class'=>'form-control show-tick' ]) }}



                    </div>


                    <a href="{{ route('admin.posts.index') }}"><button type="button" class="btn btn-danger m-t-15 waves-effect">Back </button></a>


                    {{ Form::submit('Edit Posts', ['class' => 'btn btn-success m-t-15 waves-effect']) }}


                </div>
            </div>
        </div>

    </div>

    <!--------------------TITLE AND CATEGORY SECTION END HERE--------------------->


    <!--------------------BLOG POST BODY START FROM HERE--------------------->

    <div class="row clearfix">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        EDIT BLOG POST
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

    <!--------------------BLOG POST BODY END HERE--------------------->

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
