@extends('admin.layouts.admin')
@section('title', "Services Management")

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>Services Image</th>
                <td><img height="200" width="200" src="\image\service\item\{{$Services->pic}}" class="user-profile-image"></td>
            </tr>

            <tr>
                <th>Services name</th>
                <td>{{ $Services->serviceName }}</td>
            </tr>

            <tr>
                <th>Services type</th>
                <td>
                        {{ $Services->type }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>Services description</th>
                <td>
                    {{ ($Services->description)}} 
                </td>
            </tr>
            </tbody>
        </table>
        <a href="{{ route('admin.services') }}" class="btn btn-danger">Store home</a>
        <a class="btn btn-info" href="{{ route('admin.services.edit',[$Services->id]) }}">Edit</a>
    </div>
@endsection