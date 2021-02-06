@extends('backend.layout.template')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one">
                <!-- Page Content Header -->
                <div class="widget-heading">
                    <h6 class="">Add New Products</h6>
                </div>
                <!-- Page Main Content -->
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <!-- Product Title -->
                    <div class="form-group mb-4">
                        <label for="">Product Title:</label>
                        <input type="text" name="title" class="form-control" id="" placeholder="Product Title">
                    </div>
                    <!-- Product Short-Descroption -->
                    <div class="form-group mb-4">
                        <label for="">Product Short Description:</label>
                        <textarea name="short_desc" cols="30" rows="3" class="form-control" id="" placeholder="Short Description"></textarea>
                    </div>
                    <!-- Product Description -->
                    <div class="form-group mb-4">
                        <label for="">Product Description:</label>
                        <textarea name="main_desc" cols="30" rows="5" class="form-control" id="" placeholder="Short Description"></textarea>
                    </div>
                    <!-- Brand & Category Section -->
                    <div class="form-row mb-4">
                        
                        <div class="form-group col-md-6">
                            <label for="inputState">Brand</label>
                            <select id="inputState" class="form-control" name="brand_id">
                                <option selected>Choose...</option>
                                <!-- Brand -->
                                @foreach( App\Models\Backend\brand::orderBy('name','asc')->where('status',1)->get() as $Brands )
                                    <option value="{{ $Brands->id }}" >{{ $Brands->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputState">Category</label>
                            <select id="inputState" class="form-control" name="cat_id">
                                <option selected>Choose...</option>
                                <!-- Category -->
                                @foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',0)->get() as $category )
                                    <option value="{{ $category->id }}" >{{ $category->name }}</option>

                                    <!-- Category -->
                                    @foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',$category->id)->get() as $childcategory )
                                        <option value="{{ $childcategory->id }}" >-{{ $childcategory->name }}</option>

                                        <!-- Category -->
                                        @foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',$childcategory->id)->get() as $grandchildcategory )
                                            <option value="{{ $grandchildcategory->id }}" >--{{ $grandchildcategory->name }}</option>
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
                                <option selected>Choose...</option>
                                <option value="0" >New</option>
                                <option value="1" >Pre-Owned</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Featured</label>
                            <select id="inputState" class="form-control" name="is_featured">
                                <option selected>Choose...</option>
                                <option value="1" >Normal</option>
                                <option value="2" >Featured</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                                <option selected>Choose...</option>
                                <option value="1" >Active</option>
                                <option value="2" >Inactive</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="" placeholder="Product Quantity">
                        </div>
                    </div>

                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="inputState">SKU Code</label>
                            <input type="text" name="sku" class="form-control" id="" placeholder="Product SKU">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Search Tags</label>
                            <input type="text" name="tags" class="form-control" id="" placeholder="Product Tags">
                        </div>
                    </div>

                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="inputState">Price</label>
                            <input type="text" name="reguler_price" class="form-control" id="" placeholder="Product Price">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Offer Price</label>
                            <input type="text" name="offer_price" class="form-control" id="" placeholder="Product Offer Price">
                        </div>
                    </div>

                    <div class="form-row mb-4">
                        <div class="form-group col-md-4">
                            <label for="inputState">Primary Image</label>
                            <input type="file" class="form-control-file" name="primary_image">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Secondary Image</label>
                            <input type="file" class="form-control-file" name="second_image">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Additional Image</label>
                            <input type="file" class="form-control-file" name="third_image">
                        </div>
                    </div>

                  <button type="submit" class="btn btn-primary mt-3 btn-block">Add Product</button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection