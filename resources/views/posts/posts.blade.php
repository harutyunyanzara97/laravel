<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>sanctuaryforhumanity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="userID" content="{{Auth::id() }}">
    @endauth
    <link rel="stylesheet" type="text/css" href="{{asset('/css/reset.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/responsive.css')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    {{--    <script src="{{ mix('js/app.js') }}" defer></script>--}}

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
<div id="app">
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

                                    <a href="{{route('home')}}" class="@if(\Illuminate\Support\Facades\URL::current() === route('home')) active-item @elseif(\Illuminate\Support\Facades\URL::current() === route('profile'))text @endif">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('network')}}" class="@if(\Illuminate\Support\Facades\URL::current() === route('network')) active-item @endif">
                                        The Network
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('contribute')}}" class="@if(\Illuminate\Support\Facades\URL::current() === route('contribute')) active-item @endif">
                                        Contributors
                                    </a>
                                </li>
                                <li>
                                    @guest <a href="{{route('login')}}" class="@if(\Illuminate\Support\Facades\URL::current() === route('login')) active-item @endif">
                                        Members
                                    </a>
                                    @endguest
                                    @auth
                                        <a href="{{route('members')}}" class="@if(\Illuminate\Support\Facades\URL::current() === route('members')) active-item @endif">
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
                                    <a class="dropdown-item " @if(Auth::user()->is_admin===1) href="{{route('admin.dashboard')}}"@else href="{{route('profile')}}" @endif>Profile</a>
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
</div>

    <div class="modal fade login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">

            <!-- Modal Content: begins -->
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Sign Up
                    </h4>
                    <div class="d-flex login-container">
                        <p>
                            Already a member?
                        </p>
                        <button type="button"><a href="{{route('register')}}">Log In</a></button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="block-wrap">

                        <!-- facebook	 -->
                        <div>
                            <a class="btn-fb" href="">
                                <div class="fb-content">
                                    <div class="logo">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                             viewBox="0 0 32 32"
                                             version="1">
                                            <path fill="#FFFFFF"
                                                  d="M32 30a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h28a2 2 0 0 1 2 2v28z"/>
                                            <path fill="#4267b2"
                                                  d="M22 32V20h4l1-5h-5v-2c0-2 1.002-3 3-3h2V5h-4c-3.675 0-6 2.881-6 7v3h-4v5h4v12h5z"/>
                                        </svg>
                                    </div>
                                    <p>Sign in with Facebook</p>
                                </div>
                            </a>
                        </div>
                        <!-- google	 -->
                        <div>
                            <a class="btn-google" href="">
                                <div class="google-content">
                                    <div class="logo">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 48 48">
                                            <defs>
                                                <path id="a"
                                                      d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/>
                                            </defs>
                                            <clipPath id="b">
                                                <use xlink:href="#a" overflow="visible"/>
                                            </clipPath>
                                            <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z"/>
                                            <path clip-path="url(#b)" fill="#EA4335"
                                                  d="M0 11l17 13 7-6.1L48 14V0H0z"/>
                                            <path clip-path="url(#b)" fill="#34A853"
                                                  d="M0 37l30-23 7.9 1L48 0v48H0z"/>
                                            <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/>
                                        </svg>
                                    </div>
                                    <p>Sign in with Google</p>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="position-relative or-row">
                        <p>or</p>
                    </div>
                    <button type="button" class="sign-up">
                        <a href="{{route('register')}}">
                            Sign up with email</a>
                    </button>
                    <div class="position-relative">
                        <div class="custom-control custom-checkbox sign-in-checkbox mt-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                            <label class="custom-control-label" for="customCheck2">Join this site’s
                                community.</label>
                        </div>
                        <div id="read-more">
                            <div class="read-more-article">
                                <p class="moretext">
                                    Connect with members of our site. Leave comments, follow people and more. Your
                                    nickname,
                                    profile image, and public activity will be visible on our site. </p>
                            </div>
                            <a class="moreless-button" href="#">Read more</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal Content: ends -->

        </div>

    </div>

    <div class="network-container">

        <div class="network-section">
            <div class="network-infos">
                <div class="breadcrumb" style="background: transparent !important;">
                    <a href="{{route('network')}}" style="cursor: pointer">
                        The network
                    </a>
                    @if($category)
                        <a href="#">
                            {{$category->name}}
                        </a>
                </div>
                <div class="input-row d-flex align-items-center">
                    <input type="text" class="form-controller" id="searchPost" data-id={{$category->id}} name="search" placeholder="search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         class="_2_hbq desktop-header-search-icon-fill button-hover-fill"
                         data-hook="search-icon" style="fill: white;
    position: absolute;
    top: 24px;
    right: 20px;">
                        <path fill-rule="evenodd"
                              d="M19.854 19.146c.195.196.195.512 0 .708-.196.195-.512.195-.708 0l-3.708-3.709C14.118 17.3 12.391 18 10.5 18 6.358 18 3 14.642 3 10.5 3 6.358 6.358 3 10.5 3c4.142 0 7.5 3.358 7.5 7.5 0 1.891-.7 3.619-1.855 4.938l3.709 3.708zM17 10.5C17 6.91 14.09 4 10.5 4S4 6.91 4 10.5 6.91 17 10.5 17s6.5-2.91 6.5-6.5z"></path>
                    </svg>
                </div>
            </div>
            <div class="main-container">

                @if($category->img_url)
                    <div class="network-panel-overlayy">
                        <img src="{{asset('images/'.$category->img_url)}}" width="100%" height="100%">
                    </div>@endif
                <div class="network-panel">
                    <div class="network-heading">
                        <h2>
                            {{$category->name}}
                        </h2>
                        <p>{{$category->description}}
                        </p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-content-center">
                    <div class="resources-forum-left">
                        <div class="input-row">
                        </div>
                    </div>
                    <div class="resources-forum-right">
                        @auth
                            <a href="{{route('createPost', $category->id)}}" class="comment-btn">
                                Create new post
                            </a>
                        @endauth
                    </div>
                </div>
                @endif
                <div class="network-banner">
                    <table class="postTable myPostTable">
                        <thead class="w-100" style="display: flex;justify-content: space-between;"></thead>
                        <tbody>
                        @if($posts)
                            @foreach($posts as $post)
                                <tr class="bordered_tr" scope="row"
                                    style="color:rgb(255, 255, 255);">
                                    <td><span><div class="avaImg">@if($post->user->avatar_url)<img
                                                    src="{{asset('images/'.$post->user->avatar_url)}}"
                                                    class="ava">@endif</div></span>
                                        <p>@if($post->user->name) {{$post->user->name}} @endif</p>
                                    </td>
                                    <td style="width:100%;margin-bottom:20px;">


                                        <a href="{{route('comments',$post->id)}}" class="whiteText"
                                           id="title-{{$post->id}}"
                                           style="color: rgb(235 238 233);margin: 0 auto; text-decoration: none;">

                                            {{$post->title}}
                                        </a>


                                        <div class="d-flex">
                                            <div class="network-banner-details">


                                            </div>
                                        </div>
                                    </td>

                                    {{--                                    <td>--}}
                                    {{--                                        <input type="radio" name="stars" id="star-null" />--}}
                                    {{--                                        <input type="radio" name="stars" id="star-1" />--}}
                                    {{--                                        <input type="radio" name="stars" id="star-2" />--}}
                                    {{--                                        <input type="radio" name="stars" id="star-3" />--}}
                                    {{--                                        <input type="radio" name="stars" id="star-4" checked />--}}
                                    {{--                                        <input type="radio" name="stars" id="star-5" />--}}

                                    {{--                                        <section>--}}
                                    {{--                                            <label for="star-1">--}}
                                    {{--                                                <svg width="255" height="240" viewBox="0 0 51 48">--}}
                                    {{--                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>--}}
                                    {{--                                                </svg>--}}
                                    {{--                                            </label>--}}
                                    {{--                                            <label for="star-2">--}}
                                    {{--                                                <svg width="255" height="240" viewBox="0 0 51 48">--}}
                                    {{--                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>--}}
                                    {{--                                                </svg>--}}
                                    {{--                                            </label>--}}
                                    {{--                                            <label for="star-3">--}}
                                    {{--                                                <svg width="255" height="240" viewBox="0 0 51 48">--}}
                                    {{--                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>--}}
                                    {{--                                                </svg>--}}
                                    {{--                                            </label>--}}
                                    {{--                                            <label for="star-4">--}}
                                    {{--                                                <svg width="255" height="240" viewBox="0 0 51 48">--}}
                                    {{--                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>--}}
                                    {{--                                                </svg>--}}
                                    {{--                                            </label>--}}
                                    {{--                                            <label for="star-5">--}}
                                    {{--                                                <svg width="255" height="240" viewBox="0 0 51 48">--}}
                                    {{--                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>--}}
                                    {{--                                                </svg>--}}
                                    {{--                                            </label>--}}
                                    {{--                                            <label for="star-null">--}}
                                    {{--                                                Clear--}}
                                    {{--                                            </label>--}}
                                    {{--                                        </section>--}}
                                    {{--                                    </td>--}}
                                </tr>
                                    @if($category->name !== "Business" &&  $category->name !== "Resources")
                                        <tr style="display: flex">
                                    @guest
                                        <td>
                                            <button id="helpful" class="publish_btn" data-toggle="modal" data-target=".login-modal" data-name="helpful">
                                            </button>
                                        </td>
{{--                                        <td>--}}
{{--                                            <button id="inflammatory" class="rate-btn" data-toggle="modal" data-target=".login-modal" data-name="inflammatory">The fence/--}}
{{--                                                <span--}}
{{--                                                    class="adequate"  style="display: none">@if($post->isFence) {{count($post->isFence)}} @endif</span>--}}
{{--                                            </button>--}}
{{--                                        </td>--}}
                                        <td>
                                            <button id="calculated" class="rate-btn" data-toggle="modal" data-target=".login-modal" data-name="calculated">
                                            </button>
                                        </td>
{{--                                                #2aaa10--}}
{{--                                                background:rgba(155, 203, 108, 0.73)--}}
                                    @else
                                        <td>
                                            <button id="helpful" style="width:100px;" class="publish_btn  @if(isset($post->isHelpful[0]) )rated-green @else not-rated-green @endif"
                                                    data-id="{{$post->id}}"
                                                    data-name="helpful">
                                            </button>
                                        </td>
{{--                                        <td>--}}
{{--                                            <button id="inflammatory" class="rate-btn" data-id="{{$post->id}}" data-name="inflammatory">The fence <span id="adequate"--}}
{{--                                                                                                                                                        class="adeq"  style="display: none;margin-left: 5px !important;"></span> /--}}
{{--                                                <span--}}
{{--                                                    class="adequate"  style="display: none">@if($post->isFence) {{count($post->isFence)}} @endif</span>--}}
{{--                                            </button>--}}
{{--                                        </td>--}}
                                        <td>
                                            <button id="calculated" class="rate-btn calculated @if(isset($post->isUnhelpful[0])) rated-red @else not-rated-red @endif" data-id="{{$post->id}}"
                                                    data-name="calculated">
                                            </button>
                                        </td>
                                    @endguest
                                        <td>
                                            @guest <a href="" class="follow-btn post-following" data-toggle="modal" aria-haspopup="true" aria-expanded="false" data-target=".login-modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24"
                                                     class="button-fill">
                                                    <path
                                                        d="M36.5 15c.828 0 1.5.672 1.5 1.5v.708l.193.058C40.403 17.98 42 20.053 42 22.5v2.882c0 .682.514 1.085.724 1.17.907.46 1.276 1.327 1.276 2.066V29c0 .552-.448 1-1 1h-4.05c-.232 1.141-1.24 2-2.45 2-1.21 0-2.218-.859-2.45-2H30c-.552 0-1-.448-1-1v-.382c0-.816.43-1.567 1.124-1.982.584-.281.876-.7.876-1.254V22.5c0-2.518 1.692-4.64 4-5.293V16.5c0-.828.672-1.5 1.5-1.5zm1.414 15h-2.828c.206.583.761 1 1.414 1 .653 0 1.208-.417 1.414-1zM36.5 16c-.276 0-.5.224-.5.5v1.527c-2.25.249-4 2.157-4 4.473v2.882c0 .816-.43 1.567-1.124 1.982l-.115.06c-.284.156-.761.5-.761 1.194V29h13v-.382c0-.696-.482-1.039-.724-1.17-.68-.318-1.276-1.13-1.276-2.066V22.5c0-2.316-1.75-4.223-4-4.472V16.5c0-.276-.224-.5-.5-.5z"
                                                        transform="translate(-24 -12)"></path>
                                                </svg>
                                                Follow Post
                                            </a>
                                            @else

                                                <a href="" id="post-following" class="follow-btn" data-path="{{$post->id}}" style="width:130px">
                                                    @if(Auth::user()->following_posts->contains($post->id))Followed @else
                                                        Follow @endif
                                                </a>
                                            @endguest
                                        </td>
                                        <td class="d-flex">
                                            <img src="{{asset('images/icon1.png')}}" width="30px" height="30px">
                                            <span style="color:#fff;margin-left:5px;margin-top:3px;">@if($post->isBought) {{count($post->isBought)}} @endif</span>
                                        </td>
                                        <td>
                                            @auth
                                                @if($post->user->id === Auth::id() || Auth::user()->is_admin==="1" || Auth::user()->notify==="1")
                                                    <div class="follow-details">
                                                        <button type="button" class="dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" role="img" width="24"
                                                                 height="24"
                                                                 viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd"
                                                                      d="M22.444 13.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463.821.01 1.482.679 1.482 1.5-.016.844-.712 1.515-1.556 1.5zm0-6.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463C23.34 4.01 24 4.68 24 5.5c-.016.844-.712 1.515-1.556 1.5zm.112 10c.82.03 1.464.716 1.444 1.537-.02.82-.697 1.473-1.519 1.463-.82-.01-1.48-.679-1.481-1.5.017-.843.713-1.514 1.556-1.5z"></path>
                                                            </svg>
                                                        </button>
                                                        @auth

                                                            <div class="dropdown-menu">
                                                                @if($post->user->id === Auth::id())
                                                                    <a class="dropdown-item align-items-center"
                                                                       href="{{route('editPost',$post->id)}}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                             height="24"
                                                                             viewBox="0 0 24 24">
                                                                            <path fill-rule="evenodd"
                                                                                  d="M16.679 5.602l1.702 1.704c.826.827.826 2.172 0 3l-8.17 8.18L4 20l1.512-6.218 8.17-8.18c.799-.802 2.196-.803 2.997 0zM8.661 16.046l1.312 1.314 5.652-5.658-3.336-3.341-5.652 5.659 1.317 1.319 3.193-3.193c.195-.195.512-.195.707 0 .195.196.195.512 0 .708L8.66 16.046zm7.645-5.026L17.7 9.624c.45-.451.45-1.186 0-1.637l-1.702-1.704c-.437-.437-1.197-.436-1.634 0L12.97 7.679l3.336 3.34zm-10.88 7.554l3.569-.83-2.741-2.745-.828 3.575z"></path>
                                                                        </svg>
                                                                        Edit post</a>
                                                                    </button>
                                                                @endif
                                                                <a class="dropdown-item align-items-center"
                                                                   href="{{route('deletePost',$post->id)}}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24"
                                                                         viewBox="0 0 24 24">
                                                                        <path fill-rule="evenodd"
                                                                              d="M17 17c0 1.657-1.343 3-3 3H9c-1.657 0-3-1.343-3-3V7H5V6h13v1h-1v10zM9 9h1v7H9V9zm4 0h1v7h-1V9zm-6 8c0 1.105.895 2 2 2h5c1.105 0 2-.895 2-2V7H7v10zm6-11V5h-3v1H9V5c0-.552.448-1 1-1h3c.552 0 1 .448 1 1v1h-1z"></path>
                                                                    </svg>
                                                                    Delete Post</a>
                                                                <div class="dropdown-divider"></div>
                                                            </div>

                                                        @endauth
                                                    </div>
                                                @endif
                                            @endauth
                                        </td>
                                    @else

                                        <tr style="display: flex">
                                            <td>
                                                <div class="container">
                                                    <div class="row lead">
{{--                                                        {{dd($post->ratings)}}--}}

                                                            <div class="stars-existing starrr" data-id="{{$post->id}}" @if(isset($post->ratings[0])) data-rating='{{intval($post->ratings[0]->rate)}}' @endif>
                                                                @if(Auth::user()->rate_posts->contains($post->id))
                                                                @for($i=0;$i<5; $i++)
                                                                    @if($i <= intval($i<$post->ratings[0]->rate))
                                                                        <i class='fa fa-star-o rate'></i>
                                                                    @else
                                                                        <i class='fa fa-star'></i>
                                                                    @endif
                                                                @endfor

                                                        @else
                                                            @for($i=0;$i<5; $i++)
                                                                    <i class='fa fa-star-o rate'></i>
                                                                    @endfor
                                                        @endif
                                                            </div>
                                                        <span id="count-existing"></span>
                                                    </div>
                                                </div>
                                            </td>
{{--                                        <div class="todo-div"></div>--}}

                                        {{--                        <div class="container">--}}
                                        {{--                            <div class="row lead">--}}
                                        {{--                                @if($post->rating_is_one)--}}
                                        {{--                                    <div id="stars-existing" class="starrr" data-id="{{$post->id}}" data-rating='4'>--}}
                                        {{--                                        <i class='fa fa-star'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                    </div>--}}
                                        {{--                                @elseif($post->rating_is_two)--}}
                                        {{--                                    <div id="stars-existing" class="starrr" data-id="{{$post->id}}" data-rating='2'>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star rate'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                    </div>--}}
                                        {{--                                @elseif($post->rating_is_three)--}}
                                        {{--                                    <div id="stars-existing" class="starrr" data-id="{{$post->id}}" data-rating='3'>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star rate'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                    </div>--}}
                                        {{--                                @elseif($post->rating_is_four)--}}
                                        {{--                                    <div id="stars-existing" class="starrr" data-id="{{$post->id}}" data-rating='4'>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star rate'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                    </div>--}}
                                        {{--                                @else--}}
                                        {{--                                    <div id="stars-existing" class="starrr" data-id="{{$post->id}}" data-rating='5'>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star-o rate'></i>--}}
                                        {{--                                        <i class='fa fa-star'></i>--}}
                                        {{--                                    </div>--}}
                                        {{--                                @endif--}}
                                        {{--                                <span id="count-existing"></span>--}}
                                        {{--                            </div>--}}
                                        {{--                        </div>--}}
                                            <td>
                                                @guest <a href="" class="follow-btn post-following" data-toggle="modal" aria-haspopup="true" aria-expanded="false" data-target=".login-modal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24"
                                                         class="button-fill">
                                                        <path
                                                            d="M36.5 15c.828 0 1.5.672 1.5 1.5v.708l.193.058C40.403 17.98 42 20.053 42 22.5v2.882c0 .682.514 1.085.724 1.17.907.46 1.276 1.327 1.276 2.066V29c0 .552-.448 1-1 1h-4.05c-.232 1.141-1.24 2-2.45 2-1.21 0-2.218-.859-2.45-2H30c-.552 0-1-.448-1-1v-.382c0-.816.43-1.567 1.124-1.982.584-.281.876-.7.876-1.254V22.5c0-2.518 1.692-4.64 4-5.293V16.5c0-.828.672-1.5 1.5-1.5zm1.414 15h-2.828c.206.583.761 1 1.414 1 .653 0 1.208-.417 1.414-1zM36.5 16c-.276 0-.5.224-.5.5v1.527c-2.25.249-4 2.157-4 4.473v2.882c0 .816-.43 1.567-1.124 1.982l-.115.06c-.284.156-.761.5-.761 1.194V29h13v-.382c0-.696-.482-1.039-.724-1.17-.68-.318-1.276-1.13-1.276-2.066V22.5c0-2.316-1.75-4.223-4-4.472V16.5c0-.276-.224-.5-.5-.5z"
                                                            transform="translate(-24 -12)"></path>
                                                    </svg>
                                                    Follow Post
                                                </a>
                                                @else

                                                    <a href="" id="post-following" class="follow-btn" data-path="{{$post->id}}" style="width:130px">
                                                        @if(Auth::user()->following_posts->contains($post->id))Followed @else
                                                            Follow @endif
                                                    </a>
                                                @endguest
                                            </td>
                                            <td class="d-flex">
                                                <img src="{{asset('images/icon1.png')}}" width="30px" height="30px">
                                                <span style="color:#fff;margin-left:5px;margin-top:3px;">@if($post->isBought) {{count($post->isBought)}} @endif</span>
                                            </td>
                                            <td>
                                                @auth
                                                    @if($post->user->id === Auth::id() || Auth::user()->is_admin==="1" || Auth::user()->notify==="1")
                                                        <div class="follow-details">
                                                            <button type="button" class="dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" role="img" width="24"
                                                                     height="24"
                                                                     viewBox="0 0 24 24">
                                                                    <path fill-rule="evenodd"
                                                                          d="M22.444 13.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463.821.01 1.482.679 1.482 1.5-.016.844-.712 1.515-1.556 1.5zm0-6.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463C23.34 4.01 24 4.68 24 5.5c-.016.844-.712 1.515-1.556 1.5zm.112 10c.82.03 1.464.716 1.444 1.537-.02.82-.697 1.473-1.519 1.463-.82-.01-1.48-.679-1.481-1.5.017-.843.713-1.514 1.556-1.5z"></path>
                                                                </svg>
                                                            </button>
                                                            @auth

                                                                <div class="dropdown-menu">
                                                                    @if($post->user->id === Auth::id())
                                                                        <a class="dropdown-item align-items-center"
                                                                           href="{{route('editPost',$post->id)}}">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                 height="24"
                                                                                 viewBox="0 0 24 24">
                                                                                <path fill-rule="evenodd"
                                                                                      d="M16.679 5.602l1.702 1.704c.826.827.826 2.172 0 3l-8.17 8.18L4 20l1.512-6.218 8.17-8.18c.799-.802 2.196-.803 2.997 0zM8.661 16.046l1.312 1.314 5.652-5.658-3.336-3.341-5.652 5.659 1.317 1.319 3.193-3.193c.195-.195.512-.195.707 0 .195.196.195.512 0 .708L8.66 16.046zm7.645-5.026L17.7 9.624c.45-.451.45-1.186 0-1.637l-1.702-1.704c-.437-.437-1.197-.436-1.634 0L12.97 7.679l3.336 3.34zm-10.88 7.554l3.569-.83-2.741-2.745-.828 3.575z"></path>
                                                                            </svg>
                                                                            Edit post</a>
                                                                        </button>
                                                                    @endif
                                                                    <a class="dropdown-item align-items-center"
                                                                       href="{{route('deletePost',$post->id)}}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                             height="24"
                                                                             viewBox="0 0 24 24">
                                                                            <path fill-rule="evenodd"
                                                                                  d="M17 17c0 1.657-1.343 3-3 3H9c-1.657 0-3-1.343-3-3V7H5V6h13v1h-1v10zM9 9h1v7H9V9zm4 0h1v7h-1V9zm-6 8c0 1.105.895 2 2 2h5c1.105 0 2-.895 2-2V7H7v10zm6-11V5h-3v1H9V5c0-.552.448-1 1-1h3c.552 0 1 .448 1 1v1h-1z"></path>
                                                                        </svg>
                                                                        Delete Post</a>
                                                                    <div class="dropdown-divider"></div>
                                                                </div>

                                                            @endauth
                                                        </div>
                                                    @endif
                                                @endauth
                                            </td>
                                        </tr>
                                    @endif




                            @endforeach
                        @else
                            <p>No posts here</p>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="d-flex pagination">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    {{--<script src="{{asset('js/main.js')}}"></script>--}}
    <script src="{{asset('js/editor.js')}}"></script>
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
{{--    <script src="https://use.fontawesome.com/a2e210f715.js"></script>--}}
{{--    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>--}}
{{--    <script src="{{asset('js/main.js')}}"></script>--}}
{{--    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>--}}
{{--    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>--}}
{{--    <script src="{{asset('js/comments.js')}}"></script>--}}
{{--    <script id="rendered-js"></script>--}}
    <script>
        $('#searchPost').on('keyup', function () {
            let value = $(this).val();
            let id = $(this).attr('data-id');
            $.ajax({
                type: 'get',
                url: '{{URL::to('searchPost')}}',
                data: {'search': value,'id':id},
                success: function (data) {
                    $('.postTable tbody').empty();
                    $(data.data).each(function (val, i) {
                        $('.postTable tbody').append(`<tr class="bordered_tr" scope="row"
                                    style="color:rgb(255, 255, 255);">
                                    <td><span><div class="avaImg">
                        @isset($post)
                        @if($post->user->avatar_url)<img
                                                    src="{{asset('images/'.$post->user->avatar_url)}}"
                                                    class="ava">@endif</div></span>
                                        <p>@if($post->user->name) {{$post->user->name}} @endif</p>
                        </td>
                        <td>
                            <a href="{{route('comments',$post->id)}}" class="whiteText"
                                           id="title-{{$post->id}}"
                                           style="color: rgb(235 238 233);margin: 0 auto;">

                                           ${i.title}
                        </a>


                        <div class="d-flex">
                            <div class="network-banner-details">


                            </div>
                        </div>
                    </td>
                </tr>
                <tr style="display: flex">
 @if($category->name !== "Business" &&  $category->name !== "Resources")

@guest
                        <td>
                            <button id="helpful" class="publish_btn" data-toggle="modal" data-target=".login-modal" data-name="helpful">
                            </button>
                        </td>
{{--                                        <td>--}}
                        {{--                                            <button id="inflammatory" class="rate-btn" data-toggle="modal" data-target=".login-modal" data-name="inflammatory">The fence/--}}
                        {{--                                                <span--}}
                        {{--                                                    class="adequate"  style="display: none">@if($post->isFence) {{count($post->isFence)}} @endif</span>--}}
                        {{--                                            </button>--}}
                        {{--                                        </td>--}}
                        <td>
                            <button id="calculated" class="rate-btn" data-toggle="modal" data-target=".login-modal" data-name="calculated">
                            </button>
                        </td>
{{--                                                #2aaa10--}}
                        {{--                                                background:rgba(155, 203, 108, 0.73)--}}
                        @else
                        <td>
                            <button id="helpful" style="width:100px;" class="publish_btn  @if(isset($post->isHelpful[0]) )rated-green @else not-rated-green @endif"
                                                    data-id="{{$post->id}}"
                                                    data-name="helpful">
                                            </button>
                                        </td>
{{--                                        <td>--}}
                        {{--                                            <button id="inflammatory" class="rate-btn" data-id="{{$post->id}}" data-name="inflammatory">The fence <span id="adequate"--}}
                        {{--                                                                                                                                                        class="adeq"  style="display: none;margin-left: 5px !important;"></span> /--}}
                        {{--                                                <span--}}
                        {{--                                                    class="adequate"  style="display: none">@if($post->isFence) {{count($post->isFence)}} @endif</span>--}}
                        {{--                                            </button>--}}
                        {{--                                        </td>--}}
                        <td>
                            <button id="calculated" class="rate-btn calculated @if(isset($post->isUnhelpful[0])) rated-red @else not-rated-red @endif" data-id="{{$post->id}}"
                                                    data-name="calculated">
                                            </button>
                                        </td>
                                    @endguest
                        <td>
                        @else
                        <td>
                                          <div class="container">
                                              <div class="row lead">
@if(Auth::user()->rate_posts->contains($post->id))
                        <div id="stars-existing" class="starrr" data-id="{{$post->id}}" data-rating='{{intval($post->ratings[0]->rate)}}'>
                                                                @for($i=0;$i<5; $i++)
                        @if($i <= intval($i<$post->ratings[0]->rate))
                        <i class='fa fa-star-o rate'></i>
@else
                        <i class='fa fa-star'></i>
@endif
                        @endfor
                        </div>
@else
                        <i class='fa fa-star rate'></i>
                        <i class='fa fa-star rate'></i>
                        <i class='fa fa-star rate'></i>
                        <i class='fa fa-star rate'></i>
                        <i class='fa fa-star rate'></i>
@endif

                        <span id="count-existing"></span>
                    </div>
                </div>
            </td>
            @endif
@guest <a href="" class="follow-btn post-following" data-toggle="modal"
                                                  aria-haspopup="true"
                                                  aria-expanded="false" data-target=".login-modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24"
                                                 class="button-fill">
                                                <path
                                                    d="M36.5 15c.828 0 1.5.672 1.5 1.5v.708l.193.058C40.403 17.98 42 20.053 42 22.5v2.882c0 .682.514 1.085.724 1.17.907.46 1.276 1.327 1.276 2.066V29c0 .552-.448 1-1 1h-4.05c-.232 1.141-1.24 2-2.45 2-1.21 0-2.218-.859-2.45-2H30c-.552 0-1-.448-1-1v-.382c0-.816.43-1.567 1.124-1.982.584-.281.876-.7.876-1.254V22.5c0-2.518 1.692-4.64 4-5.293V16.5c0-.828.672-1.5 1.5-1.5zm1.414 15h-2.828c.206.583.761 1 1.414 1 .653 0 1.208-.417 1.414-1zM36.5 16c-.276 0-.5.224-.5.5v1.527c-2.25.249-4 2.157-4 4.473v2.882c0 .816-.43 1.567-1.124 1.982l-.115.06c-.284.156-.761.5-.761 1.194V29h13v-.382c0-.696-.482-1.039-.724-1.17-.68-.318-1.276-1.13-1.276-2.066V22.5c0-2.316-1.75-4.223-4-4.472V16.5c0-.276-.224-.5-.5-.5z"
                                                    transform="translate(-24 -12)"></path>
                                            </svg>
                                            Follow Post
                                        </a>
                                        @else

                        <a href="" id="post-following" class="follow-btn"
                           data-path="{{$post->id}}" style="width:130px">

                        @if(Auth::user()->following_posts->contains($post->id))Followed @else
                        Follow @endif
                        </a>
                        @endguest
                        </td>

                        <td class="d-flex">

                                <img src="{{asset('images/icon1.png')}}" width="30px" height="30px">

                        </td>

                        <td>
                        @auth
                        @if($post->user->id === Auth::id() || Auth::user()->is_admin==="1" || Auth::user()->notify==="1")
                        <div class="follow-details">
                            <button type="button" class="dropdown-toggle p-0"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" role="img" width="24"
                                     height="24"
                                     viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                          d="M22.444 13.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463.821.01 1.482.679 1.482 1.5-.016.844-.712 1.515-1.556 1.5zm0-6.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463C23.34 4.01 24 4.68 24 5.5c-.016.844-.712 1.515-1.556 1.5zm.112 10c.82.03 1.464.716 1.444 1.537-.02.82-.697 1.473-1.519 1.463-.82-.01-1.48-.679-1.481-1.5.017-.843.713-1.514 1.556-1.5z"></path>
                                </svg>
                            </button>
                        @auth

                        <div class="dropdown-menu">
                        @if($post->user->id === Auth::id())
                        <a class="dropdown-item align-items-center"
                           href="{{route('editPost',$post->id)}}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24"
                                                                         viewBox="0 0 24 24">
                                                                        <path fill-rule="evenodd"
                                                                              d="M16.679 5.602l1.702 1.704c.826.827.826 2.172 0 3l-8.17 8.18L4 20l1.512-6.218 8.17-8.18c.799-.802 2.196-.803 2.997 0zM8.661 16.046l1.312 1.314 5.652-5.658-3.336-3.341-5.652 5.659 1.317 1.319 3.193-3.193c.195-.195.512-.195.707 0 .195.196.195.512 0 .708L8.66 16.046zm7.645-5.026L17.7 9.624c.45-.451.45-1.186 0-1.637l-1.702-1.704c-.437-.437-1.197-.436-1.634 0L12.97 7.679l3.336 3.34zm-10.88 7.554l3.569-.83-2.741-2.745-.828 3.575z"></path>
                                                                    </svg>
                                                                    Edit post</a>
                                                                </button>
                                                            @endif
                        <a class="dropdown-item align-items-center"
                           href="{{route('deletePost',$post->id)}}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24"
                                                                     viewBox="0 0 24 24">
                                                                    <path fill-rule="evenodd"
                                                                          d="M17 17c0 1.657-1.343 3-3 3H9c-1.657 0-3-1.343-3-3V7H5V6h13v1h-1v10zM9 9h1v7H9V9zm4 0h1v7h-1V9zm-6 8c0 1.105.895 2 2 2h5c1.105 0 2-.895 2-2V7H7v10zm6-11V5h-3v1H9V5c0-.552.448-1 1-1h3c.552 0 1 .448 1 1v1h-1z"></path>
                                                                </svg>
                                                                Delete Post</a>
                                                            <div class="dropdown-divider"></div>
                                                        </div>

                                                    @endauth

                        </div>
                        @endif
                        @endauth
                        </td>
                        @endisset
                        </tr>`);
                    })
                }
            })
        })

    </script>
    <script>
        $(document).on('click', '#post-following', function (event) {
            event.preventDefault();
            let follow = $(this);
            console.log(follow);
            let toFollowId = $(this).attr('data-path');
            {
                $.ajax({
                    type: "post",
                    url: '/followPost',
                    data: {_token: $('meta[name="csrf-token"]').attr('content'), id: toFollowId},
                    success: function (r) {

                        if (r == 1) {
                            follow.html('Followed');

                        } else if (r == 2) {
                            follow.html('Follow');

                        }

                    }
                })
            }
        })


    </script>
    <script>
        $(document).on('click', '#helpful', function (event) {
            // var domain = 'https://' + window.location.hostname;
            event.preventDefault();
            let rate = $(this);
            let id = $(this).attr('data-id');
            let type = $(this).attr('data-name');
            $.ajax({
                type: "post",
                url: '/ratePost',
                data: {_token: $('meta[name="csrf-token"]').attr('content'), id: id, type: type},
                success: function (r) {
                    console.log(r);
                    if (r === 1) {
                        rate.css('background','#2aaa10')
                        rate.addClass('active');
                        rate.removeClass('inactive');
                    } else if (r === 2) {
                        rate.css("background", "rgba(155, 203, 108, 0.73)");
                        rate.removeClass('active');
                        rate.addClass('inactive')
                    }
                }
            })

        })
        // $(document).on('click', '#inflammatory', function (event) {
        //     var domain = 'https://' + window.location.hostname;
        //     event.preventDefault();
        //     let rate = $(this);
        //     let id = $(this).attr('data-id');
        //     let type = $(this).attr('data-name');
        //     let adequate = $(this).closest('td').find('span.adequate');
        //     let adeq = $(this).closest('td').find('span.adeq');
        //     let adequateVal = parseInt(adequate.text());
        //     let adeqVal = parseInt(adeq.text());
        //
        //
        //     $.ajax({
        //         type: "post",
        //         url: '/ratePost',
        //         data: {_token: $('meta[name="csrf-token"]').attr('content'), id: id, type: type},
        //         success: function (r) {
        //             if (r === 1) {
        //                 rate.css("background", "#b3813b");
        //                 let adequately = adequateVal + r;
        //                 adequate.text(adequately);
        //                 if(adequately !== 0) {
        //                     adeqVal = adequately - 1;
        //                     if (!isNaN(adeqVal)) {
        //                         adeq.text(adeqVal);
        //                     }
        //                 }
        //                 adeq.css("display", "block");
        //                 adequate.css("display", "block");
        //
        //             } else {
        //                 rate.css("background", "rgba(155, 203, 108, 0.73)");
        //                 if (adequateVal !== 0) {
        //                     let adequately = adequateVal - 1;
        //                     adequate.text(adequately);
        //                     if(adequately !== 0) {
        //                         adeqVal = adequately - 1;
        //                         if (!isNaN(adeqVal)) {
        //                             adeq.text(adeqVal);
        //                         }
        //                     }
        //                     adeq.css("display", "block");
        //                     adequate.css("display", "block");
        //
        //                 }
        //             }
        //         }
        //     })
        //
        // })
        $(document).on('click', '.calculated', function (event) {
            var domain = 'https://' + window.location.hostname;
            event.preventDefault();
            let rate = $(this);
            let id = $(this).attr('data-id');
            let type = $(this).attr('data-name');

            $.ajax({
                type: "post",
                url: '/ratePost',
                data: {_token: $('meta[name="csrf-token"]').attr('content'), id: id, type: type},
                success: function (r) {
                    console.log(r);
                    if (r === 1) {
                        rate.css("background", "#aa2210");
                    } else {
                        rate.css("background", "rgba(155, 203, 108, 0.73)");
                    }
                }
            })

        })


        var __slice = [].slice;

        (function ($, window) {
            var Starrr;

            Starrr = (function () {
                Starrr.prototype.defaults = {
                    rating: void 0,
                    numStars: 5,
                    change: function (e, value) {
                    }
                };

                function Starrr($el, options) {
                    var i, _, _ref,
                        _this = this;

                    this.options = $.extend({}, this.defaults, options);
                    this.$el = $el;
                    _ref = this.defaults;
                    for (i in _ref) {
                        _ = _ref[i];
                        if (this.$el.data(i) != null) {
                            this.options[i] = this.$el.data(i);
                        }
                    }
                    this.createStars();
                    this.syncRating();
                    this.$el.on('mouseover.starrr', 'i', function (e) {
                        return _this.syncRating(_this.$el.find('i').index(e.currentTarget) + 1);
                    });
                    this.$el.on('mouseout.starrr', function () {
                        return _this.syncRating();
                    });
                    this.$el.on('click.starrr', 'i', function (e) {
                        return _this.setRating(_this.$el.find('i').index(e.currentTarget) + 1);
                    });
                    this.$el.on('starrr:change', this.options.change);
                }

                Starrr.prototype.createStars = function () {
                    var _i, _ref, _results;

                    _results = [];
                    for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                        // _results.push(this.$el.append("<i class='fa fa-star-o rate'></i>"));
                    }
                    return _results;
                };

                Starrr.prototype.setRating = function (rating) {
                    if (this.options.rating === rating) {
                        rating = void 0;
                    }
                    this.options.rating = rating;
                    this.syncRating();
                    return this.$el.trigger('starrr:change', rating);
                };

                Starrr.prototype.syncRating = function (rating) {
                    var i, _i, _j, _ref;

                    rating || (rating = this.options.rating);
                    if (rating) {
                        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                            this.$el.find('i').eq(i).removeClass('fa-star-o rate').addClass('fa-star rate');
                        }
                    }
                    if (rating && rating < 5) {
                        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                            this.$el.find('i').eq(i).removeClass('fa-star rate').addClass('fa-star-o rate');
                        }
                    }
                    if (!rating) {
                        return this.$el.find('i').removeClass('fa-star rate').addClass('fa-star-o rate');
                    }
                };

                return Starrr;

            })();
            return $.fn.extend({
                starrr: function () {
                    var args, option;

                    option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                    return this.each(function () {
                        var data;

                        data = $(this).data('star-rating');
                        if (!data) {
                            $(this).data('star-rating', (data = new Starrr($(this), option)));
                        }
                        if (typeof option === 'string') {
                            return data[option].apply(data, args);
                        }
                    });
                }
            });
        })(window.jQuery, window);

        $(function () {
            return $(".starrr").starrr();
        });

        $(document).ready(function () {
            $('#stars').on('starrr:change', function (e, value) {
                $('#count').html('The rate is' + value);
            });

            $('.stars-existing').on('starrr:change', function (e, value) {
                // $('#count-existing').html('Your rate is' + ' ' + value + 'star');
                let rate = $(this);
                let post = rate.attr('data-id');
                $.ajax({
                    type: "post",
                    url: '/rating',
                    data: {_token: $('meta[name="csrf-token"]').attr('content'), id: value, post: post},
                    success: function (r) {
                        $(this).find('.star-number').text(r)
                    }
                })
            });
        });

    </script>
</body>
</html>

