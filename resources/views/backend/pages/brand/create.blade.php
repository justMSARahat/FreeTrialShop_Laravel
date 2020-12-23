@extends('backend.layout.template')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one">
                <!-- Page Content Header -->
                <div class="widget-heading">
                    <h6 class="">Create New Brand</h6>
                </div>
                <!-- Page Main Content -->
                <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="">Brand Name</label>
                        <input type="text" name="name" class="form-control" id="" placeholder="Brand Name">
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Is_featured</label>
                            <select id="inputState" class="form-control" name="is_featured">
                                <option selected>Choose...</option>
                                <option value="1">Featured</option>
                                <option value="0">Normal</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                                <option selected>Choose...</option>
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                                <option value="0">Pending</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Image or Logo</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputAddress2">Description</label>
                        <textarea name="description" class="form-control" id="editor-container" cols="30" rows="5" placeholder="Short Description"></textarea>
                    </div>
                  <button type="submit" class="btn btn-primary mt-3 btn-block">Create Brand</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection