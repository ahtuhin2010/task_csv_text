@extends('layouts.back.master')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>User List
                        <small>Task Name: Create Read Update Delete Operation</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">User List</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>View User List</h5>
        </div>
        <div class="card-body vendor-table">
            <table class="display" id="basic-1">
                <thead>
                <tr>
                    <th>SL.</th>
                    <th>Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $key=> $value)

                        <tr class="{{ $value->id }}">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->number }}</td>
                            <td>{{ $value->first_name }}</td>
                            <td>{{ $value->last_name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->state }}</td>
                            <td>{{ $value->zip }}</td>
                            <td>{{ date('h:i:s A d-m-Y', strtotime($value->created_at)) }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
