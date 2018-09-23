@extends('employee.pno.layouts.pno')

@section('title', "Financial Bill id: ".$financialBill->id) 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="update" method="post">
    {{ csrf_field() }}
        <div class="form-group">
                <label for="patientname">Patient Name</label>
                <input type="text" class="form-control" id="patientname" name="patientname" value="{{$financialBill->patientname}}">
              </div>
        <div class="form-group">
          <label for="descrption">Description</label>
          <input type="text" class="form-control" id="descrption" name="descrption" value="{{$financialBill->descrption}}">
        </div>
        <div class="form-group">
          <label for="amount">Amount</label>
          <input type="text" class="form-control" id="amount" name="amount" value="{{$financialBill->amount}}">
        </div>
        <input type="hidden" id="id" name="id" value="{{$financialBill->id}}">
        <a class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
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