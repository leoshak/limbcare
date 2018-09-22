@extends('employee.director.layouts.director')

@section('title',  "Other Pay ID: " . $financialOtherPayment->id)

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
            </tbody>
        </table>
    </div>
@endsection