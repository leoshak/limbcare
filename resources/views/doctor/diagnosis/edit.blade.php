@extends('doctor.layouts.doctor')

@section('title',"Diagnosis Management") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updatediagnosis" method="post">
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
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $diagnosis->patientname }}">
              </div>
        <div class="form-group">
          <label for="Weight">Weight</label>
          <input type="text" class="form-control"name="Weight" id="Weight" value="{{ $diagnosis->weight}}">
        </div>
        <div class="form-group">
            <label for="hight">Hight</label>
            <input type="text" class="form-control"name="hight" id="hight" value="{{ $diagnosis->hight}}">
          </div>
        <div class="form-group">
            <label for="discription">Discription</label>
            <textarea class="form-control" name="discription" id="discription" cols="30" rows="10" value="" >{{ $diagnosis->discription}}</textarea>
          </div>
        <input type="hidden" id="id" name="id" value="{{ $diagnosis->id }}">
        <a href="{{ route('admin.diagnosis.index') }}" class="btn btn-danger">Cancel</a>
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