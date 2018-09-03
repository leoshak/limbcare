@extends('admin.layouts.admin')

@section('title', "Patient Management")

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%" border="0">
            <thead>
            <tr>
                <th>Actions</th>

                    <div class="emptable">
                        <button type="button" class="btn btn-warning">Diagnosis Card </button>
                        {{ link_to_route('admin.patient.add', 'Add Patient', null, ['class' => 'btn btn-primary']) }}

                        <input type="text" placeholder="Search Patient" name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>


            </tr>
            </thead>
        </table>
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif

            <div class="row">
                @foreach($patients as $patient)

            <div class="col-xs-6 col-sm-3">
                <div class="card">
                    <div class="row">
                        <div class="card-header">
                            <div class="card-body text-center">
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

        <div class="pull-right">
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
@endsection
@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection