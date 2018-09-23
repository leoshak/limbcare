@extends('employee.director.layouts.director')

@section('title', __('views.admin.users.show.title', ['name' => $employee->name]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>{{ __('views.admin.users.show.table_header_0') }}</th>
                <td><img src="\image\emp\profile\{{ $employee->emp_pic }}"  alt="Pic" height="90" width="90" class="user-profile-image "></td>
                {{-- {{ $employee->avatar }} --}}
            </tr>

            <tr>
                <th>{{ __('views.admin.users.show.table_header_1') }}</th>
                <td>{{ $employee->name }}</td>
            </tr>

            <tr>
                    <th>Email</th>
                    <td>{{ $employee->email }}</td>
                </tr>
    
                <tr>
                    <th>Contact Number</th>
                    <td>{{ $employee->contactNo }}</td>
                </tr>
        
            <tr>
                <th>Employee Type</th>
                <td>
                    {{-- <a href="mailto:{{ $employee->employeeType }}"> --}}
                    {{ $employee->employeeType }}
                    {{-- </a> --}}
                </td>
            </tr>

            <tr>
                <th>NIC</th>
                <td>
                    {{ $employee->nic }}
                </td>
            </tr>

            <tr>
                <th>Address</th>
                <td>
                    {{ $employee->address }}
                </td>
            </tr>
            <tr>
                <th>Birthday</th>
                <td>
                    {{ $employee->birthday }}
                </td>
            </tr>

            <tr>
                <th>Created At</th>
                <td>{{ $employee->created_at }} ({{ $employee->created_at->diffForHumans() }})</td>
            </tr>

            <tr>
                <th>Updated At</th>
                <td>{{ $employee->updated_at }} ({{ $employee->updated_at->diffForHumans() }})</td>
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