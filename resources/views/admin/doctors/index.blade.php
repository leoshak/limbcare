@extends('admin.layouts.admin')

@section('title', "Doctor Management")

@section('content')
    <div class="row">
        <table border="0" cellspacing="0" width="100%" class="doctortable">
            <table>
            <tr>

                <th>Actions</th>
                      <div class="emptable">
                          <a href="{{ route('admin.doctors.add') }}" class="btn btn-primary">Add Doctor</a>
                 <input type="text" placeholder="Search Doctor" name="search">
                 <button type="submit"><i class="fa fa-search"></i></button>
             </div>

            </tr>
            </table>
            <br/>
            <br/>
            <div class="row">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif

            @foreach ($doctors as $doctor)
                    <div class="col-xs-6 col-sm-3">

                <div class="card">
                    <div class="row">
                        <div class="card-header">
                            <div class="card-body text-center">
                                <span class="card-title" style="font-size: large; color: white">{{ $doctor->name }}</span><br />
                            </div>
                            <br/>
                            <div class="card-body text-center">
                                <img src="http://www.lifeline.ae/lifeline-hospital/wp-content/uploads/2015/05/LLH-Doctors-Female-Avatar.png" alt="Pic" height="90" width="90">
                            </div>
                            {{-- <span class="card-img">{{ HTML::image('img/nickfrost.jpg', 'Pic') }}</span> --}}
<br/>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        {!! Form::open(array('route' => ['admin.doctor.delete', $doctor->id], 'method' => 'DELETE')) !!}
                        <a href="{{ route('admin.doctors.show', [$doctor->id]) }}" class="btn btn-primary">View</a>
                        <br/>
                        <a href="{{ route('admin.doctors.edit', [$doctor->id]) }}" class="btn btn-success">Update</a>
                        {{-- <a href="{{ route('admin.doctors.delete') }}" class="btn btn-danger">Delete</a> --}}
                        {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
                @endforeach
                <div class="pull-right">
                    {{-- {{ $users->links() }} --}}
                </div>
            </div>



@endsection
@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection