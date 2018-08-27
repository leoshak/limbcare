@extends('admin.layouts.admin')

@section('title', __('views.admin.users.show.title', ['name' => $appointment->name]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>{{ __('views.admin.users.show.table_header_0') }}</th>
                <td><img src="https://png.icons8.com/ios/1600/user-male-circle-filled.png"  alt="Pic" height="90" width="90" class="user-profile-image"></td>
                {{-- {{ $employee->avatar }} --}}
            </tr>

            <tr>
                <th>Name</th>
                <td>{{ $appointment->name }}</td>
            </tr>

            <tr>
                <th>Type</th>
                <td>
                    {{-- <a href="mailto:{{ $employee->employeeType }}"> --}}
                    {{ $appointment->type }}
                    {{-- </a> --}}
                </td>
            </tr>

            <tr>
                <th>Date</th>
                <td>
                    {{ $appointment->date }}
                </td>
            </tr>

            <tr>
                <th>Time</th>
                <td>
                    {{ $appointment->time }}
                </td>
            </tr>
            <tr>

            <tr>
                <th>Created At</th>
                <td>{{ $appointment->created_at }} ({{ $appointment->created_at->diffForHumans() }})</td>
            </tr>

            <tr>
                <th>Updated At</th>
                <td>{{ $appointment->updated_at }} ({{ $appointment->updated_at->diffForHumans() }})</td>
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