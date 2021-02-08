@extends('backend.layout.template')
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-one">
                    <!-- Page Content Header -->
                    <div class="widget-heading">
                        <h6 class="">Add New District</h6>
                    </div>
                    <!-- Page Main Content -->
                    <form action="{{ route('district.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="">District Name</label>
                            <input type="text" name="name" class="form-control" id="" placeholder="District Name">
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputAddress2">Division</label>
                            <select name="division_id" id="" class="form-control">
                                <option selected>Choose...</option>
                                @foreach( $division as $division )
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputAddress2">Priority</label>
                            <select name="priority" id="" class="form-control">
                                <option selected>Choose...</option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 btn-block">Add District</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
