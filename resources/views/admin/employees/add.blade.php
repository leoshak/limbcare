@extends('admin.layouts.admin')

@section('title',"Add an Employee", "Employee") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    {!! Form::open(array('route' => 'admin.employees.store')) !!}
        <div class="form-group">
            {{-- <label for="inputName">Name</label> --}}
            {!! Form::label('name', 'Name') !!}
            {{-- <input type="text" class="form-control" id="inputName" name="name" placeholder=""> --}}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nic', 'NIC') !!}
            {!! Form::text('nic', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('employeeType', 'Employee Type') !!}
            {!! Form::select('employeeType', ['Director' => 'Director', 'Receptionist' => 'Receptionist', 'PNO'=> 'PNO'], null, ['placeholder' => 'Choose...', 'class'=> 'form-control']) !!}
            {{-- <select id="inputEmployeeType" class="form-control">
                <option selected>Choose...</option>
                <option>Director</option>
                <option>Receptionist</option>
                <option>PNO</option>
            </select> --}}
        </div>
        <div class="container">
                <div class="form-group">
                    {!! Form::label('birthday', 'Birthday') !!}
                    {!! Form::date('birthday', null, ['class'=> 'form-control']) !!}
                    {{-- <div class='input-group date' id='inputBirthday'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div> --}}
                </div>
            </div>
        <div class="form-group">
         {!! Form::label('address', 'Address') !!}
         {!! Form::textarea('address', null, ['class'=> 'form-control']) !!}
          {{-- <textarea class="form-control" name="address" id="address" cols="30" rows="10"></textarea> --}}
        </div>
        <button type="reset" class="btn btn-primary">Clear</button>
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