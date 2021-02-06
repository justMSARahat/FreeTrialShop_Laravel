<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
Use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::orderBy('title','asc')->get();
        return view('backend.pages.product.manage', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.product.create');
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
            'title' => 'required',
        ],
        [
            'title.required' => 'Please Select a Title',
        ]);

        $product = new product();
        $product->title          =  $request->title;
        $product->slug           =  Str::slug($request->title);
        $product->short_desc     =  $request->short_desc;
        $product->main_desc      =  $request->main_desc;
        $product->tags           =  $request->tags;
        $product->brand_id       =  $request->brand_id;
        $product->cat_id         =  $request->cat_id;
        $product->is_featured    =  $request->is_featured;
        $product->product_type   =  $request->product_type;
        $product->status         =  $request->status;
        $product->quantity       =  $request->quantity;
        $product->sku            =  $request->sku;
        $product->reguler_price  =  $request->reguler_price;
        $product->offer_price    =  $request->offer_price;

        if ($request->primary_image) {
           $image  = $request->file('primary_image');
           $img    = rand().'-Product_Primary_Image'.'.'. $image->getClientOriginalExtension();
           $path   = public_path('Backend/image/product/' .$img );
           Image::make($image)->save($path);
           $product->primary_image = $img;
        }
        if ($request->second_image) {
           $image  = $request->file('second_image');
           $img    = rand().'-Product_2nd_Image'.'.'. $image->getClientOriginalExtension();
           $path   = public_path('Backend/image/product/' .$img );
           Image::make($image)->save($path);
           $product->second_image = $img;
        }
        if ($request->third_image) {
           $image  = $request->file('third_image');
           $img    = rand().'-Product_3rd_Image'.'.'. $image->getClientOriginalExtension();
           $path   = public_path('Backend/image/product/' .$img );
           Image::make($image)->save($path);
           $product->third_image = $img;
        }

        $product->save();

        $nofty = array(
            'message' => 'Product Created',
            'alert-type' => 'success'
        );

        return redirect()->route('product.manage')->with($nofty);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);
        if ( !is_null($product) ){
            return view('backend.pages.product.edit',compact('product'));
        }
        else{
            return redirect()->route('product.manage');
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
        $product = product::find($id);
        $product->title          =  $request->title;
        $product->slug           =  Str::slug($request->title);
        $product->short_desc     =  $request->short_desc;
        $product->main_desc      =  $request->main_desc;
        $product->tags           =  $request->tags;
        $product->brand_id       =  $request->brand_id;
        $product->cat_id         =  $request->cat_id;
        $product->is_featured    =  $request->is_featured;
        $product->product_type   =  $request->product_type;
        $product->status         =  $request->status;
        $product->quantity       =  $request->quantity;
        $product->sku            =  $request->sku;
        $product->reguler_price  =  $request->reguler_price;
        $product->offer_price    =  $request->offer_price;

        if ($request->primary_image) {

            if ( file::exists( 'Backend/image/product/' .$product->primary_image ) ){
                file::delete( 'Backend/image/product/' .$product->primary_image );
            }

            $image  = $request->file('primary_image');
            $img    = rand().'-Product_Primary_Image'.'.'. $image->getClientOriginalExtension();
            $path   = public_path('Backend/image/product/' .$img );
            Image::make($image)->save($path);
            $product->primary_image = $img;
        }
        if ($request->second_image) {


            if ( file::exists( 'Backend/image/product/' .$product->second_image ) ){
                file::delete( 'Backend/image/product/' .$product->second_image );
            }

            $image  = $request->file('second_image');
            $img    = rand().'-Product_2nd_Image'.'.'. $image->getClientOriginalExtension();
            $path   = public_path('Backend/image/product/' .$img );
            Image::make($image)->save($path);
            $product->second_image = $img;
        }
        if ($request->third_image) {

            if ( file::exists( 'Backend/image/product/' .$product->third_image ) ){
                file::delete( 'Backend/image/product/' .$product->third_image );
            }

            $image  = $request->file('third_image');
            $img    = rand().'-Product_3rd_Image'.'.'. $image->getClientOriginalExtension();
            $path   = public_path('Backend/image/product/' .$img );
            Image::make($image)->save($path);
            $product->third_image = $img;
        }

        $product->save();

        $nofty = array(
            'message' => 'Product Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('product.manage')->with($nofty);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        if (!is_null($product)){

            if ( file::exists('Backend/image/product/' . $product->primary_image ) ){
                file::delete('Backend/image/product/' . $product->primary_image );
            }
            if ( file::exists('Backend/image/product/' . $product->second_image ) ){
                file::delete('Backend/image/product/' . $product->second_image );
            }
            if ( file::exists('Backend/image/product/' . $product->third_image ) ){
                file::delete('Backend/image/product/' . $product->third_image );
            }

            $product->delete();

            $nofty = array(
                'message' =>'Product Deleted',
                'alert-type' => 'warning'
            );

            return back()->with($nofty);
        }
        else{
            return back();
        }
    }
}
