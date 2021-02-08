@extends('backend.layout.template')
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-one">

                    <div class="widget-heading">
                        <h6 class="">Manage Shipping Address</h6>
                    </div>

                    <div class="">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-4 table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Priority</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach( $country as $country )
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $country->name }}</td>
                                        <td>
                                            @if( $country->priority == 0 )
                                                <span class="badge-warning">Hidden</span>
                                            @else
                                                <span class="badge-success">Public</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('country.edit', $country->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-trash"></i></a>
                                            
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are You Sure to Remove This Country?All District & Divisions Under this Country will be Deleted!!
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="{{ route('country.delete', $country->id) }}" class="btn btn-danger" >Delete</a>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                <a href="{{ route('country.create') }}" class="btn btn-primary">Add Shipping Country</a>
                </div>
            </div>
        </div>
    </div>

@endsection
