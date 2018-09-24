@extends('admin.layouts.admin')
@section('content')
    <div class="row title-section">
        <div class="col-12 col-md-8">
        @section('title', "Question Forum Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="{{ route('admin.question_forum.add') }}" class="btn btn-primary">Add Question</a>
            </div>
            <div class="right-searchbar">
                    <form action="searchquestion" method="post" class="form-inline active-cyan-3">
                            {{ csrf_field() }}
                            <input type="text" placeholder="Search question" name="search" class="form-control form-control-sm ml-3 w-100" required>
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
            </div>
        </div>
    </div>
    <div class="row">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                    <thead> 
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>title</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questionsforum as $questionsforum)
                        <tr>@php
                            $type=$questionsforum->questionType;
                            @endphp
                                <td>{{ $questionsforum->id }}</td>
                                <td>{{ $questionsforum->question }}</td>
                                <td>{{ $questionsforum->questionTitle }}</td>
                                <td>@if($type=='doctor')<span class="text-primary bg-primary">{{$questionsforum->questionType}} </span><br />
                                @else<span class="text-primary btn-danger">{{$questionsforum->questionType}} @endif</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.question_forum.show',[$questionsforum->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                
                                <a class="btn btn-xs btn-warning" href="{{ route('admin.question_forum.reply',[$questionsforum->id]) }}">
                                    <i class="fa fa-reply"></i>
                                </a>

                                <a class="btn btn-xs btn-danger" href="{{ route('admin.question_forum.delete',[$questionsforum->id]) }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
@endsection