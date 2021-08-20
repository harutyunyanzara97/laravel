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
    <style>
        #stripeModal .card input.group-radio {
            margin: 0 !important;
            width: 13px;
            top: 0;
            left: 0 !important;
            /* right: 10px !important; */
            margin-right: 12px !important;
            position: relative;
        }
        #stripeMod .card input.group-radio {
            margin: 0 !important;
            width: 13px;
            top: 0;
            left: 0 !important;
            /* right: 10px !important; */
            margin-right: 12px !important;
            position: relative;
        }
        #stripeModd .card input.group-radio {
            margin: 0 !important;
            width: 13px;
            top: 0;
            left: 0 !important;
            /* right: 10px !important; */
            margin-right: 12px !important;
            position: relative;
        }
        label.radio-row {
            display: flex;
            align-items: center;
            position: relative;
            justify-content: start;
            width: 265px;
        }

        .selectedFiless {
            display: flex;
        }

        .selectedFiless img {
            max-width: 210px;
            max-height: 125px;
            float: left;
            margin-bottom: 10px;
        }

        #stripeModal {
            margin: auto;
            height: 64%;
            overflow: hidden;
        }
        #stripeMod {
            margin: auto;
            height: 64%;
            overflow: hidden;
        }
        #stripeModd {
            margin: auto;
            height: 64%;
            overflow: hidden;
        }
        #payment-submit {
            background: rgb(78, 102, 54);
            border: none;
            cursor: pointer;
        }
        #payment-submitt {
            background: rgb(78, 102, 54);
            border: none;
            cursor: pointer;
        }
        #payment-submitts {
            background: rgb(78, 102, 54);
            border: none;
            cursor: pointer;
        }
    </style>

