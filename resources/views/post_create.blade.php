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
    <link rel="stylesheet" type="text/css" href="{{asset('css/editor.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style1.css')}}"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    {{--    <script src="{{asset('js/editor.js')}}"></script>--}}
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
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
    <style>
        #selectedFiles{
            display: flex;
        }
        #selectedFiles img {
            max-width: 125px;
            max-height: 125px;
            float: left;
            margin-bottom: 10px;
        }
    </style>
</head>
<body translate="no">
<div class="page-bg"></div>
<div class="position-relative">
    <header class="header-inner">
        <div class="container">
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
                        <img src="{{asset('images/'.$user->avatar_url)}}" width="40px" height="40px">
                        {{--                        <svg data-bbox="0 0 50 50" data-type="shape" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" class="dropIcon">--}}
                        {{--                            <g>--}}
                        {{--                                <path d="M25 48.077c-5.924 0-11.31-2.252-15.396-5.921 2.254-5.362 7.492-8.267 15.373-8.267 7.889 0 13.139 3.044 15.408 8.418-4.084 3.659-9.471 5.77-15.385 5.77m.278-35.3c4.927 0 8.611 3.812 8.611 8.878 0 5.21-3.875 9.456-8.611 9.456s-8.611-4.246-8.611-9.456c0-5.066 3.684-8.878 8.611-8.878M25 0C11.193 0 0 11.193 0 25c0 .915.056 1.816.152 2.705.032.295.091.581.133.873.085.589.173 1.176.298 1.751.073.338.169.665.256.997.135.515.273 1.027.439 1.529.114.342.243.675.37 1.01.18.476.369.945.577 1.406.149.331.308.657.472.98.225.446.463.883.714 1.313.182.312.365.619.56.922.272.423.56.832.856 1.237.207.284.41.568.629.841.325.408.671.796 1.02 1.182.22.244.432.494.662.728.405.415.833.801 1.265 1.186.173.154.329.325.507.475l.004-.011A24.886 24.886 0 0 0 25 50a24.881 24.881 0 0 0 16.069-5.861.126.126 0 0 1 .003.01c.172-.144.324-.309.49-.458.442-.392.88-.787 1.293-1.209.228-.232.437-.479.655-.72.352-.389.701-.78 1.028-1.191.218-.272.421-.556.627-.838.297-.405.587-.816.859-1.24a26.104 26.104 0 0 0 1.748-3.216c.208-.461.398-.93.579-1.406.127-.336.256-.669.369-1.012.167-.502.305-1.014.44-1.53.087-.332.183-.659.256-.996.126-.576.214-1.164.299-1.754.042-.292.101-.577.133-.872.095-.89.152-1.791.152-2.707C50 11.193 38.807 0 25 0"></path>--}}
                        {{--                            </g>--}}
                        {{--                        </svg>--}}
                        <button type="button" class="btn-generic profile-arrow  dropdown-toggle"
                                @if(auth()->guest())data-toggle="modal" @else data-toggle="dropdown"
                                @endif aria-haspopup="true" aria-expanded="false"
                                @if(auth()->guest())data-target=".login-modal"@endif>
                            <svg width="14" height="8" viewBox="0 0 14 8">
                                <path
                                    d="M1.707.293L.293 1.707l6 6a1 1 0 001.397.016l6-5.726L12.31.55 7.016 5.602 1.707.292z"></path>
                            </svg>
                            @if (auth()->guest())
                                Log In
                            @endif

                        </button>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                            <a class="dropdown-item" href="{{route('account')}}">My Account</a>
                            <a class="dropdown-item" href="{{route('logoutUser')}}"> @if(auth()->user()) Log
                                out @endif</a>
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
        <div class="network-container">

            <div class="network-section">
                <div class="network-info">
                    <div class="breadcrumb">
                        <a href="{{route('network')}}">
                            The Network
                        </a>
                        <a href="{{route('showPosts', $category->id)}}">
                            {{$category->name}}
                        </a>
                        <a href="#">
                            Create post
                        </a>
                    </div>
                    <div class="input-row">
                        <input type="text" placeholder="Search"/>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             class="_2_hbq desktop-header-search-icon-fill button-hover-fill"
                             data-hook="search-icon">
                            <path fill-rule="evenodd"
                                  d="M19.854 19.146c.195.196.195.512 0 .708-.196.195-.512.195-.708 0l-3.708-3.709C14.118 17.3 12.391 18 10.5 18 6.358 18 3 14.642 3 10.5 3 6.358 6.358 3 10.5 3c4.142 0 7.5 3.358 7.5 7.5 0 1.891-.7 3.619-1.855 4.938l3.709 3.708zM17 10.5C17 6.91 14.09 4 10.5 4S4 6.91 4 10.5 6.91 17 10.5 17s6.5-2.91 6.5-6.5z"></path>
                        </svg>
                    </div>
                </div>

                <!--                    <div class="search-banner">-->
                <!--                        <input type="text" placeholder="Search"/>-->
                <!--                        <svg width="19px" height="19px" viewBox="0 0 19 19" version="1.1"-->
                <!--                             xmlns="http://www.w3.org/2000/svg">-->
                <!--                            <path d="M16.9553,8.6584 C17.0183,9.2294 17.0143,9.8044 16.9463,10.3744 C16.9203,10.5934 16.7283,10.7544 16.5073,10.7414 L16.4133,10.7414 C15.7273,10.7394 15.1103,11.1604 14.8623,11.8014 C14.6153,12.4414 14.7893,13.1684 15.2993,13.6274 C15.4633,13.7754 15.4833,14.0254 15.3443,14.1974 C14.9873,14.6424 14.5803,15.0444 14.1313,15.3954 C13.9603,15.5274 13.7163,15.5074 13.5693,15.3494 C13.0903,14.8494 12.3603,14.6834 11.7123,14.9264 C11.0713,15.1934 10.6623,15.8304 10.6873,16.5254 C10.6953,16.7444 10.5313,16.9324 10.3123,16.9544 C10.0393,16.9844 9.7643,17.0004 9.4893,17.0004 C9.2003,16.9994 8.9123,16.9834 8.6253,16.9504 C8.4063,16.9244 8.2443,16.7324 8.2573,16.5114 C8.2973,15.8094 7.8913,15.1584 7.2433,14.8854 C6.5933,14.6344 5.8553,14.8004 5.3743,15.3054 C5.2263,15.4694 4.9763,15.4894 4.8043,15.3514 C4.3643,14.9974 3.9663,14.5944 3.6173,14.1504 C3.4843,13.9794 3.5043,13.7354 3.6633,13.5884 C4.1763,13.1184 4.3433,12.3794 4.0823,11.7344 C3.8303,11.1054 3.2173,10.6964 2.5393,10.7034 C2.3103,10.7094 2.1073,10.5564 2.0483,10.3354 C1.9843,9.7684 1.9843,9.1964 2.0483,8.6294 C2.0693,8.4104 2.2613,8.2474 2.4813,8.2624 C3.1803,8.2844 3.8233,7.8844 4.1133,7.2484 C4.3853,6.5984 4.2173,5.8474 3.6943,5.3744 C3.5303,5.2264 3.5103,4.9764 3.6493,4.8054 C4.0063,4.3604 4.4133,3.9574 4.8623,3.6054 C5.0333,3.4744 5.2773,3.4944 5.4243,3.6534 C5.9033,4.1524 6.6333,4.3184 7.2813,4.0764 C7.9253,3.8104 8.3363,3.1724 8.3113,2.4764 C8.3043,2.2574 8.4683,2.0704 8.6863,2.0474 C9.2473,1.9844 9.8133,1.9844 10.3733,2.0474 C10.5933,2.0724 10.7543,2.2654 10.7423,2.4864 C10.7013,3.1874 11.1073,3.8384 11.7543,4.1124 C12.4063,4.3654 13.1463,4.1994 13.6283,3.6924 C13.7763,3.5294 14.0263,3.5094 14.1983,3.6474 C14.6383,4.0004 15.0373,4.4024 15.3863,4.8464 C15.5203,5.0174 15.5003,5.2614 15.3403,5.4084 C14.8313,5.8704 14.6613,6.5994 14.9123,7.2404 C15.1643,7.8804 15.7863,8.2984 16.4733,8.2894 C16.7003,8.2854 16.9003,8.4384 16.9553,8.6584 Z M15.9933,9.7754 C16.0013,9.6004 16.0023,9.4254 15.9963,9.2514 C15.0913,9.0954 14.3273,8.4844 13.9823,7.6064 C13.6513,6.7654 13.7813,5.8154 14.2883,5.0964 C14.1753,4.9724 14.0563,4.8534 13.9343,4.7404 C13.4803,5.0544 12.9353,5.2294 12.3773,5.2294 C12.0393,5.2294 11.7083,5.1674 11.3653,5.0334 C10.5113,4.6724 9.9183,3.8964 9.7733,3.0044 C9.6923,3.0024 9.6113,3.0004 9.5303,3.0004 C9.4433,3.0004 9.3573,3.0024 9.2693,3.0054 C9.1093,3.8864 8.5053,4.6524 7.6313,5.0124 C7.3243,5.1284 7.0023,5.1854 6.6743,5.1854 C6.1193,5.1854 5.5763,5.0134 5.1183,4.6974 C4.9903,4.8144 4.8663,4.9364 4.7473,5.0634 C5.2723,5.8024 5.3923,6.7804 5.0233,7.6644 C4.6523,8.4754 3.9103,9.0474 3.0063,9.2134 C2.9983,9.3884 2.9983,9.5644 3.0053,9.7404 C3.9023,9.8924 4.6633,10.4954 5.0093,11.3594 C5.3513,12.2074 5.2273,13.1694 4.7143,13.8984 C4.8273,14.0224 4.9453,14.1424 5.0683,14.2574 C5.5213,13.9434 6.0663,13.7694 6.6243,13.7694 C6.9593,13.7694 7.2883,13.8314 7.6323,13.9624 C8.4873,14.3244 9.0813,15.1004 9.2253,15.9954 C9.3133,15.9984 9.4013,16.0004 9.4893,16.0004 C9.5693,16.0004 9.6483,15.9984 9.7283,15.9954 C9.8893,15.1174 10.4903,14.3514 11.3613,13.9904 C11.6693,13.8754 11.9923,13.8164 12.3203,13.8164 C12.8753,13.8164 13.4183,13.9884 13.8753,14.3044 C14.0043,14.1874 14.1273,14.0654 14.2463,13.9384 C13.7383,13.2224 13.6063,12.2784 13.9303,11.4394 C14.2783,10.5424 15.0593,9.9214 15.9933,9.7754 Z M9.5,12 C8.11928813,12 7,10.8807119 7,9.5 C7,8.11928813 8.11928813,7 9.5,7 C10.8807119,7 12,8.11928813 12,9.5 C12,10.8807119 10.8807119,12 9.5,12 Z M9.5,11 C10.3284271,11 11,10.3284271 11,9.5 C11,8.67157288 10.3284271,8 9.5,8 C8.67157288,8 8,8.67157288 8,9.5 C8,10.3284271 8.67157288,11 9.5,11 Z"></path>-->
                <!--                        </svg>-->
                <!--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"-->
                <!--                             class="breadcrumbs-icon-fill button-hover-fill">-->
                <!--                            <path d="M36.5 15c.828 0 1.5.672 1.5 1.5v.708l.193.058C40.403 17.98 42 20.053 42 22.5v2.882c0 .682.514 1.085.724 1.17.907.46 1.276 1.327 1.276 2.066V29c0 .552-.448 1-1 1h-4.05c-.232 1.141-1.24 2-2.45 2-1.21 0-2.218-.859-2.45-2H30c-.552 0-1-.448-1-1v-.382c0-.816.43-1.567 1.124-1.982.584-.281.876-.7.876-1.254V22.5c0-2.518 1.692-4.64 4-5.293V16.5c0-.828.672-1.5 1.5-1.5zm1.414 15h-2.828c.206.583.761 1 1.414 1 .653 0 1.208-.417 1.414-1zM36.5 16c-.276 0-.5.224-.5.5v1.527c-2.25.249-4 2.157-4 4.473v2.882c0 .816-.43 1.567-1.124 1.982l-.115.06c-.284.156-.761.5-.761 1.194V29h13v-.382c0-.696-.482-1.039-.724-1.17-.68-.318-1.276-1.13-1.276-2.066V22.5c0-2.316-1.75-4.223-4-4.472V16.5c0-.276-.224-.5-.5-.5z"-->
                <!--                                  transform="translate(-24 -12)"></path>-->
                <!--                        </svg>-->
                <!--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"-->
                <!--                             class="breadcrumbs-icon-fill button-hover-fill">-->
                <!--                            <path d="M36.5 15c.828 0 1.5.672 1.5 1.5v.708l.193.058C40.403 17.98 42 20.053 42 22.5v2.882c0 .682.514 1.085.724 1.17.907.46 1.276 1.327 1.276 2.066V29c0 .552-.448 1-1 1h-4.05c-.232 1.141-1.24 2-2.45 2-1.21 0-2.218-.859-2.45-2H30c-.552 0-1-.448-1-1v-.382c0-.816.43-1.567 1.124-1.982.584-.281.876-.7.876-1.254V22.5c0-2.518 1.692-4.64 4-5.293V16.5c0-.828.672-1.5 1.5-1.5zm1.414 15h-2.828c.206.583.761 1 1.414 1 .653 0 1.208-.417 1.414-1zM36.5 16c-.276 0-.5.224-.5.5v1.527c-2.25.249-4 2.157-4 4.473v2.882c0 .816-.43 1.567-1.124 1.982l-.115.06c-.284.156-.761.5-.761 1.194V29h13v-.382c0-.696-.482-1.039-.724-1.17-.68-.318-1.276-1.13-1.276-2.066V22.5c0-2.316-1.75-4.223-4-4.472V16.5c0-.276-.224-.5-.5-.5z"-->
                <!--                                  transform="translate(-24 -12)"></path>-->
                <!--                        </svg>-->
                <!--                    </div>-->
                <div class="main-container resources-forum mt-0">

                    <div class="resources-forum-left">
                        <div class="banner d-flex">
                            <div class="d-flex">
                                @if($user->avatar_url)<img src="{{asset('images/'.$user->avatar_url)}}"
                                                           class="img-fluid logo " width=24px height="24px"/>@endif
                                <a href="{{route('profile')}}" style="color:#fff;margin-left:8px;">{{$user->name}} </a>
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19"
                                     aria-label="Admin"
                                     class="_3LDKX forum-icon-fill forum-icon-fill _1zT4G"
                                     style="fill-rule: evenodd;margin-left:8px;"
                                ">
                                <path
                                    d="M15.3812,6.495914 L12.6789333,8.77258837 C12.6191333,8.84477644 12.5099333,8.85722265 12.4354,8.79997005 C12.4215333,8.79001308 12.4094,8.77756686 12.3998667,8.76429089 L9.78686667,6.14327115 C9.67766667,5.99225704 9.46186667,5.95491839 9.305,6.05863687 C9.26946667,6.08186981 9.23913333,6.11091099 9.21573333,6.14493065 L6.60013333,8.81075677 C6.5464,8.88626383 6.43893333,8.90534803 6.3592,8.85390366 C6.34446667,8.84394669 6.33146667,8.83233022 6.32106667,8.81905425 L3.61966667,6.50587098 C3.5018,6.36149485 3.28426667,6.33577266 3.13346667,6.44861837 C3.0494,6.51167921 3,6.60792997 3,6.70998895 L4,14 L15,14 L16,6.70169148 C16,6.51831719 15.8448667,6.36979232 15.6533333,6.36979232 C15.5476,6.36979232 15.4470667,6.41625821 15.3812,6.495914 Z"></path>
                                </svg>
                            </div>
                        </div>
                        <form method="post" id="myForm" enctype="multipart/form-data" action="{{url('/store')}}">
                            @csrf
                            <input type="hidden" value="{{$category->id}}" name="id">
                            <input type="text" name="title" class="textEditt" placeholder="Give this post a title">
                            <div class="">
                                <textarea name="description" class="textEdit"
                                          placeholder="Write your post here.Add photos,videos and more to get your message across."></textarea>
                            </div>
                            <div class="image-upload post">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">

                                        <label for="imageUpload">
                                            <div class="_1qOTu css-mm44dn css-1402lio">
                                                <svg width="30" height="19" viewBox="0 0 19 19">
                                                    <g fill-rule="evenodd">
                                                        <path
                                                            d="M2 6a1 1 0 0 1 1-1h2.75l.668-1.424A1 1 0 0 1 7.323 3h4.354a1 1 0 0 1 .905.576L13.25 5H16a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6zm1 0v8h13V6h-3.5l-1.018-2H7.518L6.5 6H3zm6.5 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0-1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <input type="file" id="imageUpload" name="photo[]" multiple/>
                                        </label>
                                    </div>
                                    <div id="selectedFiles"></div>
                                </div>
                                {{--                                 <label id="upload-label" for="upload" class="h--50 fs-14-black text-left text-muted">--}}
                                {{--                                     <div class="_1qOTu css-mm44dn css-1402lio"><svg width="30" height="19" viewBox="0 0 19 19"><g fill-rule="evenodd"><path d="M2 6a1 1 0 0 1 1-1h2.75l.668-1.424A1 1 0 0 1 7.323 3h4.354a1 1 0 0 1 .905.576L13.25 5H16a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6zm1 0v8h13V6h-3.5l-1.018-2H7.518L6.5 6H3zm6.5 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0-1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path></g></svg></div>--}}
                                {{--                                 </label>--}}
                                <input id="upload" type="file" name="video[]" onchange="readURL(this);"
                                       style="display: none" class="form-control">
                                {{--                                 <label id="upload-label" for="upload" class="h--50 fs-14-black text-left text-muted">--}}
                                {{--                                     <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 19 19" width="30" height="19"><defs><path id="video-icon-path" d="M14 7l2.842-1.421A.8.8 0 0 1 18 6.294v6.412a.8.8 0 0 1-1.158.715L14 12v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v2zm0 3.9l2.708 1.354a.2.2 0 0 0 .29-.179V6.922a.2.2 0 0 0-.29-.178L14 8.098V10.9zM2 5v9h11V5H2z"></path></defs><g fill-rule="evenodd"><mask id="video-icon-mask"><use xlink:href="#video-icon-path"></use></mask><use fill-rule="nonzero" xlink:href="#video-icon-path"></use></g></svg>--}}
                                {{--                                 </label>--}}

                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                </div>
                                <div class="d-flex justify-content-between w-70">
                                    <button type="reset" class="publish_cancel">Cancel</button>
                                    <button class="publish_btn" type="submit">Publish</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<!--<script src="js/jquery.min.js"></script>-->
<!--<script src="js/bootstrap.js"></script>-->

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js"></script>-->
<script id="rendered-js">
    $(document).ready(function () {
        $('.dropdown-item').on('click', function () {
            if ($(this).attr('href')) {
                alert('redirect to ' + $(this).attr('href'));
                window.location.replace($(this).attr('href'));

            }

        });
    });
    //# sourceURL=pen.js
</script>
<script>

    //     function readmultifiles(files) {
    //         var reader = new FileReader();
    //         function readFile(index) {
    //             if( index >= files.length ) return;
    //             var file = files[index];
    //             reader.onload = function(e) {
    //                 var bin = e.target.result;
    //                 $("#imagePreview").append(`<img src='${file.name}'>`)
    //
    // // get file content
    //
    // // do sth with bin
    //                 readFile(index+1)
    //             }
    //             reader.readAsBinaryString(file);
    //         }
    //         readFile(0);
    //     }

    //
    // function readURL(input) {
    //    // input.files.map((item)=>{
    //    //
    //    // });
    //     // if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         // console.log(reader)
    //         reader.onload = function(e) {
    //             $('#imagePreview').append(`<img src="${ e.target.result}">`);
    //             // $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
    //             // $('#imagePreview').hide();
    //             // $('#imagePreview').fadeIn(650);
    //         }
    //         for(i=0; i<input.files.length; i++){
    //
    //             console.log( e.target.result,'rdsfgdsfgdfg ')
    //             $('#imagePreview').append(`<img src="${''}">`);
    //             console.log(input.files[i],'iiiiiiiiiii')
    //
    //         }
    //     }
    //
    //     // reader.readAsDataURL(input.files[0]);
    //     // reader.readAsDataURL(input.files[1]);
    //
    //
    //
    // $("#imageUpload").change(function() {
    //     readURL(this);
    // });



    var selDiv = "";

    document.addEventListener("DOMContentLoaded", init, false);

    function init() {
        document.querySelector('#imageUpload').addEventListener('change', handleFileSelect, false);
        selDiv = document.querySelector("#selectedFiles");
    }

    function handleFileSelect(e) {

        if (!e.target.files || !window.FileReader) return;

        selDiv.innerHTML = "";

        let files = e.target.files;
        let filesArr = Array.prototype.slice.call(files);
        filesArr.forEach(function (f) {
            if (!f.type.match("image.*")) {
                return;
            }

            let reader = new FileReader();
            reader.onload = function (e) {
                let html = "<img src=\"" + e.target.result + "\">";
                selDiv.innerHTML += html;
            }
            reader.readAsDataURL(f);
        });

    }
</script>
<script>
    updateList = function () {


        var input = document.getElementById('imageUpload');
        var output = document.getElementById('imagePreview');
        console.log(input)
        var children = "";
        for (var i = 0; i < input.files.length; ++i) {
            let url = $('#imageUpload')[i]
            console.log(input.files[i].url, '55555555555555555');
            // children += '<img src="'+ url + input.files.item(i).name + '" width="200px" height="200px">';
        }
        output.innerHTML = children;
    }
</script>
<!--<script src="js/jquery.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>-->
<!--<script src="js/bootstrap.js"></script>-->
<!--<script src="js/main.js"></script>-->
<!--<script>-->
<!--    $('.moreless-button').click(function () {-->
<!--        $('.moretext').slideToggle();-->
<!--        if ($('.moreless-button').text() == "Read more") {-->
<!--            $(this).text("Read less")-->
<!--        } else {-->
<!--            $(this).text("Read more")-->
<!--        }-->
<!--    });-->
<!--</script>-->
</body>
</html>
