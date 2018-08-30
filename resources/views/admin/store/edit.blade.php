@extends('admin.layouts.admin')

@section('title',"Store", "Store") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updatestore" method="post">
    {{ csrf_field() }}
        <div class="form-group">
                <label for="name">Iteam name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $stores->iteamname }}">
              </div>
        <div class="form-group">
          <label for="quantity">Iteam quantity</label>
          <input type="text" class="form-control"name="quantity" id="quantity" value="{{ $stores->iteam_quantity}}">
        </div>
        <div class="form-group">
            <label for="max">Iteam max</label>
            <input type="text" class="form-control"name="max" id="max" value="{{ $stores->iteam_max}}">
          </div>
          <div class="form-group">
              <label for="min">Iteam min</label>
              <input type="text" class="form-control"name="min" id="min" value="{{ $stores->iteam_min}}">
            </div>
        <input type="hidden" id="id" name="id" value="{{ $stores->id }}">
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