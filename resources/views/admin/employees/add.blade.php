@extends('admin.layouts.admin')

@section('title',"Add an Employee", "Employee") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form>
        <div class="form-group">
            <label for="inputAddress">Name</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="">
        </div>
        <div class="form-group">
            <label for="inputAddress">NIC</label>
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
        <div class="container">
                <div class="form-group">
                    <label for="inputAddress2">Birthday</label>
                    <div class='input-group date' id='datetimepicker5'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                </div>
            </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
          {{-- <input type="text" class="form-control" id="inputAddress" placeholder=""> --}}
        </div>
        <button type="submit" class="btn btn-primary">Clear</button>
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