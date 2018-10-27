@extends('admin.layouts.admin')
@section('content')
    <div class="row title-section">
        <div class="col-12 col-md-8">
            @section('title', "Financial Salary Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="{{ route('admin.financial.index_salary') }}" class="btn btn-primary"> Salary home</a>
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
        <h4>Salary Payments</h4>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>NIC</th>
                <th>contactNo</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($emp as $emps)
                <tr>
                    <td>{{ $emps->id }}</td>
                    <td>{{ $emps->name}}</td>
                    <td>{{ $emps->nic }}</td>
                    <td>{{ $emps->contactNo }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.financial.add_salary',[$emps->id]) }}">
                            <i class="fa fa-plus"></i>
                        </a>
                        {{-- <a class="btn btn-xs btn-info" href="{{ route('admin.financial.edit_salary', [$financial->id]) }}">
                            <i class="fa fa-pencil"></i>
                        </a> --}}
                    </td>
                </tr>
            @endforeach
        </table>
        </tbody>
    </div>
    </div>
    </div>


@endsection