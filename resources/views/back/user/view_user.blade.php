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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key=> $value)

                        <tr class="{{ $value->id }}">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ date('h:i:s A d-m-Y', strtotime($value->created_at)) }}</td>
                            <td>
                                @if($value->status == 1)
                                <span class="badge badge-pill badge-success"> Active User</span>
                                @else
                                <span class="badge badge-pill badge-danger"> InActive User</span>
                                @endif
                            </td>
                            <td>
                                <a title="Edit" id="" class="btn btn-success mr-2" href="{{ route('user.edit', $value->id) }}"><i class="fa fa-eye"></i></a>

                                <a title="Delete" id="delete" class="btn btn-danger" href="{{ route('user.delete') }}" data-token="{{csrf_token()}}" data-id="{{ $value->id }}"><i class="fa fa-trash"></i></a>

                                @if($value->status == 1)
                                <a href="{{ route('user.inactive',$value->id) }}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                                @else
                                <a href="{{ route('user.active',$value->id) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
