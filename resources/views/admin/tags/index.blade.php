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
                            ALL TAGS
                            <span class="badge bg-blue">{{ $tags->count() }}</span>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Add Tags</a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Tag ID</th>
                                    <th>Tag Name</th>
                                    <th>Post Count</th>
                                    <th>Created </th>
                                    <th>Updated</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Tag ID</th>
                                    <th>Tag Name</th>
                                    <th>Post Count</th>
                                    <th>Created </th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                @if($tags)

                                    @foreach($tags as $tag)

                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->posts->count() }}</td>
                                    <td>{{ $tag->created_at->diffForHumans() }}</td>
                                    <td>{{ $tag->updated_at->diffForHumans() }}</td>

                                    <td class="text-center">

                                        <div class="row ">

                                            <div class="col-sm-3">


                                        <a class="btn btn-success waves-effect" href="{{ route('admin.tags.edit', $tag->id) }}">
                                            <i class="material-icons">edit</i>
                                        </a>

                                            </div>

                                            <div class="col-sm-3">

                                        {{ Form::model($tag,[ 'method'=> 'DELETE', 'action' => ['Admin\TagsController@destroy', $tag->id]]) }}



                                            {{ Form::submit('delete', ['class' => 'material-icons btn btn-danger waves-effects ']) }}



                                        {{ Form::close() }}

                                            </div>

                                        </div>

                                    </td>


                                </tr>

                                    @endforeach
                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>

    @stop
