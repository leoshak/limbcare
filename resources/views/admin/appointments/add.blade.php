@extends('admin.layouts.admin')

@section('title',"Add an Appointment", "Appointment") 

@section('content')
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="alert alert-warning" role="alert">
            <ul>
                <li>{{ 'Appointmets cannot be allocate within Today.' }}</li>
                <li>{{ 'Allocate appointment within Limb Care(PVT) working hours(08.30 AM to 05.00 PM)' }}</li>
            </ul>
        </div>
        <div class="form-group">
            {!! Form::open(array('route' => 'admin.appointments.checkDate')) !!}
                {!! Form::label('date', 'Date') !!}
                {!! Form::date('date', null, ['class' => 'form-control', 'min'=>date('Y-m-d')]) !!}
                {!! Form::button('Check Date', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            
        {!! Form::open(array('route' => 'admin.appointments.checkDate.store')) !!}
            {!! Form::hidden('date', null) !!}
            <div class="form-group">
                {!! Form::label('name', 'Patient Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Patient Name']) !!}
            </div>
            @php ($_1 = '')@php ($_2 = '')@php ($_3 = '')@php ($_4 = '')@php ($_5 = '')@php ($_6 = '')
            @php ($_7 = '')@php ($_8 = '')@php ($_9 = '')@php ($_10 = '')@php ($_11 = '')@php ($_12 = '')
            @php ($_13 = '')
            <div class="form-group">
                {!! Form::label('time', 'Select a available time slot:') !!}
                <select class = 'form-control' name='time'>
                    <option value="" disabled selected>Select a available time slot</option>
                    @if(isset($appointments))
                        <option value="09.00 - 09.30" 
                            @foreach ($appointments as $app)
                                @if($app == '09.00 - 09.30') @php ($_1 = $app) disabled @endif
                            @endforeach >09.00 - 09.30 @if($_1 == "09.00 - 09.30") Taken @endif </option>
                        <option value="09.30 - 10.00" 
                            @foreach ($appointments as $app)
                                @if($app == '09.30 - 10.00') @php ($_2 = $app) disabled @endif
                            @endforeach >09.30 - 10.00 @if($_2 == '09.30 - 10.00') Taken @endif </option>
                        <option value="10.00 - 10.30" 
                            @foreach ($appointments as $app)
                                @if($app == '10.00 - 10.30') @php ($_3 = $app) disabled @endif
                            @endforeach >10.00 - 10.30 @if($_3 == '10.00 - 10.30') Taken @endif </option>
                        <option value="10.30 - 11.00" 
                            @foreach ($appointments as $app)
                                @if($app == '10.30 - 11.00') @php ($_4 = $app) disabled @endif
                            @endforeach >10.30 - 11.00 @if($_4 == '10.30 - 11.00') Taken @endif </option>
                        <option value="11.00 - 11.30" 
                            @foreach ($appointments as $app)
                                @if($app == '11.00 - 11.30') @php ($_5 = $app) disabled @endif
                            @endforeach >11.00 - 11.30 @if($_5 == '11.00 - 11.30') Taken @endif </option>
                        <option value="11.30 - 12.00" 
                            @foreach ($appointments as $app)
                                @if($app == '11.30 - 12.00') @php ($_6 = $app) disabled @endif
                            @endforeach >11.30 - 12.00 @if($_6 == '11.30 - 12.00') Taken @endif </option>
                        <option value="01.30 - 02.00" 
                            @foreach ($appointments as $app)
                                @if($app == '01.30 - 02.00') @php ($_7 = $app) disabled @endif
                            @endforeach >01.30 - 02.00 @if($_7 == '01.30 - 02.00') Taken @endif </option>
                        <option value="02.00 - 02.30" 
                            @foreach ($appointments as $app)
                                @if($app == '02.00 - 02.30') @php ($_8 = $app) disabled @endif
                            @endforeach >02.00 - 02.30 @if($_8 == '02.00 - 02.30') Taken @endif </option>
                        <option value="02.30 - 03.00" 
                            @foreach ($appointments as $app)
                                @if($app == '02.30 - 03.00') @php ($_9 = $app) disabled @endif
                            @endforeach >02.30 - 03.00 @if($_9 == '02.30 - 03.00') Taken @endif </option>
                        <option value="03.00 - 03.30" 
                            @foreach ($appointments as $app)
                                @if($app == '03.00 - 03.30') @php ($_10 = $app) disabled @endif
                            @endforeach >03.00 - 03.30 @if($_10 == '03.00 - 03.30') Taken @endif </option>
                        <option value="03.30 - 04.00" 
                            @foreach ($appointments as $app)
                                @if($app == '03.30 - 04.00') @php ($_11 = $app) disabled @endif
                            @endforeach >03.30 - 04.00 @if($_11 == '03.30 - 04.00') Taken @endif </option>
                        <option value="04.00 - 04.30" 
                            @foreach ($appointments as $app)
                                @if($app == '04.00 - 04.30') @php ($_12 = $app) disabled @endif
                            @endforeach >04.00 - 04.30 @if($_12 == '04.00 - 04.30') Taken @endif </option>
                        <option value="04.30 - 05.00" 
                            @foreach ($appointments as $app)
                                @if($app == '04.30 - 05.00') @php ($_13 = $app) disabled @endif
                            @endforeach >04.30 - 05.00 @if($_13 == '04.30 - 05.00') Taken @endif </option>
                    @endif
                </select>
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