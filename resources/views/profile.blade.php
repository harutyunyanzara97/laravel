<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>sanctuaryforhumanity</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/reset.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/editor.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#txtEditor").Editor();
        });
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="apple-touch-icon" type="image/png"
          href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
    <meta name="apple-mobile-web-app-title" content="CodePen">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Space+Mono:400,400i,700,700i');



    #stripeModal {
        max-height: 70%;
        margin: auto;
        overflow-y: auto;
    }
    #stripeModal  .modal-content {
        padding: 20px;
        border-radius: 5px;
        height: 100%;
    }

    #stripeModal  .card input {
        margin: 0 !important;
        width: 85%;
    }

    #stripeModal  .modal-dialog {
        /* height: auto; */
        margin: auto;
        /* position: absolute; */
        left: 0;
        right: 0;
        max-width: 500px;
        height: auto;
        bottom: 0;
        top: 0;
        border-radius: 10px;
    }
    #stripeModal  .modal-dialog h2 {
        font-size: 24px;
    }

    #stripeModal  .modal-body {
        position: relative;
        overflow-y: auto;
        max-height: 400px;
        overflow-x: hidden;
        padding: 15px 0;
    }

    #stripeModal  .modal-header {
        padding: 0;
    }

    #stripeModal  .card-body {
        padding: 15px 0;
    }

    .payment-submit {
        background: rgb(78, 102, 54);
        border: none;
        cursor: pointer;
    }

    #stripeModal  .modal-header .close {
        position: absolute;
        right: 10px;
        top: -5px;
    }
    #stripeModal  .input-group {
        border:1px solid #d6d6d6;
    }
    #payment-form {
        height: 100px;
    }
</style>

