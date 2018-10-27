@extends('patient.layouts.patient')

@section('title', "Patient Management")
@php
    
use Illuminate\Support\Facades\DB;
$email=auth()->user()->email;

$IDs = DB::table('patient')->where('email', $email)->get();
$IDpa = 0;
        foreach($IDs as $ID)
        {
            $IDpa=$ID->id;
            
        }
        $pation = DB::select('select * from diagnosis where id ='.$IDpa);
        $patientname='n';
            $service='n';
            $consultant_dr='n';
            $discription='n';
            $hight='n';
            $weight='n';
            $skech='n';
foreach($pation as $pations)
        {
            $patientname=$pations->patientname;
            $service=$pations->service;
            $discription=$pations->discription;
            $consultant_dr=$pations->consultant_dr;
            $hight=$pations->hight;
            $weight=$pations->weight;
            $skech= $diagnosis->skech;
        }

@endphp
@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr> 
                <th>{{ __('views.admin.users.show.table_header_0') }}</th>
                <td><img height="200" width="200" src="\image\diagnosis\sketch\{{ $skech }}" class="user-profile-image"></td>
            </tr>

            <tr>
                <th>Patient name</th>
                <td>{{ $patientname }}</td>
            </tr>

            <tr>
                <th>Patient service</th>
                <td>
                        {{ $service }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>Discription</th>
                <td>
                    {{ $discription }}
                </td>
            </tr>
            <tr>
                <th>Consultant doctor</th>
                <td>
                        {{ ($consultant_dr)}}
                        
                </td>
            </tr>
            <tr>
                <th>Hight</th>
                <td>
                        {{ ($hight)}} cm
                        
                </td>
            </tr>
            <tr>
                <th>Weight</th>
                <td>
                        {{ ($weight)}} kg
                        
                </td>
            </tr>

            </tbody>
        </table>
        <a href="{{ route('patient.patients') }}" class="btn btn-danger">Patient home</a>
    </div>
@endsection