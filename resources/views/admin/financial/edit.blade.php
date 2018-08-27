@extends('admin.layouts.admin')

@section('title',"Store", "Store") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form>
        <div class="form-group">
                <label for="inputAddress">Name</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="">
              </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Employee Type</label>
          <select id="inputState" class="form-control">
            <option selected>Choose...</option>
            <option>Director</option>
            <option>Receptionist</option>
            <option>PNO</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Cancel</button>
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