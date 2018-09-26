@extends('layouts.welcome')

@section('content')
    <div class="title m-b-md">
        {{ "services" }}
    </div>
    <div class="m-b-md">

    </div>
    <div class="row">
            <div><h1>Service </h1></div>
            @if ($services->isEmpty())
            <div class="alert alert-danger" role="alert">
                    <p>Not have Data in service table</p>
            </div>
            @else
            @foreach($services as $service)
                <div class="col-xs-6">
                            <div class="card-header" style="margin-top: 20px; margin-bottom: 20px;">
                                <div class="col-xs-6 col-md-4 col-lg-4 vcenter emp-avator"  >
                                    <img src="\image\service\item\{{ $service->pic }}" alt="Pic" height="250px" >
                                </div>
                                {{-- <span class="card-img">{{ HTML::image('img/nickfrost.jpg', 'Pic') }}</span> --}}
                                <div class="col-xs-6 col-md-8 col-lg-8 vcenter emp-details">
                                    <span class="text-primary bg-primary">Service name </span><br />
                                    <span class="text-light bg-success">{{ $service->serviceName }}</span><br />
                                    <span class="text-primary bg-primary">Service type</span><br />
                                    <span class="text-light bg-success">{{ $service->type }}</span>
                                </div>
                            </div>
                        
                        
                </div>
        
            @endforeach
            @endif
        </div>
@endsection