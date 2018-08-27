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
                <!-- Search form -->
                <form class="form-inline active-cyan-3">
                    <input class="form-control form-control-sm ml-3 w-100" type="text" placeholder="Search" aria-label="Search">
                    <i class="fa fa-search" aria-hidden="true"></i>
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
                        <th>replay</th>
                        <th>replay</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questionsforum as $questionsforum)
                        <tr>
                                <td>{{ $questionsforum->id }}</td>
                                <td>{{ $questionsforum->Queston }}</td>
                                <td>{{ $questionsforum->replay1 }}</td>
                                <td>{{ $questionsforum->replay2 }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.question_forum.show',[$questionsforum->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.question_forum.edit',[$questionsforum->id]) }}">
                                    <i class="fa fa-pencil"></i>
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