@extends('admin.layouts.admin')
@section('content')
<div class="row title-section">
    <div class=".col-xs-12 .col-sm-6 .col-lg-8">
        @section('title', "Generate Report")
    </div>
    <div class="col-xs-6 col-sm-3">
        <div class="card">
            <div class="row">
                {!! Form::open(['action' => 'EmployeeController@generateReport', 'class' => 'form-control-inline']) !!}
                    {!! Form::token() !!}
                {!! Form::close() !!}
                <div class="form-group">
                    {!! Form::date('created_date') !!}
                </div>
                <div class="form-group">
                    {!! Form::date('to_date', \Carbon\Carbon::now()) !!}
                </div>
                <div class="form-group">
                    {!! Form::select('sort_by', ['name' => 'name', 'email' => 'email'], 'name') !!}
                </div>
                {!! Form::submit('Generate') !!}
            </div>
        </div>
    </div>
</body>
</html>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection