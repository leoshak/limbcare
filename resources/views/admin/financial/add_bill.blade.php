@extends('admin.layouts.admin')

@section('title',"Add finacial ", "Diagnosis") 

@section('content')
<div class="mainbox col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-2">

    <form action="addbill" method="post">
{{ csrf_field() }}
            <h3>Bill</h3>
@if (!$errors->isEmpty())
    <div class="alert alert-danger" role="alert">
    {!! $errors->first() !!}
    </div>
@endif
@php
    
use Illuminate\Support\Facades\DB;
$email=auth()->user()->email;

$IDs = DB::table('employees')->where('email', $email)->get();
$emp = 0;
        foreach($IDs as $ID)
        {
            $emp=$ID->id;
            
        }

@endphp
@if(Session::has('message'))
    <div class="alert alert-danger">{{ Session::get('message') }}</div>
@endif
        
        <div class="form-group">
            <label for="bi_note">Invoice ID</label>
            <h3>{{$invoice->id}}</h3>
        </div>
        <div class="form-group">
            <label for="bi_note">Remaining amount</label>
            <h3>Rs. {{$invoice->remaining_amount}}.00</h3>
        </div>

        <div class="form-group">
            <label for="bi_am">Amount</label>
            <input type="text" class="form-control" name="bi_am" id="bi_am" placeholder="eg:-200000.00" >
            <input type="hidden" id="inID" name="inID" value="{{$invoice->id}}">
            <input type="hidden" id="empid" name="empid" value="{{$emp}}">
           
        </div>
        
        
        <a href="{{ route('admin.financial.index_bill') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('admin.financial.addbillinvoice', [$invoice->id]) }}" class="btn btn-primary">Clear</a>
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