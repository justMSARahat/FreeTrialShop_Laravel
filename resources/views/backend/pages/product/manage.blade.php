@extends('backend.layout.template')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one">

                <div class="widget-heading">
                    <h6 class="">Manage All Product</h6>
                </div>

                <div class="">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4 table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Brand</th>
                                    <th class="text-center">Reguler Price</th>
                                    <th class="text-center">Offer Price</th>
                                    <th class="text-center">Featured</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach( $products as $value )
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->category->name }}</td>
                                    <td>{{ $value->brand->name }}</td>
                                    <td>{{ $value->reguler_price }}</td>
                                    <td>{{ $value->offer_price }}</td>
                                    <td>
                                        @if( $value->is_featured==1 )
                                            <span class="badge badge-success">Normal</span>
                                        @else
                                            <span class="badge badge-primary">Featured</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if( $value->status==1 )
                                            <span class="badge badge-primary">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif</td>
                                    <td>{{ $value->quantity }}</td>
                                    <td>
                                        <a href="{{ route('product.edit',$value->id) }}" class="btn btn-primary"><i class="fa fa-edit " ></i></a>
                                        <a href="{{--{{ route('product.delete',$value->id) }}--}}" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash " ></i></a>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are You Sure to Delete This Product? You Cant Get It Back & All Order Data Related this Product will be Removed!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form action="{{ route('product.delete',$value->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary">Delete</button>
                                                        </form>
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

            </div>
        </div>
    </div>
</div>

@endsection