<body translate="no">
<div class="page-bg"></div>
<div class="position-relative">
    <header class="header-inner">
        <div class="container modalOpen">

            <div class="navbar-expand-md navbar-dark">
                <div class="flex-row d-flex">
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="menu-box">

                    <div class="navbar-collapse collapse" id="collapsingNavbar">
                        <ul>
                            <li>
                                <a href="{{route('home')}}">
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
                                <a href="{{route('members')}}">
                                    Members
                                </a>
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
                        @auth
                            @if(Auth::user()->avatar_url)<img src="{{asset('images/'.Auth::user()->avatar_url)}}"
                                                              width="30px" height="30px">@endif

                            <button type="button" class="btn-generic profile-arrow  dropdown-toggle"
                                    @guest data-toggle="modal" @else data-toggle="dropdown"
                                    @endguest aria-haspopup="true" aria-expanded="false"
                                    @guest data-target=".login-modal"@endguest>
                                <svg width="14" height="8" viewBox="0 0 14 8">
                                    <path
                                        d="M1.707.293L.293 1.707l6 6a1 1 0 001.397.016l6-5.726L12.31.55 7.016 5.602 1.707.292z"></path>
                                </svg>
                                @endauth
                                @guest
                                    <a class="nav-link" style="color:white"
                                       href="{{ route('login') }}">{{ __('Login') }}</a>
                                @endguest

                            </button>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                                <a class="dropdown-item" href="#">My Account</a>
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
        <div class="profile-banner">
            <div class="profile-left-banner">
                <div class="profile-inner">
                    <div class="avatar-upload">

                        <div class="avatar-preview mt-2">
                            <div class="avatar-preview mt-2">
                                @if(Auth::user() && Auth::user()->avatar_url) <img src="{{asset('images/'. Auth::user()->avatar_url)}}" id="imagePreview" style="width:100px;height: 100px;border-radius: 50%;">
                                @endif
                            </div>
                        </div>
                        <p class="mt-3 mb-3 text-white text-center">@if(Auth::user()){{Auth::user()->name}}@endif</p>
                        @auth
                            @if(Auth::user()->notify==="1") <p class="text-white text-center">Moderator</p> @endif
                        @endauth
                    </div>

                    <form action="{{url('updateUser')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="@if(Auth::user()){{Auth::user()->id}} @endif" name="id">
                        <div class="edit-photo">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload" name="photo[]">
                                    <label for="imageUpload" style="margin:auto;color:black"><a type="button" class="edit-photos">
                                            @auth @if(Auth::user()->avatar_url) Edit photo @else Upload photo @endif @endauth
                                        </a></label>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="edit-btn" style="display: none;background:rgba(155, 203, 108, 0.8); color:#0b2a3c">
                            Upload
                        </button>
                    </form>

                </div>
                <ul class="profile-list">
                    <li>
                        <a href="{{route('profile')}}" class="active toCoursor" data-url="{{route('profile')}}">
                            Profile
                        </a>
                    </li>
                    <li>
                        <a class="changePassword toCoursor" data-url="{{route('changePassword')}}">
                            Change password
                        </a>
                    </li>
                    <li>
                        <a class="myPosts toCoursor" data-url="{{route('myPosts')}}">
                            Forum Posts ({{count($posts)}})
                        </a>
                    </li>
                    <li>
                        <a class="myComments toCoursor" data-url="{{route('myComments')}}">
                            Forum Comments ({{count($comments)}})
                        </a>
                    </li>
                    <li>
                        <a class="myAccount toCoursor" data-url="{{route('account')}}">
                            My Account
                        </a>
                    </li>
                    <li>
                        <a class="myBalance toCoursor" data-url="{{route('balance')}}">
                            Balance history
                        </a>
                    </li>
                    @auth
                        @if(Auth::user()->is_admin==="1")
                            <li>
                                <a href="{{route('admin.dashboard')}}">Create category
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>

                <button  class="btn payment-btn" data-toggle="modal"
                         data-target="#stripeModal">Add card
                </button>

                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @elseif(Session::has('error'))
                    <div class="alert alert-danger text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('error') }}</p>
                    </div>@endif
                <div class="modal fade" id="stripeModal" tabindex="-1" role="dialog" aria-labelledby="ModalInfo">
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content pb-5 pt-4">
                            <div class="modal-header border-0">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="cards">

                                @foreach($cards as $card)
                                    <div class="card-i">
                                        <div class="bank-name" title="BestBank">{{$card->brand}}</div>
                                        <div class="chip">
                                            <div class="side left"></div>
                                            <div class="side right"></div>
                                            <div class="vertical top"></div>
                                            <div class="vertical bottom"></div>
                                        </div>
                                        <div class="data">
                                            <div class="pan" title="4123 4567 8910 1112">{{$card->card_number}}</div>
                                            <div class="exp-date-wrapper">
                                                <div class="left-label">EXPIRES END</div>
                                                <div class="exp-date">
                                                    <div class="upper-labels">MONTH/YEAR</div>
                                                    <div class="date" title="01/17">{{$card->exp_month}}/{{substr($card->exp_year, -2)}}</div>
                                                </div>
                                            </div>
                                            <div class="name-on-card" title="John Doe">@if(Auth::user()->name && Auth::user()->surname){{Auth::user()->name - Auth::user()->surname}}@endif</div>
                                        </div>
                                        <div class="lines-down"></div>
                                        <div class="lines-up"></div>
                                    </div>

                                @endforeach
                            </div>

                            <div class="modal-body payment-body">
                                <div id="card-errors" role="alert"></div>
                                <div class="card">

                                    <div class="card-body">

                                        <form id="payment-form" action="{{ route('stripe.create') }}" method="post"
                                              data-cc-on-file="false"
                                              data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                              class="require-validation">

                                            @csrf
                                            <div class='form-row row'>
                                                <div class='col-xs-12 form-group required'>
                                                    <label class='control-label'>Name on Card</label> <input
                                                        class='form-control' size='4' type='text' name="name">
                                                </div>
                                            </div>

                                            <div class='form-row row'>
                                                <div class='col-xs-12 form-group card required'>
                                                    <label class='control-label'>Card Number</label> <input
                                                        autocomplete='off' class='form-control card-number'
                                                        name="number"
                                                        size='20'
                                                        type='text'>
                                                </div>
                                            </div>

                                            <div class='form-row row'>
                                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                    <label class='control-label'>CVC</label> <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311'
                                                                                                    size='4'
                                                                                                    type='text'
                                                                                                    name="cvc">
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Exp.Month</label> <input
                                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                                        type='text' name="month">
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Exp.Year</label> <input
                                                        class='form-control card-expiry-year' placeholder='YYYY'
                                                        size='4'
                                                        type='text' name="year">
                                                </div>
                                            </div>

                                            <div class='form-row row'>
                                                <div class='col-md-12 error form-group hide'>
                                                    <div class='alert-danger alert'>Please correct the errors and try
                                                        again.
                                                    </div>
                                                </div>
                                            </div>
                                            @if($errors->any())
                                                <h4>{{$errors->first()}}</h4>
                                            @endif
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <button class="btn payment-submit"
                                                            type="submit">Add payment
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-right-banner">
                <form method="POST" id="editProfile" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="id" value="@if(Auth::user()){{Auth::user()->id}}@endif">
                    <div class="container-fluid rich-editor">
                        <h3>About
                        </h3>
                        <div class="container-fluid">
                            <p class="pull-right">
                                <script>document.write(new Date().getFullYear())</script>
                            </p>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 nopadding">
                                        <textarea id="txtEditor">@if(Auth::user()){{Auth::user()->about}}@endif</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-btn-group">
                            <button type="button" class="btn-grey">
                                Discard
                            </button>
                            <button type="submit" class="btn-blue">
                                Publish
                            </button>
                        </div>
                        <p class="d-flex justify-content-end text-white">
                            Unpublished Changes
                        </p>
                    </div>
                </form>
            </div>
        </div>

    </main>
