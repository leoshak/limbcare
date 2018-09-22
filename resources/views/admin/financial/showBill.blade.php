@extends('admin.layouts.admin')

@section('title', "Bill ID: " . $financialBill->id)

@section('content')
<div class="row">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    
                    <td><center><img src="\image\finacial\bill.png"  alt="Pic" height="90" width="90" class="user-profile-image"></center></td>
        
                </tr>
    
                <tr>
                    <th>Patient Name</th>
                    <td>
                        {{ $financialBill->patientname }}
                        
                    </td>
                </tr>
    
                <tr>
                    <th>Date</th>
                    <td>{{ $financialBill->descrption }}</td>
                </tr>
    
                <tr>
                    <th>Service Type</th>
                    <td>
                        {{ $financialBill->amount }}
                    </td>
                </tr>
                <tr>
                <tr>
                    <th></th>
                    <td><a href="{{ URL::previous() }}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a></td>
                    {{-- href="{{ route('admin.employees') }}" --}}
                </tr>
                <tr><th></th><td>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.financial.edit', [$financialBill->id]) }}">
                             <font size="+2"><i class="fa fa-edit"></i></font></a>
             </td> </tr> 
            </tbody>
        </table>
    </div>
@endsection