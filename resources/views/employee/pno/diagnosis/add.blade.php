@extends('employee.pno.layouts.pno')

@section('title',"Add an Diagnosis", "Diagnosis") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="adddiagnosis" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
        @if (!$errors->isEmpty())
            <div class="alert alert-danger" role="alert">
                {!! $errors->first() !!}
            </div>
        @endif
        <div class="form-group">
            <label for="pa_name">Pation name</label>
            <input type="text" class="form-control" name="pa_name" id="pa_name" placeholder="Name" >
        </div>
        <div class="form-group">
            <label for="pa_service">Service</label>
            <input type="text" class="form-control" name="pa_service" id="pa_service" placeholder="Service" >
        </div>
        <div class="form-group">
            <label for="pa_dr">Consultan Doctor</label>
            <input type="text" class="form-control" name="pa_dr" id="pa_dr" placeholder="'DR.Sunil'" >
        </div>
        <div class="form-group">
            <label for="pa_height">Height</label>
            <input type="text" class="form-control" name="pa_height" id="pa_height" placeholder="eg:-180cm" >
        </div>
        <div class="form-group">
            <label for="pa_weight">Weight</label>
            <input type="text" class="form-control" name="pa_weight" id="pa_weight" placeholder="eg:-60KG" >
        </div>
        <div class="form-group">
            <label for="pa_sketch">Sketch</label>
            <input type="file" class="form-control" name="pa_sketch" id="pa_sketch" >
        </div>
        <div class="form-group">
          <label for="pa_discription">Discription</label>
          <textarea class="form-control" name="pa_discription" id="pa_discription" cols="30" rows="10" placeholder="Pation discription"></textarea>
        </div>
        
        <a href="{{ route('admin.diagnosis.index') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('admin.diagnosis.add') }}" class="btn btn-primary">Clear</a>
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