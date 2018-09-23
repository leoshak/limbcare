@extends('employee.pno.layouts.pno')

@section('title', "Patient Management")

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr> 
                <th>{{ __('views.admin.users.show.table_header_0') }}</th>
                <td><img height="200" width="200" src="\image\diagnosis\sketch\{{ $diagnosis->skech }}" class="user-profile-image"></td>
            </tr>

            <tr>
                <th>Patient name</th>
                <td>{{ $diagnosis->patientname }}</td>
            </tr>

            <tr>
                <th>Patient service</th>
                <td>
                        {{ $diagnosis->service }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>Discription</th>
                <td>
                    {{ $diagnosis->discription }}
                </td>
            </tr>
            <tr>
                <th>Consultant doctor</th>
                <td>
                        {{ ($diagnosis->consultant_dr)}}
                        
                </td>
            </tr>
            <tr>
                <th>Hight</th>
                <td>
                        {{ ($diagnosis->hight)}} cm
                        
                </td>
            </tr>
            <tr>
                <th>Weight</th>
                <td>
                        {{ ($diagnosis->weight)}} kg
                        
                </td>
            </tr>

            </tbody>
        </table>
        <a href="{{ route('admin.diagnosis.index') }}" class="btn btn-danger">Diagnosis home</a>
        <a class="btn btn-info" href="{{ route('admin.diagnosis.edit',[$diagnosis->id]) }}">edit</a>
    </div>
@endsection