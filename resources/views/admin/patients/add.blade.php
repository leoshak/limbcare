@extends('admin.layouts.admin')

@section('title',"Add a Patient", "Patient")

@section('content')
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <form action="patient" method="post">

            {{ csrf_field() }}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>

            </div>
            <div class="form-group">
                <label for="inputAddress">Patient Name</label>
                <input type="text" name="name" class="form-control" id="inputAddress" >
            </div>
            <div class="form-group">
                <label for="inputAddress">E-Mail</label>
                <input type="text" name="email" class="form-control" id="inputAddress" >
            </div>
            <div class="form-group">
                <label for="inputAddress">Nic</label>
                <input type="text" name="nic" class="form-control" id="inputAddress" >
            </div>
            <div class="form-group">
                <label for="inputAddress">Password</label>
                <input type="password" name="password" class="form-control" id="inputAddress" >
            </div>
            <div class="form-group">
                <label for="inputAddress">Confirm Password</label>
                <input type="password" name="confirm-password" class="form-control" id="inputAddress" >
            </div>
            <div class="form-group">
                <label for="inputAddress">Mobile</label>
                <input type="text" name="mobile" class="form-control" id="inputAddress" >
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <textarea name="address" class="form-control" id="inputAddress" >
                </textarea>
            </div>





            <button type="reset" class="btn btn-primary">Clear</button>
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