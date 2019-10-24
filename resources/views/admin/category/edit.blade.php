@extends('layouts.backend.app')




@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <h2>
                BLOG ALL TAGS
                <small>Taken from <a href="http://blog.test" target="_blank">Blog</a></small>
            </h2>
        </div>
        <!-- Basic Examples -->

        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            CATEGORY IMAGE
                        </h2>

                    </div>
                    <div class="body text-center">

                        <img class="img-responsive thumbnail image" src="/images/{{ $category->image }}" alt="" width="250px">



                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>





    <div class="container-fluid">
        <div class="block-header">
            <h2>
                BLOG ALL TAGS
                <small>Taken from <a href="http://blog.test" target="_blank">Blog</a></small>
            </h2>
        </div>
        <!-- Basic Examples -->

        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            CREATE CATEGORY
                        </h2>
                        <ul class="header-dropdown m-r--5">

                        </ul>
                    </div>
                    <div class="body">
                        {{ Form::model($category,['method' => 'PATCH' , 'action' => ['Admin\CategoryController@update',$category->id ] , 'files'=> true]) }}

                        <div class="form-group">
                            <div class="form-line">
                                <label for="email_address">Email Address</label>
                                {{ Form::text('name', null , ['class'=> 'form-control','placeholder'=> 'Category Name']) }}
                            </div>
                        </div>


                        <div class="form-group">


                            {{ Form::file('image', null , ['class'=> 'form-control']) }}

                        </div>

                        <a href="{{ route('admin.category.index') }}"><button type="button" class="btn btn-danger m-t-15 waves-effect">Back </button></a>


                        {{ Form::submit('Create Category', ['class' => 'btn btn-primary m-t-15 waves-effect']) }}


                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>

@stop
