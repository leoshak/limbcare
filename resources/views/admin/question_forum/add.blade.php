@extends('admin.layouts.admin')

@section('title',"Add an Question", "Question") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addques" method="post">
{{ csrf_field() }}
        <div class="form-group">
          <label for="question">Discription</label>
          <textarea class="form-control" name="question" id="question" cols="30" rows="10" placeholder="question " required></textarea>
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