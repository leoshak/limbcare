@extends('patient.layouts.patient')



@section('content')
    <div class="row">
            <div class="col-12 col-md-8">
                    @section('title', "Patient Management")
                    </div>
            <div class="col-8 col-md-4" style="padding-bottom: 15px;">
                    <div class="topicbar">
                        <a href="{{ route('patient.diagnosis.index') }}" class="btn btn-primary"> diagnosis card</a>
                    </div>
                    <div class="right-searchbar">
                        <!-- Search form -->
                        
                    </div>
                </div>
                @php
    
                use Illuminate\Support\Facades\DB;
                $email=auth()->user()->email;
                
                $IDs = DB::table('patient')->where('email', $email)->get();
                $IDpa = 0;
                        foreach($IDs as $ID)
                        {
                            $IDpa=$ID->id;
                            
                        }
                        $pation = DB::select('select * from patient where id ='.$IDpa);
                        $name='n';
                            $Gender='n';
                            $mobile='n';
                            $address='n';
                            $pat_pic='n';
                foreach($pation as $pations)
                        {
                            $name=$pations->name;
                            $Gender=$pations->Gender;
                            $mobile=$pations->mobile;
                            $address=$pations->address;
                            $pat_pic=$pations->pat_pic;
                        }
                
                @endphp
               
                    <div class="row">
                        <table class="table table-striped table-hover">
                            <tbody>
                            <tr> 
                                <th>{{ __('views.admin.users.show.table_header_0') }}</th>
                                <td><img height="200" width="200" src="\image\pat\profile\{{ $pat_pic }}" class="user-profile-image"></td>
                            </tr>
                
                            <tr>
                                <th>Patient name</th>
                                <td>{{ $name }}</td>
                            </tr>
                
                            <tr>
                                <th>Patient Gender</th>
                                <td>
                                        {{ $Gender }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>mobile</th>
                                <td>
                                    {{ $mobile }}
                                </td>
                            </tr>
                            <tr>
                                <th>address</th>
                                <td>
                                        {{ ($address)}}
                                        
                                </td>
                            </tr>
                
                            </tbody>
                        </table>
                     </div>
                @endsection