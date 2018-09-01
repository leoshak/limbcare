@extends('admin.layouts.admin')
@section('title', "Store")

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>{{ __('views.admin.users.show.table_header_0') }}</th>
                <td><img height="200" width="200" src="\image\store\item\{{ $stores->pic }}" class="user-profile-image"></td>
            </tr>

            <tr>
                <th>Iteam name</th>
                <td>{{ $stores->iteamname }}</td>
            </tr>

            <tr>
                <th>Iteam company</th>
                <td>
                        {{ $stores->company }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>Iteam quantity</th>
                <td>
                    {{ ($stores->iteam_quantity)}} {{($stores->quantity_type) }}
                </td>
            </tr>
            <tr>
                <th>Iteam max</th>
                <td>
                        {{ ($stores->iteam_max)}}{{($stores->quantity_type) }}
                        
                </td>
            </tr>
            <tr>
                <th>Iteam min</th>
                <td>
                        {{ ($stores->iteam_min)}}{{($stores->quantity_type) }}
                        
                </td>
            </tr>
            
            </tbody>
        </table>
        <a href="{{ route('admin.store') }}" class="btn btn-danger">Store home</a>
        <a class="btn btn-info" href="{{ route('admin.store.edit',[$stores->id]) }}">edit</a>
    </div>
@endsection