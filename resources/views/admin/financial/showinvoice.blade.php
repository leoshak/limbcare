@extends('admin.layouts.admin')

@section('title', "Invoice ID: " . $Invoice->id)

@section('content')
<div class="row">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    
                    <td><center><img src="\image\finacial\bill.png"  alt="Pic" height="90" width="90" class="user-profile-image"></center></td>
        
                </tr>
                @php
                $name='no';
                foreach ($patients as $patient)
                {
                if($Invoice->patient_ID==$patient->id)
                {
                    $name=$patient->name;
                }
                }@endphp
                <tr>
                    <th>Patient Name</th>
                    <td>
                        {{ $name }}
                        
                    </td>
                </tr>
    
                <tr>
                    <th>Total amount</th>
                    <td>{{ $Invoice->amount }}</td>
                </tr>
    
                <tr>
                    <th>Remaining amount</th>
                    <td>
                        {{ $Invoice->remaining_amount }}
                    </td>
                </tr>
                <tr>
                <tr>
                    <th></th>
                    <td><a href="{{ URL::previous() }}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a></td>
                    {{-- href="{{ route('admin.employees') }}" --}}
                </tr>
                
            </tbody>
        </table>
    </div>
@endsection