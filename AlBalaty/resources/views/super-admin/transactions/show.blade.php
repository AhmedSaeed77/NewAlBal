
@extends('layouts.super-admin-layout')
@section('pageTitle') Transactions @endsection
@section('subheaderTitle') Transactions @endsection
@section('header')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
@endsection
@section('content')


    <div class="row" style="background-color: white; padding: 0 0;">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                    <span class="card-icon">
                        <i class="icon-3x  text-primary flaticon-business"></i>
                    </span>
                        <h3 class="card-label">Transactions</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">
                        <thead>
                           
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Package</th>
                            <th>From Bank</th>
                            <th>To Bank</th>
                            <th>Account Number</th>
                            <th>Account Name</th>
                            <th>Translate Amount</th>
                            <th>Status</th>
                            <th>Used Coupon</th>
                            <th>Wanted Amount</th>
                            <th>Image</th>
                            <th>option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count(\App\TransactionPayment::all() ) )
                            @foreach(\App\TransactionPayment::orderBy('created_at', 'desc')->
                                paginate(25) as $pay)


                                <tr>
                                    <td>{{ $pay->id }}</td>
                                    <td>
                                        @if($pay->user_id)
                                            User: {{ \App\Models\Auth\User::find($pay->user_id)->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($pay->package_id)
                                            Package: {{ \App\Models\Package\Packages::find($pay->package_id)->name }}
                                        @endif
                                    </td>
                                    <td>{{ $pay->from_bank }}</td>
                                    <td>{{ $pay->tobanks()[$pay->to_bank] }}</td>
                                    <td>{{ $pay->account_number }}</td>
                                    <td>{{ $pay->account_name }}</td>
                                    <td>{{ $pay->translate_amount }} R.S</td>
                                    <td>{{ $pay->statuss()[$pay->status] }}</td>
                                    <td>{{ $pay->used_coupon }}</td>
                                    <td>{{ $pay->wanted_amount }} R.S</td>
                                    <td>
                                        <a href="https://taamedu.com.sa/banksimages/{{$pay->image}}" target="_blank">
                                            <img src="https://taamedu.com.sa/banksimages/{{$pay->image}}" width="100px">
                                        </a>
                                    </td>
                                    <td>
                                        @if ($pay->status == 'waiting')
                                            <a href="{{route('transactions.accept',$pay->id)}}"
                                                class="btn btn-success btn-sm"> Acceppt
                                            </a>
                                            <a href="{{route('transactions.refuse',$pay->id)}}"
                                                class="btn btn-danger btn-sm mt-2"> Refuse
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <p>noting to show !</p>

                        @endif
                        </tbody>
                    </table>

                    <center>
                        {{ \App\Coupon::orderBy('created_at', 'desc')->paginate(25)->links() }}
                    </center>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('jscode')
    <script src="{{asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.4')}}"></script>
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.4')}}"></script>
@endsection
