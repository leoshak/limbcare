@extends('admin.layouts.admin')
@section('content')
    <div class="row title-section">
        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
            @section('title', "Generate Report")
        </div>
        <div class="center-block">
        <div class="col-xs-12 col-sm-6">
            <div class="row">
                {!! Form::open(array('route' => 'admin.employees.rep', 'enctype' =>'multipart/form-data', 'class' => 'form-inline')) !!}
                    {!! Form::token() !!}
                    <div class="form-group">
                        {!! Form::date('created_date', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::date('to_date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::select('sort_by', ['name' => 'name', 'email' => 'email'], 'name', ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Generate', ['class' => 'btn btn-info']) !!}   
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
</body>
</html>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
    {{ Html::style('assets/admin/css/my_style.css') }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection