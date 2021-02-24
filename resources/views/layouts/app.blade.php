<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>sanctuaryforhumanity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/reset.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/responsive.css')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css">
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('/css/editor.css')}}"/>--}}


    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">--}}
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">--}}

    {{--    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">--}}
    <meta name="apple-mobile-web-app-title" content="CodePen">
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css">--}}

    <style>
        #selectedFiles {
            display: flex;
        }

        #selectedFiles img {
            max-width: 125px;
            max-height: 125px;
            float: left;
            margin-bottom: 10px;
        }

    </style>
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>--}}
</head>
<body translate="no">
<div class="page-bg"></div>
<div class="position-relative">
    <header class="header-inner">
        <div class="container">
            <div class="modalOpen"></div>
            <div class="navbar-expand-md navbar-dark">
                <div class="flex-row d-flex">
                    <!--                    <h1><a class="navbar-brand" href="home.html"><img src="images/logo.png" class="img-fluid logo"-->
                    <!--                                                                      alt="logo" title="logo"></a></h1>-->
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="menu-box">

                    <div class="navbar-collapse collapse" id="collapsingNavbar">
                        <ul>
                            <li>
                                <a href="{{route('home')}}" class="active-item">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{route('network')}}">
                                    The Network
                                </a>
                            </li>
                            <li>
                                <a href="{{route('contribute')}}">
                                    Contributors
                                </a>
                            </li>
                            <li>
                                @guest <a href="{{route('login')}}">
                                    Members
                                </a>
                                @endguest
                                @auth
                                    <a href="{{route('members')}}">
                                        Members
                                    </a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="registration-banner">

                    <div class="d-flex">
                        <svg data-bbox="7 3 36 45" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" height="50"
                             width="50" data-type="shape">
                            <g>
                                <path
                                    d="M38.473 34.564L43 39.273v2.298H7v-2.298l4.527-4.71V22.959c0-3.662.88-6.82 2.64-9.474 1.797-2.729 4.294-4.504 7.492-5.326V6.532c0-.972.323-1.803.97-2.495C23.275 3.346 24.066 3 25 3c.934 0 1.734.346 2.398 1.037.665.692.997 1.523.997 2.495v1.626c3.162.822 5.64 2.616 7.437 5.382 1.76 2.654 2.641 5.793 2.641 9.418v11.606zM25 48c-1.364 0-2.523-.47-3.477-1.411-.955-.94-1.432-2.078-1.432-3.41h9.818c0 1.332-.487 2.47-1.46 3.41C27.473 47.529 26.324 48 25 48z"
                                    fill-rule="evenodd"></path>
                            </g>
                        </svg>
                        @guest
                            <a class="nav-link" style="color:white;font-size:15px;" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @else
                            @if(Auth::user()->avatar_url)<img src="{{asset('images/'.Auth::user()->avatar_url)}}"
                                                              width="30px" height="30px">@endif

                            {{--                        <svg data-bbox="0 0 50 50" data-type="shape" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" class="dropIcon">--}}
                            {{--                            <g>--}}
                            {{--                                <path d="M25 48.077c-5.924 0-11.31-2.252-15.396-5.921 2.254-5.362 7.492-8.267 15.373-8.267 7.889 0 13.139 3.044 15.408 8.418-4.084 3.659-9.471 5.77-15.385 5.77m.278-35.3c4.927 0 8.611 3.812 8.611 8.878 0 5.21-3.875 9.456-8.611 9.456s-8.611-4.246-8.611-9.456c0-5.066 3.684-8.878 8.611-8.878M25 0C11.193 0 0 11.193 0 25c0 .915.056 1.816.152 2.705.032.295.091.581.133.873.085.589.173 1.176.298 1.751.073.338.169.665.256.997.135.515.273 1.027.439 1.529.114.342.243.675.37 1.01.18.476.369.945.577 1.406.149.331.308.657.472.98.225.446.463.883.714 1.313.182.312.365.619.56.922.272.423.56.832.856 1.237.207.284.41.568.629.841.325.408.671.796 1.02 1.182.22.244.432.494.662.728.405.415.833.801 1.265 1.186.173.154.329.325.507.475l.004-.011A24.886 24.886 0 0 0 25 50a24.881 24.881 0 0 0 16.069-5.861.126.126 0 0 1 .003.01c.172-.144.324-.309.49-.458.442-.392.88-.787 1.293-1.209.228-.232.437-.479.655-.72.352-.389.701-.78 1.028-1.191.218-.272.421-.556.627-.838.297-.405.587-.816.859-1.24a26.104 26.104 0 0 0 1.748-3.216c.208-.461.398-.93.579-1.406.127-.336.256-.669.369-1.012.167-.502.305-1.014.44-1.53.087-.332.183-.659.256-.996.126-.576.214-1.164.299-1.754.042-.292.101-.577.133-.872.095-.89.152-1.791.152-2.707C50 11.193 38.807 0 25 0"></path>--}}
                            {{--                            </g>--}}
                            {{--                        </svg>--}}

                            <button type="button" class="btn-generic profile-arrow  dropdown-toggle"
                                    @guest data-toggle="modal" @else data-toggle="dropdown"
                                    @endguest aria-haspopup="true" aria-expanded="false"
                                    @guest data-target=".login-modal"@endguest>
                                <svg width="14" height="8" viewBox="0 0 14 8">
                                    <path
                                        d="M1.707.293L.293 1.707l6 6a1 1 0 001.397.016l6-5.726L12.31.55 7.016 5.602 1.707.292z"></path>
                                </svg>


                            </button>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" @if(Auth::user()->is_admin===1) href="{{route('admin.dashboard')}}"@else href="{{route('profile')}}" @endif>Profile</a>
                                <a class="dropdown-item" @if(Auth::user()->is_admin===1) href="{{route('profile')}}" @endif>My Account</a>
                                <a class="logout-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <div class="dropdown-divider"></div>
                            </div>
                        @endguest
                    </div>
                    <div class="col-xs-12">
                        <div class="console"></div>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}
{{--<script src="{{ asset('js/editor.js') }}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $("#txtEditor").Editor();--}}
{{--    });--}}
{{--</script>--}}
</body>
</html>
