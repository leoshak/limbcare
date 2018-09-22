@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 col-md-8">
            @section('title', "Patient Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                
            </div>
            <div class="right-searchbar">
                <div class="emptable">
                    <a href="{{ route('admin.diagnosis.index') }}" class="btn btn-warning"> diagnosis card</a>
                    {{-- <button type="button" class="btn btn-warning">Diagnosis Card </button> --}}
                    {{ link_to_route('admin.patient.add', 'Add Patient', null, ['class' => 'btn btn-primary']) }}
                </div>
                <!-- Search form -->
                <form class="form-inline active-cyan-3">
                    <input class="form-control form-control-sm ml-3 w-100" type="text" placeholder="Search" aria-label="Search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </form>
            </div>
        </div>
    <div class="row">
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @foreach($patients as $patient)
            <div class="col-xs-6 col-sm-3">
                <div class="card">
                    <div class="row">
                        <div class="card-header">
                            <div class="card-body text-center" style="font-size: larger; color: white">
                                <span class="card-title ">{{ $patient->name }}</span><br />
                            </div>
                        <br/>
                            <div class="card-body text-center">
                                <img src="https://cdn0.iconfinder.com/data/icons/healer-glyphs-volume-1/106/patient-cast-outpatient-broken-arm-512.png" alt="Pic" height="90" width="90">
                            </div>
                            {{-- <span class="card-img">{{ HTML::image('img/nickfrost.jpg', 'Pic') }}</span> --}}

                        </div>
                    </div>
                    <div class="card-body text-center">
                        {!! Form::open(array('route' => ['admin.patient.delete', $patient->id], 'method' => 'DELETE')) !!}
                        <a href="{{ route('admin.patient.show', [$patient->id]) }}" class="btn btn-primary">View</a>
                        <br/>
                        <a href="{{ route('admin.patient.edit', [$patient->id]) }}" class="btn btn-success">Update</a>
                        {{-- <a href="{{ route('admin.patients.delete') }}" class="btn btn-danger">Delete</a> --}}
                        {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
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