</div>
<div class="modal fade" id="ModalInfo" tabindex="-1" role="dialog" aria-labelledby="ModalInfo">
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content pb-5 pt-4">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src="{{asset('img/cross-icon.png')}}" alt=""></span>
                </button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
</body>
<script>
    $('.cardButton').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).data('path'),
            method: "get",
            data: {_token: $('meta[name="csrf-token"]').attr('content')},
            success: (response) => {
                console.log(response);
                $('#ModalInfo div.modal-body').html(response);
            }
        })
    });
</script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/editor.js')}}"></script>
<script id="rendered-js">
    $(document).ready(function () {
        $('.dropdown-item').on('click', function () {
            if ($(this).attr('href')) {
                // alert('redirect to ' + $(this).attr('href'));
                window.location.replace($(this).attr('href'));

            }

        });
    });
    //# sourceURL=pen.js
</script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result );
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageUpload").change(function () {
        $('.edit-photos').remove();
        $('.edit-btn').css('display','block');
        readURL(this);
    });
</script>

<script>
    $("#editProfile").on("submit", function (e) {
        e.preventDefault();
        var edit = $('.Editor-editor').text();
        let id = $('input[name=id]').val();
        var about = $('textarea#txtEditor').text(edit);
        let aboutVal = about.val();
        let formdata = new FormData($(this)[0]);
        formdata.append('about', aboutVal);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{{route('editAbout')}}',
            type: 'POST',
            data: formdata,
            // dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                alert('Now other users have information about you!');
                window.location.reload();
            }, error: function (error) {
                console.log(error)
            }
        });

    });
    $(() => {
        let textVal = $('#txtEditor').html();
        $('.Editor-editor').text(textVal);
    })
    $(document).on('click', '.edit-btn', function (event) {
        // event.preventDefault();
        $.ajax({
            type: "get",
            data: {_token: $('meta[name="csrf-token"]').attr('content')},
            success: function (r) {
                $('#imageUpload').change();
                $('.profile-inner').empty();
                $('.profile-inner').append(``);
            }

        })
    })

</script>
