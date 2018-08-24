@extends('admin.layouts.admin')

@section('title', "Appointments")

@section('content')
    <div class="row">
        {{-- <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr> --}}
                {{-- <th>@sortablelink('email', __('views.admin.users.index.table_header_0'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('name',  __('views.admin.users.index.table_header_1'),['page' => $users->currentPage()])</th>
                <th>{{ __('views.admin.users.index.table_header_2') }}</th>
                <th>@sortablelink('active', __('views.admin.users.index.table_header_3'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('confirmed', __('views.admin.users.index.table_header_4'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('created_at', __('views.admin.users.index.table_header_5'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('updated_at', __('views.admin.users.index.table_header_6'),['page' => $users->currentPage()])</th> --}}
                {{-- <th>Actions</th>
            </tr>
            </thead>
            <tbody> --}}
            {{-- @foreach($users as $user) --}}
                {{-- <tr> --}}
                        {{-- $user->email --}}
                    {{-- <td>Appointment</td> --}}
                    {{-- <td>{{ $user->name }}</td>
                    <td>{{ $user->roles->pluck('name')->implode(',') }}</td>
                    <td>
                        @if($user->active)
                            <span class="label label-primary">{{ __('views.admin.users.index.active') }}</span>
                        @else
                            <span class="label label-danger">{{ __('views.admin.users.index.inactive') }}</span>
                        @endif
                    </td>
                    <td>
                        @if($user->confirmed)
                            <span class="label label-success">{{ __('views.admin.users.index.confirmed') }}</span>
                        @else
                            <span class="label label-warning">{{ __('views.admin.users.index.not_confirmed') }}</span>
                        @endif</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        {{--@if(!$user->hasRole('administrator'))--}}
                            {{--<button class="btn btn-xs btn-danger user_destroy"--}}
                                    {{--data-url="{{ route('admin.users.destroy', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.delete') }}">--}}
                                {{--<i class="fa fa-trash"></i>--}}
                            {{--</button>--}}
                        {{--@endif--}}
                    {{-- </td>
                </tr> --}}
            {{-- @endforeach --}}
            {{-- </tbody>
        </table> --}}
        {{-- <div id="myModal" class="modal fade in" style="display: block; margin-top: 160px; margin-left: 100px;">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="icon-box">
                                <i class="fa fa-trash"></i>
                            </div>				
                            <h4 class="modal-title">Are you sure?</h4>	
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <p>Do you really want to delete appointment id A76? This process cannot be undone.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <form>
                            <div class="form-group">
                                <label for="inputAddress">Appointment ID</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="">
                            </div>
                            <div class="container">
                                    <div class="form-group">
                                        <label for="inputAddress2">Date and Time</label>
                                        <div class='input-group date' id='datetimepicker5'>
                                                <input type='text' class="form-control" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                    </div>
                                </div>
                            <div class="form-group">
                              <label for="inputAddress2">Appointment Type</label>
                              <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>Director</option>
                                <option>Receptionist</option>
                                <option>PNO</option>
                              </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Clear</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                          </form>
                        </div> --}}
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                    <thead> 
                    <tr>
                        <th>@sortablelink('id', "ID",['page' => ''])</th>
                        <th>@sortablelink('date', "Date",['page' => ''])</th>
                        <th>@sortablelink('name', "Name",['page' => ''])</th>
                        <th>@sortablelink('type', "Type",['page' => ''])</th>
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
                                <a class="btn btn-xs btn-primary" href="">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-xs btn-danger" href="">
                                    <i class="fa fa-trash"></i>
                                </a>
                                {{--@if(!$user->hasRole('administrator'))--}}
                                    {{--<button class="btn btn-xs btn-danger user_destroy"--}}
                                            {{--data-url="{{ route('admin.users.destroy', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.delete') }}">--}}
                                        {{--<i class="fa fa-trash"></i>--}}
                                    {{--</button>--}}
                                {{--@endif--}}
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
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
@endsection