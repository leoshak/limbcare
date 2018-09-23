@extends('admin.layouts.admin')

@section('title',"Question Forum Management") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updatequestion" method="post"enctype="multipart/form-data">
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
                <label for="name"><h4>Question title</h4> </label>
                <h2>{{ $questionsforum->question_title }}</h2>
          </div>
          <div class="form-group">
              <label for="name"><h4>Question</h4> </label>
              <h2>{{ $questionsforum->Queston }}</h2>
              @if(!($questionsforum->question_pic)==null)
              <img height="300" width="300" src="\image\question\pic\{{ $questionsforum->question_pic }}" class="user-profile-image">
              @endif

        </div> 
        
        <div class="form-group">
          <label for="reply1">Reply 1</label>
          <input type="text" class="form-control"name="reply1" id="reply1" value="{{ $questionsforum->replay1}}">
        
          <div class="form-group">
              <label for="qurp1_pic">Reply 1 image</label>
              <input type="file" class="form-control" name="qurp1_pic" id="qurp1_pic" accept="image/*" />
          </div>
          @if( !($questionsforum->replay1_pic)==null)
          <img height="200" width="200" src="\image\question\reply\pic\{{ $questionsforum->replay1_pic }}" class="user-profile-image">
          @endif
        </div>
        @if(( !($questionsforum->replay1)==null)or( !($questionsforum->replay2)==null) )
        <div class="form-group">
          <label for="reply2">Reply 2</label>
          <input type="text" class="form-control"name="reply2" id="reply2" value="{{ $questionsforum->replay2}}">
          <div class="form-group">
              <label for="qurp2_pic">Reply 2 image</label>
              <input type="file" class="form-control" name="qurp2_pic" id="qurp2_pic" accept="image/*" />
          </div>
          @if( (!($questionsforum->replay2_pic)==null))
          <img height="200" width="200" src="\image\question\reply\pic\{{ $questionsforum->replay2_pic }}" class="user-profile-image">
          @endif
        </div>
        @endif
        @if( (!($questionsforum->replay2)==null) or( !($questionsforum->replay3)==null))
        <div class="form-group">
          <label for="reply3">Reply 3</label>
          <input type="text" class="form-control"name="reply3" id="reply3" value="{{ $questionsforum->replay3}}">
          <div class="form-group">
              <label for="qurp3_pic">Reply 3 image</label>
              <input type="file" class="form-control" name="qurp3_pic" id="qurp3_pic" accept="image/*" />
          </div>
          @if( !($questionsforum->replay3_pic)==null)
          <img height="200" width="200" src="\image\question\reply\pic\{{ $questionsforum->replay3_pic }}" class="user-profile-image">
          @endif
        </div>
        @endif
        @if( (!($questionsforum->replay3)==null)or( !($questionsforum->replay4)==null) )
        <div class="form-group">
          <label for="reply4">Reply 4</label>
          <input type="text" class="form-control"name="reply4" id="reply4" value="{{ $questionsforum->replay4}}">
          <div class="form-group">
              <label for="qurp4_pic">Item image</label>
              <input type="file" class="form-control" name="qurp4_pic" id="qurp4_pic" accept="image/*" />
          </div>
          @if( !($questionsforum->replay4_pic)==null)
          <img height="200" width="200" src="\image\question\reply\pic\{{ $questionsforum->replay4_pic }}" class="user-profile-image">
          @endif
        </div>
        @endif
        @if( (!($questionsforum->replay4)==null) or( !($questionsforum->replay5)==null))
        <div class="form-group">
          <label for="reply5">Reply 5</label>
          <input type="text" class="form-control"name="reply5" id="reply5" value="{{ $questionsforum->replay2}}">
          <div class="form-group">
              <label for="qurp5_pic">Item image</label>
              <input type="file" class="form-control" name="qurp5_pic" id="qurp5_pic" accept="image/*" />
          </div>
          @if( !($questionsforum->replay5_pic)==null)
          <img height="200" width="200" src="\image\reply\item\{{ $questionsforum->replay5_pic }}" class="user-profile-image">
          @endif
        </div>
        @endif
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