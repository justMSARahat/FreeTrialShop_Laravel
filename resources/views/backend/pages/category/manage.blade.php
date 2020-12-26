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
                                @php $i=1; @endphp
                                @foreach( $category as $category )
                                    <tr>
                                    	<td>{{ $i++ }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                    @if( !is_null($category->image) )
                                                        <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('Backend/image/category') }}/{{ $category->image }}">
                                                    @else
                                                        <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('Backend/assets/img/boy.png') }}">
                                                    @endif
                                                </div>
                                                <p class="align-self-center mb-0">{{$category->name}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            @if( $category->status==0 )
                                                Pending
                                            @elseif( $category->status==1 )
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                        <td>
                                            @if( $category->is_parent==0 )
                                                Parent
                                            @else
                                                {{$category->parent->name}}
                                            @endif</td>
                                        <td class="text-center">
                                        	<a href="" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                        	<a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        	<a href="{{ route('category.delete', $category->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    @foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent', $category->id )->get() as $child )
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                        @if( !is_null($child->image) )
                                                            <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('Backend/image/category') }}/{{ $child->image }}">
                                                        @else
                                                            <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('Backend/assets/img/boy.png') }}">
                                                        @endif
                                                    </div>
                                                    <p class="align-self-center mb-0">{{$child->name}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                @if( $child->status==0 )
                                                    Pending
                                                @elseif( $child->status==1 )
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                            <td>
                                                @if( $child->is_parent==0 )
                                                    Parent
                                                @else
                                                    {{ $child->parent->name }}
                                                @endif</td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('category.edit', $child->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('category.delete', $child->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    
                                        @foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent', $child->id )->get() as $child2 )
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="usr-img-frame mr-2 rounded-circle">
                                                            @if( !is_null($child2->image) )
                                                                <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('Backend/image/category') }}/{{ $child2->image }}">
                                                            @else
                                                                <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('Backend/assets/img/boy.png') }}">
                                                            @endif
                                                        </div>
                                                        <p class="align-self-center mb-0">{{$child2->name}}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if( $child2->status==0 )
                                                        Pending
                                                    @elseif( $child2->status==1 )
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </td>
                                                <td>
                                                    @if( $child2->is_parent==0 )
                                                        Parent
                                                    @else
                                                        {{ $child2->parent->name }}
                                                    @endif</td>
                                                <td class="text-center">
                                                    <a href="" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                    <a href="{{ route('category.edit', $child2->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('category.delete', $child2->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
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