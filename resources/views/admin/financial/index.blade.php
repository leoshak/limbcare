@extends('admin.layouts.admin')
@section('content')
    <div class="row title-section">
        <div class="col-12 col-md-8">
        @section('title', "Financial Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="{{ route('admin.financial.add') }}" class="btn btn-primary">Add Bill</a>
                <a href="{{ route('admin.financial.add') }}" class="btn btn-primary">Add Salary Payment</a>
                <a href="{{ route('admin.financial.add') }}" class="btn btn-primary">Add Other Payment</a>
            </div>
            <div class="right-searchbar">
                <!-- Search form -->
                <form class="form-inline active-cyan-3">
                    <input class="form-control form-control-sm ml-3 w-100" type="text" placeholder="Search" aria-label="Search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
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
        </div>
        <div class="row">
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
    </div>
@endsection