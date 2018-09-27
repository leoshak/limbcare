@extends('admin.layouts.admin')

@section('title',"Question Forum Management") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updatereply" method="post"enctype="multipart/form-data">
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
              <label for="name"><h4>Reply</h4> </label>
              <h2>{{ $replyx->replay }}</h2>
              @if(!strcmp(($replyx->replay_pic),'nophoto')==0)
              <img height="300" width="300" src="\image\reply\pic\{{ $replyx->replay_pic }}" class="user-profile-image">
              @endif

        </div> 
        <div class="form-group">
                <label for="replye">Reply *</label>
                <textarea class="form-control" name="replye" id="replye" cols="30" rows="10" placeholder="reply " >{{ $replyx->replay }}</textarea>
        </div>
        <div class="form-group">
                <label for="rep_pic">Reply image (optional)</label>
                <input type="file" class="form-control" name="rep_pic" id="rep_pic" >
        </div>
        <input type="hidden" id="id" name="id" value="{{ $replyx->id }}">
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