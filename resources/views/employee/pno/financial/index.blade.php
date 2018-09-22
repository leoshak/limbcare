@extends('employee.pno.layouts.pno')
@section('content')
    <div class="row title-section">
        <div class="col-12 col-md-8">
        @section('title', "Financial Management")
        </div>
        <div class="col-12 col-md-12">
        <div class="row tile_count">
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-users"></i> {{ __('views.admin.dashboard.count_0') }}</span>
                    <div class="count green"></div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-address-card"></i> {{ __('views.admin.dashboard.count_1') }}</span>
                    <div>
                        <span class="count green"></span>
                        <span class="count">/</span>
                        <span class="count red"></span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user-times "></i> {{ __('views.admin.dashboard.count_2') }}</span>
                    <div>
                        <span class="count green"></span>
                        <span class="count">/</span>
                        <span class="count red"></span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-lock"></i> {{ __('views.admin.dashboard.count_3') }}</span>
                    <div>
                        <span class="count green"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
            <div class="row">
                    <div class="col-xs-4" ><div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="\image\finacial\bill.png" alt="Card image cap" height="200" width="200">
                            <div class="card-body">
                                <a href="#" class="btn btn-primary" >Bill payment </a>
                            </div>
                          </div>
                        </div>
                    <div class="col-xs-4">.col-xs-6</div>
                    <div class="col-xs-4">.col-xs-6</div>
            </div>
    </div>
    {{-- <div class="row">
            <h4>Bills</h4>
            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                    width="100%">
                <thead> 
                <tr>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($bills as $bill)
                        <tr>
                            <td>{{ $bill->id }}</td>
                            <td>{{ $bill->patientname }}</td>
                            <td>{{ $bill->descrption }}</td>
                            <td>{{ $bill->amount }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.financial.showBill', [$bill->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.financial.edit', [$bill->id]) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-xs btn-danger" href="{{ route('admin.financial.deleteBill', $bill->id) }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
        </div>
        <div class="row">
            <h4>Salary Payments</h4>
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
                <thead> 
                    <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($financials as $financial)
                        <tr>
                            <td>{{ $financial->id }}</td>
                            <td>{{ $financial->emp_name }}</td>
                            <td>{{ $financial->date }}</td>
                            <td>{{ $financial->amount }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.financial.showSalary', [$financial->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.financial.edit_salary', [$financial->id]) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-xs btn-danger" href="{{ route('admin.financial.delete', $financial->id) }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
            </table>
                </tbody>
        </div> --}}
        {{-- <div class="row">
            <h4>Other payments</h4>
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
                <thead> 
                    <tr>
                        <th>ID</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($otherPayments as $otherPayment)
                        <tr>
                            <td>{{ $otherPayment->id }}</td>
                            <td>{{ $otherPayment->descrption }}</td>
                            <td>{{ $otherPayment->amount }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.financial.showOtherPay', [$otherPayment->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.financial.edit_otherpay', [$otherPayment->id]) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-xs btn-danger" href="{{ route('admin.financial.deleteOtherPay', $otherPayment->id) }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div class="pull-right">
        </div>
    </div> --}}
@endsection