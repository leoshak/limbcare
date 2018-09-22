@extends('employee.director.layouts.director')

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

@if(Session::has('message'))
    <div class="alert alert-danger">{{ Session::get('message') }}</div>
@endif
        <div class="form-group">
            <label for="it_name">Item name</label>
            <input type="text" class="form-control" name="it_name" id="it_name" placeholder="Name" >
        </div>
        <div class="form-group">
            <label for="it_company">Item company</label>
            <input type="text" class="form-control" name="it_company" id="it_company" placeholder="'ossur'" >
        </div>
        <div class="form-group">
            <label for="it_type">quantity type</label>
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
            <label for="it_quantity">Item quantity</label>
            <input type="text" class="form-control" name="it_quantity" id="it_quantity" placeholder="quantity" >
        </div>
       
        <div class="form-group">
            <label for="it_max">Item max quantity</label>
            <input type="text" class="form-control" name="it_max" id="it_max" placeholder="eg:-30kg" >
        </div>
        <div class="form-group">
            <label for="it_min">Item min quantity</label>
            <input type="text" class="form-control" name="it_min" id="it_min" placeholder="eg:-3kg" >
        </div>
        <div class="form-group">
            <label for="it_pic">Item image</label>
            <input type="file" class="form-control" name="it_pic" id="it_pic" >
        </div>
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