@extends('admin.layouts.admin')

@section('title',"Question Forum Management") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updatequestion" method="post">
    {{ csrf_field() }}
        <div class="form-group">
                <label for="name">Question</label>
                <h2>{{ $questionsforum->Queston }}</h2>
              </div>
        <div class="form-group">
          <label for="reply1">Reply 1</label>
          <input type="text" class="form-control"name="reply1" id="reply1" value="{{ $questionsforum->replay1}}">
        </div>
        <div class="form-group">
          <label for="reply2">Reply 2</label>
          <input type="text" class="form-control"name="reply2" id="reply2" value="{{ $questionsforum->replay2}}">
        </div>
          <div class="form-group">
              <label for="reply3">Reply 3</label>
              <input type="text" class="form-control"name="reply3" id="reply3" value="{{ $questionsforum->replay3}}">
            </div>
            <div class="form-group">
              <label for="reply4">Reply 4</label>
              <input type="text" class="form-control"name="reply4" id="reply4" value="{{ $questionsforum->replay4}}">
            </div>
            <div class="form-group">
              <label for="reply5">Reply 5</label>
              <input type="text" class="form-control"name="reply5" id="reply5" value="{{ $questionsforum->replay5}}">
            </div>
        <input type="hidden" id="id" name="id" value="{{ $questionsforum->id }}">
        <a href="{{ route('admin.question_forum') }}" class="btn btn-danger">Cancel</a>
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