@extends('employee.director.layouts.director')

@section('title', "Question Forum Management")

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            @if(!($questionsforum->question_pic)==null)
            <tr>
                <th>Image</th>
                <td><img height="200" width="200" src="\image\question\pic\{{ $questionsforum->question_pic }}" class="user-profile-image"></td>
            </tr>
            @endif
            <tr>
                <th>Question title</th>
                <td>{{ $questionsforum->question_title }}</td>
            </tr>
            <tr>
                <th>Question type</th>
                <td>{{ $questionsforum->question_type }}</td>
            </tr>

            <tr>
                <th>Question</th>
                <td>{{ $questionsforum->Queston }}</td>
            </tr>
            @if(!($questionsforum->replay1)==null)
            <tr>
                <th>Reply 1</th>
                <td>{{ $questionsforum->replay1 }}</td>
            </tr>
            @endif
            @if(!($questionsforum->replay1_pic)==null)
            <tr>
                <th>Reply 1 Image</th>
                <td><img height="200" width="200" src="\image\question\reply\pic\{{ $questionsforum->replay1_pic }}" class="user-profile-image"></td>
            </tr>
            @endif
            @if(!($questionsforum->replay1)==null)
            <tr>
                <th>Reply 2</th>
                <td>{{ $questionsforum->replay2 }}</td>
            </tr>
            @endif
            @if(!($questionsforum->replay2_pic)==null)
            <tr>
                <th>Reply 2 Image</th>
                <td><img height="200" width="200" src="\image\question\reply\pic\{{ $questionsforum->replay2_pic }}" class="user-profile-image"></td>
            </tr>
            @endif
            @if(!($questionsforum->replay3)==null)
            <tr>
                <th>Reply 3</th>
                <td>{{ $questionsforum->replay3 }}</td>
            </tr>
            @endif
            @if(!($questionsforum->replay3_pic)==null)
            <tr>
                <th>Reply 3 Image</th>
                <td><img height="200" width="200" src="\image\question\reply\pic\{{ $questionsforum->replay3_pic }}" class="user-profile-image"></td>
            </tr>
            @endif
            @if(!($questionsforum->replay4)==null)
            <tr>
                <th>Reply 4</th>
                <td>{{ $questionsforum->replay4 }}</td>
            </tr>
            @endif
            @if(!($questionsforum->replay4_pic)==null)
            <tr>
                <th>Reply 4 Image</th>
                <td><img height="200" width="200" src="\image\question\reply\pic\{{ $questionsforum->replay4_pic }}" class="user-profile-image"></td>
            </tr>
            @endif
            @if(!($questionsforum->replay5)==null)
            <tr>
                <th>Reply 5</th>
                <td>{{ $questionsforum->replay5 }}</td>
            </tr>
            @endif
            @if(!($questionsforum->replay5_pic)==null)
            <tr>
                <th>Reply 5 Image</th>
                <td><img height="200" width="200" src="\image\question\reply\pic\{{ $questionsforum->replay5_pic }}" class="user-profile-image"></td>
            </tr>
            @endif
            </tbody>
        </table>
        <a href="{{ route('admin.question_forum') }}" class="btn btn-danger">Questions Forum home</a>
        <a class="btn btn-info" href="{{ route('admin.question_forum.edit',[$questionsforum->id]) }}">edit</a>
    </div>
@endsection