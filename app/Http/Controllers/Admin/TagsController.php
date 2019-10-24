<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('/admin/tags/index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/tags/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagCreateRequest $request)
    {

       $tag = [

           'name' => $request->name,
           'slug' => str_slug($request->name),
       ];

       Toastr::success('Tag has been created successfully','success');

       Tag::create($tag);
       return redirect('/admin/tags');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return view('admin/tags/edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update([

            'name' => $request->name,
            'slug' => str_slug($request->name),
        ]


        );
        Toastr::success('Tag has been edited successfully','success');
        return redirect('admin/tags');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        Toastr::warning('Tag Is deleted Successfully','Delete');
        return redirect()->back();
    }
}
