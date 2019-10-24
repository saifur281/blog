@extends('layouts.backend.app')



@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        BLOG TAG CREATE
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



                    {{ Form::open(['method' => 'POST' , 'action' => 'Admin\TagsController@store']) }}

                    <div class="form-group">
                        <div class="form-line">
                            <label for="email_address">Email Address</label>
                            {{ Form::text('name', null , ['class'=> 'form-control','placeholder'=> 'Tags Name']) }}
                        </div>
                    </div>

                    <a href="{{ route('admin.tags.index') }}"><button type="button" class="btn btn-danger m-t-15 waves-effect">Back </button></a>


                    {{ Form::submit('Create Tags', ['class' => 'btn btn-primary m-t-15 waves-effect']) }}


                    {{ Form::close() }}












                </div>
            </div>
        </div>
    </div>



    @stop
