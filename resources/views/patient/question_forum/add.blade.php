@extends('patient.layouts.patient')

@section('title',"Add an Question", "Question") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addques" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
@if (!$errors->isEmpty())
    <div class="alert alert-danger" role="alert">
        {!! $errors->first() !!}
    </div>
@endif
@php
    
use Illuminate\Support\Facades\DB;
$email=auth()->user()->email;

$IDs = DB::table('patient')->where('email', $email)->get();
$IDpa = 0;
        foreach($IDs as $ID)
        {
            $IDpa=$ID->id;
            
        }
        $pation = DB::select('select * from diagnosis where id ='.$IDpa);
        $patientname='n';
            $service='n';
            $consultant_dr='n';
            $discription='n';
            $hight='n';
            $weight='n';
            $skech='n';
foreach($pation as $pations)
        {
            $patientname=$pations->patientname;
            $service=$pations->service;
            $discription=$pations->discription;
            $consultant_dr=$pations->consultant_dr;
            $hight=$pations->hight;
            $weight=$pations->weight;
            $skech= $diagnosis->skech;
        }

@endphp
@if(Session::has('message'))
    <div class="alert alert-danger">{{ Session::get('message') }}</div>
@endif
<div class="form-group">
        <label for="qu_title">Question title *</label>
        <input type="text" class="form-control" name="qu_title" id="qu_title" placeholder="what's....." value="{{ old('qu_title') }}">
    </div>
    
    <div class="form-group">
        <label for="qu_pic">Question image (optional)</label>
        <input type="file" class="form-control" name="qu_pic" id="qu_pic" >
    </div>
    <div class="form-group">
        <label for="question">Question *</label>
        <textarea class="form-control" name="question" id="question" cols="30" rows="10" placeholder="question " >{{ old('question') }}</textarea>
    </div>
    <input type="hidden" id="qu_Type" name="qu_Type" value="pation">
    <input type="hidden" id="qu_Ask" name="qu_Ask" value="{{$IDpa}}">
        <a href="{{ route('patient.question_forum') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('patient.question_forum.add') }}" class="btn btn-primary">Clear</a>
        <button type="submit" class="btn btn-primary">Add</button>
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