@extends('doctor.layouts.doctor')

@section('title', "Patient Management")

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr> 
                <th>{{ __('views.admin.users.show.table_header_0') }}</th>
                <td><img height="200" width="200" src="\image\diagnosis\sketch\{{ $diagnosise->skech }}" class="user-profile-image"></td>
            </tr>

            <tr>
                <th>Patient name</th>
                <td>{{ $diagnosise->patientname }}</td>
            </tr>

            <tr>
                <th>Patient service</th>
                <td>
                        {{ $diagnosise->service }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>Discription</th>
                <td>
                    {{ $diagnosise->discription }}
                </td>
            </tr>
            <tr>
                <th>Consultant doctor</th>
                <td>
                        {{ ($diagnosise->consultant_dr)}}
                        
                </td>
            </tr>
            <tr>
                <th>Hight</th>
                <td>
                        {{ ($diagnosise->hight)}} cm
                        
                </td>
            </tr>
            <tr>
                <th>Weight</th>
                <td>
                        {{ ($diagnosise->weight)}} kg
                        
                </td>
            </tr>

            </tbody>
        </table>
        <a href="{{ route('doctor.diagnosis.index') }}" class="btn btn-danger">Diagnosis home</a>
       
    </div>
@endsection