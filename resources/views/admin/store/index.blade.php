@extends('admin.layouts.admin')
@section('content')
<div class="row title-section">
        <div class="col-12 col-md-8">
        @section('title', "Store Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="{{ route('admin.store.add') }}" class="btn btn-primary">Add Item</a>
                <a href="{{ route('admin.store.report') }}" class="btn btn-primary">Report</a>
            </div>
            <div class="right-searchbar">
                <!-- Search form --> 
                <form action="searchstore" method="post" class="form-inline active-cyan-3">
                    {{ csrf_field() }}
                    <input type="text" placeholder="Search store" name="search" class="form-control form-control-sm ml-3 w-100" required>
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
                
            </div>
        </div>
    </div>
    <div class="row">
            @if ($store->isEmpty())
            <div class="alert alert-danger" role="alert">
                <p>Not have Data in service table</p>
            </div>
        @else
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                    <thead> 
                    <tr>
                        <th>ID</th>
                        <th>Item name</th>
                        <th>company</th>
                        <th>Item max</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($store as $stores)
                            <tr> 
                                <td>{{ $stores->id }}</td>
                                <td>{{ $stores->iteamname }}</td>
                                <td>{{ $stores->company }}</td>
                                <td>{{ $stores->iteam_max }}{{($stores->quantity_type) }}</td>
                                <td>
                                <a class="btn btn-xs btn-primary" href="{{route('admin.store.show',[$stores->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="{{route('admin.store.edit',[$stores->id]) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-xs btn-warning" href="{{route('admin.store.plus',[$stores->id])}}">
                                    <i class="fa fa-plus-square"></i>
                                </a>
                                <a class="btn btn-xs btn-dark" href="{{route('admin.store.minus',[$stores->id])}}">
                                    <i class="fa fa-minus-square"></i>
                                </a>
                                <a class="btn btn-xs btn-danger" href="{{route('admin.store.delete',[$stores->id])}}">
                                    <i class="fa fa-trash"></i>
                                </a>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
        <div class="pull-right">
        </div>
    </div>
@endsection