@extends('employee.pno.layouts.pno')

@section('title',  "Salary ID: " . $financialSalaryPayment->id)

@section('content')
<div class="row">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <th>Profile Photo</th>
                    <td><img src="https://png.icons8.com/ios/1600/user-male-circle-filled.png"  alt="Pic" height="90" width="90" class="user-profile-image"></td>
                    {{-- {{ $employee->avatar }} --}}
                </tr>
    
                <tr>
                    <th>Date</th>
                    <td>{{ $financialSalaryPayment->date }}</td>
                </tr>
    
                <tr>
                    <th>Employee Name</th>
                    <td>
                        {{-- <a href="mailto:{{ $employee->employeeType }}"> --}}
                        {{ $financialSalaryPayment->emp_name }}
                        {{-- </a> --}}
                    </td>
                </tr>
    
                <tr>
                    <th>Amount</th>
                    <td>
                        {{ $financialSalaryPayment->amount }}
                    </td>
                </tr>
                <tr>
                <tr>
                    <th></th>
                    <td><a href="{{ URL::previous() }}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a></td>
                    {{-- href="{{ route('admin.employees') }}" --}}
                </tr>
            </tbody>
        </table>
    </div>
@endsection