<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::orderBy('name','asc')->where('is_parent',0)->get();
        return view('backend.pages.category.manage', compact('category') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max: 255',
        ],
        [
            'name.required' => 'Please Insert Category Name',
        ]);

        $cat = new category();
        $cat->name         = $request->name;
        $cat->slug         = Str::slug($request->name);
        $cat->is_parent    = $request->is_parent;
        $cat->status       = $request->status;
        $cat->description  = $request->description;

        //image Preparation
        if ($request->image) {
            $image      = $request->file('image');
            $img        = rand().'_'.'Category-Logo'.'.'.$image->getClientOriginalExtension();
            $location   = public_path('Backend/image/category/' .$img );
            Image::make($image)->save($location);
            $cat->image = $img;
        }

        $cat->save();

        $nofty = array(
            'message' => 'Category Created',
            'alert-type' => 'success'
        );

        return redirect()->route('category.manage')->with($nofty);


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
        $category = category::find($id);
        if (!is_null($category)) {
            return view('backend.pages.category.edit',compact('category'));
        }
        else{
            return view('backend.pages.category.edit');
        }
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
         $request->validate([
            'name' => 'required|max: 255',
        ],
        [
            'name.required' => 'Please Insert Category Name',
        ]);

        $cat = category::find($id);
        $cat->name         = $request->name;
        $cat->slug         = Str::slug($request->name);
        $cat->is_parent    = $request->is_parent;
        $cat->status       = $request->status;
        $cat->description  = $request->description;

        //image Preparation
        if ($request->image) {

            if ( file::exists('Backend/image/category/' . $cat->image) ) {
                file::delete('Backend/image/category/' . $cat->image);
            }

            $image      = $request->file('image');
            $img        = rand().'_'.'Category-Logo'.'.'.$image->getClientOriginalExtension();
            $location   = public_path('Backend/image/category/' .$img );
            Image::make($image)->save($location);
            $cat->image = $img;
        }

        $cat->save();

        $nofty = array(
            'message' => 'Category Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('category.manage')->with($nofty);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        if (!is_null($category)) {
            if ( file::exists('Backend/image/category/' . $category->image) ) {
                file::delete('Backend/image/category/' . $category->image);
            }
            $category->delete();

            $nofty = array(
                'message' => 'Category Deleted',
                'alert-type' => 'warning'
            );

            return redirect()->route('category.manage')->with($nofty);
        }
        else{
            return redirect()->route('category.manage');
        }
    }
}
