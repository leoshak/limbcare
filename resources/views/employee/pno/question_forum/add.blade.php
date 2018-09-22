@extends('employee.pno.layouts.pno')

@section('title',"Add an Question", "Question") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addques" method="post" enctype="multipart/form-data">
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
        <label for="qu_title">Question title</label>
        <input type="text" class="form-control" name="qu_title" id="qu_title" placeholder="what's....." >
    </div>
    <div class="form-group">
        <label for="qu_type">Question type</label>
        <select name="qu_type" class="form-control" >
            <option value="">Select one</option>
            <option value="doctors">Doctors</option>
            <option value="patient">Patient</option>
        </select>
    </div>
    <div class="form-group">
        <label for="qu_pic">Question image</label>
        <input type="file" class="form-control" name="qu_pic" id="qu_pic" >
    </div>
    <div class="form-group">
        <label for="question">Question</label>
        <textarea class="form-control" name="question" id="question" cols="30" rows="10" placeholder="question " ></textarea>
    </div>
        <a href="{{ route('admin.question_forum') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('admin.question_forum.add') }}" class="btn btn-primary">Clear</a>
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