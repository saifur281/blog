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
                            ALL CATEGORY
                            <span class="badge bg-blue">{{ $categories->count() }}</span>

                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th> ID</th>
                                    <th>Category Name</th>
                                    <th>Image</th>
                                    <th>Post Count</th>
                                    <th>Created </th>
                                    <th>Updated</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th> ID</th>
                                    <th>Category Name</th>
                                    <th>Image</th>
                                    <th>Post Count</th>
                                    <th>Created </th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>


                                @if($categories)
                                    @foreach($categories as $category)
                                        <tr>

                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td><img width="100px" src="/images/{{ $category->image }}" alt=""></td>
                                            <td>{{ $category->posts->count() }}</td>
                                            <td>{{ $category->created_at->diffForHumans() }}</td>
                                            <td>{{ $category->updated_at->diffForHumans() }}</td>
                                            <td class="text-center">

                                                <a class="btn btn-info" href="{{ route('admin.category.edit',$category->id) }}" >
                                                    <i class="material-icons">edit</i>
                                                </a>

                                                {{ Form::model($category,['method'=>'DELETE', 'action'=>['Admin\CategoryController@destroy', $category->id]]) }}

                                                {{ Form::submit('delete',['class'=>'material-icons btn btn-danger']) }}



                                                {{ form::close() }}

                                            </td>





                                        </tr>
                                    @endforeach

                                @endif



                                </tbody>


                            </table>

                            {{ $categories->render() }}
                        </div>
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
                        {{ Form::open(['method' => 'POST' , 'action' => 'Admin\CategoryController@store', 'files'=> true]) }}

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
