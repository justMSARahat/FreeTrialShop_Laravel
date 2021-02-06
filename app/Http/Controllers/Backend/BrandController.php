<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = brand::orderBy('name','asc')->get();
        return view('backend.pages.brand.manage', compact('brand') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max: 255',
            ],
            [
                'name.required' => 'Please Insert Brand Name',
            ]);

        $brand = new brand();
        $brand->name         = $request->name;
        $brand->slug         = Str::slug($request->name);
        $brand->description  = $request->description;
        $brand->is_featured  = $request->is_featured;
        $brand->status       = $request->status;

        if ($request->image) {
            $image        = $request->file('image');
            $img          = rand().'_'.'Brand-Logo'.'.'.$image->getClientOriginalExtension();
            $location     = public_path('Backend/image/brand/' .$img);
            Image::make($image)->save($location);
            $brand->image = $img;
        }

        $brand->save();

        $nofty = array(
            'message' => 'Brand Created',
            'alert-type' => 'success'
        );

        return redirect()->route('brand.manage')->with($nofty);

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
        $edit = brand::find($id);
        if (!is_null($edit)) {
            return view('backend.pages.brand.edit', compact('edit'));
        }else{
            return redirect()->route('brand.manage');
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
                'name'  => 'required|max: 255',
            ],
            [
                'name.required'  => 'Please Insert Brand Name',
            ]);

            $brand = brand::find($id);
            $brand->name         = $request->name;
            $brand->slug         = Str::slug($request->name);
            $brand->description  = $request->description;
            $brand->is_featured  = $request->is_featured;
            $brand->status       = $request->status;

            if ( !is_null($request->image) ) {

            if ( file::exists('Backend/image/brand/'.$brand->image) ) {
                file::delete('Backend/image/brand/'.$brand->image);
            }

            $image          = $request->file('image');
            $img            = rand().'_'.'Brand-Logo'.'.'.$image->getClientOriginalExtension();
            $location       = public_path('Backend/image/brand/' . $img);
            Image::make($image)->save($location);
            $brand->image   = $img;

        }

            $brand->save();

            $nofty = array(
                'message' => 'Brand Updated',
                'alert-type' => 'success'
            );

            return redirect()->route('brand.manage')->with($nofty);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = brand::find($id);
        if (!is_null($brand)) {
            if (!is_null($brand->image)) {
                if (file::exists('Backend/image/brand/' .$brand->image) ) {
                    file::delete('Backend/image/brand/' .$brand->image);
                }
            }
            $brand->delete();
            $nofty = array(
                'message' => 'Brand Deleted',
                'alert-type' => 'warning'
            );
            return redirect()->route('brand.manage')->with($nofty);
        }else{
            $nofty = array(
                'message' => 'Brand Deleted',
                'alert-type' => 'warning'
            );
            return redirect()->route('brand.manage')->with($nofty);
        }
    }
}
