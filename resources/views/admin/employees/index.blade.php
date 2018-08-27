@extends('admin.layouts.admin')
@section('content')
    <div class="row title-section">
        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
            @section('title', "Employee Management")
        </div>
        <div class=".col-xs-6 .col-lg-4 searchbar-addbt">
            <div class="topicbar">
                {{-- <a href="{{ route('admin.employees.add') }}" class="btn btn-primary">Add Employee</a> --}}
                {{ link_to_route('admin.employees.add', 'Add Employee', null, ['class' => 'btn btn-primary']) }}
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
        {{-- @foreach($users as $user) --}}
        <div class="row">
            @foreach($employees as $employee)
                <div class="col-xs-6 col-sm-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-xs-6 col-md-4 col-lg-4 vcenter emp-avator">
                                    <img src="https://png.icons8.com/ios/1600/user-male-circle-filled.png" alt="Pic" height="90" width="90">
                                </div>
                                {{-- <span class="card-img">{{ HTML::image('img/nickfrost.jpg', 'Pic') }}</span> --}}
                                <div class="col-xs-6 col-md-8 col-lg-8 vcenter emp-details">
                                    <span class="card-title">{{ $employee->name }}</span><br />
                                    <span class="card-subtitle">{{ $employee->employeeType }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            {!! Form::open(array('route' => ['admin.employees.delete', $employee->id], 'method' => 'DELETE')) !!}
                                <a href="{{ route('admin.employees.show', [$employee->id]) }}" class="btn btn-link">View</a>
                                <a href="{{ route('admin.employees.edit', [$employee->id]) }}" class="btn btn-success">Update</a>
                                {{-- <a href="{{ route('admin.employees.delete') }}" class="btn btn-danger">Delete</a> --}}
                                {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                {{-- @if(Session::has('message'))
                    <div id="myModal" class="modal fade in" style="display: block; margin-top: 160px; margin-left: 100px;">
                        <div class="modal-dialog modal-confirm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="icon-box">
                                        <i class="fa fa-trash"></i>
                                    </div>				
                                    <h4 class="modal-title">{{ $employee->name }}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <p>{{ Session::get('message') }}</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('admin.employees') }}" class="btn btn-danger">Ok</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif --}}
            @endforeach
        </div>
        {{-- @yield('alert-delete') --}}
        {{-- @endforeach --}}
        <div class="pull-right">
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style('assets/admin/css/my_style.css') }}
@endsection




{{-- <div class="col-xs-6 col-sm-3">
        <div class="card">
            <div class="card-header">
                <img src="https://png.icons8.com/ios/1600/user-male-circle-filled.png" alt="Pic" height="100" width="100">
                
                {{-- <span class="card-img">{{ HTML::image('img/nickfrost.jpg', 'Pic') }}</span> --}}
                {{-- <span class="card-title">Hewage Achini</span>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.employees.edit') }}" class="btn btn-success">Update</a>
                <a href="{{ route('admin.employees.delete') }}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-3">
        <div class="card">
            <div class="card-header">
                    <img src="https://png.icons8.com/ios/1600/user-male-circle-filled.png" alt="Pic" height="100" width="100">
                {{-- <span class="card-img">{{ HTML::image('img/nickfrost.jpg', 'Pic') }}</span> --}}
                {{-- <span class="card-title">Nalaka D. Jaya</span> --}}
            {{-- </div>
            <div class="card-body">
                <a href="{{ route('admin.employees.edit') }}" class="btn btn-success">Update</a>
                <a href="{{ route('admin.employees.delete') }}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div> --}}