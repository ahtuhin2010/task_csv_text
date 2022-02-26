<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.back.top')
</head>

<body>

<!-- page-wrapper Start-->
<div class="page-wrapper">

    <!-- Page Header Start-->
    @include('layouts.back.header')
    <!-- Page Header Ends -->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

        <!-- Page Sidebar Start-->
        @include('layouts.back.leftSidebar')
        <!-- Page Sidebar Ends-->


        <div class="page-body">

        @yield('content')

        @if(session()->has('success'))
        <script class="text/javascript">
            $(function() {
                $.notify("{{ session()->get('success') }}", {
                    globalPosition: 'top right',
                    className: 'success'
                });
            });
        </script>
        @endif
        @if(session()->has('error'))
        <script class="text/javascript">
            $(function() {
                $.notify("{{ session()->get('error') }}", {
                    globalPosition: 'top right',
                    className: 'error'
                });
            });
        </script>
        @endif
        <!-- Notify function End -->

        </div>

        <!-- footer start-->
        @include('layouts.back.footer')
        <!-- footer end-->
    </div>

</div>

@include('layouts.back.bottom')
@yield('scripts')

</body>
</html>
