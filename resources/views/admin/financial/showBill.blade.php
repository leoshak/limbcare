@extends('admin.layouts.admin')

@section('title', "Bill ID: " . $financialBill->id)

@section('content')
<div class="row">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    
                    <td><center><img src="\image\finacial\bill.png"  alt="Pic" height="90" width="90" class="user-profile-image"></center></td>
        
                </tr>
                {{-- @php
                $names='no';
                $amont='no';
                foreach ($array as $arrays)
                                {
                                    $names= $arrays->name;
                                }
                @endphp --}}
                <tr>
                    <th>Patient Name</th>
                    <td>
                       <h3> {{ $array['name']}}</h3>
                        
                    </td>
                </tr>
    
                <tr>
                    <th>Date</th>
                    <td><h3>{{ $financialBill->created_at }}</h3></td>
                </tr>
    
                <tr>
                    <th>Bill amount</th>
                    <td>
                       <h3> {{ $financialBill->amount }}</h3>
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