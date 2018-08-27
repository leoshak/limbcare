@extends('admin.layouts.admin')

@section('title',"Add an Employee", "Employee") 

@section('content')
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{ Form::open(['route'=>['admin.appointments.update', $appointment->id],'method' => 'put','class'=>'form-horizontal form-label-left']) }}
            <div class="form-group">
                {!! Form::label('id', 'Appointment ID') !!}
                {!! Form::text('id', $appointment->id, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name',  $appointment->name, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('date', 'Date') !!}
                {!! Form::date('date',  $appointment->date, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('time', 'Time') !!}
                {!! Form::time('time',  $appointment->time, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('type', 'Appointment Type') !!}
                {!! Form::select('type', ['Repair' => 'Repair', 'Checkup' => 'Checkup', 'New'=> 'New'],  $appointment->type, ['placeholder' => 'Choose...', 'class'=> 'form-control']) !!}
            </div>

            <button type="reset" class="btn btn-primary">Clear</button>
            {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
            {{-- <button type="submit" class="btn btn-primary">Add</button> --}}
        {!! Form::close() !!}
    </div>

    {{-- @if($errors->has())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif --}}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection