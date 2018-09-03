@extends('admin.layouts.admin')

@section('title', "Employee Management")

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  cellspacing="0" width="100%" border="0">
            <thead>
            <tr>
                {{-- <th>@sortablelink('email', __('views.admin.users.index.table_header_0'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('name',  __('views.admin.users.index.table_header_1'),['page' => $users->currentPage()])</th>
                <th>{{ __('views.admin.users.index.table_header_2') }}</th>
                <th>@sortablelink('active', __('views.admin.users.index.table_header_3'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('confirmed', __('views.admin.users.index.table_header_4'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('created_at', __('views.admin.users.index.table_header_5'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('updated_at', __('views.admin.users.index.table_header_6'),['page' => $users->currentPage()])</th> --}}
                <th>Actions</th>
                <td>
                    <div class="emptable">
                    <input type="text" placeholder="Search Employee" name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </td>
            </tr>
            </thead>
            <tbody>
            {{-- @foreach($users as $user) --}}
                <tr>
                        {{-- $user->email --}}
                    <td>{{ 'Hello employee' }}</td>

                </tr>
            {{-- @endforeach --}}
            </tbody>
        </table>
        <div class="pull-right">
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
@endsection
@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection