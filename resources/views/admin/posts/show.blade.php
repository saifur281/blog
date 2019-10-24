@extends('layouts.backend.app')


@section('styles')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endsection


@section('content')


<div class="container-fluid">

    <a href="{{ route('admin.posts.index') }}" class="btn btn-danger ">Back</a>



        @if($post->is_approved == true)

            <button type="button" class="btn btn-danger pull-right">

                <i class="material-icons">done</i>
                <span>Pending</span>

            </button>

        @else
        <button type="button" class="btn btn-success pull-right" >

            <i class="material-icons">done</i>
            <span>Approve</span>

        </button>

        @endif
    <br><br>



        <div class="row clearfix">

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
            <div class="card">
                <div class="header">
                    <h2>
                        {{ $post->title }}
                        <small>Posted By <strong>{{ $post->user->name }}</strong> On {{ $post->created_at->diffForHumans() }}</small>
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
                <div style="overflow: hidden;" class="body">





                    {!!  $post->body !!}



                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">


            <div class="card">
                <div class="header bg-cyan">
                    <h2>
                       Categories
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

                    @if($categories)

                   @foreach($categories as $Category)

                       <span class="label bg-cyan">{{ $Category->name }}</span>
                  @endforeach
                        @endif

                </div>
            </div>

            <div class="card">
                <div class="header bg-green">
                    <h2>
                        Tags
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

                    @if($tags)

                        @foreach($tags as $tag)

                            <span class="label bg-green">{{ $tag->name }}</span>
                        @endforeach
                    @endif

                </div>
            </div>

            <div class="card">
                <div class="header bg-amber">
                    <h2>
                        Featured Image
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

                    <img class="img-responsive img-thumbnail" src="/images/{{ $post->image }}" alt="">

                </div>
            </div>


        </div>




    </div>



</div>




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
