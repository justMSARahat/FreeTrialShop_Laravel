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
                                            <a href="{{ route('country.delete', $country->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
