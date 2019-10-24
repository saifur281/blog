<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryCreateRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin/category/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {

        $category = $request->all();

        $slug = str_slug($request->name);
        $image = $request->file('image');

        if(isset($image)){

            $imageName = $slug . '-' . time() . $image->getClientOriginalName();
            $image->move('images',$imageName);
        }else{

            $imageName ='default.png';
        }

        $category['name'] = $request->name;
        $category['slug'] = $slug;
        $category['image'] = $imageName;











        Category::create($category);

        Toastr::success('Category Created successfully','Create');
        return redirect()->back();




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
        $category = Category::findOrfail($id);

        return view('admin/category/edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = Category::findOrfail($id);
        $category = $request->all();
        $slug = str_slug($request->name);
        $image = $request->file('image');

        if(isset($image)){


            $imageName = $slug . '-' . time() . $image->getClientOriginalName();
            $image->move('images',$imageName);
            $category['image'] = $imageName;

        }


        $category['name'] = $request->name;
        $category['slug'] = $slug;


        $input->update($category);


        Toastr::success('Category Edited successfully','Edited');
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Category::findOrFail($id)->delete();

        Toastr::warning('Category Deleted successfully','Edited');
        return redirect('admin/category');
    }
}
