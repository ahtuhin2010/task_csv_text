
<div class="page-sidebar">
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up" src="{{ asset('backend/images/dashboard/man.png') }}" alt="#">
            </div>
            <h6 class="mt-3 f-14">{{ auth()->user()->name }}</h6>
            <p>{{ auth()->user()->email }}</p>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a class="sidebar-header" href="{{ route('dashboard') }}"><i data-feather="home"></i><span>Dashboard</span></a>
            </li>

            @if (Auth::user()->usertype == 'Admin')
            <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>User List</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('user.all') }}"><i class="fa fa-circle"></i>All User</a></li>
                    <li><a href="{{ route('user.add') }}"><i class="fa fa-circle"></i>Add User</a></li>
                </ul>
            </li>
            @else
            @endif

            @if (Auth::user()->usertype == 'User' && Auth::user()->status == 1)
            <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>File List</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('file_group.all') }}"><i class="fa fa-circle"></i>File & Group Info</a></li>
                    <li><a href="{{ route('file.add') }}"><i class="fa fa-circle"></i>Add File</a></li>
                </ul>
            </li>
            @else
            @endif

        </ul>
    </div>
</div>
