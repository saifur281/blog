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
                            ALL POSTS
                            <sup> <span style="font-size:16px" class="badge bg-blue"> {{ $posts->count() }}</span></sup>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary waves-effect">
                                    <i class="material-icons">add</i>
                                    <span>Add New Posts</span>

                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>

                                    <th>image</th>
                                    <th>title</th>
                                    <th>Body</th>
                                    <th><i class="material-icons">visibility</i></th>
                                    <th>Status </th>
                                    <th>Approved</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>

                                    <th>image</th>
                                    <th>title</th>
                                    <th>Body</th>
                                    <th><i class="material-icons">visibility</i></th>
                                    <th>Status </th>
                                    <th>Approved</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                @if($posts)

                                    @foreach($posts as $post)

                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->user->name }}</td>

                                            <td><img width="150px" src="/images/{{ $post->image ? $post->image : 'default.png' }}" alt=""></td>
                                            <td>{{ str_limit($post->title,20) }}</td>
                                            <td>{{ str_limit($post->body,30) }}</td>
                                            <td>{{ $post->view_count }}</td>
                                            <td>

                                                @if($post->status == true)

                                                    <span class="badge bg-blue">Publish</span>

                                                    @else

                                                    <span class="badge bg-pink">Pending</span>
                                                @endif


                                            </td>

                                            <!-- Is Approve Defeine-->
                                            <td>

                                                @if($post->is_approve == true)

                                                    <span class="badge bg-blue">Approve</span>

                                                    @else

                                                    <span class="badge bg-pink">Pending</span>

                                                @endif



                                            </td>


                                            <td class="text-center">
                                                <div  class="row">
                                                    <div class="col-sm-3">
                                                <a href="{{ route('admin.posts.edit',$post->id) }}" class="btn btn-info">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                    </div>


                                                    <div style="margin :0px 8px;" class="col-sm-3">
                                                <a href="{{ route('admin.posts.show',$post->id) }}" class="btn btn-success">
                                                    <i class="material-icons">visibility</i>
                                                </a>
                                                    </div>

                                                    <div  class="col-sm-3">
                                                {{ Form::open(['method' => 'DELETE', 'action' => ['Admin\PostController@destroy',$post->id] ]) }}

                                                {{ Form::submit('delete', ['class' => 'btn btn-danger material-icons','onclick' => 'Are You Sure Delete This Post']) }}

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
