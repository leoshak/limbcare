@extends('admin.layouts.admin')

@section('title',  "Salary ID: " . $financialSalaryPayment->id)

@section('content')
<div class="row">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td><center><img src="\image\finacial\payement.png"  alt="Pic" height="90" width="90" class="user-profile-image"></center></td>
                    
                </tr>
    
                <tr>
                    <th>Date</th>
                    <td><h5>{{ $financialSalaryPayment->date }}</h5></td>
                </tr>
    
                <tr>
                    <th>Employee Name</th>
                    <td>
                        @php
                         $name='no';
                            foreach($emp as $emps)
                            {
                                if($financialSalaryPayment->emp_id==$emps->id)
                                {
                                    $name=$emps->name;
                                }
                            }
                        @endphp
                       <h5> {{  $name}}</h5>
                        {{-- </a> --}}
                    </td>
                </tr>
    
                <tr>
                    <th>Amount</th>
                    <td>
                      <h5> Rs. {{ $financialSalaryPayment->amount }}.00</h5>
                    </td>
                </tr>
                <tr>
                <tr>
                    <th></th>
                    <td><a href="{{ URL::previous() }}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a></td>
                    {{-- href="{{ route('admin.employees') }}" --}}
                </tr>
                {{-- <tr><th></th><td>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.financial.edit_salary', [$financialSalaryPayment->id]) }}">
                             <font size="+2"><i class="fa fa-edit"></i></font></a>
             </td> </tr>  --}}
            </tbody>
        </table>
    </div>
@endsection