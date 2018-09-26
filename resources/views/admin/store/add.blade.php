@extends('admin.layouts.admin')

@section('title',"Add an Item", "Item") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="additem" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
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
            <label for="it_name">Item name *</label>
            <input type="text" class="form-control" name="it_name" id="it_name" placeholder="Name" value="{{ old('it_name') }}">
        </div>
        <div class="form-group">
            <label for="it_company">Item company *</label>
            <input type="text" class="form-control" name="it_company" id="it_company" placeholder="'ossur'" value="{{ old('it_company') }}">
        </div>
        <div class="form-group">
            <label for="it_type">Quantity type *</label>
            <select name="it_type" class="form-control" >
                <option value="">Select one</option>
                <option value="pieces">Pieces</option>
                <option value="sheet">Sheet</option>
                <option value="kg">KG</option>
                <option value="cm">CM</option>
                <option value="Ft">Feet</option>
            </select>
        </div>
        <div class="form-group">
            <label for="it_quantity">Item quantity *</label>
            <input type="text" class="form-control" name="it_quantity" id="it_quantity" placeholder="quantity" value="{{ old('it_quantity') }}">
        </div>
       
        <div class="form-group">
            <label for="it_max">Item maximum quantity *</label>
            <input type="text" class="form-control" name="it_max" id="it_max" placeholder="eg:-30kg" value="{{ old('it_max') }}">
        </div>
        <div class="form-group">
            <label for="it_min">Item minimum quantity *</label>
            <input type="text" class="form-control" name="it_min" id="it_min" placeholder="eg:-3kg" value="{{ old('it_min') }}">
        </div>
        <div class="form-group">
            <label for="it_pic">Item image *</label>
            <input type="file" class="form-control" name="it_pic" id="it_pic" >
        </div>
        <input type="hidden" id="empID" name="empID" value="{{$emp}}">
        
        <a href="{{ route('admin.store') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('admin.store.add') }}" class="btn btn-primary">Clear</a>
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