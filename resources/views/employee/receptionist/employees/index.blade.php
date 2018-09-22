@extends('employee.receptionist.layouts.receptionist')
@section('content')
    <div class="row title-section">
        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
            @section('title', "Employee Management")
        </div>
        <div class=".col-xs-6 .col-lg-4 searchbar-addbt">
            <div class="topicbar">
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
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <div class="row">
            @foreach($employees as $employee)
                <div class="col-xs-6 col-sm-3">
                    <div class="card">
                        <div class="row">
                            <div class="card-header">
                                <div class="col-xs-6 col-md-4 col-lg-4 vcenter emp-avator">
                                    <img src="\image\emp\profile\{{ $employee->emp_pic }}" alt="Pic" height="90" width="90"class="img-circle">
                                </div>
                                
                                <div class="col-xs-6 col-md-8 col-lg-8 vcenter emp-details">
                                    <span class="card-title">{{ $employee->name }}</span><br />
                                    <span class="card-subtitle">{{ $employee->employeeType }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">
                                <a href="{{ route('receptionist.employees.show', [$employee->id]) }}" class="btn btn-link">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pull-right">
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style('assets/admin/css/my_style.css') }}
@endsection
