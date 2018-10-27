<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('admin.dashboard') }}" class="site_title">
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
                        <a href="{{ route('admin.dashboard') }}">
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
                @if(!empty($questionsforum))
                    @if(!empty($questionsforum->id))
                        @php ($qf =  $questionsforum->id)
                    @endif
                @endif 

                <ul class="nav side-menu">
                    <li class="@if (Request::is('admin/employees/add') || Request::is('admin/employees/'.$emp.'/edit') || Request::is('admin/employees/'.$emp)) active @endif">
                        <a href="{{ route('admin.employees') }}">
                            <i class="fa fa-id-badge" aria-hidden="true"></i>
                            {{ "Employees" }}
                        </a>
                    </li>
                    <li class="@if (Request::is('admin/diagnosis') || Request::is('admin/diagnosis/add')) active @endif">
                        <a href="{{ route('admin.patients') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            {{ "Patients" }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.doctors') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            {{ "Doctors" }}
                        </a>
                    </li>
                    <li class="@if (Request::is('admin/appointments/add') || Request::is('admin/appointments/'.$app.'/edit') || Request::is('admin/appointments/'.$app)) active @endif">
                        <a href="{{ route('admin.appointments') }}">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            {{ "Appointments" }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.services') }}">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            {{ "Services" }}
                        </a>
                    </li>
                    <li class="@if (Request::is('admin/financial')) active @endif">
                        <a href="{{ route('admin.financial') }}">
                            <i class="fa fa-money" aria-hidden="true"></i>
                            {{ "Financial" }}
                        </a>
                    </li>
                    <li class="@if (Request::is('admin/store/add') || Request::is('admin/store/edit/'.$stor) || Request::is('admin/store/'.$stor)) active @endif">
                        <a href="{{ route('admin.store') }}">
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                            {{ "Store" }}
                        </a>
                    </li>
                    <li class="@if (Request::is('admin/question_forum/add') || Request::is('admin/question_forum/edit/'.$qf) || Request::is('admin/question_forum/'.$qf)) active @endif">
                        <a href="{{ route('admin.question_forum') }}">
                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                            {{ "Question Forum" }}
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('admin.users') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_1_1') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.permissions') }}">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_1_2') }}
                        </a>
                    </li> --}}
                </ul>
            </div>
            {{-- <div class="menu_section">
                <h3>{{ __('views.backend.section.navigation.sub_header_2') }}</h3>

                <ul class="nav side-menu">
                    <li>
                        <a>
                            <i class="fa fa-list"></i>
                            {{ __('views.backend.section.navigation.menu_2_1') }}
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ route('log-viewer::dashboard') }}">
                                    {{ __('views.backend.section.navigation.menu_2_2') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('log-viewer::logs.list') }}">
                                    {{ __('views.backend.section.navigation.menu_2_3') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>{{ __('views.backend.section.navigation.sub_header_3') }}</h3>
                <ul class="nav side-menu">
                  <li>
                      <a href="http://netlicensing.io/?utm_source=Laravel_Boilerplate&utm_medium=github&utm_campaign=laravel_boilerplate&utm_content=credits" target="_blank" title="Online Software License Management"><i class="fa fa-lock" aria-hidden="true"></i>NetLicensing</a>
                  </li>
                  <li>
                      <a href="https://photolancer.zone/?utm_source=Laravel_Boilerplate&utm_medium=github&utm_campaign=laravel_boilerplate&utm_content=credits" target="_blank" title="Individual digital content for your next campaign"><i class="fa fa-camera-retro" aria-hidden="true"></i>Photolancer Zone</a>
                  </li>
                </ul>
            </div> --}}
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
