@extends('admin.layouts.admin')

@section('title',"Add finacial ", "Diagnosis") 

@section('content')
<div class="mainbox col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-2">

    <form action="addbill" method="post">
{{ csrf_field() }}
            <h3>Bill</h3>
@if (!$errors->isEmpty())
    <div class="alert alert-danger" role="alert">
    {!! $errors->first() !!}
    </div>
@endif

@if(Session::has('message'))
    <div class="alert alert-danger">{{ Session::get('message') }}</div>
@endif
        <div class="form-group">
            <label for="bi_name">Patient name</label>
            <input type="text" class="form-control" name="bi_name" id="bi_name" placeholder="Name" required>
        </div>
        <div class="form-group">
            <label for="bi_note">Note</label>
            <input type="text" class="form-control" name="bi_note" id="bi_note" placeholder="note" required>
        </div>
        <div class="form-group">
            <label for="bi_am">Amount</label>
            <input type="text" class="form-control" name="bi_am" id="bi_am" placeholder="eg:-200000.00" required>
        </div>
        
        <a href="{{ route('admin.financial.index_bill') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('admin.financial.add_bill') }}" class="btn btn-primary">Clear</a>
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