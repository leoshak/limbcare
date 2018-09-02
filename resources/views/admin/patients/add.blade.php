@extends('admin.layouts.admin')

@section('title',"Add a Patient", "Patient")

@section('content')
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <form action="patient" method="post">
            {{ csrf_field() }}
            <div>

            </div>
            <div class="form-group">
                <label for="inputAddress">Patient Name</label>
                <input type="text" name="name" class="form-control" id="inputAddress" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputAddress">E-Mail</label>
                <input type="text" name="email" class="form-control" id="inputAddress" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputAddress">Nic</label>
                <input type="text" name="nic" class="form-control" id="inputAddress" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputAddress">Password</label>
                <input type="password" name="password" class="form-control" id="inputAddress" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputAddress">Mobile</label>
                <input type="password" name="mobile" class="form-control" id="inputAddress" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" name="address" class="form-control" id="inputAddress" placeholder="">
            </div>





            <button type="" class="btn btn-primary">Clear</button>
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