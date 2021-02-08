@extends('backend.layout.template')
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-one">
                    <!-- Page Content Header -->
                    <div class="widget-heading">
                        <h6 class="">Edit Country</h6>
                    </div>
                    <!-- Page Main Content -->
                    <form action="{{ route('country.update',$country->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="">Country Name</label>
                            <input type="text" name="name" class="form-control" id="" placeholder="Country Name" value="{{ $country->name }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputAddress2">Priority</label>
                            <select name="priority" id="" class="form-control">
                                <option value="1" @if( $country->priority == 1 ) selected @endif>Show</option>
                                <option value="0" @if( $country->priority == 0 ) selected @endif>Hide</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 btn-block">Update Country</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
