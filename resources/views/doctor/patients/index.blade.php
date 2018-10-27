@extends('doctor.layouts.doctor')


@section('content')
    <link href="{{ asset('admin/css/userstyles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%" border="0">
            <thead>
            <tr>
                
                   


            </tr>
            </thead>
        </table>
        <div class="col-12 col-md-8">
            @section('title', "Patient Management")
            </div>
    <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="{{ route('doctor.diagnosis.index') }}" class="btn btn-primary"> diagnosis card</a>
            </div>
            <div class="right-searchbar">
                <!-- Search form -->
                
            </div>
        </div>
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif

            <div class="row">
                @foreach($patients as $patient)

            <div class="col-xs-6 col-sm-3">
                <div class="dcard">
                    <div class="row">
                        <div class="dcard-header">
                            
                        <br/>
                            <div class="dcard-body text-center">
                                <img src="\image\pat\profile\{{ $patient->pat_pic }}" alt="Pic" height="90" width="90"class="img-circle">
                            </div>
                            <div class="dcard-body text-center" style="font-size: larger; color: white">
                                <span class="dcard-title ">Name :{{ $patient->name }}</span><br />
                                <span class="dcard-title ">mobile :{{ $patient->mobile }}</span><br />
                                <span class="dcard-title ">address :{{ $patient->address }}</span><br />
                            </div>
                            {{-- <span class="card-img">{{ HTML::image('img/nickfrost.jpg', 'Pic') }}</span> --}}

                        </div>
                    </div>
                    
                </div>
            </div>
            @endforeach

        <div class="pull-right">
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
@endsection
@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}


@endsection