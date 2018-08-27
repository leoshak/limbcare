@extends('admin.layouts.admin')
@section('content')
    <div class="row title-section">
        <div class="col-12 col-md-8">
        @section('title', "Service Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="{{ route('admin.services') }}" class="btn btn-primary">Add diagnosis card</a>
            </div>
            <div class="right-searchbar">
                <!-- Search form -->
                <form class="form-inline active-cyan-3">
                    <input class="form-control form-control-sm ml-3 w-100" type="text" placeholder="Search" aria-label="Search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                    <thead> 
                    <tr>
                        <th>ID</th>
                        <th>Pation name</th>
                        <th>Srvice</th>
                        <th></th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>AD06857</td>
                            <td>2009/05/18</td>
                            <td>A. Priyadarshani</td>
                            <td>Repair</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.services') }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.services') }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-xs btn-danger" href="{{ route('admin.services') }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>AD2217</td>
                            <td>2014/01/12</td>
                            <td>C. Rathnayake</td>
                            <td>New</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-xs btn-danger" href="">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
        <div class="pull-right">
        </div>
    </div>
@endsection