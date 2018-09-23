@extends('admin.layouts.admin')
@section('content')
    <div class="row title-section">
        <div class="col-12 col-md-8">
        @section('title', "Service Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="{{ route('admin.services.add') }}" class="btn btn-primary">Add Service</a>
            </div>
            <div class="right-searchbar">
                <form action="searchservice" method="post" class="form-inline active-cyan-3">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Search service" name="search" required>
                        <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        @if ($services->isEmpty())
        <div class="alert alert-danger" role="alert">
                <p>Not have Data in service table</p>
        </div>
        @else
        @foreach($services as $service)
            <div class="col-xs-6 col-sm-3">
                <div class="card">
                    <div class="row">
                        <div class="card-header" style="margin-top: 20px; margin-bottom: 20px;">
                            <div class="col-xs-6 col-md-4 col-lg-4 vcenter emp-avator" style="height: 90px; width: 90px;" >
                                <img src="\image\service\item\{{ $service->pic }}" alt="Pic" height="90px" width="90px">
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
                    <div class="card-body text-center">
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.services.show',[$service->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="{{  route('admin.services.edit',[$service->id]) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-xs btn-danger" href="{{ route('admin.services.delete',[$service->id]) }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                        
                    </div>
                </div>
            </div>
            
        @endforeach
        @endif
    </div>
@endsection