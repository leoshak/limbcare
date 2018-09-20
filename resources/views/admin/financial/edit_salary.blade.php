@extends('admin.layouts.admin')

@section('title', "Financial Salary Pay id: ".$financialSalary->id) 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updateSalary" method="post">
    {{ csrf_field() }}
        <div class="form-group">
                <label for="patientname">Employee Name</label>
                <input type="text" class="form-control" id="emp_name" name="emp_name" value="{{$financialSalary->emp_name}}">
              </div>
        <div class="form-group">
          <label for="descrption">Date</label>
          <input type="text" class="form-control" id="date" name="date" value="{{$financialSalary->date}}">
        </div>
        
        <input type="hidden" id="id" name="id" value="{{$financialSalary->id}}">
        <a class="btn btn-danger" href="{{ URL::previous() }}">Cancel</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
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