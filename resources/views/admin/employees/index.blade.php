@extends('admin.layouts.admin')
@section('content')
    <div class="row title-section">
        <div class="col-12 col-md-8">
            @section('title', "Employee Management")
        </div>
        <div class="col-6 col-md-4">
            <div class="topicbar">
                <a href="{{ route('admin.employees.add') }}" class="btn btn-primary">Add Employee</a>
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
        {{-- @foreach($users as $user) --}}
        <div class="row">
            <div class="col-xs-6 col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <img src="https://png.icons8.com/ios/1600/user-male-circle-filled.png" alt="Pic" height="100" width="100">
                        
                        {{-- <span class="card-img">{{ HTML::image('img/nickfrost.jpg', 'Pic') }}</span> --}}
                        <span class="card-title">Hewage Kasuni</span>
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
                        <span class="card-title">Nalaka D. Jaya</span>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.employees.edit') }}" class="btn btn-success">Update</a>
                        <a href="{{ route('admin.employees.delete') }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- @yield('alert-delete') --}}
        {{-- @endforeach --}}
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style('assets/admin/css/my_style.css') }}
@endsection
