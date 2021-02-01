<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>sanctuaryforhumanity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/reset.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style1.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css">
</head>



<body translate="no">
<div class="page-bg"></div>
<div class="position-relative">
    <header class="header-inner">
        <div class="container modalOpen">

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
                                <a href="contributors.html">
                                    Contributors
                                </a>
                            </li>
                            <li>
                                <a href="members.html">
                                    Members
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="registration-banner">

                    <div class="d-flex">
                        <svg data-bbox="7 3 36 45" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" height="50" width="50" data-type="shape">
                            <g>
                                <path d="M38.473 34.564L43 39.273v2.298H7v-2.298l4.527-4.71V22.959c0-3.662.88-6.82 2.64-9.474 1.797-2.729 4.294-4.504 7.492-5.326V6.532c0-.972.323-1.803.97-2.495C23.275 3.346 24.066 3 25 3c.934 0 1.734.346 2.398 1.037.665.692.997 1.523.997 2.495v1.626c3.162.822 5.64 2.616 7.437 5.382 1.76 2.654 2.641 5.793 2.641 9.418v11.606zM25 48c-1.364 0-2.523-.47-3.477-1.411-.955-.94-1.432-2.078-1.432-3.41h9.818c0 1.332-.487 2.47-1.46 3.41C27.473 47.529 26.324 48 25 48z" fill-rule="evenodd"></path>
                            </g>
                        </svg>
                        <svg data-bbox="0 0 50 50" data-type="shape" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                            <g>
                                <path d="M25 48.077c-5.924 0-11.31-2.252-15.396-5.921 2.254-5.362 7.492-8.267 15.373-8.267 7.889 0 13.139 3.044 15.408 8.418-4.084 3.659-9.471 5.77-15.385 5.77m.278-35.3c4.927 0 8.611 3.812 8.611 8.878 0 5.21-3.875 9.456-8.611 9.456s-8.611-4.246-8.611-9.456c0-5.066 3.684-8.878 8.611-8.878M25 0C11.193 0 0 11.193 0 25c0 .915.056 1.816.152 2.705.032.295.091.581.133.873.085.589.173 1.176.298 1.751.073.338.169.665.256.997.135.515.273 1.027.439 1.529.114.342.243.675.37 1.01.18.476.369.945.577 1.406.149.331.308.657.472.98.225.446.463.883.714 1.313.182.312.365.619.56.922.272.423.56.832.856 1.237.207.284.41.568.629.841.325.408.671.796 1.02 1.182.22.244.432.494.662.728.405.415.833.801 1.265 1.186.173.154.329.325.507.475l.004-.011A24.886 24.886 0 0 0 25 50a24.881 24.881 0 0 0 16.069-5.861.126.126 0 0 1 .003.01c.172-.144.324-.309.49-.458.442-.392.88-.787 1.293-1.209.228-.232.437-.479.655-.72.352-.389.701-.78 1.028-1.191.218-.272.421-.556.627-.838.297-.405.587-.816.859-1.24a26.104 26.104 0 0 0 1.748-3.216c.208-.461.398-.93.579-1.406.127-.336.256-.669.369-1.012.167-.502.305-1.014.44-1.53.087-.332.183-.659.256-.996.126-.576.214-1.164.299-1.754.042-.292.101-.577.133-.872.095-.89.152-1.791.152-2.707C50 11.193 38.807 0 25 0"></path>
                            </g>
                        </svg>
                        <button type="button" class="btn-generic btn profile-arrow  dropdown-toggle" @if(auth()->guest())data-toggle="modal"@else data-toggle="dropdown"@endif aria-haspopup="true" aria-expanded="false" @if(auth()->guest())data-target=".login-modal"@endif>
                            <svg width="14" height="8" viewBox="0 0 14 8"><path d="M1.707.293L.293 1.707l6 6a1 1 0 001.397.016l6-5.726L12.31.55 7.016 5.602 1.707.292z"></path></svg>
                            @if (auth()->guest())
                                Log In
                            @endif

                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile.html">Profile</a>
                            <a class="dropdown-item" href="https://google.com/">My Account</a>
                            <a class="dropdown-item" href="{{route('logoutUser')}}">Log out</a>
                            <div class="dropdown-divider"></div>
                        </div>
                        <!--                        <button type="button" class="btn-generic btn dropdown-toggle p-0"-->
                        <!--                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                        <!--                            Log In-->
                        <!--                        </button>-->
                        <!--                        <div class="dropdown-menu">-->
                        <!--                            <a class="dropdown-item" href="profile.html">Profile</a>-->
                        <!--                            <a class="dropdown-item" href="https://google.com/">My Account</a>-->
                        <!--                            <a class="dropdown-item" href="#">Log out</a>-->
                        <!--                            <div class="dropdown-divider"></div>-->
                        <!--                        </div>-->
                    </div>
                    <div class="col-xs-12">
                        <div class="console"></div>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <main>
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
                            <button type="button"><a href="{{route('signup')}}">Log In</a></button>
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
                            <a href="{{route('signup')}}">
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
                        <h4 class="modal-title" id="gridSystemModalLabel">Sign In
                        </h4>
                        <div class="d-flex login-container">
                            <p>
                                Already a member?
                            </p>
                            <button type="button">Log In</button>
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
                            <a href="{{route('signup')}}">
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
                <div class="main-container">
                    <div class="network-panel-overlay" style="background-image: url({{asset('images/'.$category->img_url)}}) !important;"></div>
                    <div class="network-panel">
                        <div class="network-heading">
                            <h2>
                                {{$category->name}}
                            </h2>
                            <p>{{$category->description}}

                            </p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                    <div class="resources-forum-left">
                        <div class="input-row">
                        </div>
                    </div>
                    <div class="resources-forum-right">
                            <a href="{{route('createPost')}}" class="comment-btn">
                                Create new post
                            </a>
                    </div>
                    </div>
                    @foreach($category->posts as $post)
                        <div class="network-banner">
                            <table style="width: 100%;">
                                <thead class="w-100" style="display: flex;
                                            justify-content: space-between;">
                                <tr style="width: 100%;
                                    display: flex;
                                    justify-content: space-around;">
                                <th></th>

                                <th class="comment-banner">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         stroke="none"
                                         class="forum-icon-fill"><title>Posts</title>
                                        <path fill-rule="evenodd"
                                              d="M6 5h12c1.104 0 2 .896 2 2v8c0 1.104-.896 2-2 2h-4.36l-4.884 2.93c-.079.047-.168.07-.256.07-.086 0-.17-.021-.247-.065C8.097 19.846 8 19.68 8 19.5V17H6c-1.104 0-2-.896-2-2V7c0-1.104.896-2 2-2zm13 10V7c0-.553-.447-1-1-1H6c-.553 0-1 .447-1 1v8c0 .553.447 1 1 1h3v2.621L13.36 16H18c.553 0 1-.447 1-1z"></path>
                                    </svg>
                                </th>
                                    <th class="comment-banner">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" viewBox="0 0 17 15" stroke="none" class="forum-icon-fill">
                                            <title>Likes</title>
                                            <path fill-rule="evenodd" d="M350,217.365a4.312,4.312,0,0,0-8-2.28,4.309,4.309,0,0,0-8,2.28,4.375,4.375,0,0,0,1.487,3.286l6.12,6.184A0.567,0.567,0,0,0,342,227a0.553,0.553,0,0,0,.4-0.165l6.12-6.184A4.375,4.375,0,0,0,350,217.365Z" transform="translate(-333.5 -212.5)"></path>
                                        </svg>
                                    </th>
                                    <th style="color: rgb(255, 255, 255);">Recent activity</th>
                                </tr>
                                </thead>
                                <tbody>
                                <td>
                            <div class="d-flex">
                                <div class="network-banner-details">

                                 <a href="{{route('comments')}}" class="whiteText" style="color: rgb(235 238 233);">
                                       {{$post->title}}
                                </a>

                                </div>
                            </div>
                                </td>
                                <td></td>
                                <td></td>
                                </tbody>


                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>


