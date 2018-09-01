@extends('admin.layouts.admin')

@section('title', "Question Forum Management")

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            
            <tr>
                <th>Question</th>
                <td>{{ $questionsforum->Queston }}</td>
            </tr>

            <tr>
                <th>Reply 1</th>
                <td>
                        {{ $questionsforum->replay1 }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>Reply 2</th>
                <td>
                    {{ $questionsforum->replay2 }}
                </td>
            </tr>
            <tr>
                <th>Reply 3</th>
                <td>
                        {{ ($questionsforum->replay3)}}
                        
                </td>
            </tr>
            <tr>
                <th>Reply 4</th>
                <td>
                        {{ ($questionsforum->replay4)}}
                        
                </td>
            </tr>
            <tr>
                <th>Reply 5</th>
                <td>
                        {{ ($questionsforum->replay5)}}
                        
                </td>
            </tr>

            </tbody>
        </table>
        <a href="{{ route('admin.question_forum') }}" class="btn btn-danger">Questions Forum home</a>
        <a class="btn btn-info" href="{{ route('admin.question_forum.edit',[$questionsforum->id]) }}">edit</a>
    </div>
@endsection