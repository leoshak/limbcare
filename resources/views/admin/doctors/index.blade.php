@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 col-md-8">
            @section('title', "Doctor Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                
            </div>
            <div class="right-searchbar">
                <div class="emptable">
                    <a href="{{ route('admin.doctors.add') }}" class="btn btn-primary">Add Doctor</a>
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

        @foreach ($doctors as $doctor)
           <div class="col-xs-6 col-sm-3">
                <div class="card">
                    <div class="row">
                        <div class="card-header">
                            <div class="card-body text-center">
                                <span class="card-title" style="font-size: large; color: white">{{ $doctor->name }}</span><br />
                            </div>
                            <br/>
                            <div class="card-body text-center">
                                <img src="http://www.lifeline.ae/lifeline-hospital/wp-content/uploads/2015/05/LLH-Doctors-Female-Avatar.png" alt="Pic" height="90" width="90">
                            </div>
                            {{-- <span class="card-img">{{ HTML::image('img/nickfrost.jpg', 'Pic') }}</span> --}}
                            <br/>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        {!! Form::open(array('route' => ['admin.doctor.delete', $doctor->id], 'method' => 'DELETE')) !!}
                        <a href="{{ route('admin.doctors.show', [$doctor->id]) }}" class="btn btn-primary">View</a>
                        <br/>
                        <a href="{{ route('admin.doctors.edit', [$doctor->id]) }}" class="btn btn-success">Update</a>
                        {{-- <a href="{{ route('admin.doctors.delete') }}" class="btn btn-danger">Delete</a> --}}
                        {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        @endforeach
        <div class="pull-right">
            {{-- {{ $users->links() }} --}}
        </div>
    </div>

@endsection
@section('styles')
    @parent
    {{ Html::style('assets/admin/css/my_style.css') }}
@endsection