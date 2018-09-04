@extends('admin.layouts.admin')
@section('content')
    <div class="row title-section">
        <div class="col-12 col-md-8">
        @section('title', "Financial Management")
        </div>
        <div class="col-12 col-md-12">
        <div class="row tile_count">
                <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><font size="+2"><i class="fa fa-money"> </i> Total Profit</font></span>
                    <div>
                        <span class="count green">RS.</span>
                        <span class="count">{{$profit}}</span>
                        <span class="count red">.00</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><font size="+2"><i class="fa fa-dollar"></i> Total income</font></span>
                    <div>
                        <span class="count green">RS.</span>
                        <span class="count">{{$incomes}}</span>
                        <span class="count red">.00</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><font size="+2"><i class="fa fa-dollar "></i> Total expenses</font></span>
                    <div>
                        <span class="count green">RS.</span>
                        <span class="count">{{$outcomes}}</span>
                        <span class="count red">.00</span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-12">
            <div class="row">
                        <div class="col-xs-4" style="padding-top: 90px;">
                            <center> <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="\image\finacial\bill.png" alt="Card image cap" height="200" width="200">
                            <center>  <a href="{{ route('admin.financial.index_bill')}}" class="btn btn-primary" >Bill payment </a></center>
                          </div>
                        </div>
                        <div class="col-xs-4" style="padding-top: 90px;">
                            <center> <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="\image\finacial\payement.png" alt="Card image cap" height="200" width="200">
                            <center>  <a href="{{ route('admin.financial.index_salary')}}" class="btn btn-primary" >Salary payment </a></center>
                            </div></center>
                        </div>
                        <div class="col-xs-4" style="padding-top: 90px;">
                            <center> <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="\image\finacial\otherpayment.png" alt="Card image cap" height="200" width="200">
                            <center>  <a href="{{ route('admin.financial.index_other')}}" class="btn btn-primary" >Other payment </a></center>
                            </div></center>
                        </div>
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