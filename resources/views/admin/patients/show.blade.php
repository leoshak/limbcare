@extends('admin.layouts.admin')

@section('title', __('views.admin.users.show.title', ['name' => $patient->name]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>{{ __('views.admin.users.show.table_header_0') }}</th>
                <td><img src="https://png.icons8.com/ios/1600/user-male-circle-filled.png"  alt="Pic" height="90" width="90" class="user-profile-image"></td>
                {{-- {{ $patient->avatar }} --}}
            </tr>

            <tr>
                <th>{{ __('views.admin.users.show.table_header_1') }}</th>
                <td>{{ $patient->name }}</td>
            </tr>

            <tr>
                <th>patient Type</th>
                <td>
                    {{-- <a href="mailto:{{ $patient->patientType }}"> --}}
                    {{ $patient->email }}
                    {{-- </a> --}}
                </td>
            </tr>

            <tr>
                <th>NIC</th>
                <td>
                    {{ $patient->nic }}
                </td>
            </tr>

            <tr>
                <th>Address</th>
                <td>
                    {{ $patient->address }}
                </td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td>
                    {{ $patient->mobile }}
                </td>
            </tr>


            <tr>
                <th></th>
                <td><a href="{{ URL::previous() }}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a></td>
                {{-- href="{{ route('admin.patients') }}" --}}
            </tr>
            </tbody>
        </table>
    </div>
@endsection