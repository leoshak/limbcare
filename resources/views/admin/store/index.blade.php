@extends('admin.layouts.admin')
@section('content')
<div class="row title-section">
        <div class="col-12 col-md-8">
        @section('title', "Store Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="{{ route('admin.store.add') }}" class="btn btn-primary">Add Item</a>
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
                                <td>{{ $stores->iteam_max }}</td>
                                <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.store.show',[$stores->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="{{  route('admin.store.edit',[$stores->id]) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-xs btn-danger" href="{{ route('admin.store.delete',[$stores->id]) }}">
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