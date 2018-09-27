@extends('admin.layouts.admin')

@section('title', "Question Forum Management")

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody> 
            @foreach($Question as $Questions)
                    <input type="hidden" id="id" name="id" value="{{ $Questions->id }}">
            @if(!strcmp(($Questions->questionPic),'nophoto')==0)
            <tr>
                <th>Image</th>
                <td><img height="200" width="200" src="\image\question\pic\{{ $Questions->questionPic }}" class="user-profile-image"></td>
            </tr>
            @endif
            <tr>
                <th>Question Title</th>
                <td>{{$Questions->questionTitle}}</td>
            </tr>
            <tr>
                <th>Question Type</th>
                <td>{{$Questions->questionType}}</td>
            </tr>
           
           @foreach($replys as $replyw)
           @if(!strcmp(($replyw->replay_pic),'nophoto')==0)
           <tr>
                <th>Image for Reply</th>
                <td><img height="200" width="200" src="\image\reply\pic\{{ $replyw->replay_pic }}" class="user-profile-image"></td>
            </tr>
            @endif
           <tr>
                <th>Reply <a class="btn btn-xs btn-info" href="{{ route('admin.question_forum.edit',[$replyw->id]) }}">
                        <i class="fa fa-pencil"></i>
                    </a></th>
                <td>{{$replyw->replay}}</td>
            </tr>
           @endforeach
            </tbody>
            <tr>
                    <th></th><td>
            @if (!$errors->isEmpty())
            
            <div class="alert alert-danger" role="alert">
                {!! $errors->first() !!}
            </div>
        </td>
             </tr>
        @endif
            
            
            
        </table>
        <a href="{{ route('admin.question_forum') }}" class="btn btn-danger">Questions Forum home</a>
        
    @endforeach
    </div>
@endsection