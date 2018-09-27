@extends('employee.pno.layouts.pno')

@section('title', "Doctor Management")

@section('content')
    <div class="row">
        <table border="0" cellspacing="0" width="100%" class="doctortable">
            <table>
                <tr>

                    <th>Actions</th>
                    <div class="demptable">
                        {{-- <a href="{{ route('admin.doctors.add') }}" class="btn btn-primary">Add Doctor</a>
                        <a href="{{ route('admin.doctors.report') }}" class="btn btn-primary">Report</a> --}}
                        <form action="doctorsearch" method="post" role="search">
                            {{ csrf_field() }}

                            <input type="text" placeholder="Search Doctor" name="q">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>

                    </div>

                </tr>
            </table>
            <br/>
            <br/>
            <div class="row">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif

                {{-- @foreach ($doctors as $doctor) --}}
                    <div class="col-xs-6 col-sm-3">

                        <div class="dcard">
                            <div class="row">
                                <div class="dcard-header">
                                    <div class="dcard-body text-center">
                                        {{-- <span class="dcard-title" style="font-size: large; color: white">{{ $doctor->name }}</span><br /> --}}
                                    </div>
                                    <br/>
                                    <div class="dcard-body text-center">
                                        {{-- <img src="\image\doc\profile\{{ $doctor->doc_pic }}" alt="Pic" height="90" width="90"class="img-circle"> --}}
                                    </div>

                                    {{-- <span class="card-img">{{ HTML::image('img/nickfrost.jpg', 'Pic') }}</span> --}}
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- @endforeach --}}
                <div class="pull-right">
                    {{-- {{ $users->links() }} --}}
                </div>
            </div>
@endsection
@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection