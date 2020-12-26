@extends('backend.layout.template')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one">
                <!-- Page Content Header -->
                <div class="widget-heading">
                    <h6 class="">Create New Category</h6>
                </div>
                <!-- Page Main Content -->
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group mb-4">
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control" id="" placeholder="Category Name" value="{{ $category->name }}">
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Parent Category</label>
                            <select id="inputState" class="form-control" name="is_parent">
                                <option selected>Choose...</option>
                                <option value="0" >Parent</option>
                                @foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',0)->get() as $perentcat )
                                    <option value="{{ $perentcat->id }}" >{{ $perentcat->name }}</option>

                                    <!-- 1st Child -->
                                    @foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',$perentcat->id)->get() as $childcat )
                                        <option value="{{ $childcat->id }}" >-{{ $childcat->name }}</option>
                                    
                                        <!-- 2nd Child -->
                                        @foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',$childcat->id)->get() as $child2cat )
                                            <option value="{{ $child2cat->id }}" >--{{ $child2cat->name }}</option>
                                        @endforeach

                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                                <option selected>Choose...</option>
                                <option value="1" >Active</option>
                                <option value="2" >Inactive</option>
                                <option value="0" >Pending</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Image or Logo</label>
                            @if( !is_null( $category->image ) )
                                <b>Image Found : {{ $category->image }}</b>
                            @else
                                <b>No Image Found!</b>
                            @endif
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputAddress2">Description</label>
                        <textarea name="description" class="form-control" id="editor-container" cols="30" rows="5" placeholder="Short Description">{{ $category->description }}</textarea>
                    </div>
                  <button type="submit" class="btn btn-primary mt-3 btn-block">Create Category</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection