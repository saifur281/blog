<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Post;
use App\Tag;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin/posts/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin/posts/create',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if(isset($image)){

            $name = $slug .'-'.time().$image->getClientOriginalName();

            $image->move('images',$name);

        }else{

            $name = 'default.png';
        }

        $post = new Post();

        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $name;
        $post->body = $request->body;
        if(isset($request->status)){

            $post->status = true;
        }else{

            $post->status = false;
        }

        $post->is_approved = true;
        $post->category_id = $request->category_id;
        $post->tag_id = $request->tag_id;
        $post->save();




        return redirect('admin/posts');







    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin/posts/show',compact('post','categories','tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $tags = Tag::pluck('name','id')->all();
        $categories = Category::pluck('name','id')->all();
        return view('admin/posts/edit',compact('post','tags','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $slug = str_slug($request->title);
        $image = $request->file('image');

        if(isset($image)){

            $imageName = $slug . '-' . time() . $image->getClientOriginalName();
            $image->move('images',$imageName);

            $post->image = $imageName;






        }




        if(isset($request->status)){

            $post->status = true;
        }else{

            $post->status = false;
        }

        $post->title = trim($request->title);
        $post->category_id = $request->category_id;
        $post->tag_id = $request->tag_id;
        $post->slug = $slug;
        $post->body = $request->body;
        $post->user_id = Auth::id();

        $post->is_approved = true;


        $post->update();

        Toastr::success('this post has been Edited Successfully','Edited');

        return redirect('admin/posts');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {



           unlink(public_path() . '/images/' . $post->image);
           $post->delete();
           Toastr::warning('this post has been deleted','Delete');
           return redirect()->back();







    }
}
