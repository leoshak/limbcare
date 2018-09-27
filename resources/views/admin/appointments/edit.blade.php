@extends('admin.layouts.admin')

@section('title',"Update an Appointment", "Appointment") 

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
                {{-- {!! Form::label('id', 'Appointment ID') !!} --}}
                {!! Form::hidden('id', $appointment->id, ['class' => 'form-control']) !!}
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
                {!! Form::label('time', 'Select a available time slot:') !!}
                <select class = 'form-control' name='time'>
                    <option value="{{$appointment->time}}" disabled selected>{{$appointment->time}}</option>
                        <option value="09.00 - 09.30">09.00 - 09.30</option>
                        <option value="09.30 - 10.00">09.30 - 10.00</option>
                        <option value="10.00 - 10.30">10.00 - 10.30</option>
                        <option value="10.30 - 11.00">10.30 - 11.00</option>
                        <option value="11.00 - 11.30">11.00 - 11.30</option>
                        <option value="11.30 - 12.00">11.30 - 12.00</option>
                        <option value="01.30 - 02.00">01.30 - 02.00</option>
                        <option value="02.00 - 02.30">02.00 - 02.30</option>
                        <option value="02.30 - 03.00">02.30 - 03.00</option>
                        <option value="03.00 - 03.30">03.00 - 03.30</option>
                        <option value="03.30 - 04.00">03.30 - 04.00</option>
                        <option value="04.00 - 04.30">04.00 - 04.30</option>
                        <option value="04.30 - 05.00">04.30 - 05.00</option>
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('type', 'Appointment Type') !!}
                {!! Form::select('type', ['Repair' => 'Repair', 'Checkup' => 'Checkup', 'New'=> 'New'],  $appointment->type, ['placeholder' => 'Choose...', 'class'=> 'form-control']) !!}
            </div>

            <a class="btn btn-danger" href="{{ route('admin.appointments') }}"> {{ __('views.admin.users.edit.cancel') }}</a>
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