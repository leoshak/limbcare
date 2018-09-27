@extends('admin.layouts.admin')

@section('title', "Question Forum Management")
@php
    
        use Illuminate\Support\Facades\DB;
        $email=auth()->user()->email;
        
        $IDs = DB::table('employees')->where('email', $email)->get();
        $emp = 0;
                foreach($IDs as $ID)
                {
                    $emp=$ID->id;
                    
                }
        
        @endphp
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
                <th>Question title</th>
                <td>{{$Questions->questionTitle}}</td>
            </tr>
            <tr>
                <th>Question type</th>
                <td>{{$Questions->questionType}}</td>
            </tr>
           
           @foreach($replys as $replyw)
           @if(!strcmp(($replyw->replay_pic),'nophoto')==0)
           <tr>
                <th>Image foe reply</th>
                <td><img height="200" width="200" src="\image\reply\pic\{{ $replyw->replay_pic }}" class="user-profile-image"></td>
            </tr>
            @endif
           <tr>
                <th>Reply</th>
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
            <form action="addreply" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            <tr>
                <th>Reply image (option)</th>
                <td><input type="file" class="form-control" name="rep_pic" id="rep_pic" value="{{ old('replye') }}"></td>
            </tr>
            <tr>
                <th>Reply </th>
                <td><textarea class="form-control" name="replye" id="replye" cols="30" rows="10" placeholder="reply " >{{ old('replye') }}</textarea></td>
            </tr>
            
        </table>
        <input type="hidden" id="q_id" name="q_id" value="{{$Questions->id}}">
        <input type="hidden" id="relier" name="relier" value="{{$emp}}">
        <a href="{{ route('admin.question_forum') }}" class="btn btn-danger">Questions Forum home</a>
        <button type="submit" class="btn btn-primary">Reply</button>
    </form>
    @endforeach
    </div>
@endsection