</head>
<body>


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
                        <button type="button"><a href="{{route('login')}}">Log In</a></button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="block-wrap">


                        <!-- facebook	 -->
                        <div>
                            <a class="btn-fb">
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
                            <div class="read-more-article mr-3">
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
            <div class="network-info">
                <div class="breadcrumb d-flex">
                    <a href="{{route('network')}}">
                        The Network
                    </a>

                    <a href="{{route('showPosts',$post->categories->id)}}">
                        {{$post->categories->name}}
                    </a>
                    <a href="#">
                        {{$post->title}}
                    </a>

                </div>

            </div>


            <div class="main-container resources-forum mt-0 d-flex" style="background: #2e5e27;">
                <div class="row post-comments">
                    <div class="col-9">
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
                        <div class="resources-forum-left">
                            <div class="banner d-flex">
                                <div class="d-flex">
                                    <a href="{{route('member-profile',$post->user->id)}}">
                                        @if($post->user->avatar_url)<img
                                            src="{{asset('images/'.$post->user->avatar_url)}}"
                                            class="img-fluid logo " style="text-decoration: none;" width=24px
                                            height="24px"/>@endif
                                    </a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19"
                                         aria-label="Admin"
                                         class="_3LDKX forum-icon-fill forum-icon-fill _1zT4G"
                                         style="fill-rule: evenodd;margin-left:8px;
                                                                    ">
                                        <path
                                            d="M15.3812,6.495914 L12.6789333,8.77258837 C12.6191333,8.84477644 12.5099333,8.85722265 12.4354,8.79997005 C12.4215333,8.79001308 12.4094,8.77756686 12.3998667,8.76429089 L9.78686667,6.14327115 C9.67766667,5.99225704 9.46186667,5.95491839 9.305,6.05863687 C9.26946667,6.08186981 9.23913333,6.11091099 9.21573333,6.14493065 L6.60013333,8.81075677 C6.5464,8.88626383 6.43893333,8.90534803 6.3592,8.85390366 C6.34446667,8.84394669 6.33146667,8.83233022 6.32106667,8.81905425 L3.61966667,6.50587098 C3.5018,6.36149485 3.28426667,6.33577266 3.13346667,6.44861837 C3.0494,6.51167921 3,6.60792997 3,6.70998895 L4,14 L15,14 L16,6.70169148 C16,6.51831719 15.8448667,6.36979232 15.6533333,6.36979232 C15.5476,6.36979232 15.4470667,6.41625821 15.3812,6.495914 Z"></path>
                                    </svg>
                                    @auth
                                        <a href="{{route('member-profile',$post->user->id)}}"
                                           style="color:#fff;margin-left:8px; text-decoration: none;">{{$post->user->name}} </a>
                                    @endauth

                                </div>
                            </div>
                            <div class="postbar">
                                <div class="post-inner">

                                    <p>{{$post->title}}</p>
                                    <div class="wrapped-section">
                                        <div class="desc-post" style="margin-bottom:13px">
                                            <pre style="color: white;
                                                display: block;
                                                margin-top: 0;
                                                background: #064317;
                                                border:none !important;
                                                margin-bottom: 1rem;
                                                font-size: 90%;">
                                                {{$post->description}}
                                            </pre>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex justify-content-center align-items-center"
                                             style="margin:0 auto;">
                                            @if($post->categories->name != "Business" ||  $post->categories->name != "Resources")
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
                                            @else
                                            @guest
                                                <button class="rate-btn" data-toggle="modal" aria-haspopup="true"
                                                        aria-expanded="false" data-target=".login-modal">
                                                </button>
                                                <button class="rate-btn" data-toggle="modal" aria-haspopup="true"
                                                        aria-expanded="false" data-target=".login-modal">
                                                </button>
                                            @else
                                                <button id="helpful" class="rate-btn" data-id="{{$post->id}}"
                                                        data-name="helpful" @if($helpful) style="background:#2aaa10; height:40px; width:100px" @else style="background: rgba(155, 203, 108, 0.73)" @endif>
                                                </button>
                                                <button id="calculated" class="rate-btn" data-id="{{$post->id}}"
                                                        data-name="calculated" @if($calculated) style="background: #aa2210;height:40px; width:100px;margin-left:30px" @else style="background: rgba(155, 203, 108, 0.73);margin-left:30px" @endif >
                                                </button>
                                            @endguest
                                            @endif
                                            @auth
                                                <button class="ml-3 payment-info-post" data-toggle="modal"
                                                        @if($cards) data-target="#stripeModal" @else
                                                        data-target="#messageModal" @endif><img
                                                        src="{{asset('images/icon1.png')}}" width="30px" height="30px">
                                                </button>@endauth
                                        </div>
                                    </div>
                                    @if($post->files)
                                        @foreach(explode('/',$post->files) as $file)
                                            <div class="mySlides">
                                                <video controls src="{{asset('uploads/'.$file)}}" height=200px
                                                       width=200px style="display: block"
                                                       alt="slide">
                                                </video>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if($post->images)
                                        <div class="post-slider position-relative">

                                            @foreach(explode('/',$post->images) as $image)
                                                <div class="mySlides">
                                                    <img src="{{asset('images/'.$image)}}" height=200px
                                                         alt="slide">
                                                </div>
                                            @endforeach
                                            <a class="prev" onclick="plusSlides(-1)">❮</a>
                                            <a class="next" onclick="plusSlides(1)">❯</a>
                                        </div>


                                        <a href="" class="comment-section d-flex align-items-center">


                                        </a>

                                        <div class="row mySlides-thumbnail">
                                            @foreach(explode('/',$post->images) as $image)
                                                <div>
                                                    <img class="demo cursor" src="{{asset('images/'.$image)}}"
                                                         style="width:100px"
                                                         onclick="currentSlide({{ $loop->index }})"
                                                         alt="Image not Available">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    {{--post-content--}}
                                    <div class="d-flex justify-content-between borderedPost">
                                        <a class="comment-section countComments d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" wdth="24" height="24"
                                                 viewBox="0 0 24 24"
                                                 stroke="none"
                                                 class="forum-icon-fill"><title>Posts</title>
                                                <path fill-rule="evenodd"
                                                      d="M6 5h12c1.104 0 2 .896 2 2v8c0 1.104-.896 2-2 2h-4.36l-4.884 2.93c-.079.047-.168.07-.256.07-.086 0-.17-.021-.247-.065C8.097 19.846 8 19.68 8 19.5V17H6c-1.104 0-2-.896-2-2V7c0-1.104.896-2 2-2zm13 10V7c0-.553-.447-1-1-1H6c-.553 0-1 .447-1 1v8c0 .553.447 1 1 1h3v2.621L13.36 16H18c.553 0 1-.447 1-1z"></path>
                                            </svg>

                                            <span>   {{count($post->comments)}} Comments </span>
                                            <i class="fa fa-heart mr-2 heart"></i>{{count($post->likes)}}

                                        </a>


                                        <a class="share_btn" data-toggle="modal" data-target="#myModal">
                                            <i class="fa fa-share" style="margin-right: 8px;"></i>
                                            <span>Share</span>
                                        </a>
                                    </div>


                                    @if($post->comments)
                                        @foreach($post->comments as $comment)
                                            <div class="banner d-flex mt-4">
                                                <div class="d-flex align-items-center ml-5">
                                                    @if($comment->user->avatar_url)<img
                                                        src="{{asset('images/'.$comment->user->avatar_url)}}"
                                                        class="logo" width="24px" height="24px"/>@endif
                                                    @if($comment->user->is_admin==="1")
                                                        <a href="{{route('profile')}}"
                                                           style="color:#fff;margin-left:8px;text-decoration: none;">{{$comment->user->name}} </a>
                                                    @else
                                                        <a href="{{route('member-profile',$comment->user->id)}}"
                                                           style="color:#fff;margin-left:8px;text-decoration: none;">{{$comment->user->name}} </a>
                                                    @endif
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                         viewBox="0 0 19 19"
                                                         aria-label="Admin"
                                                         class="_3LDKX forum-icon-fill forum-icon-fill _1zT4G"
                                                         style="fill-rule: evenodd;margin-left:8px;">
                                                        <path
                                                            d="M15.3812,6.495914 L12.6789333,8.77258837 C12.6191333,8.84477644 12.5099333,8.85722265 12.4354,8.79997005 C12.4215333,8.79001308 12.4094,8.77756686 12.3998667,8.76429089 L9.78686667,6.14327115 C9.67766667,5.99225704 9.46186667,5.95491839 9.305,6.05863687 C9.26946667,6.08186981 9.23913333,6.11091099 9.21573333,6.14493065 L6.60013333,8.81075677 C6.5464,8.88626383 6.43893333,8.90534803 6.3592,8.85390366 C6.34446667,8.84394669 6.33146667,8.83233022 6.32106667,8.81905425 L3.61966667,6.50587098 C3.5018,6.36149485 3.28426667,6.33577266 3.13346667,6.44861837 C3.0494,6.51167921 3,6.60792997 3,6.70998895 L4,14 L15,14 L16,6.70169148 C16,6.51831719 15.8448667,6.36979232 15.6533333,6.36979232 C15.5476,6.36979232 15.4470667,6.41625821 15.3812,6.495914 Z"></path>
                                                    </svg>

                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center edit-com">
                                                <div></div>
                                                <div class="ml-5 desc-post" style="margin-bottom:13px">
                                                    <p class="description-comment" style="display: contents;"> {{$comment->description}}</p>

                                                    <div class="d-flex justify-content-between">
                                                        @if($comment->images)
                                                            @foreach(explode('/',$comment->images) as $image)
                                                                <img src="{{asset('images/'.$image)}}"
                                                                     class="img-fluid ml-3" width="100px" height="100px"/>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                @auth
                                                    @if($comment->user->id === Auth::id() || Auth::user()->is_admin==="1" || Auth::user()->notify==="1")
                                                        <div class="follow-details">
                                                            <button type="button" class="dropdown-toggle p-0"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" role="img"
                                                                     width="24"
                                                                     height="24"
                                                                     viewBox="0 0 24 24">
                                                                    <path fill-rule="evenodd"
                                                                          d="M22.444 13.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463.821.01 1.482.679 1.482 1.5-.016.844-.712 1.515-1.556 1.5zm0-6.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463C23.34 4.01 24 4.68 24 5.5c-.016.844-.712 1.515-1.556 1.5zm.112 10c.82.03 1.464.716 1.444 1.537-.02.82-.697 1.473-1.519 1.463-.82-.01-1.48-.679-1.481-1.5.017-.843.713-1.514 1.556-1.5z"></path>
                                                                </svg>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item editComment text-white align-items-center"
                                                                   data-id="{{$comment->id}}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24"
                                                                         viewBox="0 0 24 24">
                                                                        <path fill-rule="evenodd"
                                                                              d="M16.679 5.602l1.702 1.704c.826.827.826 2.172 0 3l-8.17 8.18L4 20l1.512-6.218 8.17-8.18c.799-.802 2.196-.803 2.997 0zM8.661 16.046l1.312 1.314 5.652-5.658-3.336-3.341-5.652 5.659 1.317 1.319 3.193-3.193c.195-.195.512-.195.707 0 .195.196.195.512 0 .708L8.66 16.046zm7.645-5.026L17.7 9.624c.45-.451.45-1.186 0-1.637l-1.702-1.704c-.437-.437-1.197-.436-1.634 0L12.97 7.679l3.336 3.34zm-10.88 7.554l3.569-.83-2.741-2.745-.828 3.575z"></path>
                                                                    </svg>
                                                                    Edit comment</a>
                                                                <a class="dropdown-item align-items-center"
                                                                   href="{{route('deleteComment',$comment->id)}}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24"
                                                                         viewBox="0 0 24 24">
                                                                        <path fill-rule="evenodd"
                                                                              d="M17 17c0 1.657-1.343 3-3 3H9c-1.657 0-3-1.343-3-3V7H5V6h13v1h-1v10zM9 9h1v7H9V9zm4 0h1v7h-1V9zm-6 8c0 1.105.895 2 2 2h5c1.105 0 2-.895 2-2V7H7v10zm6-11V5h-3v1H9V5c0-.552.448-1 1-1h3c.552 0 1 .448 1 1v1h-1z"></path>
                                                                    </svg>
                                                                    Delete comment</a>

                                                                <div class="dropdown-divider"></div>

                                                            </div>


                                                        </div>
                                                    @endif


                                                @endauth
                                            </div>
                                            {{--comment-content--}}
                                            <div></div>
                                            <div class="d-flex reply-sections mt-2">
                                                <div class="row">
                                                    <div class="d-flex justify-content-center align-items-center"
                                                         style="margin-left: 42px">
                                                        @guest
                                                            <button class="rate-btn" data-toggle="modal" aria-haspopup="true"
                                                                    aria-expanded="false" data-target=".login-modal">
                                                            </button>
{{--                                                            <button class="rate-btn" data-toggle="modal" aria-haspopup="true"--}}
{{--                                                                    aria-expanded="false" data-target=".login-modal">The fence--}}
{{--                                                            </button>--}}
                                                            <button class="rate-btn" data-toggle="modal" aria-haspopup="true"
                                                                    aria-expanded="false" data-target=".login-modal">
                                                            </button>
                                                        @else
                                                            <button class="rate-btn @if(isset($comment->isAgree[0]) )rated-green @else not-rated-green @endif" id="helpful-comment" data-id="{{$comment->id}}"
                                                                    data-name="helpful">
                                                            </button>
                                                            <button id="calculated-comment" class="rate-btn @if(isset($comment->isDisAgree[0]) )rated-green @else not-rated-green @endif" data-id="{{$comment->id}}"
                                                                    data-name="calculated" style="margin-left:30px">
                                                            </button>
                                                        @endguest
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="stripeMod" tabindex="-1" role="dialog" aria-labelledby="ModalInfo" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content pb-5 pt-4">
                                                            <div class="modal-header border-0">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div>
                                                                    <div id="card-errors" role="alert"></div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="group d-flex flex-column flex-wrap">

                                                                                @auth
                                                                                    <form id="payment-formm" action="{{ route('stripe.payComment') }}" method="post"
                                                                                          class="require-validation">
                                                                                        @csrf
                                                                                        <input type="hidden" class="form-input" name="userId">
                                                                                        <input type="hidden" value="{{$comment->user}}" name="commentUser">
                                                                                        <input type="hidden" class="comment-input" name="commentId">
                                                                                        <div class='form-row row'>
                                                                                            <input type="number" class="form-control" id="price" name="price"
                                                                                                   placeholder="Please enter the price">
                                                                                        </div>

                                                                                        <div class="outcome">
                                                                                            <div class="error"></div>
                                                                                            <div class="success-saved-card">
                                                                                                Success! Your are using saved card <span
                                                                                                    class="saved-card"></span>
                                                                                            </div>
                                                                                            <div class="success-new-card">
                                                                                                Success! The Stripe token for your new card is <span
                                                                                                    class="token"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                @endauth

                                                                                <div class="row">
                                                                                    <div class="col-xs-12">
                                                                                        <button class="btn" id="payment-submitt"
                                                                                                type="submit">Pay
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @auth

                                                    <button class="ml-3 payment-info" data-toggle="modal"
                                                            @if($cards) data-target="#stripeMod"  data-id="{{$comment->user->id}}" data-path="{{$comment->id}}" @else
                                                            data-target="#messageModal" @endif><img
                                                            src="{{asset('images/icon1.png')}}" width="30px" height="30px">
                                                        <span style="color:#fff;margin-left:5px;margin-top:3px;">@if($comment->isBought) {{count($comment->isBought)}}  @endif</span>

                                                    </button>
                                                @endauth
                                                <a href="" class="comment-section comments d-flex align-items-center mt-1">
                                                    @auth
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24"
                                                             stroke="none"
                                                             class="forum-icon-fill"><title>Posts</title>
                                                            <path fill-rule="evenodd"
                                                                  d="M6 5h12c1.104 0 2 .896 2 2v8c0 1.104-.896 2-2 2h-4.36l-4.884 2.93c-.079.047-.168.07-.256.07-.086 0-.17-.021-.247-.065C8.097 19.846 8 19.68 8 19.5V17H6c-1.104 0-2-.896-2-2V7c0-1.104.896-2 2-2zm13 10V7c0-.553-.447-1-1-1H6c-.553 0-1 .447-1 1v8c0 .553.447 1 1 1h3v2.621L13.36 16H18c.553 0 1-.447 1-1z"></path>
                                                        </svg>
                                                        <span class="replyMe" data-id="{{$comment->id}}"
                                                              data-path="{{$post->id}}"
                                                        >Reply</span>@endauth
                                                </a>
                                            </div>
                                            {{--reply-content--}}
                                            <div></div>
                                            <div class="commentReply"></div>
                                            @if($comment->reply)
                                                @foreach($comment->reply as $reply)
                                                    <div class="banner reply-sec d-flex mt-4">
                                                        <div class="d-flex align-items-center">
                                                            @if($reply->user->avatar_url)<img
                                                                src="{{asset('images/'.$reply->user->avatar_url)}}"
                                                                class="img-fluid logo" width="24px" height="24px"/>@endif
                                                            @auth
                                                                <a href="{{route('profile')}}"
                                                                   style="color:#fff;margin-left:8px;">{{$reply->user->name}} </a>


                                                                <svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                                     viewBox="0 0 19 19"
                                                                     aria-label="Admin"
                                                                     class="_3LDKX forum-icon-fill forum-icon-fill _1zT4G"
                                                                     style="fill-rule: evenodd;margin-left:8px;">
                                                                    <path
                                                                        d="M15.3812,6.495914 L12.6789333,8.77258837 C12.6191333,8.84477644 12.5099333,8.85722265 12.4354,8.79997005 C12.4215333,8.79001308 12.4094,8.77756686 12.3998667,8.76429089 L9.78686667,6.14327115 C9.67766667,5.99225704 9.46186667,5.95491839 9.305,6.05863687 C9.26946667,6.08186981 9.23913333,6.11091099 9.21573333,6.14493065 L6.60013333,8.81075677 C6.5464,8.88626383 6.43893333,8.90534803 6.3592,8.85390366 C6.34446667,8.84394669 6.33146667,8.83233022 6.32106667,8.81905425 L3.61966667,6.50587098 C3.5018,6.36149485 3.28426667,6.33577266 3.13346667,6.44861837 C3.0494,6.51167921 3,6.60792997 3,6.70998895 L4,14 L15,14 L16,6.70169148 C16,6.51831719 15.8448667,6.36979232 15.6533333,6.36979232 C15.5476,6.36979232 15.4470667,6.41625821 15.3812,6.495914 Z"></path>
                                                                </svg>
                                                            @endauth
                                                        </div>
                                                    </div>


                                                    <div class="d-flex ml-5">
                                                        <div class="desc-post ml-5" style="margin-bottom:13px">
                                                            <p class="comment-reply" style="display: contents">{{$reply->title}}</p>
                                                        </div>
                                                        <div class="follow-details ml-2">

                                                            @auth
                                                                @if($reply->user->id === Auth::id() || Auth::user()->is_admin==="1" || Auth::user()->notify==="1" )
                                                                    <button type="button" class="dropdown-toggle p-0"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" role="img"
                                                                             width="24"
                                                                             height="24"
                                                                             viewBox="0 0 24 24">
                                                                            <path fill-rule="evenodd"
                                                                                  d="M22.444 13.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463.821.01 1.482.679 1.482 1.5-.016.844-.712 1.515-1.556 1.5zm0-6.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463C23.34 4.01 24 4.68 24 5.5c-.016.844-.712 1.515-1.556 1.5zm.112 10c.82.03 1.464.716 1.444 1.537-.02.82-.697 1.473-1.519 1.463-.82-.01-1.48-.679-1.481-1.5.017-.843.713-1.514 1.556-1.5z"></path>
                                                                        </svg>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item text-white editReply align-items-center"
                                                                           data-id="{{$reply->id}}">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 width="24"
                                                                                 height="24"
                                                                                 viewBox="0 0 24 24">
                                                                                <path fill-rule="evenodd"
                                                                                      d="M16.679 5.602l1.702 1.704c.826.827.826 2.172 0 3l-8.17 8.18L4 20l1.512-6.218 8.17-8.18c.799-.802 2.196-.803 2.997 0zM8.661 16.046l1.312 1.314 5.652-5.658-3.336-3.341-5.652 5.659 1.317 1.319 3.193-3.193c.195-.195.512-.195.707 0 .195.196.195.512 0 .708L8.66 16.046zm7.645-5.026L17.7 9.624c.45-.451.45-1.186 0-1.637l-1.702-1.704c-.437-.437-1.197-.436-1.634 0L12.97 7.679l3.336 3.34zm-10.88 7.554l3.569-.83-2.741-2.745-.828 3.575z"></path>
                                                                            </svg>
                                                                            Edit comment</a>
                                                                        </button>
                                                                        <a class="dropdown-item align-items-center"
                                                                           href="{{route('deleteReply',$reply->id)}}">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 width="24"
                                                                                 height="24"
                                                                                 viewBox="0 0 24 24">
                                                                                <path fill-rule="evenodd"
                                                                                      d="M17 17c0 1.657-1.343 3-3 3H9c-1.657 0-3-1.343-3-3V7H5V6h13v1h-1v10zM9 9h1v7H9V9zm4 0h1v7h-1V9zm-6 8c0 1.105.895 2 2 2h5c1.105 0 2-.895 2-2V7H7v10zm6-11V5h-3v1H9V5c0-.552.448-1 1-1h3c.552 0 1 .448 1 1v1h-1z"></path>
                                                                            </svg>
                                                                            Delete comment</a>
                                                                        <div class="dropdown-divider"></div>
                                                                    </div>
                                                                    <div></div>
                                                                @endif


                                                            @endauth

                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div></div>


                                                        @if($reply->images)
                                                            @foreach(explode('/',$reply->images) as $image)
                                                                <div class="mt-3 ml-5">
                                                                    <img src="{{asset('images/'.$image)}}"
                                                                         class="img-fluid" width="100px" height="100px"/>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div></div>
                                                    <div class="comment-section comments d-flex align-items-center">
                                                        <div class="d-flex reply-sections mt-2">
                                                            <div class="row">
                                                                <div class="d-flex justify-content-center align-items-center"
                                                                     style="margin-left: 90px;">
                                                                    @guest
                                                                        <button class="rate-btn" data-toggle="modal" aria-haspopup="true"
                                                                                aria-expanded="false" data-target=".login-modal">
                                                                        </button>
{{--                                                                        <button class="rate-btn" data-toggle="modal" aria-haspopup="true"--}}
{{--                                                                                aria-expanded="false" data-target=".login-modal">The fence--}}
{{--                                                                        </button>--}}
                                                                        <button class="rate-btn" data-toggle="modal" aria-haspopup="true"
                                                                                aria-expanded="false" data-target=".login-modal">
                                                                        </button>
                                                                    @else
                                                                        <button id="helpful-reply" class="rate-btn @if(isset($reply->isAgree[0]) )rated-green @else not-rated-green @endif" data-id="{{$reply->id}}"
                                                                                data-name="helpful">
                                                                        </button>

                                                                        <button id="calculated-reply"  class="rate-btn @if(isset($reply->isDisAgree[0]) )rated-green @else not-rated-green @endif" data-id="{{$reply->id}}"
                                                                                data-name="calculated" style="margin-left:30px">
                                                                        </button>
                                                                    @endguest
                                                                </div>
                                                            </div>
                                                            <div class="modal fade" id="stripeModd" tabindex="-1" role="dialog" aria-labelledby="ModalInfo" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content pb-5 pt-4">
                                                                        <div class="modal-header border-0">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <div>
                                                                                <div id="card-errors" role="alert"></div>
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <div class="group d-flex flex-column flex-wrap">

                                                                                            @auth
                                                                                                <form id="payment-formms" action="{{ route('stripe.payReply') }}" method="post"
                                                                                                      class="require-validation">
                                                                                                    @csrf

                                                                                                    <input type="hidden" class="reply-input" name="replyUser">
                                                                                                    <input type="hidden" value="{{$reply->user}}" name="postUser">
                                                                                                    <input type="hidden" class="reply-comment-input" name="replyId">
                                                                                                    <div class='form-row row'>
                                                                                                        <input type="number" class="form-control" id="price" name="price"
                                                                                                               placeholder="Please enter the price">
                                                                                                    </div>

                                                                                                    <div class="outcome">
                                                                                                        <div class="error"></div>
                                                                                                        <div class="success-saved-card">
                                                                                                            Success! Your are using saved card <span
                                                                                                                class="saved-card"></span>
                                                                                                        </div>
                                                                                                        <div class="success-new-card">
                                                                                                            Success! The Stripe token for your new card is <span
                                                                                                                class="token"></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </form>
                                                                                            @endauth

                                                                                            <div class="row">
                                                                                                <div class="col-xs-12">
                                                                                                    <button class="btn" id="payment-submitts"
                                                                                                            type="submit">Pay
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @auth
                                                            <button class="ml-3 payment-info-reply" data-toggle="modal" data-id="{{$reply->user->id}}" data-path="{{$reply->id}}"
                                                                    @if($cards) data-target="#stripeModd" @else
                                                                    data-target="#messageModal" @endif>
                                                                <img
                                                                    src="{{asset('images/icon1.png')}}" width="30px" height="30px">
                                                                <span style="color:#fff;margin-left:5px;margin-top:3px;">@if($reply->isBought) {{count($reply->isBought)}} @endif</span>

                                                            </button>@endauth
                                                        @auth
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                 viewBox="0 0 24 24"
                                                                 stroke="none"
                                                                 class="forum-icon-fill"><title>Posts</title>
                                                                <path fill-rule="evenodd"
                                                                      d="M6 5h12c1.104 0 2 .896 2 2v8c0 1.104-.896 2-2 2h-4.36l-4.884 2.93c-.079.047-.168.07-.256.07-.086 0-.17-.021-.247-.065C8.097 19.846 8 19.68 8 19.5V17H6c-1.104 0-2-.896-2-2V7c0-1.104.896-2 2-2zm13 10V7c0-.553-.447-1-1-1H6c-.553 0-1 .447-1 1v8c0 .553.447 1 1 1h3v2.621L13.36 16H18c.553 0 1-.447 1-1z"></path>
                                                            </svg>

                                                            <span @auth class="reply_to_reply" data-id="{{$reply->id}}"
                                                                  @else data-toggle="modal"
                                                                  class="replyToReply" aria-haspopup="true"
                                                                  aria-expanded="false"
                                                                  data-target=".login-modal" @endauth>Reply</span>

                                                            {{--                                                        <i class="fa fa-heart like" data-id="{{$reply->id}}"></i>--}}
                                                        @endauth

                                                    </div>
                                                    {{--reply-reply-content--}}
                                                    <div class="commentReply"></div>
                                                    @if($reply->replies)
                                                        @foreach($reply->replies as $replies)
                                                            <div class="banner d-flex mt-4 ml-5">
                                                                <div class="d-flex align-items-center reply-sec">
                                                                    @if($replies->user->avatar_url)<img
                                                                        src="{{asset('images/'.$replies->user->avatar_url)}}"
                                                                        class="img-fluid logo" width="24px"
                                                                        height="24px"/>@endif
                                                                    @auth
                                                                        <a href="{{route('profile')}}"
                                                                           style="color:#fff;margin-left:8px;">{{$replies->user->name}} </a>


                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                                             viewBox="0 0 19 19"
                                                                             aria-label="Admin"
                                                                             class="_3LDKX forum-icon-fill forum-icon-fill _1zT4G"
                                                                             style="fill-rule: evenodd;margin-left:8px;">
                                                                            <path
                                                                                d="M15.3812,6.495914 L12.6789333,8.77258837 C12.6191333,8.84477644 12.5099333,8.85722265 12.4354,8.79997005 C12.4215333,8.79001308 12.4094,8.77756686 12.3998667,8.76429089 L9.78686667,6.14327115 C9.67766667,5.99225704 9.46186667,5.95491839 9.305,6.05863687 C9.26946667,6.08186981 9.23913333,6.11091099 9.21573333,6.14493065 L6.60013333,8.81075677 C6.5464,8.88626383 6.43893333,8.90534803 6.3592,8.85390366 C6.34446667,8.84394669 6.33146667,8.83233022 6.32106667,8.81905425 L3.61966667,6.50587098 C3.5018,6.36149485 3.28426667,6.33577266 3.13346667,6.44861837 C3.0494,6.51167921 3,6.60792997 3,6.70998895 L4,14 L15,14 L16,6.70169148 C16,6.51831719 15.8448667,6.36979232 15.6533333,6.36979232 C15.5476,6.36979232 15.4470667,6.41625821 15.3812,6.495914 Z"></path>
                                                                        </svg>
                                                                    @endauth
                                                                </div>
                                                            </div>


                                                            <div>
                                                                <div class="d-flex" style="margin-left:150px">
                                                                    <div class="desc-post" style="margin-bottom:13px">
                                                                        <p class="ml-3 comment-reply">{{$replies->name}}</p>
                                                                    </div>

                                                                    <div class="follow-details ml-2">

                                                                        @auth
                                                                            @if($replies->user->id === Auth::id() || Auth::user()->is_admin==="1" || Auth::user()->notify==="1" )
                                                                                <button type="button" class="dropdown-toggle p-0"
                                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                                        aria-expanded="false">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                         role="img" width="24"
                                                                                         height="24"
                                                                                         viewBox="0 0 24 24">
                                                                                        <path fill-rule="evenodd"
                                                                                              d="M22.444 13.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463.821.01 1.482.679 1.482 1.5-.016.844-.712 1.515-1.556 1.5zm0-6.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463C23.34 4.01 24 4.68 24 5.5c-.016.844-.712 1.515-1.556 1.5zm.112 10c.82.03 1.464.716 1.444 1.537-.02.82-.697 1.473-1.519 1.463-.82-.01-1.48-.679-1.481-1.5.017-.843.713-1.514 1.556-1.5z"></path>
                                                                                    </svg>
                                                                                </button>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item text-white editAnswer align-items-center"
                                                                                       data-id="{{$replies->id}}">
                                                                                        <svg
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            width="24"
                                                                                            height="24"
                                                                                            viewBox="0 0 24 24">
                                                                                            <path fill-rule="evenodd"
                                                                                                  d="M16.679 5.602l1.702 1.704c.826.827.826 2.172 0 3l-8.17 8.18L4 20l1.512-6.218 8.17-8.18c.799-.802 2.196-.803 2.997 0zM8.661 16.046l1.312 1.314 5.652-5.658-3.336-3.341-5.652 5.659 1.317 1.319 3.193-3.193c.195-.195.512-.195.707 0 .195.196.195.512 0 .708L8.66 16.046zm7.645-5.026L17.7 9.624c.45-.451.45-1.186 0-1.637l-1.702-1.704c-.437-.437-1.197-.436-1.634 0L12.97 7.679l3.336 3.34zm-10.88 7.554l3.569-.83-2.741-2.745-.828 3.575z"></path>
                                                                                        </svg>
                                                                                        Edit comment</a>
                                                                                    <a class="dropdown-item align-items-center"
                                                                                       href="{{route('deleteAnswer',$replies->id)}}">
                                                                                        <svg
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            width="24"
                                                                                            height="24"
                                                                                            viewBox="0 0 24 24">
                                                                                            <path fill-rule="evenodd"
                                                                                                  d="M17 17c0 1.657-1.343 3-3 3H9c-1.657 0-3-1.343-3-3V7H5V6h13v1h-1v10zM9 9h1v7H9V9zm4 0h1v7h-1V9zm-6 8c0 1.105.895 2 2 2h5c1.105 0 2-.895 2-2V7H7v10zm6-11V5h-3v1H9V5c0-.552.448-1 1-1h3c.552 0 1 .448 1 1v1h-1z"></path>
                                                                                        </svg>
                                                                                        Delete comment</a>
                                                                                    <div class="dropdown-divider"></div>
                                                                                </div>
                                                                                <div></div>
                                                                            @endif
                                                                        @endauth

                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center reply-sec">
                                                                    <div></div>
                                                                    @if($replies->images)
                                                                        @foreach(explode('/',$replies->images) as $image)
                                                                            <div class="mt-3">
                                                                                <img src="{{asset('images/'.$image)}}"
                                                                                     class="img-fluid" width="100px"
                                                                                     height="100px"/>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="comment-section comments d-flex align-items-center">

                                                                <div class="row">
                                                                    <div class="d-flex justify-content-center align-items-center mt-2" style="margin-left:146px">
                                                                        @guest
                                                                            <button class="rate-btn" data-toggle="modal" aria-haspopup="true"
                                                                                    aria-expanded="false" data-target=".login-modal">
                                                                            </button>
{{--                                                                            <button class="rate-btn" data-toggle="modal" aria-haspopup="true"--}}
{{--                                                                                    aria-expanded="false" data-target=".login-modal">The fence--}}
{{--                                                                            </button>--}}
                                                                            <button class="rate-btn" data-toggle="modal" aria-haspopup="true"
                                                                                    aria-expanded="false" data-target=".login-modal">
                                                                            </button>
                                                                        @else
                                                                            <button id="helpful-reply" class="rate-btn @if(isset($reply->isAgreel[0]) )rated-green @else not-rated-green @endif" data-id="{{$reply->id}}"
                                                                                    data-name="helpful">
                                                                            </button>
                                                                            <button id="calculated-reply" class="rate-btn @if(isset($reply->isDisAgree[0]) )rated-green @else not-rated-green @endif" data-id="{{$reply->id}}"
                                                                                    data-name="calculated" style="margin-left:30px;">
                                                                            </button>
                                                                        @endguest

                                                                    </div>
                                                                </div>
                                                                <div class="d-flex">
                                                                    @auth
                                                                        <button class="ml-3 payment-info" data-toggle="modal"
                                                                                @if($cards) data-target="#stripeModal" @else
                                                                                data-target="#messageModal" @endif><img
                                                                                src="{{asset('images/icon1.png')}}" width="30px" height="30px">
                                                                            <span style="color:#fff;margin-left:5px;margin-top:3px;"></span>

                                                                        </button>@endauth
                                                                    @auth
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                             height="24"
                                                                             viewBox="0 0 24 24"
                                                                             stroke="none"
                                                                             class="forum-icon-fill"><title>Posts</title>
                                                                            <path fill-rule="evenodd"
                                                                                  d="M6 5h12c1.104 0 2 .896 2 2v8c0 1.104-.896 2-2 2h-4.36l-4.884 2.93c-.079.047-.168.07-.256.07-.086 0-.17-.021-.247-.065C8.097 19.846 8 19.68 8 19.5V17H6c-1.104 0-2-.896-2-2V7c0-1.104.896-2 2-2zm13 10V7c0-.553-.447-1-1-1H6c-.553 0-1 .447-1 1v8c0 .553.447 1 1 1h3v2.621L13.36 16H18c.553 0 1-.447 1-1z"></path>
                                                                        </svg>

                                                                        <span @auth @if($replies) class="answer"
                                                                              data-id="{{$reply->id}}"
                                                                              @else class="reply_to_reply"
                                                                              data-id="{{$reply->id}}" @endif
                                                                              @else data-toggle="modal"
                                                                              class="reply_to_reply" aria-haspopup="true"
                                                                              aria-expanded="false"
                                                                              data-target=".login-modal" @endauth>Reply
                                                                </span>
                                                                    @endauth
                                                                </div>

                                                            </div>

                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            {{--create-comment--}}
                            @auth
                                <form action="{{url('insertComment')}}" method="post" class="mt-5"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{$post->id}}" name="id">
                                    <input type="hidden" value="{{$post->categories->id}}" name="cat_id">
                                    <div class="avatar-container">
                                        <div class="banner d-flex">
                                            <div class="d-flex align-items-center">
                                                @auth
                                                    @if(Auth::user()->avatar_url)<img
                                                        src="{{asset('images/'.Auth::user()->avatar_url)}}"
                                                        class="img-fluid logo " width="24px"
                                                        height="24px"/>@endif

                                                    <a href="{{route('profile')}}"
                                                       style="color:#fff;margin-left:8px;text-decoration: none;">{{Auth::user()->name}} </a>

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                         viewBox="0 0 19 19"
                                                         aria-label="Admin"
                                                         class="_3LDKX forum-icon-fill forum-icon-fill _1zT4G"
                                                         style="fill-rule: evenodd;margin-left:8px;">
                                                        <path
                                                            d="M15.3812,6.495914 L12.6789333,8.77258837 C12.6191333,8.84477644 12.5099333,8.85722265 12.4354,8.79997005 C12.4215333,8.79001308 12.4094,8.77756686 12.3998667,8.76429089 L9.78686667,6.14327115 C9.67766667,5.99225704 9.46186667,5.95491839 9.305,6.05863687 C9.26946667,6.08186981 9.23913333,6.11091099 9.21573333,6.14493065 L6.60013333,8.81075677 C6.5464,8.88626383 6.43893333,8.90534803 6.3592,8.85390366 C6.34446667,8.84394669 6.33146667,8.83233022 6.32106667,8.81905425 L3.61966667,6.50587098 C3.5018,6.36149485 3.28426667,6.33577266 3.13346667,6.44861837 C3.0494,6.51167921 3,6.60792997 3,6.70998895 L4,14 L15,14 L16,6.70169148 C16,6.51831719 15.8448667,6.36979232 15.6533333,6.36979232 C15.5476,6.36979232 15.4470667,6.41625821 15.3812,6.495914 Z"></path>
                                                    </svg>
                                                @endauth
                                            </div>
                                        </div>
                                        <textarea name="description" class="txt"
                                                  placeholder="Write a comment" autocomplete="off" style="background: #031d0a;font-size: 14px;color:white"></textarea>
                                        <div class="image-upload post">
                                            <div class="avatar-upload postAv">
                                                <div class="avatar-edit">

                                                    <label for="imageUploadd">
                                                        <div class="_1qOTu css-mm44dn css-1402lio">
                                                            <svg width="30" height="19" viewBox="0 0 19 19" style="width: 40px;
                                                                position: absolute;
                                                                fill: white;
                                                                /* top: -30px; */
                                                                bottom: 50px;">
                                                                <g fill-rule="evenodd">
                                                                    <path
                                                                        d="M2 6a1 1 0 0 1 1-1h2.75l.668-1.424A1 1 0 0 1 7.323 3h4.354a1 1 0 0 1 .905.576L13.25 5H16a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6zm1 0v8h13V6h-3.5l-1.018-2H7.518L6.5 6H3zm6.5 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0-1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <input type="file" id="imageUploadd" class="imageUploadd"
                                                               name="photo[]"
                                                               multiple/>
                                                    </label>
                                                </div>
                                                <div class="selectedFiless"></div>
                                            </div>
                                            <input id="upload" type="file" name="video[]" onchange="readURL(this);"
                                                   style="display: none" class="form-control">
                                        </div>
                                    </div>


                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex justify-content-between w-70 mt-4">
                                            <button type="reset" class="pull-right publish_btn mt-0">Cancel
                                            </button>
                                            <button class="publish_btn" @guest data-toggle="modal"
                                                    data-target=".login-modal" @else type="submit" @endguest>Publish
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endauth
                        </div>

                    </div>
                    <div class="col-3">

                        <div class="resources-forum-right">
                            @guest <a href="" class="comment-btn" id="post_liking" data-toggle="modal"
                                      aria-haspopup="true"
                                      aria-expanded="false" data-target=".login-modal">
                                Like
                            </a>
                            @else
                                <a href="" id="post_liking" class="follow-btn comment-btn"
                                   data-path="{{$post->id}}">

                                    @if(Auth::user()->liking_posts->contains($post->id))Liked @else Like @endif
                                </a>
                            @endguest
                            @guest <a href="" class="follow-btn post-following" data-toggle="modal" aria-haspopup="true"
                                      aria-expanded="false" data-target=".login-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     class="button-fill">
                                    <path
                                        d="M36.5 15c.828 0 1.5.672 1.5 1.5v.708l.193.058C40.403 17.98 42 20.053 42 22.5v2.882c0 .682.514 1.085.724 1.17.907.46 1.276 1.327 1.276 2.066V29c0 .552-.448 1-1 1h-4.05c-.232 1.141-1.24 2-2.45 2-1.21 0-2.218-.859-2.45-2H30c-.552 0-1-.448-1-1v-.382c0-.816.43-1.567 1.124-1.982.584-.281.876-.7.876-1.254V22.5c0-2.518 1.692-4.64 4-5.293V16.5c0-.828.672-1.5 1.5-1.5zm1.414 15h-2.828c.206.583.761 1 1.414 1 .653 0 1.208-.417 1.414-1zM36.5 16c-.276 0-.5.224-.5.5v1.527c-2.25.249-4 2.157-4 4.473v2.882c0 .816-.43 1.567-1.124 1.982l-.115.06c-.284.156-.761.5-.761 1.194V29h13v-.382c0-.696-.482-1.039-.724-1.17-.68-.318-1.276-1.13-1.276-2.066V22.5c0-2.316-1.75-4.223-4-4.472V16.5c0-.276-.224-.5-.5-.5z"
                                        transform="translate(-24 -12)"></path>
                                </svg>
                                Follow Post
                            </a>
                            @else

                                <a href="" id="post-following" class="follow-btn"
                                   data-path="{{$post->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24"
                                         class="button-fill">
                                        <path
                                            d="M36.5 15c.828 0 1.5.672 1.5 1.5v.708l.193.058C40.403 17.98 42 20.053 42 22.5v2.882c0 .682.514 1.085.724 1.17.907.46 1.276 1.327 1.276 2.066V29c0 .552-.448 1-1 1h-4.05c-.232 1.141-1.24 2-2.45 2-1.21 0-2.218-.859-2.45-2H30c-.552 0-1-.448-1-1v-.382c0-.816.43-1.567 1.124-1.982.584-.281.876-.7.876-1.254V22.5c0-2.518 1.692-4.64 4-5.293V16.5c0-.828.672-1.5 1.5-1.5zm1.414 15h-2.828c.206.583.761 1 1.414 1 .653 0 1.208-.417 1.414-1zM36.5 16c-.276 0-.5.224-.5.5v1.527c-2.25.249-4 2.157-4 4.473v2.882c0 .816-.43 1.567-1.124 1.982l-.115.06c-.284.156-.761.5-.761 1.194V29h13v-.382c0-.696-.482-1.039-.724-1.17-.68-.318-1.276-1.13-1.276-2.066V22.5c0-2.316-1.75-4.223-4-4.472V16.5c0-.276-.224-.5-.5-.5z"
                                            transform="translate(-24 -12)"></path>
                                    </svg>
                                    @auth
                                        @if(Auth::user()->following_posts->contains($post->id))Followed @else Follow @endif
                                    @endauth
                                </a>
                            @endguest

                            <div class="resources-forum-box">
                            </div>
                            <div class="resources-forum-box">
                                <p>Followed Posts</p>
                                @auth
                                    @if($followed_posts)
                                        @foreach($followed_posts as $followed)
                                            <a href="{{route('comments',$followed->id)}}">{{$followed->title}}</a>
                                        @endforeach
                                    @endif
                                @endauth
                            </div>
                            <div class="resources-forum-box">
                                <p>Categories</p>
                                @foreach($categories as $category)
                                    <a href="{{route('showPosts',$category->id)}}">
                                        {{$category->name}}
                                    </a>
                                    <div><a href="#" class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19">
                                                <path
                                                    d="M1.87401173,9.0171571 L11.9171573,9.0171571 L11.9171573,2.2 C11.9171573,2.08954305 12.0067003,2 12.1171573,2 L12.7171573,2 C12.8276142,2 12.9171573,2.08954305 12.9171573,2.2 L12.9171573,9.2171571 L12.9171573,9.8171571 C12.9171573,9.92761405 12.8276142,10.0171571 12.7171573,10.0171571 L1.78872997,10.0171571 L4.7254834,12.9539105 C4.80358826,13.0320154 4.80358826,13.1586484 4.7254834,13.2367532 L4.30121933,13.6610173 C4.22311447,13.7391222 4.09648148,13.7391222 4.01837662,13.6610173 L0.0585786438,9.70121933 C0.0195262146,9.6621669 -7.90478794e-14,9.61098244 -7.81597009e-14,9.55979797 C-1.00364161e-13,9.50861351 0.0195262146,9.45742905 0.0585786438,9.41837662 L4.01837662,5.45857864 C4.09648148,5.38047379 4.22311447,5.38047379 4.30121933,5.45857864 L4.7254834,5.88284271 C4.80358826,5.96094757 4.80358826,6.08758057 4.7254834,6.16568542 L1.87401173,9.0171571 Z"
                                                    transform="translate(6.458579, 7.859798) scale(-1, 1) translate(-6.458579, -7.859798) "></path>
                                            </svg>
                                            <div><span><a href="{{route('showPosts',$category->id)}}" class="d-flex">{{$category->description}}</span>
                                            </div>
                                        </a></div>
                                @endforeach
                                <a href="{{route('network')}}" class="button-color">See all categories</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h5>Do you like this? Share with your friends!</h5>
                    <div class="mt-5">
                        <ul class="share_links">
                            <li class="bg_fb"><a
                                    href="javascript:fbShare(window.location.href,'Fb Share', 'Facebook share popup', window.location.href)"
                                    class="share_icon" rel="tooltip"
                                    title="Facebook"><i
                                        class="fa fa-facebook"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="stripeModal" tabindex="-1" role="dialog" aria-labelledby="ModalInfo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content pb-5 pt-4">
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div>
                        <div id="card-errors" role="alert"></div>
                        <div class="card">
                            <div class="card-body">
                                <div class="group d-flex flex-column flex-wrap">

                                    @auth
                                        <form id="payment-form" action="{{ url('/pay') }}" method="post"
                                              class="require-validation">
                                            @csrf

                                            <input type="hidden" value="{{$post->user->id}}" name="id">
                                            <input type="hidden" value="{{$post->user}}" name="postUser">
                                            <input type="hidden" value="{{$post->id}}" name="postId">
                                            <div class='form-row row'>
                                                <input type="number" class="form-control" id="price" name="price"
                                                       placeholder="Please enter the price">
                                            </div>

                                            <div class="outcome">
                                                <div class="error"></div>
                                                <div class="success-saved-card">
                                                    Success! Your are using saved card <span
                                                        class="saved-card"></span>
                                                </div>
                                                <div class="success-new-card">
                                                    Success! The Stripe token for your new card is <span
                                                        class="token"></span>
                                                </div>
                                            </div>
                                        </form>
                                    @endauth

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button class="btn" id="payment-submit"
                                                    type="submit">Pay
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>Please add a payment method in your profile, to share your support to the post creator.</p>
                    <div class="d-flex go-profile-section justify-content-center"><a class="go-profile"
                                                                                     href="{{route('profile')}}">Go
                            to profile</a>
                    </div>

                    <div class="modal-body">

                    </div>
                    <div class="d-flex justify-content-center mt-4 go-profile-section">
                        <div class="modal-footer">
                            <button type="reset" class="pull-right publish_btn mt-0" data-dismiss="modal">Cancel
                            </button>
                            <button class="publish_btn" data-dismiss="modal">OK</button>
                        </div>
                    </div>
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
        $(document).on('click', '#like', function (event) {
            event.preventDefault();
            let like = $(this);
            let toLikeId = $(this).attr('data-path');
            {
                $.ajax({
                    type: "post",
                    url: '/likeComment',
                    data: {_token: $('meta[name="csrf-token"]').attr('content'), id: toLikeId},
                    success: function (r) {

                        if (r == 1) {
                            like.html('Liked');

                        } else if (r == 2) {
                            like.html('Like');

                        }

                    }
                })
            }
        })

        $(document).on('click', '#post-following', function (event) {
            event.preventDefault();
            let follow = $(this);
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




        $(document).on('click', '#post_liking', function (event) {
            var domain = 'https://' + window.location.hostname;
            event.preventDefault();
            let like = $(this);
            let toLikeId = $(this).attr('data-path');
            {
                $.ajax({
                    type: "post",
                    url: domain + '/likePost',
                    data: {_token: $('meta[name="csrf-token"]').attr('content'), id: toLikeId},
                    success: function (r) {
                        console.log(r);
                        if (r == 1) {
                            like.html('Liked');

                        } else if (r == 2) {
                            like.html('Like');
                        }

                    }
                })
            }
        })



        $(document).on('click', '#helpful', function (event) {
            var domain = 'https://' + window.location.hostname;
            event.preventDefault();
            let rate = $(this);
            let id = $(this).attr('data-id');
            let type = $(this).attr('data-name');
            {
                $.ajax({
                    type: "post",
                    url: domain + '/ratePost',
                    data: {_token: $('meta[name="csrf-token"]').attr('content'), id: id, type: type},
                    success: function (r) {
                        if (r === 1) {
                            rate.css("background", "#2aaa10");
                        } else {
                            rate.css("background", "rgba(155, 203, 108, 0.73)");
                        }
                    }
                })
            }
        })
        $(document).on('click', '#inflammatory', function (event) {
            var domain = 'https://' + window.location.hostname;
            event.preventDefault();
            let rate = $(this);
            let id = $(this).attr('data-id');
            let type = $(this).attr('data-name');
            let adeq=$('.adeq');
            let adequate = $('.adequate');
            let adequateVal = parseInt(adequate.text());
            let adeqVal = parseInt(adeq.text());
            {
                $.ajax({
                    type: "post",
                    url: domain + '/ratePost',
                    data: {_token: $('meta[name="csrf-token"]').attr('content'), id: id, type: type},
                    success: function (r) {
                        if (r === 1) {
                            rate.css("background", "#b3813b");
                        } else {
                            rate.css("background", "rgba(155, 203, 108, 0.73)");
                        }
                    }
                })
            }
        })
        $(document).on('click', '#calculated', function (event) {
            var domain = 'https://' + window.location.hostname;
            event.preventDefault();
            let rate = $(this);
            let id = $(this).attr('data-id');
            let type = $(this).attr('data-name');
            let unhelp=$('.unhelp');
            let unhelpful = $('.unhelpful');
            let unhelpfulVal = parseInt(unhelpful.text());
            let unhelpVal = parseInt(unhelp.text());
            {
                $.ajax({
                    type: "post",
                    url: domain + '/ratePost',
                    data: {_token: $('meta[name="csrf-token"]').attr('content'), id: id, type: type},
                    success: function (r) {
                        if (r === 1) {
                            rate.css("background", "#aa2210");
                        } else {
                            rate.css("background", "rgba(155, 203, 108, 0.73)");
                        }
                    }
                })
            }
        })


        $(document).on('click', '#helpful-comment', function (event) {
            var domain = 'https://' + window.location.hostname;
            event.preventDefault();
            let rate = $(this);
            let id = $(this).attr('data-id');
            let type = $(this).attr('data-name');
            let helpful = $(this).closest('button').find('span.helpful-comment-count');
            let help = $(this).closest('button').find('span.help-comment');

            let helpfulVal = parseInt(helpful.text());

            let helpVal = parseInt(help.text());            {
                $.ajax({
                    type: "post",
                    url: domain + '/rateComment',
                    data: {_token: $('meta[name="csrf-token"]').attr('content'), id: id, type: type},
                    success: function (r) {
                        if (r === 1) {
                            rate.css("background", "#2aaa10");
                        } else {
                            rate.css("background", "rgba(155, 203, 108, 0.73)");
                        }
                    }
                })
            }
        })
        $(document).on('click', '#inflammatory-comment', function (event) {
            var domain = 'https://' + window.location.hostname;
            event.preventDefault();
            let rate = $(this);
            let id = $(this).attr('data-id');
            let type = $(this).attr('data-name');
            let adeq=$(this).closest('button').find('span.adeq-comment');
            let adequate = $(this).closest('button').find('span.adequate-comment-count');
            let adequateVal = parseInt(adequate.text());
            let adeqVal = parseInt(adeq.text());
            {
                $.ajax({
                    type: "post",
                    url: domain + '/rateComment',
                    data: {_token: $('meta[name="csrf-token"]').attr('content'), id: id, type: type},
                    success: function (r) {
                        if (r === 1) {
                            rate.css("background", "#b3813b");
                        } else {
                            rate.css("background", "rgba(155, 203, 108, 0.73)");
                        }
                    }
                })
            }
        })
        $(document).on('click', '#calculated-comment', function (event) {
            var domain = 'https://' + window.location.hostname;
            event.preventDefault();
            let rate = $(this);
            let id = $(this).attr('data-id');
            let type = $(this).attr('data-name');
            let unhelp=$(this).closest('button').find('span.unhelp-comment');
            let unhelpful = $(this).closest('button').find('span.unhelpful-comment-count');
            let unhelpfulVal = parseInt(unhelpful.text());
            let unhelpVal = parseInt(unhelp.text());
            {
                $.ajax({
                    type: "post",
                    url: domain + '/rateComment',
                    data: {_token: $('meta[name="csrf-token"]').attr('content'), id: id, type: type},
                    success: function (r) {
                        if (r === 1) {
                            rate.css("background", "#aa2210");
                        } else {
                            rate.css("background", "rgba(155, 203, 108, 0.73)");
                        }
                    }
                })
            }
        })

        $(document).on('click', '#helpful-reply', function (event) {
            var domain = 'https://' + window.location.hostname;
            event.preventDefault();
            let rate = $(this);
            let id = $(this).attr('data-id');
            let type = $(this).attr('data-name');
            let helpful = $(this).closest('button').find('span.helpful-reply-count');
            let help = $(this).closest('button').find('span.help-reply');

            let helpfulVal = parseInt(helpful.text());
            let helpVal = parseInt(help.text());            {
                $.ajax({
                    type: "post",
                    url: domain + '/rateReply',
                    data: {_token: $('meta[name="csrf-token"]').attr('content'), id: id, type: type},
                    success: function (r) {
                        if (r === 1) {
                            rate.css("background", "#2aaa10");
                        } else {
                            rate.css("background", "rgba(155, 203, 108, 0.73)");
                        }
                    }
                })
            }
        })

        $(document).on('click', '#calculated-reply', function (event) {
            var domain = 'https://' + window.location.hostname;
            event.preventDefault();
            let rate = $(this);
            let id = $(this).attr('data-id');
            let type = $(this).attr('data-name');
            let unhelp=$(this).closest('button').find('span.unhelp-reply');
            let unhelpful = $(this).closest('button').find('span.unhelpful-reply-count');
            let unhelpfulVal = parseInt(unhelpful.text());
            let unhelpVal = parseInt(unhelp.text());
            {
                $.ajax({
                    type: "post",
                    url: domain + '/rateReply',
                    data: {_token: $('meta[name="csrf-token"]').attr('content'), id: id, type: type},
                    success: function (r) {
                        if (r === 1) {
                            rate.css("background", "#aa2210");
                        } else {
                            rate.css("background", "rgba(155, 203, 108, 0.73)");
                        }
                    }
                })
            }
        })
        $(document).on('click', '.cancel-btn', function (event) {
            $(this).closest('form').css('display','none');
        });


        $(document).on('click', '.editComment', function (event) {
            var domain = 'http://' + window.location.hostname;
            event.preventDefault();
            let id = $(this).attr('data-id');
            let val = $(this).closest('.follow-details').prev().text();
            let value = val.replace(/\s/g, '');

            $(this).closest('.edit-com').next().append(`<form action="{{url('edit-comment')}}" class="replyForm" method="post" enctype="multipart/form-data">
    @csrf
            <input type="hidden" name="id">
                                     <input type="hidden" value=${id} name="id">

                        <div class="">
                            <input type="text" name="description" class="txt" placeholder="Write a comment" autocomplete="off"  value="${value}">
                        </div>
                             <div class="image-upload post">
                                 <div class="avatar-upload">
                                     <div class="avatar-edit">

                                         <label for="imageUpload"><div class="_1qOTu css-mm44dn css-1402lio"><svg width="30" height="19" viewBox="0 0 19 19"><g fill-rule="evenodd"><path d="M2 6a1 1 0 0 1 1-1h2.75l.668-1.424A1 1 0 0 1 7.323 3h4.354a1 1 0 0 1 .905.576L13.25 5H16a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6zm1 0v8h13V6h-3.5l-1.018-2H7.518L6.5 6H3zm6.5 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0-1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path></g></svg></div>
                                             <input type='file' id="imageUpload" name="photo[]" multiple>
                                         </label>
                                     </div>
                                     <div class="avatar-preview">
                                         <div id="imagePreview">
                                         </div>
                                     </div>
                                      <div class="selectedFiless"></div>
                                 </div>
            <input id="upload" type="file" name="video[]" onchange="readURL(this);" style="display: none"  class="form-control">
            </div>
           <div class="d-flex justify-content-between">
                                        <div class="d-flex justify-content-between w-70 mt-4">
                                            <button type="reset" class="pull-right publish_btn mt-0">Cancel
                                            </button>
                                            <button class="publish_btn" @guest data-toggle="modal"
                                                    data-target=".login-modal" @else type="submit" @endguest>Publish
                                            </button>
                                        </div>
                                    </div>
        </form>`);

        });



        $(document).on('click', '.editReply', function (event) {
            var domain = 'http://' + window.location.hostname;
            event.preventDefault();
            let id = $(this).attr('data-id');
            let val = $(this).closest('.follow-details').prev().text();
            let value = val.replace(/\s/g, '');

            $(this).closest('.dropdown-menu').next().append(`<form action="{{url('edit-reply')}}" class="replyForm" method="post" enctype="multipart/form-data">
    @csrf
            <input type="hidden" name="id">
                                     <input type="hidden" value=${id} name="id">

                        <div class="">
                            <input type="text" name="description" class="txt" placeholder="Write a comment" autocomplete="off"  value="${value}">
                        </div>
                             <div class="image-upload post">
                                 <div class="avatar-upload">
                                     <div class="avatar-edit">

                                         <label for="imageUpload"><div class="_1qOTu css-mm44dn css-1402lio"><svg width="30" height="19" viewBox="0 0 19 19"><g fill-rule="evenodd"><path d="M2 6a1 1 0 0 1 1-1h2.75l.668-1.424A1 1 0 0 1 7.323 3h4.354a1 1 0 0 1 .905.576L13.25 5H16a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6zm1 0v8h13V6h-3.5l-1.018-2H7.518L6.5 6H3zm6.5 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0-1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path></g></svg></div>
                                             <input type='file' id="imageUpload" name="photo[]" multiple>
                                         </label>
                                     </div>
                                     <div class="avatar-preview">
                                         <div id="imagePreview">
                                         </div>
                                     </div>
                                      <div class="selectedFiless"></div>
                                 </div>
            <input id="upload" type="file" name="video[]" onchange="readURL(this);" style="display: none"  class="form-control">
            </div>
           <div class="d-flex justify-content-between">
                                        <div class="d-flex justify-content-between w-70 mt-4">
                                            <button type="reset" class="pull-right publish_btn mt-0">Cancel
                                            </button>
                                            <button class="publish_btn" @guest data-toggle="modal"
                                                    data-target=".login-modal" @else type="submit" @endguest>Publish
                                            </button>
                                        </div>
                                    </div>
        </form>`);

        });

        $(document).on('click', '.editAnswer', function (event) {
            var domain = 'http://' + window.location.hostname;
            event.preventDefault();
            let id = $(this).attr('data-id');
            let val = $(this).closest('.follow-details').prev().text();
            let value = val.replace(/\s/g, '');

            $(this).closest('.dropdown-menu').next().append(`<form action="{{url('edit-answer')}}" class="replyForm" method="post" enctype="multipart/form-data">
    @csrf
            <input type="hidden" name="id">
                                     <input type="hidden" value=${id} name="id">

                        <div class="">
                            <input type="text" name="name" class="txt" placeholder="Write a comment" autocomplete="off"  value="${value}">
                        </div>
                             <div class="image-upload post">
                                 <div class="avatar-upload">
                                     <div class="avatar-edit">

                                         <label for="imageUpload"><div class="_1qOTu css-mm44dn css-1402lio"><svg width="30" height="19" viewBox="0 0 19 19"><g fill-rule="evenodd"><path d="M2 6a1 1 0 0 1 1-1h2.75l.668-1.424A1 1 0 0 1 7.323 3h4.354a1 1 0 0 1 .905.576L13.25 5H16a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6zm1 0v8h13V6h-3.5l-1.018-2H7.518L6.5 6H3zm6.5 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0-1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path></g></svg></div>
                                             <input type='file' id="imageUpload" name="photo[]" multiple>
                                         </label>
                                     </div>
                                     <div class="avatar-preview">
                                         <div id="imagePreview">
                                         </div>
                                     </div>
                                      <div class="selectedFiless"></div>
                                 </div>
            <input id="upload" type="file" name="video[]" onchange="readURL(this);" style="display: none"  class="form-control">
            </div>
           <div class="d-flex justify-content-between">
                                        <div class="d-flex justify-content-between w-70 mt-4">
                                            <button type="reset" class="pull-right publish_btn mt-0">Cancel
                                            </button>
                                            <button class="publish_btn" @guest data-toggle="modal"
                                                    data-target=".login-modal" @else type="submit" @endguest>Publish
                                            </button>
                                        </div>
                                    </div>
        </form>`);

        });

        $(document).on('click', '.replyMe', function (event) {
            var domain = 'http://' + window.location.hostname;
            event.preventDefault();
            let id = $(this).attr('data-id');
            let postId = $(this).attr('data-path');
            $(this).closest('.reply-sections').next().append(`<form action="{{url('reply')}}" class="replyForm" method="post" enctype="multipart/form-data">
    @csrf
            <input type="hidden" name="id">
                                     <input type="hidden" value=${id} name="id">
                                         <input type="hidden" value=${postId} name="post_id">
                        <div class="">
                            <input type="text" name="reply" class="txt" placeholder="Write a comment" autocomplete="off">
                        </div>
                             <div class="image-upload post">
                                 <div class="avatar-upload">
                                     <div class="avatar-edit">

                                         <label for="imageUpload"><div class="_1qOTu css-mm44dn css-1402lio"><svg width="30" height="19" viewBox="0 0 19 19"><g fill-rule="evenodd"><path d="M2 6a1 1 0 0 1 1-1h2.75l.668-1.424A1 1 0 0 1 7.323 3h4.354a1 1 0 0 1 .905.576L13.25 5H16a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6zm1 0v8h13V6h-3.5l-1.018-2H7.518L6.5 6H3zm6.5 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0-1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path></g></svg></div>
                                             <input type='file' id="imageUpload" name="photo[]" multiple>
                                         </label>
                                     </div>
                                     <div class="avatar-preview">
                                         <div id="imagePreview">
                                         </div>
                                     </div>
                                      <div class="selectedFiless"></div>
                                 </div>
            <input id="upload" type="file" name="video[]" onchange="readURL(this);" style="display: none"  class="form-control">
            </div>
           <div class="d-flex justify-content-between">
                                        <div class="d-flex justify-content-between w-70 mt-4">
                                            <button type="reset" class="pull-right publish_btn cancel-btn mt-0">Cancel
                                            </button>
                                            <button class="publish_btn" @guest data-toggle="modal"
                                                    data-target=".login-modal" @else type="submit" @endguest>Publish
                                            </button>
                                        </div>
                                    </div>
        </form>`);

        });

        var selDiv = "";

        document.addEventListener("DOMContentLoaded", init, false);

        function init() {
            document.querySelector('.imageUploadd').addEventListener('change', handleFileSelect, false);
            selDiv = document.querySelector(".selectedFiless");
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

        function fbShare(url, title, descr, image) {
            window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer' + 'target=_blank');
        }

        $('.countComments').on('click', () => {
            $('.txt').css('display', 'inline-block').focus();
        })




        $('#payment-submit').click(function () {
            let form = $('#payment-form');
            let formdata = new FormData(form[0]);
            let card = '';
            $('input[type=radio]').each(function () {
                if ($(this).is(':checked')) {
                    card = $(this).prev().val();
                }
            })
            formdata.append('card', card);
            $(this).attr('disabled','disabled');

            $.ajax({
                type: "post",
                url: form.attr('action'),
                data: formdata,
                processData: false,
                contentType: false,

                success: function (response) {
                    $(this).attr('enabled','enabled');
                    Swal.fire(response);
                    $('#stripeModal').modal('hide');
                    $('.modal-backdrop').css('display', 'none')

                },
                error: function (err) {
                    $('#stripeModal #card-errors').html(`<p style="color:red"> ${err.responseJSON.message}</p>`);
                    $(this).attr('enabled','enabled');

                }

            });
        });

        $('#payment-submitt').click(function () {
            let form = $('#payment-formm');
            let formdata = new FormData(form[0]);
            let card = '';
            $('input[type=radio]').each(function () {
                if ($(this).is(':checked')) {
                    card = $(this).prev().val();
                }
            })
            formdata.append('card', card);
            $(this).attr('disabled','disabled');

            $.ajax({
                type: "post",
                url: form.attr('action'),
                data: formdata,
                processData: false,
                contentType: false,

                success: function (response) {
                    $(this).attr('enabled','enabled');
                    Swal.fire(response);
                    $('#stripeMod').modal('hide');
                    $('.modal-backdrop').css('display', 'none')

                },
                error: function (err) {
                    $('#stripeMod #card-errors').html(`<p style="color:red"> ${err.responseJSON.message}</p>`);
                    $(this).attr('enabled','enabled');

                }

            });
        });

        $('#payment-submitts').click(function () {
            let form = $('#payment-formms');
            let formdata = new FormData(form[0]);
            let card = '';
            $('input[type=radio]').each(function () {
                if ($(this).is(':checked')) {
                    card = $(this).prev().val();
                }
            })
            formdata.append('card', card);
            $(this).attr('disabled','disabled');
            $.ajax({
                type: "post",
                url: form.attr('action'),
                data: formdata,
                processData: false,
                contentType: false,

                success: function (response) {
                    $(this).attr('enabled','enabled');
                    Swal.fire(response);
                    $('#stripeModd').modal('hide');
                    $('.modal-backdrop').css('display', 'none')

                },
                error: function (err) {
                    $('#stripeModd #card-errors').html(`<p style="color:red"> ${err.responseJSON.message}</p>`);
                    $(this).attr('enabled','enabled');

                }

            });
        });

        $(document).on('click', '.reply_to_reply', function (event) {
            event.preventDefault();
            let id = $(this).attr('data-id');
            $(this).closest('.comments').prev().append(`<form action="{{url('answer')}}" class="replyForm" method="post" enctype="multipart/form-data">
    @csrf
            <input type="hidden" name="id">
                                     <input type="hidden" value=${id} name="id">
                        <div class="">
                            <input type="text" name="answer" class="txt" placeholder="Write a comment" autocomplete="off">
                        </div>
                             <div class="image-upload post">
                                 <div class="avatar-upload">
                                     <div class="avatar-edit">

                                         <label for="imageUpload"><div class="_1qOTu css-mm44dn css-1402lio"><svg width="30" height="19" viewBox="0 0 19 19"><g fill-rule="evenodd"><path d="M2 6a1 1 0 0 1 1-1h2.75l.668-1.424A1 1 0 0 1 7.323 3h4.354a1 1 0 0 1 .905.576L13.25 5H16a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6zm1 0v8h13V6h-3.5l-1.018-2H7.518L6.5 6H3zm6.5 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0-1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path></g></svg></div>
                                             <input type='file' class="imageUploadd" id="imageUpload" name="photo[]" multiple>
                                         </label>
                                     </div>
                                     <div class="avatar-preview">
                                         <div id="imagePreview">
                                         </div>
                                     </div>
                                      <div class="selectedFiless"></div>
                                 </div>
            <input id="upload" type="file" name="video[]" onchange="readURL(this);" style="display: none"  class="form-control">
            </div>
           <div class="d-flex justify-content-between">
                                        <div class="d-flex justify-content-between w-70 mt-4">
                                            <button type="reset" class="pull-right publish_btn cancel-btn mt-0">Cancel
                                            </button>
                                            <button class="publish_btn" @guest data-toggle="modal"
                                                    data-target=".login-modal" @else type="submit" @endguest>Publish
                                            </button>
                                        </div>
                                    </div>
        </form>`);

        });
        $(document).on('click', '.answer', function (event) {
            event.preventDefault();
            let id = $(this).attr('data-id');
            $(this).closest('.comments').prev().append(`<form action="{{url('answer')}}" class="replyForm" method="post" enctype="multipart/form-data">
    @csrf
            <input type="hidden" name="id">
                                     <input type="hidden" value=${id} name="id">
                        <div class="">
                            <input type="text" name="answer" class="txt" placeholder="Write a comment" autocomplete="off">
                        </div>
                             <div class="image-upload post">
                                 <div class="avatar-upload">
                                     <div class="avatar-edit">

                                         <label for="imageUpload"><div class="_1qOTu css-mm44dn css-1402lio"><svg width="30" height="19" viewBox="0 0 19 19"><g fill-rule="evenodd"><path d="M2 6a1 1 0 0 1 1-1h2.75l.668-1.424A1 1 0 0 1 7.323 3h4.354a1 1 0 0 1 .905.576L13.25 5H16a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6zm1 0v8h13V6h-3.5l-1.018-2H7.518L6.5 6H3zm6.5 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0-1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path></g></svg></div>
                                             <input type='file' class="imageUploadd" id="imageUpload" name="photo[]" multiple>
                                         </label>
                                     </div>
                                     <div class="avatar-preview">
                                         <div id="imagePreview">
                                         </div>
                                     </div>
                                      <div class="selectedFiless"></div>
                                 </div>
            <input id="upload" type="file" name="video[]" onchange="readURL(this);" style="display: none"  class="form-control">
            </div>
           <div class="d-flex justify-content-between">
                                        <div class="d-flex justify-content-between w-70 mt-4">
                                            <button type="reset" class="pull-right publish_btn cancel-btn mt-0">Cancel
                                            </button>
                                            <button class="publish_btn" @guest data-toggle="modal"
                                                    data-target=".login-modal" @else type="submit" @endguest>Publish
                                            </button>
                                        </div>
                                    </div>
        </form>`);

        });
        $(document).on('click', '.continue', function (event) {
            let url = $(this).attr('data-action');

            $.ajax({
                type: "get",
                url: url,
                data: {_token: $('meta[name="csrf-token"]').attr('content'), id: id, type: type},

                success: function (response) {
                    $(this).attr('enabled', 'enabled');
                    Swal.fire(response);
                    $('#stripeModd').modal('hide');
                    $('.modal-backdrop').css('display', 'none')

                },
            })
        })

        $(document).on('click', '.payment-info', function (event) {
            event.preventDefault();
            let id=$(this).attr('data-id');
            let path=$(this).attr('data-path');
            $('.form-input').val(id);
            $('.comment-input').val(path);
        })
        $(document).on('click', '.payment-info-reply', function (event) {
            event.preventDefault();
            let id=$(this).attr('data-id');
            let path=$(this).attr('data-path');
            $('.reply-input').val(id);
            $('.reply-comment-input').val(path);
        })
        // var dd = document.getElementsByClassName('helpful-comment');
        //
        // Array.prototype.forEach.call(dd, function(element) {
        //     element.addEventListener('click', function() {
        //         console.log(element.dataset.id);
        //     });
        // });
        $('#payment-form').on('submit', function() {

            $(this).find('input[type="submit"]').style.opacity = "0.6";
            return false;
        });
        $('#payment-formm').on('submit', function() {
            $(this).find('input[type="submit"]').attr('disabled','disabled');
        });
        $('#spayment-formms').on('submit', function() {
            $(this).find('input[type="submit"]').attr('disabled','disabled');
        });

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
