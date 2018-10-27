@extends('admin.layouts.admin')

@section('title',"Add finacial ", "Diagnosis") 

@section('content')
<div class="mainbox col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-2">

<form action="addsalary" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
        <h3>Salary</h3>
        @if (!$errors->isEmpty())
        <div class="alert alert-danger" role="alert">
        {!! $errors->first() !!}
        </div>
    @endif
    
    @if(Session::has('message'))
        <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif        
        <div class="form-group">
            <label for="emp_name">Employee name</label>
            <h3>{{$emp->name}}</h3>
        </div>
        <div class="form-group">
            <label for="emp_am">Amount</label>
            <input type="text" class="form-control" name="emp_am" id="emp_am" placeholder="eg:-45500.00" value="{{ old('emp_am') }}" >
        </div>
        <div class="form-group">
        <label for="date">Date</label>
        <input class="form-control"type="date" name="date" ><br><br>
        </div>
        <input type="hidden" id="empid" name="empid" value="{{$emp->id}}">
        <a href="{{ route('admin.financial.index_salary') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('admin.financial.add_salary',$emp->id) }}" class="btn btn-primary">Clear</a>
        <button type="submit" class="btn btn-primary">Add</button>
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