@extends('layouts.app')

@section('content')
</head>

<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
    <div class="position-relative">
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
                <div class="network-info">
                    <p>The Network
                    </p>
                    <div class="input-row d-flex align-items-center">
                        <input type="text" class="form-controller" id="search" name="search" placeholder="search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             class="_2_hbq desktop-header-search-icon-fill button-hover-fill"
                             data-hook="search-icon">
                            <path fill-rule="evenodd"
                                  d="M19.854 19.146c.195.196.195.512 0 .708-.196.195-.512.195-.708 0l-3.708-3.709C14.118 17.3 12.391 18 10.5 18 6.358 18 3 14.642 3 10.5 3 6.358 6.358 3 10.5 3c4.142 0 7.5 3.358 7.5 7.5 0 1.891-.7 3.619-1.855 4.938l3.709 3.708zM17 10.5C17 6.91 14.09 4 10.5 4S4 6.91 4 10.5 6.91 17 10.5 17s6.5-2.91 6.5-6.5z"></path>
                        </svg>
                    </div>
                </div>
                <div class="main-container">
                    <div class="network-panel-overlay"></div>
                    <div class="network-panel">
                        <div class="network-heading">
                            <h2>
                                The Network
                            </h2>
                            <p>An Anonymous Social Platform to Connect to Individuals, Businesses, and Community
                                Resources

                            </p>
                        </div>
                    </div>
                    <div class="main">
                        @foreach($categories as $category)
                            <div class="network-banner">
                                <div class="d-flex">
                                    @if($category->img_url)
                                        <div class="network-img-block">
                                            <img src="{{asset('images/'.$category->img_url)}}"
                                                 id="img-{{$category->id}}" class="img-fluid catImg">
                                        </div>
                                    @endif
                                    <div class="network-banner-details">
                                        <a href="{{route('showPosts',$category->id)}}" id="name-{{$category->id}}">
                                            {{$category->name}}
                                        </a>

                                        <p id="desc-{{$category->id}}">{{$category->description}}
                                        </p>
                                    </div>
                                </div>

                                <div class="comment-banner">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         stroke="none"
                                         class="forum-icon-fill"><title>Posts</title>
                                        <path fill-rule="evenodd"
                                              d="M6 5h12c1.104 0 2 .896 2 2v8c0 1.104-.896 2-2 2h-4.36l-4.884 2.93c-.079.047-.168.07-.256.07-.086 0-.17-.021-.247-.065C8.097 19.846 8 19.68 8 19.5V17H6c-1.104 0-2-.896-2-2V7c0-1.104.896-2 2-2zm13 10V7c0-.553-.447-1-1-1H6c-.553 0-1 .447-1 1v8c0 .553.447 1 1 1h3v2.621L13.36 16H18c.553 0 1-.447 1-1z"></path>
                                    </svg>

                                    <p>
                                        {{count($category->comments)}}
                                    </p>

                                </div>
                                <div class="d-flex follow-banner">
                                    <a @auth class="follow"
                                       @endauth style="color:white;font-size: 13px; cursor: pointer;z-index:1;"
                                       @guest data-toggle="modal" aria-haspopup="true" aria-expanded="false"
                                       data-target=".login-modal" @else data-id="{{$category->id}}" @endguest>
                                        @foreach($category->followers as $item)
                                            @if($item->category_id === $category->id)
                                                @auth
                                                    <span class="following-user">Following</span>
                                                @endauth
                                            @else
                                                <span class="unfollow-user">Follow</span>
                                            @endif

                                        @endforeach
                                        <span class="unfollow-user">Follow</span>
                                    </a>

                                    <div class="follow-details">
                                        @auth
                                            @if(Auth::user()->is_admin===1)
                                        <button type="button" class="btn dropdown-toggle p-0"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" role="img" width="24" height="24"
                                                 viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                      d="M22.444 13.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463.821.01 1.482.679 1.482 1.5-.016.844-.712 1.515-1.556 1.5zm0-6.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463C23.34 4.01 24 4.68 24 5.5c-.016.844-.712 1.515-1.556 1.5zm.112 10c.82.03 1.464.716 1.444 1.537-.02.82-.697 1.473-1.519 1.463-.82-.01-1.48-.679-1.481-1.5.017-.843.713-1.514 1.556-1.5z"></path>
                                            </svg>
                                        </button>

                                            <div class="dropdown-menu">

                                                <button type="button" class="dropdown-item edit"
                                                        data-id="{{$category->id}}" data-toggle="modal"
                                                        data-target="#rightSideModal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                              d="M16.679 5.602l1.702 1.704c.826.827.826 2.172 0 3l-8.17 8.18L4 20l1.512-6.218 8.17-8.18c.799-.802 2.196-.803 2.997 0zM8.661 16.046l1.312 1.314 5.652-5.658-3.336-3.341-5.652 5.659 1.317 1.319 3.193-3.193c.195-.195.512-.195.707 0 .195.196.195.512 0 .708L8.66 16.046zm7.645-5.026L17.7 9.624c.45-.451.45-1.186 0-1.637l-1.702-1.704c-.437-.437-1.197-.436-1.634 0L12.97 7.679l3.336 3.34zm-10.88 7.554l3.569-.83-2.741-2.745-.828 3.575z"></path>
                                                    </svg>
                                                    <p class="p0">Edit Category</p>
                                                </button>
                                                <a class="dropdown-item" href="{{route('delete',$category->id)}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                              d="M17 17c0 1.657-1.343 3-3 3H9c-1.657 0-3-1.343-3-3V7H5V6h13v1h-1v10zM9 9h1v7H9V9zm4 0h1v7h-1V9zm-6 8c0 1.105.895 2 2 2h5c1.105 0 2-.895 2-2V7H7v10zm6-11V5h-3v1H9V5c0-.552.448-1 1-1h3c.552 0 1 .448 1 1v1h-1z"></path>
                                                    </svg>
                                                    Delete Category</a>
                                                <div class="dropdown-divider"></div>
                                            </div>
                                                @endif
                                        @endauth

                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
        <script>
            $('#search').on('keyup', function () {
                let value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{URL::to('searchCat')}}',
                    data: {'search': value},
                    success: function (data) {
                        $('.main').empty();
                        $(data).each(function (val, i) {
                            $('.main').append(`<div class="network-banner">
                            <div class="d-flex">
                                @if($category->img_url)
                            <div class="network-img-block">
                            <img src="{{asset('images/'.$category->img_url)}}" id="img-{{$category->id}}" class="img-fluid catImg">
                                    </div>
                                @endif
                            <div class="network-banner-details">
                                <a href="{{route('showPosts',$category->id)}}" id="name-{{$category->id}}">
                                        ${i.name}
                    </a>

                    <p id="desc-{{$category->id}}">{{$category->description}}
                            </p>
                        </div>
                    </div>

                    <div class="comment-banner">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             stroke="none"
                             class="forum-icon-fill"><title>Posts</title>
                            <path fill-rule="evenodd"
                                  d="M6 5h12c1.104 0 2 .896 2 2v8c0 1.104-.896 2-2 2h-4.36l-4.884 2.93c-.079.047-.168.07-.256.07-.086 0-.17-.021-.247-.065C8.097 19.846 8 19.68 8 19.5V17H6c-1.104 0-2-.896-2-2V7c0-1.104.896-2 2-2zm13 10V7c0-.553-.447-1-1-1H6c-.553 0-1 .447-1 1v8c0 .553.447 1 1 1h3v2.621L13.36 16H18c.553 0 1-.447 1-1z"></path>
                        </svg>

                        <p>
                            {{count($category->comments)}}
                            </p>

                        </div>
                        <div class="d-flex follow-banner">
                            <a @auth class="follow" @endauth style="color:white;font-size: 13px; cursor: pointer;z-index:1;" @guest data-toggle="modal"  aria-haspopup="true" aria-expanded="false"  data-target=".login-modal"  @else data-id="{{$category->id}}"  @endguest>
                                            @foreach($category->followers as $item)
                            @if($item->category_id === $category->id)
                            @auth
                            <span class="following-user">Following</span>
@endauth
                            @else
                            <span class="unfollow-user">Follow</span>
@endif

                            @endforeach
                            <span class="unfollow-user">Follow</span>
                    </a>
                    <div class="follow-details">
                        <button type="button" class="btn dropdown-toggle p-0"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" role="img" width="24" height="24"
                                 viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                      d="M22.444 13.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463.821.01 1.482.679 1.482 1.5-.016.844-.712 1.515-1.556 1.5zm0-6.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463C23.34 4.01 24 4.68 24 5.5c-.016.844-.712 1.515-1.556 1.5zm.112 10c.82.03 1.464.716 1.444 1.537-.02.82-.697 1.473-1.519 1.463-.82-.01-1.48-.679-1.481-1.5.017-.843.713-1.514 1.556-1.5z"></path>
                            </svg>
                        </button>
@auth
                            <div class="dropdown-menu">

                                <button type="button" class="dropdown-item edit" data-id="{{$category->id}}" data-toggle="modal"
                                                        data-target="#rightSideModal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                              d="M16.679 5.602l1.702 1.704c.826.827.826 2.172 0 3l-8.17 8.18L4 20l1.512-6.218 8.17-8.18c.799-.802 2.196-.803 2.997 0zM8.661 16.046l1.312 1.314 5.652-5.658-3.336-3.341-5.652 5.659 1.317 1.319 3.193-3.193c.195-.195.512-.195.707 0 .195.196.195.512 0 .708L8.66 16.046zm7.645-5.026L17.7 9.624c.45-.451.45-1.186 0-1.637l-1.702-1.704c-.437-.437-1.197-.436-1.634 0L12.97 7.679l3.336 3.34zm-10.88 7.554l3.569-.83-2.741-2.745-.828 3.575z"></path>
                                                    </svg>
                                                    <p class="p0">Edit Category</p>
                                                </button>
                                    <a class="dropdown-item" href="{{route('delete',$category->id)}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                              d="M17 17c0 1.657-1.343 3-3 3H9c-1.657 0-3-1.343-3-3V7H5V6h13v1h-1v10zM9 9h1v7H9V9zm4 0h1v7h-1V9zm-6 8c0 1.105.895 2 2 2h5c1.105 0 2-.895 2-2V7H7v10zm6-11V5h-3v1H9V5c0-.552.448-1 1-1h3c.552 0 1 .448 1 1v1h-1z"></path>
                                                    </svg>
                                                    Delete Category</a>
                                                <div class="dropdown-divider"></div>
                                    </div>
                                     @endauth

                            </div>
                        </div>

                    </div>`);
                        })
                    }
                })
            })
        </script>
@endsection


