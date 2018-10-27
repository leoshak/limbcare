<div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="{{ route('director.dashboard') }}" class="site_title">
                    <span>{{ config('app.name') }}</span>
                </a>
            </div>
    
            <div class="clearfix"></div>
    
            <!-- menu profile quick info -->
            <div class="profile clearfix">
                <div class="profile_pic">
                    {{-- <img src="{{ auth()->user()->avatar }}" alt="..." class="img-circle profile_img"> --}}
                    <img src="http://203.157.229.35/sis/img/user_icon.png" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <h2>{{ auth()->user()->name }}</h2>
                    <h3>{{ auth()->user()->usertype }}</h3>
                </div>
            </div>
            <!-- /menu profile quick info -->
    
            <br/>
    
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    {{-- <h3>{{ __('views.backend.section.navigation.sub_header_0') }}</h3> --}}
                    <ul class="nav side-menu">
                        <li>
                            {{-- <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                {{ __('views.backend.section.navigation.menu_0_1') }}
                            </a> --}}
                            <a href="{{ route('director.dashboard') }}">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                Home
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="menu_section">
                    <h3>Management</h3>
    
                    {{--This is how Im freakingly activate nav items--}}
                    @php ($emp = '')
                    @php ($app = '')
                    @php ($stor = '') 
                    @php ($qf = '') 
                    
                    @if(!empty($employee))
                        @if (isset($employee[0]))
                            @php ($emp = $employee[0]->id)
                        @elseif(isset($employee))
                            @php ($emp = $employee->id)
                        @endif
                    @endif
                    @if(!empty($appointment))
                        @php ($app = $appointment->id)
                    @endif
                    @if(!empty($stores))
                        @php ($stor = $stores->id)
                    @endif
                    {{-- @if(!empty($questionsforum))
                        @php ($qf = $questionsforum->id)
                    @endif --}}
    
                    <ul class="nav side-menu">
                        <li class="@if (Request::is('director/employees') || Request::is('director/diagnosis/add')) active @endif">
                            <a href="{{ route('director.employees') }}">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                {{ "Employees" }}
                            </a>
                        </li>
                        <li class="@if (Request::is('director/diagnosis') || Request::is('director/diagnosis/add')) active @endif">
                            <a href="{{ route('director.patients') }}">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                {{ "Patients" }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('director.doctors') }}">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                {{ "Doctors" }}
                            </a>
                        </li>
                        <li class="@if (Request::is('director/appointments/add') || Request::is('director/appointments/'.$app.'/edit') || Request::is('director/appointments/'.$app)) active @endif">
                            <a href="{{ route('director.appointments') }}">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                {{ "Appointments" }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('director.services') }}">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                {{ "Services" }}
                            </a>
                        </li>
                        <li class="@if (Request::is('director/store/add') || Request::is('director/store/edit/'.$stor) || Request::is('director/store/'.$stor)) active @endif">
                            <a href="{{ route('director.store') }}">
                                <i class="fa fa-sitemap" aria-hidden="true"></i>
                                {{ "Store" }}
                            </a>
                        </li>
                        <li class="@if (Request::is('director/question_forum/add') || Request::is('director/question_forum/edit/'.$qf) || Request::is('director/question_forum/'.$qf)) active @endif">
                            <a href="{{ route('director.question_forum') }}">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                {{ "Question Forum" }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /sidebar menu -->
        </div>
    </div>
    