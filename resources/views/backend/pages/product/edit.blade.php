@extends('backend.layout.template')
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-one">
                    <!-- Page Content Header -->
                    <div class="widget-heading">
                        <h6 class="">Edit Product</h6>
                    </div>
                    <!-- Page Main Content -->
                    <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Product Title -->
                        <div class="form-group mb-4">
                            <label for="">Product Title:</label>
                            <input type="text" name="title" class="form-control" id="" placeholder="Product Title" value="{{ $product->title }}">
                        </div>
                        <!-- Product Short-Descroption -->
                        <div class="form-group mb-4">
                            <label for="">Product Short Description:</label>
                            <textarea name="short_desc" cols="30" rows="3" class="form-control" id="" placeholder="Short Description">{{ $product->short_desc }}</textarea>
                        </div>
                        <!-- Product Description -->
                        <div class="form-group mb-4">
                            <label for="">Product Description:</label>
                            <textarea name="main_desc" cols="30" rows="5" class="form-control" id="" placeholder="Short Description">{{ $product->main_desc }}</textarea>
                        </div>
                        <!-- Brand & Category Section -->
                        <div class="form-row mb-4">

                            <div class="form-group col-md-6">
                                <label for="inputState">Brand</label>
                                <select id="inputState" class="form-control" name="brand_id">
                                    <!-- Brand -->
                                    @foreach( App\Models\Backend\brand::orderBy('name','asc')->where('status',1)->get() as $Brands )
                                        <option value="{{ $Brands->id }}" @if( $product->brand_id== $Brands->id ) selected @endif >{{ $Brands->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputState">Category</label>
                                <select id="inputState" class="form-control" name="cat_id">
                                    <option selected>Choose...</option>
                                    <!-- Category -->
                                    @foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',0)->get() as $category )
                                        <option value="{{ $category->id }}" @if( $product->cat_id ==$category->id  ) selected @endif>{{ $category->name }}</option>

                                        <!-- Category -->
                                        @foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',$category->id)->get() as $childcategory )
                                            <option value="{{ $childcategory->id }}" @if( $product->cat_id ==$childcategory->id  ) selected @endif>-{{ $childcategory->name }}</option>

                                            <!-- Category -->
                                            @foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',$childcategory->id)->get() as $grandchildcategory )
                                                <option value="{{ $grandchildcategory->id }}" @if( $product->cat_id ==$grandchildcategory->id  ) selected @endif>--{{ $grandchildcategory->name }}</option>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="inputState">Product Type</label>
                                <select id="inputState" class="form-control" name="product_type">
                                    <option value="0" @if( $product->product_type==0 )) selected @endif>New</option>
                                    <option value="1" @if( $product->product_type==1 ) selected @endif>Pre-Owned</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Featured</label>
                                <select id="inputState" class="form-control" name="is_featured">
                                    <option value="1" @if( $product->is_featured==1 ) selected @endif>Normal</option>
                                    <option value="2" @if( $product->is_featured==2 ) selected @endif>Featured</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="inputState">Status</label>
                                <select id="inputState" class="form-control" name="status">
                                    <option value="1" @if( $product->status==1 ) selected @endif>Active</option>
                                    <option value="2" @if( $product->status==2 ) selected @endif>Inactive</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Quantity</label>
                                <input type="number" name="quantity" class="form-control" id="" placeholder="Product Quantity" value="{{ $product->quantity }}">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="inputState">SKU Code</label>
                                <input type="text" name="sku" class="form-control" id="" placeholder="Product SKU" value="{{$product->sku}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Search Tags</label>
                                <input type="text" name="tags" class="form-control" id="" placeholder="Product Tags" value="{{$product->tags}}">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="inputState">Price</label>
                                <input type="text" name="reguler_price" class="form-control" id="" placeholder="Product Price" value="{{$product->reguler_price}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Offer Price</label>
                                <input type="text" name="offer_price" class="form-control" id="" placeholder="Product Offer Price" value="{{$product->offer_price}}">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-4">
                                <label for="inputState">Primary Image</label>
                                <input type="file" class="form-control-file" name="primary_image">
                                @if( !is_null( $product->primary_image ) )
                                    <b>Primary Image Found! Named {{ $product->primary_image }}</b>
                                @else
                                    <b>Primary Image Not Found!</b>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Secondary Image</label>
                                <input type="file" class="form-control-file" name="second_image">
                                @if( !is_null( $product->second_image ) )
                                    <b>Secondary Image Found! Named {{ $product->second_image }}</b>
                                @else
                                    <b>Secondary Image Not Found!</b>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Additional Image</label>
                                <input type="file" class="form-control-file" name="third_image">
                                @if( !is_null( $product->third_image ) )
                                    <b>Image Found! Named {{ $product->third_image }}</b>
                                @else
                                    <b>Image Not Found!</b>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 btn-block">Update Product</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
