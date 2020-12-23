@extends('backend.layout.template')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one">
                
                <div class="widget-heading">
                    <h6 class="">Manage All Category</h6>
                </div>
                
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4 table-hover">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Parent</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                	<td>#1</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="usr-img-frame mr-2 rounded-circle">
                                                <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('Backend/assets/img/boy.png') }}">
                                            </div>
                                            <p class="align-self-center mb-0">Shaun</p>
                                        </div>
                                    </td>
                                    <td>Active</td>
                                    <td>Parent</td>
                                    <td class="text-center">
                                    	<a href="" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                    	<a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    	<a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection