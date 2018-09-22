@extends('employee.pno.layouts.pno')

@section('title', "Financial Other Pay id: ".$financialOtherPay->id) 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updateOtherPay" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="patientname">Descripiton</label>
            <input type="text" class="form-control" id="descrption" name="descrption" value="{{$financialOtherPay->descrption}}">
        </div>
        <div class="form-group">
          <label for="amount">Amount</label>
          <input type="text" class="form-control" id="amount" name="amount" value="{{$financialOtherPay->amount}}">
        </div>
        <input type="hidden" id="id" name="id" value="{{$financialOtherPay->id}}">
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