@extends('admin.layouts.admin')

@section('title',  "Other Pay ID: " . $financialOtherPayment->id)

@section('content')
<div class="row">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td><center><img src="\image\finacial\otherpayment.png"  alt="Pic" height="90" width="90" class="user-profile-image"></center></td>
                </tr>
                <tr>
                    <th>ID</th>
                    <td>
                        {{-- <a href="mailto:{{ $employee->employeeType }}"> --}}
                        {{ $financialOtherPayment->id }}
                        {{-- </a> --}}
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>
                        {{ $financialOtherPayment->descrption }}
                    </td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>
                        {{ $financialOtherPayment->amount }}
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><a href="{{ URL::previous() }}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a></td>
                    {{-- href="{{ route('admin.employees') }}" --}}
                    
                </tr>
                <tr><th></th><td>
                           <a class="btn btn-xs btn-info" href="{{ route('admin.financial.edit_otherpay', [$financialOtherPayment->id]) }}">
                                <font size="+2"><i class="fa fa-edit"></i></font></a>
                </td> </tr>   
            </tbody>
        </table>
    </div>
@endsection