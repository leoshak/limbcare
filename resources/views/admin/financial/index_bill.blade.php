@extends('admin.layouts.admin')
@section('content')
    <div class="row title-section">
        <div class="col-12 col-md-8">
        @section('title', "Financial Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="{{ route('admin.financial.add_bill') }}" class="btn btn-primary">Add Bill</a>
                <a href="{{ route('admin.financial') }}" class="btn btn-danger">Back to Financial </a>
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
       
@endsection