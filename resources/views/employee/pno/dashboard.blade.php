@extends('employee.pno.layouts.pno')

@section('content')
    <!-- page content -->
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i>Assigned Appointment</span>
            <div class="count green">{{ $counts['appointment'] }}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i>Products to build</span>
            <div class="count green">{{ $counts['users'] }}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i>Worked Days in this month</span>
            <div>
                <span class="count green">{{  $counts['users'] - $counts['users_inactive'] }}</span>
                <span class="count">/</span>
                <span class="count red">{{ $counts['users_inactive'] }}</span>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user-times "></i>Last month Salary</span>
            <div class="count green">{{ $counts['users'] }}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-lock"></i>Total Questions</span>
            <div>
                <span class="count green">{{  $counts['question'] }}</span>
            </div>
        </div>
    </div>
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
                <div class="col-md-12">
                        @if (isSet($notifications) and $notifications->count() > 0)
                            <div class="alert alert-info">
                                <ul>
                                    @foreach ($notifications as $notification)
                                        {{-- @if($notification) --}}
                                            <li>
                                                {{ $notification->header }}
                                                <a href="" style="color: green;">&nbsp;Approve&nbsp;</a>
                                                <a href="" style="color: red;">&nbsp;Reject&nbsp;</a>
                                                <a href="" style="color: yellow;">&nbsp;Ask new date&nbsp;</a>
                                            </li>
                                        {{-- @endif --}}
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <table class="table table-striped table-hover">
                            <tbody>
                            <tr>
                                <th>{{ __('views.admin.users.show.table_header_0') }}</th>
                                <td><img src="\image\emp\profile\{{ $employee[0]->emp_pic }}"  alt="Pic" height="90" width="90" class="user-profile-image "></td>
                                {{-- {{ $employee->avatar }} --}}
                            </tr>
                
                            <tr>
                                <th>{{ __('views.admin.users.show.table_header_1') }}</th>
                                <td>{{ $employee[0]->name }}</td>
                            </tr>
                
                            <tr>
                                    <th>Email</th>
                                    <td>{{ $employee[0]->email }}</td>
                                </tr>
                    
                                <tr>
                                    <th>Contact Number</th>
                                    <td>{{ $employee[0]->contactNo }}</td>
                                </tr>
                        
                            <tr>
                                <th>Employee Type</th>
                                <td>
                                    {{-- <a href="mailto:{{ $employee->employeeType }}"> --}}
                                    {{ $employee[0]->employeeType }}
                                    {{-- </a> --}}
                                </td>
                            </tr>
                
                            <tr>
                                <th>NIC</th>
                                <td>
                                    {{ $employee[0]->nic }}
                                </td>
                            </tr>
                
                            <tr>
                                <th>Address</th>
                                <td>
                                    {{ $employee[0]->address }}
                                </td>
                            </tr>
                            <tr>
                                <th>Birthday</th>
                                <td>
                                    {{ $employee[0]->birthday }}
                                </td>
                            </tr>
                
                            <tr>
                                <th></th>
                                <td><a href="{{ url("receptionist/editprofile") }}" class="btn btn-light"><i class="fa fa-user-circle-o"></i> Edit Profile</a></td>
                                {{-- href="{{ route('admin.employees') }}" --}}
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="log_activity" class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Financial Status</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="date_piker pull-right"
                             style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span class="date_piker_label">
                                {{ \Carbon\Carbon::now()->addDays(-6)->format('F j, Y') }} - {{ \Carbon\Carbon::now()->format('F j, Y') }}
                            </span>
                            <b class="caret"></b>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="chart demo-placeholder" style="width: 100%; height:460px;"></div>
                </div>


                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                    <div class="x_title">
                        <h3>Less Quantity Items</h3>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <div>
                            <p>Polypropylene</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-emergency" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Metals</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-alert" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Alloys</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-critical" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Carbon fiber</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="asdasdasd"></div>
                                    <div class="progress-bar log-error" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Plastics</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-warning" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>PVC</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-notice" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
