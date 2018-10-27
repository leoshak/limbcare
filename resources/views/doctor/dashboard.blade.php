@extends('doctor.layouts.doctor')

@section('content')
    <!-- page content -->
    <!-- top tiles -->
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

@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
