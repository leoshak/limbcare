@extends('admin.layouts.admin')

@section('title',"Add finacial ", "Diagnosis") 

@section('content')
<div class="mainbox col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-2">
<div class="col-sm-4">
    <form action="addbill" method="post">
{{ csrf_field() }}
            <h3>Bill</h3>
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
        
        <a href="{{ route('admin.financial') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('admin.financial.add') }}" class="btn btn-primary">Clear</a>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
<div class="col-sm-4">
<form action="addsalary" method="post">
{{ csrf_field() }}
        <h3>Salary</h3>
        <div class="form-group">
            <label for="emp_name">Employee name</label>
            <input type="text" class="form-control" name="emp_name" id="emp_name" placeholder="Name" required>
        </div>
        <div class="form-group">
            <label for="emp_am">Amount</label>
            <input type="text" class="form-control" name="emp_am" id="emp_am" placeholder="eg:-45500.00" required>
        </div>
        
        <a href="{{ route('admin.financial') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('admin.financial.add') }}" class="btn btn-primary">Clear</a>
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
</div>
<div class="col-sm-4">
<form action="addother" method="post">
{{ csrf_field() }}
        <h3>other payment</h3>
        <div class="form-group">
            <label for="oth_note">Note</label>
            <input type="text" class="form-control" name="oth_note" id="oth_note" placeholder="note" required>
        </div>
        <div class="form-group">
            <label for="oth_am">Amount</label>
            <input type="text" class="form-control" name="oth_am" id="oth_am" placeholder="eg:-6786000.00" required>
        </div>
        
        <a href="{{ route('admin.financial') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('admin.financial.add') }}" class="btn btn-primary">Clear</a>
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
</div>

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