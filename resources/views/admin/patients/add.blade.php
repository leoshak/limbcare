@extends('admin.layouts.admin')

@section('title',"Add a Patient", "Patient")

@section('content')
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <form action="patient" method="post" enctype="multipart/form-data">

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
                <input type="text" name="name" class="form-control" id="inputAddress" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="inputAddress">E-Mail</label>
                <input type="text" name="email" class="form-control" id="inputAddress" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="inputAddress">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="inputAddress" value="Male" >
                    <label class="form-check-label" for="exampleRadios1">
Male                  </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="inputAddress" value="Female" >
                    <label class="form-check-label" for="exampleRadios2">
Female                    </label>
                </div>

            </div>
            <div class="form-group">
                <label for="inputAddress">Nic</label>
                <input type="text" name="nic" class="form-control" id="inputAddress" value="{{ old('nic') }}">
            </div>
            <div class="form-group">
                <label for="inputAddress">Password</label>
                <input type="password" name="password" class="form-control" id="inputAddress" value="{{ old('') }}">
            </div>
            <div class="form-group">
                <label for="inputAddress">Confirm Password</label>
                <input type="password" name="confirm-password" class="form-control" id="inputAddress" value="{{ old('') }}">
            </div>
            <div class="form-group">
                <label for="inputAddress">Mobile</label>
                <input type="text" name="mobile" class="form-control" id="inputAddress" value="{{ old('mobile') }}">
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <textarea name="address" class="form-control" id="inputAddress" >
                   {{ old('address') }}
                </textarea>
            </div>
            <div class="form-group">
                <label for="pat_pic">Patient Picture</label>
                <input type="file" class="form-control" name="pat_pic" id="pat_pic" >
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