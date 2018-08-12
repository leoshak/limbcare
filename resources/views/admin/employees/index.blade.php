@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        {{-- @foreach($users as $user) --}}
        <div class="row topicbar">
            @section('title', "Employee Management")
            <div class="right-searchbar">
                <!-- Search form -->
                <form class="form-inline active-cyan-3">
                    <input class="form-control form-control-sm ml-3 w-100" type="text" placeholder="Search" aria-label="Search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <img src="{{URL::asset('img/nickfrost.jpg')}}" alt="Pic" height="200" width="200">
                        
                        {{-- <span class="card-img">{{ HTML::image('img/nickfrost.jpg', 'Pic') }}</span> --}}
                        <span class="card-title">Employee Name</span>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-success">Update</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <img src="" alt="Pic" class="card-img">
                        {{-- <span class="card-img">{{ HTML::image('img/nickfrost.jpg', 'Pic') }}</span> --}}
                        <span class="card-title">Employee Name</span>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-success">Update</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- @endforeach --}}
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style('assets/admin/css/my_style.css') }}
@endsection
