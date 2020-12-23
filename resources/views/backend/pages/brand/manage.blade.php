@extends('backend.layout.template')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one">
                
                <div class="widget-heading">
                    <h6 class="">Manage All Brands</h6>
                </div>
                
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4 table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th>Name</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Featured</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @foreach ( $brand as $brand )
                                <tr>
                                	<td class="text-center">{{ $i++ }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="usr-img-frame mr-2 rounded-circle">
                                                @if( !is_null( $brand->image ) )
                                                    <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('Backend/image/brand') }}/{{ $brand->image }}">
                                                @else
                                                    <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('Backend/assets/img/boy.png') }}">
                                                @endif

                                            </div>
                                            <p class="align-self-center mb-0">{{ $brand->name }}</p>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if( $brand->status == 1 )
                                            <span class="badge badge-primary btn-rounded">Active</span>
                                        @elseif( $brand->status == 2 )
                                            <span class="badge badge-info btn-rounded">Inactive</span>
                                        @elseif( $brand->status == 3 )
                                            <span class="badge badge-warning btn-rounded">Pending</span>
                                        @else
                                            <span class="badge badge-danger btn-rounded">Disabled</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if( $brand->is_featured == 0 )
                                            <span class="badge badge-primary btn-rounded">Normal</span>
                                        @else
                                            <span class="badge badge-info btn-rounded">Featured</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                    	
                                        <a href="" class="btn btn-info"  data-toggle="modal" data-target="#extraview{{ $brand->name }}"><i class="fa fa-eye"></i></a>
                                    	
                                        <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    	
                                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deltebrand{{ $brand->id }}"><i class="fa fa-trash"  ></i></a>

                                        <!-- Modal for View -->
                                        <div class="modal fade" id="extraview{{ $brand->name }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">View {{ $brand->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <div class="form-group mb-4">
                                                            <label for="">Brand Name</label>
                                                            <input readonly="readonly" type="text" name="name" class="form-control" id="" placeholder="Brand Name" value="{{ $brand->name }}">
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="inputState">Image or Logo</label>
                                                             @if( !is_null( $brand->image ) )
                                                                <img alt="avatar" class="img-fluid im-1" src="{{ asset('Backend/image/brand') }}/{{ $brand->image }}" width="100px">
                                                            @else
                                                                Opps!!! No Image Found
                                                            @endif
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="inputAddress2">Description</label>
                                                            <textarea readonly="readonly" name="description" class="form-control" id="editor-container" cols="30" rows="5" >@if( !is_null($brand->description) ) {{ $brand->description }} @else No Description @endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal for Delete -->
                                        <div class="modal fade" id="deltebrand{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deletemodal">Delete <b>{{ $brand->name }}</b> Brand</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <b>Are You Sure to Delete {{ $brand->name }} Brand?</b>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i> <a href=""></a>Cancel</button>
                                                        <a href="{{ route('brand.delete', $brand->id) }}"><button class="btn btn-danger"><i class="flaticon-cancel-12"></i> Delete</button></a>
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

                <a href="{{ route('brand.create') }}" class="btn btn-primary">Create New Brand</a>
            </div>
        </div>
    </div>
</div>

@endsection