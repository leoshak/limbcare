@extends('admin.layouts.admin')

@section('title',"Add an Service", "Diagnosis") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addservice" method="post" enctype="multipart/form-data">
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
            <label for="service_name">Service Name *</label>
            <input type="text" class="form-control" name="service_name" id="service_name" placeholder="Name" value="{{ old('service_name') }}">
        </div>
        
        <div class="form-group">
            <label for="service_type">Service type *</label>
            <select name="service_type" class="form-control" >
                <option value="">Select one</option>
                <option value="prosthesis">Prosthesis</option>
                <option value="orthosis">Orthosis</option>
                <option value="cosmetic">Cosmetic solutions</option>
                <option value="children">Children</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="service_image">Service Image</label>
            <input type="file" class="form-control" name="service_image" id="service_image" >
        </div>
        <div class="form-group">
            <label for="service_des">Discription</label>
            <textarea class="form-control" name="service_des" id="service_des" cols="30" rows="10" placeholder="Service discription" >{{ old('service_des') }}</textarea>
          </div>
          <input type="hidden" id="empID" name="empID" value="{{$emp}}">
        <a href="{{ route('admin.services') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('admin.services.add') }}" class="btn btn-primary">Clear</a>
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