@extends('admin.layouts.admin')

@section('title',"Store", "Store") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updateservices" method="post">
    {{ csrf_field() }}
    @if (!$errors->isEmpty())
        <div class="alert alert-danger" role="alert">
            {!! $errors->first() !!}
        </div>
    @endif
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
    @if(Session::has('message'))
        <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif
        <div class="form-group">
                <label for="name">Service name *</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $Services->serviceName }}">
              </div>
        <div class="form-group">
          <label for="quantity">Service description *</label>
          <textarea class="form-control" name="discription" id="discription" cols="30" rows="10" value="" >{{ $Services->description}}</textarea>
        </div>
        <input type="hidden" id="id" name="id" value="{{ $Services->id }}">
        <input type="hidden" id="uid" name="uid" value="{{$emp}}">
        <a href="{{ route('admin.services') }}" class="btn btn-danger">Cancel</a>
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