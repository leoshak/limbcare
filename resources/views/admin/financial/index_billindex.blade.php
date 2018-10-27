@extends('admin.layouts.admin')
@section('content')
    <div class="row title-section">
        <div class="col-12 col-md-8">
        @section('title', "Financial Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="{{ route('admin.financial.index_bill') }}" class="btn btn-success"> Bill</a>
                <a href="{{ route('admin.financial.add_invoice') }}" class="btn btn-primary">Add Invoice</a>
                <a href="{{ route('admin.financial') }}" class="btn btn-danger">Back to Financial </a>
            </div>
            <div class="right-searchbar">
                <!-- Search form -->
                <form action="searchbillin" method="post" class="form-inline active-cyan-3">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Search diagnosis" name="search" class="form-control form-control-sm ml-3 w-100" required>
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
            </div>
        </div>
    </div>
    <div class="row">
            <h4>Invoice</h4>
            
            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                    width="100%">
                <thead> 
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Remaining Amount</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($Invoices as $Invoice)
                        <tr>
                            <td>{{ $Invoice->id }}</td>
                            <td>{{ $Invoice->amount }}</td>
                            <td>{{ $Invoice->remaining_amount }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.financial.addbillinvoice', [$Invoice->id]) }}">
                                    <i class="fa fa-plus"></i>
                                </a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
        </div>
       
@endsection