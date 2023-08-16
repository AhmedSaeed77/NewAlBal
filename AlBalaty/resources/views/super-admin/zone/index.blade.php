
@extends('layouts.super-admin-layout')
@section('pageTitle') Zones @endsection
@section('subheaderNav')
    <!--begin::Button-->
    <a href="#" onclick="AVUtil().redirectionConfirmation('{{route('zone.create')}}')" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-success svg-icon-lg">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>create</a>
    <!--end::Button-->
@endsection
@section('subheaderTitle') Zones @endsection

@section('content')

    <div class="row" style="background-color: white; padding: 0 0;">
        <div class="col-md-12">
            <div class="card card-custom">

                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(count($zones))
                            @foreach($zones as $zone)
                                <tr>
                                    <td>{{ $zone->id }}</td>
                                    <td>{{ $zone->name }}</td>
                                    <td>{{ $zone->created_at }}</td>
                                    <td>
                                        <a href="{{route('zone.edit', $zone->id)}}">Edit</a>
                                    </td>
                                    <td>
                                        <a href="javascript:;" onclick="AVUtil().deleteConfirmation('{{route('zone.destroy', $zone->id)}}', deleteZone)">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <p>noting to show !</p>

                        @endif
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

@endsection


@section('jscode')
    <script src="{{asset('assets-admin/js/pages/crud/datatables/extensions/buttons.js?v=7.0.4')}}"></script>
    <script src="{{asset('assets-admin/plugins/custom/datatables/datatables.bundle.js?v=7.0.4')}}"></script>
    <script>
        function deleteZone(url){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });

            $.ajax ({
                type: 'POST',
                data: {'_method' : 'DELETE'},
                url: url,
                success: function(res){
                    location.reload();
                },
                error: function(res){
                    console.log('Error:', res);
                }
            });

        }
    </script>

@endsection
