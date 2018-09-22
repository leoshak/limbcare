@extends('admin.layouts.admin')

@section('title',"Edit Patient", "Patient")

@section('content')
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <form action="editpat" method="post">

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
            <div class="form-group">
                <label for="inputAddress">Patient Name</label>
                <input type="text" name="name" class="form-control" id="inputAddress" value="{{ $patient->name }}">
            </div>
            <div class="form-group">
                <label for="inputAddress">NIC</label>
                <input type="text" name="nic" class="form-control" id="inputAddress" value="{{ $patient->nic }}">
            </div>
            <div class="form-group">
                <label for="inputAddress">E-mail</label>
                <input type="text" name="email" class="form-control" id="inputAddress" value="{{ $patient->email }}">
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <textarea name="address" class="form-control" id="inputAddress" >
                    {{ $patient->address }}
                </textarea>
            </div>
            <div class="form-group">
                <label for="inputAddress">Mobile Number</label>
                <input type="text" name="mobile" class="form-control" id="inputAddress" value="{{ $patient->mobile }}">
            </div>





            <button type="reset" class="btn btn-primary">Clear</button>
            <button type="submit" class="btn btn-primary">Edit</button>
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