@extends('employee.director.layouts.director')

@section('title',"Edit Employee", "Employee") 

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

    {{ Form::open(['route'=>['director.employees.update', $employee->id],'method' => 'put','class'=>'form-horizontal form-label-left', 'enctype'=>"multipart/form-data"]) }}
        {{-- <div class="form-group">
            @if ("/storage/public/images/{{ $employee->avator }}")
                <img src="{{ $employee->avator }}">
            @else
                <p>No image found</p>
            @endif
            <label for="avator">Current Avator: {{ $employee->avator }}</label>
            <input type="file" class="form-control-file" id="avator" name="avator" placeholder="" value="{{ $employee->avator }}">
        </div> --}}
        <div class="form-group">
          <label for="inputAddress">Name</label>
          <input type="text" class="form-control" id="inputName" name="inputName" placeholder="" value="{{ $employee->name }}">
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email',  null, ['class' => 'form-control', 'placeholder'=>'Valid email']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('contact', 'Contact Number') !!}
            {!! Form::text('contact',  null, ['class' => 'form-control', 'placeholder'=>'Mobile number']) !!}
        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder=""  value="{{ $employee->address }}">
        </div>
        <div class="form-group">
          <label for="empType">Employee Type</label>
          <select id="empType" name="empType" class="form-control">
            <option @if($employee->employeeType == 'Director') selected @endif>Director</option>
            <option @if($employee->employeeType == 'Receptionist') selected @endif>Receptionist</option>
            <option @if($employee->employeeType == 'PNO') selected @endif>PNO</option>
          </select>
        </div>
        <a class="btn btn-danger" href="{{ route('admin.employees') }}"> {{ __('views.admin.users.edit.cancel') }}</a>
        {{-- <button type="submit" class="btn btn-primary">Clear</button> --}}
        <button type="submit" class="btn btn-success">Update</button>
      {{ Form::close() }}
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection