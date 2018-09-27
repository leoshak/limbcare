@extends('doctor.layouts.doctor')

@section('title', "Question Forum Management")

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody> 
            @foreach($Question as $Questions)
            @if(!strcmp(($Questions->questionPic),'nophoto')==0)
            <tr>
                <th>Image</th>
                <td><img height="200" width="200" src="\image\question\pic\{{ $Questions->questionPic }}" class="user-profile-image"></td>
            </tr>
            @endif
            <tr>
                <th>Question title</th>
                <td>{{$Questions->questionTitle}}</td>
            </tr>
            <tr>
                <th>Question </th>
                <td>{{$Questions->question}}</td>
            </tr>
           
           @foreach($replys as $replyw)
           @if(!strcmp(($replyw->replay_pic),'nophoto')==0)
           <tr>
                <th>Image of reply</th>
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
        <a href="{{ route('doctor.question_forum') }}" class="btn btn-danger">Questions Forum home</a>
        
    @endforeach
    </div>
@endsection