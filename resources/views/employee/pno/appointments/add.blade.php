@extends('employee.pno.layouts.pno')

@section('title',"Add an Appointment", "Appointment") 

@section('content')
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        {!! Form::open(array('route' => 'admin.appointments.store')) !!}
             @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- <div class="form-group">
                {!! Form::label('id', 'Appointment ID') !!}
                {!! Form::text('id', null, ['class' => 'form-control']) !!}
            </div> --}}
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('date', 'Date') !!}
                {!! Form::date('date', null, ['class' => 'form-control', 'min'=>date('Y-m-d')]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('time', 'Time') !!}
                {!! Form::time('time', null, ['class' => 'form-control', 'min'=>'08:30', 'max'=>'17:30']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('type', 'Appointment Type') !!}
                {!! Form::select('type', ['Repair' => 'Repair', 'Checkup' => 'Checkup', 'New'=> 'New'], null, ['placeholder' => 'Choose...', 'class'=> 'form-control']) !!}
            </div>

            <a href="{{ route('admin.appointments') }}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a>
            {!! Form::button('Clear', ['type' => 'reset', 'class' => 'btn btn-danger']) !!}
            {!! Form::button('Add', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
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