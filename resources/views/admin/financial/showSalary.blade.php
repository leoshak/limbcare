@extends('admin.layouts.admin')

@section('title',  "Salary ID: " . $financialSalaryPayment->id)

@section('content')
<div class="row">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td><center><img src="\image\finacial\payement.png"  alt="Pic" height="90" width="90" class="user-profile-image"></center></td>
                    
                </tr>
    
                <tr>
                    <th>Date</th>
                    <td>{{ $financialSalaryPayment->date }}</td>
                </tr>
    
                <tr>
                    <th>Employee Name</th>
                    <td>
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
                {{-- <tr><th></th><td>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.financial.edit_salary', [$financialSalaryPayment->id]) }}">
                             <font size="+2"><i class="fa fa-edit"></i></font></a>
             </td> </tr>  --}}
            </tbody>
        </table>
    </div>
@endsection