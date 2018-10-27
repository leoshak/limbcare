@extends('admin.layouts.admin')

@section('title',"Store", "Store") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updatestore" method="post">
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
                <label for="name">Item name *</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $stores->iteamname }}">
              </div>
        <div class="form-group">
          <label for="quantity">Item quantity *</label>
          <input type="text" class="form-control"name="quantity" id="quantity" value="{{ $stores->iteam_quantity}}">
        </div>
        <div class="form-group">
            <label for="max">Item maximum *</label>
            <input type="text" class="form-control"name="max" id="max" value="{{ $stores->iteam_max}}">
          </div>
          <div class="form-group">
              <label for="min">Item minimum *</label>
              <input type="text" class="form-control"name="min" id="min" value="{{ $stores->iteam_min}}">
            </div>
        <input type="hidden" id="id" name="id" value="{{ $stores->id }}">
        <input type="hidden" id="empID" name="empID" value="{{$emp}}">
        <a href="{{ route('admin.store') }}" class="btn btn-danger">Cancel</a>
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