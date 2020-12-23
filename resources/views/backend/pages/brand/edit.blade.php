@extends('backend.layout.template')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one">
                <!-- Page Content Header -->
                <div class="widget-heading">
                    <h6 class="">Edit Brand</h6>
                </div>
                <!-- Page Main Content -->
                <form action="{{ route('brand.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="">Brand Name</label>
                        <input type="text" name="name" class="form-control" id="" placeholder="Brand Name" value="{{$edit->name}}">
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Is_featured</label>
                            <select id="inputState" class="form-control" name="is_featured">
                                <option value="1" @if($edit->is_featured==1) selected @endif>Featured</option>
                                <option value="0" @if($edit->is_featured==0) selected @endif>Normal</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                                <option value="1" @if($edit->status==1) selected @endif>Active</option>
                                <option value="2" @if($edit->status==2) selected @endif>Inactive</option>
                                <option value="0" @if($edit->status==0) selected @endif>Pending</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Image or Logo</label>
                            @if( !is_null($edit->image) )
                                <b>Thumbnail Uploaded</b>
                            @else
                                <b>No Thumbnail</b>
                            @endif
                            <input type="file" class="form-control-file" name="image">

                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputAddress2">Description</label>
                        <textarea name="description" class="form-control" id="editor-container" cols="30" rows="5" @if(is_null($edit->description) ) placeholder="No description" @endif >{{ $edit->description }}</textarea>
                    </div>
                  <button type="submit" class="btn btn-primary mt-3 btn-block">Update Brand</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection