@extends('admin.layouts.admin')

@section('content')
    <div class="row title-section">
        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
            @section('title', "Appointments")
        </div>
        <div class=".col-xs-6 .col-lg-4 searchbar-addbt">
            <div class="topicbar">
                {{-- <a href="{{ route('admin.employees.add') }}" class="btn btn-primary">Add Employee</a> --}}
                {{ link_to_route('admin.appointments.add', 'Add Appointment', null, ['class' => 'btn btn-primary']) }}
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
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
            <thead> 
            <tr>
                <th>@sortablelink('id', "ID",['page' => ''])</th>
                <th>@sortablelink('date', "Date",['page' => ''])</th>
                <th>@sortablelink('time', "Time",['page' => ''])</th>
                <th>@sortablelink('name', "Name",['page' => ''])</th>
                <th>@sortablelink('type', "Type",['page' => ''])</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->type }}</td>
                        <td>
                            {{-- {!! Form::open(array('route' => ['admin.appointments.delete', $appointment->id], 'method' => 'DELETE')) !!} --}}
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.appointments.show', [$appointment->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.appointments.edit', [$appointment->id]) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-xs btn-danger" href="{{ route('admin.appointments.delete', $appointment->id) }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                                {{-- {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger', 'type' => 'submit', 'style'=> 'width: 18px; height: 22px;']) !!}
                            {!! Form::close() !!} --}}
                            {{--@if(!$user->hasRole('administrator'))--}}
                                {{--<button class="btn btn-xs btn-danger user_destroy"--}}
                                        {{--data-url="{{ route('admin.users.destroy', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.delete') }}">--}}
                                    {{--<i class="fa fa-trash"></i>--}}
                                {{--</button>--}}
                            {{--@endif--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style('assets/admin/css/my_style.css') }}
@endsection