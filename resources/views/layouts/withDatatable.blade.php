<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <script src="https://kit.fontawesome.com/34ae9aae12.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- Datatables libraries --}}
    <link 
        rel="stylesheet" 
        type="text/css"
        href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link 
        rel="stylesheet" 
        type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
        <link 
        rel="stylesheet" 
        type="text/css"
        href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    
    <script 
        type="text/javascript" 
        src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js">
    </script>

    <meta charset="utf-8">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FIMS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }} defer"></script>

    <!-- Fonts -->


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm navbar-dark shadow-sm" style="background-color:rgb(24, 24, 24);">
            <div class="container">
                @if (Auth::user()->position == 'Admin')
                    <a class="navbar-brand" href="{{ url('/admin_home') }}">
                        FIMS
                    </a>
                @elseif (Auth::user()->position == 'Staff')
                    <a class="navbar-brand" href="{{ url('/staff_home') }}">
                        FIMS
                    </a>
                @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                        FIMS
                    </a>
                @endif

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <div class="col-md-9">
                        <ul class="navbar-nav mr-auto">


                            @if (Auth::user()->position == 'Admin')
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="/stock">Inventory</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/item_approvals/userList">Approve</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/mngNewStck">Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/auditreport">Report</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="/request/list">Request</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Right Side Of Navbar -->
                    <div class="col-md-3 pl-4">
                        <ul class="navbar-nav ml-5">
                            <!-- Authentication Links -->

                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        {{ Auth::user()->name }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <form id="logout-form" action="/logout" method="GET">
                                        @csrf
                                        <div class="pt-2">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-sign-out-alt fa-lg"></i></button>
                                        </div>
                                    </form>
                                </li>

                            @endguest
                        </ul>
                    </div>
                </div>
        </nav>
    </div>

    <main>
        <div style="display: flex; min-height: 110vh;flex-direction: column;padding-top:20px;">
            @yield('content')
        </div>
    </main>
    </div>

</body>
@if (Auth::user()->position == 'Staff')

    <footer id=" footer" class="footer text-light font-small sticky-bottom" style="background-color:rgb(12, 100, 173);">
    @else
        <footer id="footer" class="footer text-light font-small sticky-bottom"
            style="background-color:rgb(24, 24, 24);">
@endif


<div class=" container">
    <div class="row center">
        <div class="col-md-12 text-center">
            <p>Copyright Nova 2021. All rights reserved.</p>
        </div>
    </div>

</div>



</footer>


</html>
