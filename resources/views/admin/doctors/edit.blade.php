@extends('admin.layouts.admin')

@section('title',"Edit doctor", "doctor")

@section('content')
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <form action="editdoc" method="post">
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
                <label for="inputAddress">Doctor Name</label>
                <input type="text" name="name" class="form-control" id="inputAddress" value="{{ $doctor->name }}">
            </div>
            <div class="form-group">
                <label for="inputAddress">Hospital</label>
                <input type="text" name="hospital" class="form-control" id="inputAddress" value="{{ $doctor->hospital }}">
            </div>
            <div class="form-group">
                <label for="inputAddress">E-mail</label>
                <input type="email" name="email" class="form-control" id="inputAddress" value="{{ $doctor->email }}">
            </div>

            <div class="form-group">
                <label for="inputAddress">Mobile Number</label>
                <input type="text" name="mobile" class="form-control" id="inputAddress" value="{{ $doctor->mobile }}">
            </div>





            <button type="" class="btn btn-primary">Clear</button>
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