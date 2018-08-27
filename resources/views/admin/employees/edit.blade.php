@extends('admin.layouts.admin')

@section('title',"Edit Employee", "Employee") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    {{ Form::open(['route'=>['admin.employees.update', $employee->id],'method' => 'put','class'=>'form-horizontal form-label-left']) }}
        <div class="form-group">
          <label for="inputAddress">Name</label>
          <input type="text" class="form-control" id="inputName" name="inputName" placeholder="" value="{{ $employee->name }}">
        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder=""  value="{{ $employee->address }}">
        </div>
        <div class="form-group">
          <label for="inputState">Employee Type</label>
          <select id="inputState" name="inputState" class="form-control">
            <option @if($employee->employeeType == 'Director') selected @endif>Director</option>
            <option @if($employee->employeeType == 'Receptionist') selected @endif>Receptionist</option>
            <option @if($employee->employeeType == 'PNO') selected @endif>PNO</option>
          </select>
        </div>
        <a class="btn btn-danger" href="{{ URL::previous() }}"> {{ __('views.admin.users.edit.cancel') }}</a>
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