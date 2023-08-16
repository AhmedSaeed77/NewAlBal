@extends('layouts.admin-layout')
@section('pageTitle') All Packages @endsection
@section('subheaderTitle')
    <!--begin::Page Title-->
    <h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">
            <span class="card-icon svg-icon svg-icon-lg svg-icon-primary">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                <i class="text-primary flaticon2-box"></i>
                <!--end::Svg Icon-->
            </span>
        <h3 class="card-label pr-2 m-0">Packages</h3>
    </h2>
    <!--end::Page Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
        <li class="breadcrumb-item">
            <a href="{{route('admin.dashboard')}}" class="text-muted">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" class="text-muted">All Packages</a>
        </li>
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('subheaderNav')
    <a href="{{route('packages.create')}}" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <rect x="0" y="0" width="24" height="24"/>
            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
            <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
        </g>
    </svg><!--end::Svg Icon-->
    </span>Create New Package</a>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                    <span class="card-icon">
                        <i class="icon-2x  text-primary flaticon2-box"></i>
                    </span>
                        <h3 class="card-label">Packages</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">

                        <thead>
                        <tr>
                            <th>Package</th>
                            <th>Price</th>
                            <th>Original price</th>
                            <th>Discount</th>
                            <th>Edit</th>
                            <th>State</th>
                            <th>Approved</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @if(count($packages) > 0)
                            @foreach($packages as $package)
                                <tr>
                                    <td>{{$package->name}}</td>
                                    @if($package->approved)
                                        <td>{{$package->price}} $</td>
                                        <td>{{$package->original_price}} $</td>
                                        <td>{{$package->discount}} %</td>
                                    @else
                                        <td>--</td>
                                        <td>--</td>
                                        <td>--</td>
                                    @endif
                                    <td>
{{--                                        <a href="{{route('packages.edit', $package->id) }}">Edit</a>--}}
                                        --
                                    </td>
                                    <td>
                                        @if($package->active == 1)
                                            Enabled
                                        @else
                                            Disabled
                                        @endif
                                    </td>
                                    <td>
                                        {{$package->approved ? 'Approved': 'Not Approved Yet'}}
                                    </td>
                                    <td style="font-size: 22px; display:flex; ">
                                        @if($package->approved)
                                            <a data-toggle="modal" data-target="#DeleteModal-{{$package->id}}" style="cursor:pointer;">
                                                @if($package->active == 1)
                                                    <i class="fa fa-trash" style="color: #5bc0de;"></i>
                                                @else
                                                    <i class="fa fa-eye" style="color: #ccc;"></i>
                                                @endif
                                            </a>

                                            <div class="modal fade" id="DeleteModal-{{$package->id}}" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="text-align: left;">
                                                            <h4 class="modal-title">Warning</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if($package->active == 0)
                                                                <p>
                                                                    This package is already Disabled. Do you like to Enable it Again ?
                                                                </p>
                                                            @else
                                                                <p>
                                                                    Deleting the package means that no one have the chooise to buy this package
                                                                    but it still available for the current users who already bought it.
                                                                    Are You sure ?
                                                                </p>
                                                            @endif

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['action'=>['Admin\PackageController@destroy', $package->id], 'method'=>'POST']) !!}
                                                            {{Form::hidden('_method', 'DELETE')}}
                                                            @if($package->active == 0)
                                                                {{Form::submit('Enable', ['class'=>'btn btn-primary'])}}
                                                            @else
                                                                {{Form::submit('Disable', ['class'=>'btn btn-danger'])}}
                                                            @endif
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <p>No Content !</p>
                        @endif


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('jscode')
    <script src="{{asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.4')}}"></script>
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.4')}}"></script>
@endsection
