@extends('admin.layouts.admin')

@section('title', "Financial Bill id: ".$financialBill->id) 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="update" method="post">
    {{ csrf_field() }}
    @if (!$errors->isEmpty())
    <div class="alert alert-danger" role="alert">
    {!! $errors->first() !!}
    </div>
@endif

@if(Session::has('message'))
    <div class="alert alert-danger">{{ Session::get('message') }}</div>
@endif
        <div class="form-group">
                <label for="patientname">Patient Name</label>
                <input type="text" class="form-control" id="patientname" name="patientname" value="{{$financialBill->patientname}}">
              </div>
        <div class="form-group">
          <label for="descrption">Note</label>
          <input type="text" class="form-control" id="descrption" name="descrption" value="{{$financialBill->descrption}}">
        </div>
        
        <input type="hidden" id="id" name="id" value="{{$financialBill->id}}">
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