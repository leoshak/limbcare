@extends('patient.layouts.patient')

@section('content')
    <!-- page content -->
    <!-- top tiles -->
    {{-- <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i>Total Patients</span>
            <div class="count green">{{ $counts['users'] }}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i>Total Employees</span>
            <div class="count green">{{ $counts['users'] }}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i>Total Doctors</span>
            <div class="count green">{{ $counts['users'] }}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user-times "></i>Appointments</span>
            <div>
                <span class="count green">{{  $counts['users'] - $counts['users_inactive'] }}</span>
                <span class="count">/</span>
                <span class="count red">{{ $counts['users_inactive'] }}</span>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-lock"></i>Total Questions</span>
            <div>
                <span class="count green">{{  $counts['protected_pages'] }}</span>
            </div>
        </div>
    </div> --}}
    <!-- /top tiles -->

    {{--Carousel--}}
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>
                            LimbCare(PVT) LTD. Management System
                        </h3>
                    </div>
                </div>
                
                <div class="x_content">
                    <div class="col-md-12">
                        <div class="jcarousel">
                                <ul style="left: 0px; top: 0px;">
                                    <li><img src="http://www.artificiallimbcare.lk/img/bg-img/bg2.jpg" alt="" width="600" height="400"></li>
                                    <li><img src=".http://www.artificiallimbcare.lk/img/bg-img/bg1.jpg" alt="" width="600" height="400"></li>
                                    <li><img src="http://www.artificiallimbcare.lk/img/bg-img/bg3.jpg" alt="" width="600" height="400"></li>
                                </ul>
                                
                                <p class="jcarousel-pagination" data-jcarouselpagination="true"><a href="#1" class="active">1</a><a href="#2">2</a><a href="#3">3</a></p>
                            
                        </div>

                    </div>
                    <div class="col-md-12 text-center jcarousel-control">
                        <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                        <a href="#" class="jcarousel-control-next">&rsaquo;</a>
                    </div>
                </div>
            </div>
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
$services = DB::select('select * from service ');
$invoices = DB::select('select * from invoice where patient_ID ='.$IDpa);


@endphp
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="log_activity" class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Financial Status</h3>
                    </div>
                    
                </div>
                @foreach ($invoices as $invoice)
                    
                @php
                    $bills=DB::select('select * from invoice where invoice_id ='.$invoice->id);
                @endphp
                <div class="col-xs-6 col-md-8 col-lg-8 vcenter emp-details">
                    <span class="text-primary bg-primary">Invoice ID </span><br />
                <span class="text-light bg-success">{{$invoice->id}}</span><br />
                    <span class="text-primary bg-primary">Invoice amount</span><br />
                    <span class="text-light bg-success">{{$invoice->amount}}</span><br />
                    <span class="text-light bg-primary"> Invoice remaining amount</span><br />
    
                <span class="text-light bg-success">{{$invoice->remaining_amount}}</span>
                    
                </div>
                @foreach ($bills as $bill)
                <div class="col-xs-6 col-md-8 col-lg-8 vcenter emp-details">
                    <span class="text-primary bg-primary">Bill ID </span><br />
                <span class="text-light bg-success">{{$bill->id}}</span><br />
                    <span class="text-primary bg-primary">Bill amount</span><br />
                    <span class="text-light bg-success">{{$bill->amount}}</span><br />
                </div>
                @endforeach
                @endforeach

                
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
