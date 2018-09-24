@extends('admin.layouts.admin')

@section('title', __('views.admin.users.show.title', ['name' => $doctor->name]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>{{ __('views.admin.users.show.table_header_0') }}</th>
                <td>
                    <img src="\image\doc\profile\{{ $doctor->doc_pic }}" alt="Pic" height="200" width="200" class="user-profile-image">

            </tr>

            <tr>
                <th>{{ __('views.admin.users.show.table_header_1') }}</th>
                <td>{{ $doctor->name }}</td>
            </tr>

            <tr>
                <th>Doctor Email</th>
                <td>
                    {{-- <a href="mailto:{{ $doctor->doctorType }}"> --}}
                    {{ $doctor->email }}
                    {{-- </a> --}}
                </td>
            </tr>

            <tr>
                <th>Hospital</th>
                <td>
                    {{ $doctor->hospital }}
                </td>
            </tr>

            <tr>
                <th>Mobile</th>
                <td>
                    {{ $doctor->mobile }}
                </td>
            </tr>



            <tr>
                <th></th>
                <td><a href="{{ URL::previous() }}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a></td>
                {{-- href="{{ route('admin.doctors') }}" --}}
            </tr>
            </tbody>
        </table>
    </div>
@endsection