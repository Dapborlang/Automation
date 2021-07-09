<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Automation System</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('script')
</head>
<body>
    <div id="app">
        <div class="fixed-top">
            <div style="width:100%; height: 75px;" class="text-center bg-light">       
                <span style="font-size: 22px; margin-top: 25px" >Welcome to RD Automation System</span>  
            </div>
            <nav class="navbar navbar-expand-md bg-primary navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Automation
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                        @auth
                        @foreach(Auth::user()->role as $item)
                            @if($item->role == 'ADM')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Form
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/') }}/formpopulate/create">Create</a>
                                    <a class="dropdown-item" href="{{ url('/') }}/formpopulate">View/Edit</a>  
                                </div>
                            </li>
                            @endif
                            @if($item->role == 'MRC')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Report
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/') }}/mrt/rc_report">Print Recharge</a>
                                </div>
                            </li>
                            @endif
                            
                        @endforeach
                        @foreach(Auth::user()->Uri as $item)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        {{$item->uri_header}}
                                    </a>
                                    <div class="dropdown-menu">
                                    @if(isset($item->listUri))
                                    @foreach($item->listUri as $item1)
                                        <a class="dropdown-item" href="{{ url('/') }}/{{$item1->uri}}">{{$item1->label}}</a>
                                    @endforeach
                                    @endif
                                    </div>
                                </li>
                            @endforeach
                        @endauth
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ url('/') }}/profile">Profile</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <main class="py-4" style="margin-top: 120px">
        <div class="row">
        @auth 
            <div class="col-sm-3 col-md-3 col-lg-2 border-right" style="max-height:80vh; padding-left:20px; margin-top:-11px; padding-right:10px ">
            @foreach(Auth::user()->role as $item)
                <div class="list-group list-group-flush">
                @foreach($item->link as $item1)
                    <div class="dropdown list-group-item list-group-item-primary" style="padding-left:5px; padding-top:1px; padding-bottom:1px; padding-right:0px">
                        <a href="#" class="btn btn-info btn-block dropdown-toggle"  data-toggle="dropdown">
                            {{$item1->header}}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('/') }}/formbuilder/{{$item1->id}}/create">Create</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/') }}/formbuilder/{{$item1->id}}">View/Edit</a>
                        </div>
                    </div>
                @endforeach
                </div>
            @endforeach
            </div>
        @endauth
            <div class="col-sm-9 col-md-9 col-lg-10">
                @yield('content')
            </div>
        </div>
           
        </main>
    </div>
</body>
</html>
