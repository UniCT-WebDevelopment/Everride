<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style type="text/css" >

            .py-4{

                
                background : transparent;
            }
            body{
                background : transparent;
            }
            html{
                
                background: url(/img/Picto-Map_png2%.png);
                background-color:#EEE9E1 ;
                
                background-repeat: repeat;
                background-size: 50% ;
                margin-top : 8% ;
            }
            .navbar-custom {
                background-color: #21140C;
            }
            a{
                color : brown;
                
            }
            a:hover {
                color: #e60000;
                text-decoration: none;
            }

            .titolo{
                color : #FFD700;
                text-transform: uppercase;
                letter-spacing: 3px;
            }
            .colorbutton{
                
                background-color : #301C10;
            }
            .colorbutton:hover{
                
                background-color : #b30000;
            }
            .colorbutton2{
                
                -webkit-writing-mode: horizontal-tb !important;
                text-rendering: auto;
                color: none;
                letter-spacing: normal;
                word-spacing: normal;
                text-transform: none;
                text-indent: 0px;
                text-shadow: none;
                display: inline-block;
                text-align: center;
                align-items: flex-start;
                cursor: default;
                box-sizing: border-box;
                margin: 0em;
                font: 400 13.3333px Arial;
                padding: 0px 0px;
                border-width: 0px;
                border-style: outset;
                border-image: initial;
                background-color : transparent;
                border-color: none;
                box-shadow: none;
               
            }

            .colorbutton2:hover{
                
                background-color : transparent;
            }
            .colorbutton2:active{
                
            }
            .colorbutton2:focus{
                outline: none;
                border-color: black;
                box-shadow: transparent;
            }

            .btn2 {
                display: inline-block;
                font-weight: 400;
                color: #212529;
                text-align: center;
                vertical-align: middle;
                cursor: pointer;
                -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                        user-select: none;
                background-color: transparent;
                border: 0px solid transparent;
                padding: 0rem 0rem;
                font-size: 0.9rem;
                line-height: 1.6;
                border-radius: 0.25rem;
                transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }

    </style>

@yield('head')


</head>
<body @yield('body')>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm fixed-top navbar-custom ">
            <div class="container">
                <a class="navbar-brand d-flex"  href="{{ url('/') }}">
                    
                    <div class="pl-1 pt-1 titolo"> <h4>{{ config('app.name', 'Laravel') }}</h4></div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav" style=" margin-left: 27%">
                                    <div >
                                        <form class="form-inline form-control-lg" method="GET" action="/profile/search/">

                                            <div><input class="mr-2" type="text" name="key" required="inerisci un nome "></div> 
                                            <div><button class="btn btn-secondary btn-sm" type="submit">Search</button></div>
                                        </form>
                                    </div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto d-flex align-self-stretch">
                    
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
                                    <span class="" style="color: #FFD700 ; font-size:18px ; cursor: pointer;" onclick="window.location='/profile/{{ Auth::user()->id }}';">{{ Auth::user()->username }}</span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            
                            <li class="nav-item dropdown pl-2">
                                
                                <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="" style="color: #FFD700 ; font-size:18px">add+</span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <a class="dropdown-item" href="/p/create">Add New Post</a> 
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/garage/create">Add New vehicle</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/maps/create">Add New Track</a>
                                    </a>

                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
