@extends('doctor.layouts.doctor')
@section('content')
    <div class="row title-section">
        <div class="col-12 col-md-8">
        @section('title', "Question Forum Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="{{ route('doctor.question_forum.add') }}" class="btn btn-primary">Add Question</a>
            </div>
            <div class="right-searchbar">
                <!-- Search form -->
                
            </div>
        </div>
    </div>
    @php
    
use Illuminate\Support\Facades\DB;
$email=auth()->user()->email;

$IDs = DB::table('doctors')->where('email', $email)->get();
$IDpa = 0;
        foreach($IDs as $ID)
        {
            $IDpa=$ID->id;
            
        }
        $questionsforum = DB::select('select * from question where questionAsk ='.$IDpa);
        

@endphp
    <div class="row">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                    <thead> 
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>title</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questionsforum as $questionsforum)
                        <tr>
                                <td>{{ $questionsforum->id }}</td>
                                <td>{{ $questionsforum->question }}</td>
                                <td>{{ $questionsforum->questionTitle }}</td>
                                
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('doctor.question_forum.show',[$questionsforum->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        
    </div>
@endsection