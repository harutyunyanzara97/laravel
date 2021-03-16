@extends('layouts.app')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{asset('js/editor.js')}}"></script>
    <script>
        // $(document).ready(function () {
        //     $("#txtEditor").Editor();
        // });
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="apple-touch-icon" type="image/png"
          href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
    <meta name="apple-mobile-web-app-title" content="CodePen">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css">
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

        label.radio-row {
            display: flex;
            align-items: center;
            position: relative;
            justify-content: start;
            width: 265px;
        }

        #selectedFiless {
            display: flex;
        }

        #selectedFiless img {
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

        #payment-submit {
            background: rgb(78, 102, 54);
            border: none;
            cursor: pointer;
        }
    </style>




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
                <div class="breadcrumb">
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


            <div class="main-container resources-forum mt-0 d-flex">
                <div class="row post-comments">
                    <div class="col-9">
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                            {{--                            @else--}}
                            {{--                            <div class="alert alert-danger text-center">--}}
                            {{--                                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>--}}
                            {{--                                <p>Your balance is smaller than the price requested by you!</p>--}}
                            {{--                            </div>--}}
                        @endif
                        <div class="resources-forum-left">
                            <div class="banner d-flex">
                                <div class="d-flex">
                                    <a href="{{route('member-profile',$post->user->id)}}">
                                    @if($post->user->avatar_url)<img src="{{asset('images/'.$post->user->avatar_url)}}"
                                                                     class="img-fluid logo " width=24px
                                                                     height="24px"/>@endif
                                    </a>
                                    @auth
                                        <a href="{{route('member-profile',$post->user->id)}}"
                                           style="color:#fff;margin-left:8px;">{{$post->user->name}} </a>
                                    @endauth
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19"
                                         aria-label="Admin"
                                         class="_3LDKX forum-icon-fill forum-icon-fill _1zT4G"
                                         style="fill-rule: evenodd;margin-left:8px;
                                                                    ">
                                        <path
                                            d="M15.3812,6.495914 L12.6789333,8.77258837 C12.6191333,8.84477644 12.5099333,8.85722265 12.4354,8.79997005 C12.4215333,8.79001308 12.4094,8.77756686 12.3998667,8.76429089 L9.78686667,6.14327115 C9.67766667,5.99225704 9.46186667,5.95491839 9.305,6.05863687 C9.26946667,6.08186981 9.23913333,6.11091099 9.21573333,6.14493065 L6.60013333,8.81075677 C6.5464,8.88626383 6.43893333,8.90534803 6.3592,8.85390366 C6.34446667,8.84394669 6.33146667,8.83233022 6.32106667,8.81905425 L3.61966667,6.50587098 C3.5018,6.36149485 3.28426667,6.33577266 3.13346667,6.44861837 C3.0494,6.51167921 3,6.60792997 3,6.70998895 L4,14 L15,14 L16,6.70169148 C16,6.51831719 15.8448667,6.36979232 15.6533333,6.36979232 C15.5476,6.36979232 15.4470667,6.41625821 15.3812,6.495914 Z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="postbar">
                                <div class="post-inner">
                                    <h2>{{$post->title}}
                                    </h2>
                                    <div class="row">
                                        <div class="col-9">
                                            <p>
                                                {{$post->description}}

                                            </p>
                                            <p>
                                                {{$post->details}}
                                            </p>
                                        </div>
                                    </div>
                                    @if($post->files)
                                        @foreach(explode('/',$post->files) as $file)
                                            <div class="mySlides">
                                                <video controls src="{{asset('uploads/'.$file)}}" height=200px width=200px style="display: block"
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
                                    <div class="d-flex justify-content-between borderedPost">
                                        <a class="comment-section countComments d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24"
                                                 stroke="none"
                                                 class="forum-icon-fill"><title>Posts</title>
                                                <path fill-rule="evenodd"
                                                      d="M6 5h12c1.104 0 2 .896 2 2v8c0 1.104-.896 2-2 2h-4.36l-4.884 2.93c-.079.047-.168.07-.256.07-.086 0-.17-.021-.247-.065C8.097 19.846 8 19.68 8 19.5V17H6c-1.104 0-2-.896-2-2V7c0-1.104.896-2 2-2zm13 10V7c0-.553-.447-1-1-1H6c-.553 0-1 .447-1 1v8c0 .553.447 1 1 1h3v2.621L13.36 16H18c.553 0 1-.447 1-1z"></path>
                                            </svg>

                                            <span>   {{count($post->comments)}} Comments </span>
                                            <i class="fa fa-heart mr-2"></i>{{count($post->likes)}}
                                            @auth
                                                <button class="ml-3 payment-info" data-toggle="modal"
                                                        @if($cards) data-target="#stripeModal" @else
                                                        data-target="#messageModal" @endif><img
                                                        src="{{asset('images/icon1.png')}}" width="30px" height="30px">
                                                </button>@endauth
                                        </a>


                                        <a class="share_btn" data-toggle="modal" data-target="#myModal">
                                            <i class="fa fa-share" style="margin-right: 8px;"></i>
                                            <span>Share</span>
                                        </a>
                                    </div>


                                    @if($post->comments) @foreach($post->comments as $comment)
                                        <div class="banner d-flex mt-4">
                                            <div class="d-flex align-items-center">
                                                @if($comment->user->avatar_url)<img
                                                    src="{{asset('images/'.$comment->user->avatar_url)}}"
                                                    class="img-fluid logo" width="24px" height="24px"/>@endif
                                                @auth
                                                    <a href="{{route('profile')}}"
                                                       style="color:#fff;margin-left:8px;">{{Auth::user()->name}} </a>

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

                                        <div class="d-flex align-items-center">
                                            <div></div>
                                            <div class="mt-3 ml-5">
                                                <p class="description-comment"> {{$comment->description}}</p>
                                                @if($comment->images)<img
                                                    src="{{asset('images/'.$comment->images)}}"
                                                    class="img-fluid" width="100px" height="100px"/>@endif
                                            </div>
                                        </div>
                                        <a href="" class="comment-section comments d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24"
                                                 stroke="none"
                                                 class="forum-icon-fill"><title>Posts</title>
                                                <path fill-rule="evenodd"
                                                      d="M6 5h12c1.104 0 2 .896 2 2v8c0 1.104-.896 2-2 2h-4.36l-4.884 2.93c-.079.047-.168.07-.256.07-.086 0-.17-.021-.247-.065C8.097 19.846 8 19.68 8 19.5V17H6c-1.104 0-2-.896-2-2V7c0-1.104.896-2 2-2zm13 10V7c0-.553-.447-1-1-1H6c-.553 0-1 .447-1 1v8c0 .553.447 1 1 1h3v2.621L13.36 16H18c.553 0 1-.447 1-1z"></path>
                                            </svg>
                                            @auth<span class="replyMe" data-id="{{$comment->id}}"
                                                       data-path="{{$post->id}}"
                                            >Reply</span>@endauth
                                            <i class="fa fa-heart like" data-id="{{$comment->id}}"
                                               data-path="{{$post->id}}"></i></a>


                                        <div class="commentReply"></div>
                                        @if($comment->reply)
                                            @foreach($comment->reply as $reply)
                                                <div class="banner d-flex mt-4 ml-4">
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



                                                <div class="reply-section">
                                                    <p class="mt-4 comment-reply">{{$reply->title}}</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div></div>
                                                    @if($reply->images)
                                                        <div class="mt-3 ml-5">
                                                            <img src="{{asset('images/'.$reply->images)}}"
                                                                 class="img-fluid" width="100px" height="100px"/>
                                                        </div>
                                                    @endif
                                                </div>
                                                <a href="" class="comment-section comments d-flex align-items-center">
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
                                                    <i class="fa fa-heart like" data-id="{{$reply->id}}"></i></a>
                                                <div class="commentReply"></div>
                                                @if($reply->replies)
                                                    @foreach($reply->replies as $replies)
                                                        <div class="banner d-flex mt-4 ml-4">
                                                            <div class="d-flex align-items-center">
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



                                                        <div class="reply-section">
                                                            <p class="mt-4 comment-reply">{{$replies->name}}</p>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div></div>
                                                            @if($replies->images)
                                                                <div class="mt-3 ml-5">
                                                                    <img src="{{asset('images/'.$replies->images)}}"
                                                                         class="img-fluid" width="100px"
                                                                         height="100px"/>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <a href=""
                                                           class="comment-section comments d-flex align-items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24"
                                                                 viewBox="0 0 24 24"
                                                                 stroke="none"
                                                                 class="forum-icon-fill"><title>Posts</title>
                                                                <path fill-rule="evenodd"
                                                                      d="M6 5h12c1.104 0 2 .896 2 2v8c0 1.104-.896 2-2 2h-4.36l-4.884 2.93c-.079.047-.168.07-.256.07-.086 0-.17-.021-.247-.065C8.097 19.846 8 19.68 8 19.5V17H6c-1.104 0-2-.896-2-2V7c0-1.104.896-2 2-2zm13 10V7c0-.553-.447-1-1-1H6c-.553 0-1 .447-1 1v8c0 .553.447 1 1 1h3v2.621L13.36 16H18c.553 0 1-.447 1-1z"></path>
                                                            </svg>
                                                            <span @auth @if($replies) class="answer"
                                                                  data-id="{{$reply->id}}" @else class="reply_to_reply"
                                                                  data-id="{{$reply->id}}" @endif
                                                                  @else data-toggle="modal"
                                                                  class="reply_to_reply" aria-haspopup="true"
                                                                  aria-expanded="false"
                                                                  data-target=".login-modal" @endauth>Reply</span>
                                                            <i class="fa fa-heart like" data-id="{{$replies->id}}"></i></a>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach @endif

                                </div>
                            </div>
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
                                                       style="color:#fff;margin-left:8px;">{{Auth::user()->name}} </a>

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
                                                  placeholder="Write a comment" autocomplete="off"></textarea>
                                        <div class="image-upload post">
                                            <div class="avatar-upload postAv">
                                                <div class="avatar-edit">

                                                    <label for="imageUploadd">
                                                        <div class="_1qOTu css-mm44dn css-1402lio">
                                                            <svg width="30" height="19" viewBox="0 0 19 19">
                                                                <g fill-rule="evenodd">
                                                                    <path
                                                                        d="M2 6a1 1 0 0 1 1-1h2.75l.668-1.424A1 1 0 0 1 7.323 3h4.354a1 1 0 0 1 .905.576L13.25 5H16a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6zm1 0v8h13V6h-3.5l-1.018-2H7.518L6.5 6H3zm6.5 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0-1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <input type="file" id="imageUploadd" name="photo[]"
                                                               multiple/>
                                                    </label>
                                                </div>
                                                <div id="selectedFiless"></div>
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
                            {{--                        <a href="resources-forum-comment.html" class="comment-btn">--}}
                            {{--                            Comment--}}
                            {{--                        </a>--}}
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
                                        @if(Auth::user()->following_posts->contains($post->id))Followed @else Follow @endif
                                    </a>
                            @endguest
                            <div class="resources-forum-box">
                                {{--                            0 comments--}}
                            </div>
                            <div class="resources-forum-box">
                                <p>Similar Posts</p>
                                <a href="#">Welcome to the Business Forums!</a>
                                <a href="#">Welcome to the Social Forums!</a>
                                <a href="#">Welcome to the Improvements and Inquiries Forum! (Start Here)</a>
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
                                {{--                                    <form>--}}
                                <div class="group d-flex flex-column flex-wrap">

                                    @auth
                                        <form id="payment-form" action="{{ route('stripe.pay') }}" method="post"
                                              class="require-validation">
                                            @csrf

                                            <input type="hidden" value="{{$post->user->id}}" name="id">
                                            <input type="hidden" value="{{$post->user}}" name="postUser">
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
            <script type="text/javascript" src="https://js.stripe.com/v2/"></script>


            <!--<script src="js/jquery.min.js"></script>-->
            <!--<script src="js/bootstrap.js"></script>-->
            <script src="{{asset('js/main.js')}}"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
            <script src="{{asset('js/comments.js')}}"></script>
            <script id="rendered-js">
                $(document).ready(function () {
                    $('.dropdown-item').on('click', function () {
                        if ($(this).attr('href')) {
                            // alert('redirect to ' + $(this).attr('href'));
                            window.location.replace($(this).attr('href'));

                        }

                    });
                });

                $(document).on('click', '.like', function (event) {
                    event.preventDefault();
                    let likeMe = $(this);
                    let toLikeId = $(this).attr('data-id');
                    let post_id = $(this).attr('data-path');
                    $.ajax({
                        type: "get",
                        url: '/insertLike',
                        data: {_token: $('meta[name="csrf-token"]').attr('content'), id: toLikeId, postId: post_id},
                        success: function (r) {
                            likeMe.html('Liked');
                            if (likeMe.text = 'Liked') {
                                likeMe.removeClass('like').addClass('Liked');
                            }
                        }

                    })
                })
                $(document).on('click', '.Liked', function (event) {
                    event.preventDefault();
                    let dislike = $(this);
                    let likeId = $(this).attr('data-id');
                    $.ajax({
                        type: "get",
                        url: '/dislike',
                        data: {_token: $('meta[name="csrf-token"]').attr('content'), id: likeId},
                        success: function (r) {
                            dislike.html('like');
                            if (dislike.text = 'like') {
                                dislike.removeClass('Liked').addClass('like');
                            }
                        }

                    })
                })
                //# sourceURL=pen.js
            </script>
            <script>
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

                                if( r==1 ) {
                                    follow.html('Followed');

                                } else if( r==2 ) {
                                    follow.html('Follow');

                                }

                            }
                        })
                    }
                })


            </script>
            <script>
                $(document).on('click', '.replyMe', function (event) {
                    event.preventDefault();
                    let id = $(this).attr('data-id');
                    let postId = $(this).attr('data-path');
                    $(this).closest('.comments').next().append(`<form action="{{url('reply')}}" class="replyForm" method="post" enctype="multipart/form-data">
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
                                             <input type='file' id="imageUpload" name="photo[]">
                                         </label>
                                     </div>
                                     <div class="avatar-preview">
                                         <div id="imagePreview">
                                         </div>
                                     </div>
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

            </script>
            <script>
                var selDiv = "";

                document.addEventListener("DOMContentLoaded", init, false);

                function init() {
                    document.querySelector('#imageUploadd').addEventListener('change', handleFileSelect, false);
                    selDiv = document.querySelector("#selectedFiless");
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
                function fbShare(url, title, descr, image) {
                    window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer' + 'target=_blank');
                }
            </script>
            <script>
                $('.countComments').on('click', () => {
                    $('.txt').css('display', 'inline-block').focus();
                })
            </script>

            <script type="text/javascript">


            </script>
            <script>
                $('#payment-submit').click(function () {
                    let form = $('#payment-form');
                    let formdata = new FormData(form[0]);
                    let card = '';
                    // if($('input[type=radio]').is(":checked")){
                    //     cat_id = $('input[type=radio]').data('card_id');
                    // }
                    $('input[type=radio]').each(function () {
                        if ($(this).is(':checked')) {
                            card = $(this).prev().val();
                        }
                    })
                    formdata.append('card', card);

                    $.ajax({
                        type: "post",
                        url: form.attr('action'),
                        data: formdata,
                        processData: false,
                        contentType: false,

                        success: function (response) {
                            Swal.fire(response);
                            $('#stripeModal').modal('hide');
                            $('.modal-backdrop').css('display', 'none')

                        },
                        error: function (err) {
                            $('#stripeModal #card-errors').html(`<p style="color:red"> ${err.responseJSON.message}</p>`);

                        }

                    });
                });
            </script>
            <script>
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
                                             <input type='file' id="imageUpload" name="photo[]">
                                         </label>
                                     </div>
                                     <div class="avatar-preview">
                                         <div id="imagePreview">
                                         </div>
                                     </div>
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
                                             <input type='file' id="imageUpload" name="photo[]">
                                         </label>
                                     </div>
                                     <div class="avatar-preview">
                                         <div id="imagePreview">
                                         </div>
                                     </div>
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

            </script>


@endsection
