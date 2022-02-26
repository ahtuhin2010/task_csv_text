@extends('layouts.back.master')
@section('content')


<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Dashboard
                        <small>Task Name: Create Read Update Delete Operation</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            @if(Auth::user()->usertype == 'Admin')
            <h3>Admin Panel</h3>
            @else
            <h3>User Panel</h3>
            @endif
        </div>
        <div class="card-body vendor-table" style="text-align: center">
            <h3>Name: {{ auth()->user()->name }}</h3><br>
            <h3>Email: {{ auth()->user()->email }}</h3>

            <br><br>

            <hr>

            <br><br>

            @if(Auth::user()->usertype == 'User')

            <div class="row">
                <div class="col-xl-4 col-md-6 xl-50">
                    <div class="card o-hidden  widget-cards" >
                        <div class="bg-secondary card-body">
                            <div class="media static-top-widget">
                                <div class="media-body">
                                    <span class="m-0">Total File</span>
                                    <h3 class="mb-0">
                                        <span class="counter">{{ $file }}</span>
                                    </h3>
                                </div>
                                <div class="icons-widgets">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M12.89 1.45l8 4A2 2 0 0 1 22 7.24v9.53a2 2 0 0 1-1.11 1.79l-8 4a2 2 0 0 1-1.79 0l-8-4a2 2 0 0 1-1.1-1.8V7.24a2 2 0 0 1 1.11-1.79l8-4a2 2 0 0 1 1.78 0z"></path><polyline points="2.32 6.16 12 11 21.68 6.16"></polyline><line x1="12" y1="22.76" x2="12" y2="11"></line></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 xl-50">
                    <div class="card o-hidden widget-cards">
                        <div class="bg-primary card-body">
                            <div class="media static-top-widget">
                                <div class="media-body">
                                    <span class="m-0">Total Group</span>
                                    <h3 class="mb-0">
                                        <span class="counter">{{ $group }}</span>
                                    </h3>
                                </div>
                                <div class="icons-widgets">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 xl-50">
                    <div class="card o-hidden widget-cards">
                        <div class="bg-success card-body">
                            <div class="media static-top-widget">
                                <div class="media-body">
                                    <span class="m-0">Total Contact</span>
                                    <h3 class="mb-0">
                                        <span class="counter">{{ $contact }}</span>
                                    </h3>
                                </div>
                                <div class="icons-widgets">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @else

            @endif


        </div>
    </div>
</div>




@endsection
