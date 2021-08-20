@extends('layouts.app')

@section('content')

    <style>
        .share_btn {
            font-size: 14px;
            cursor: pointer;
            text-transform: unset;
        }

        .resources-forum-left {
            font-size: 15px
        }
    </style>
    <div class="network-container">
        <div class="network-section">
            <div class="network-infos">
                <div class="breadcrumb">
                    <a href="{{route('network')}}">
                        The Network
                    </a>
                    <a href="{{route('showPosts',$newPost->category_id)}}">
                        {{$category->name}}
                    </a>
                    <a href="#">
                        {{$newPost->title}}
                    </a>

                </div>
            </div>
            <div class="main-container resources-forum mt-0">

                <div class="resources-forum-left">
                    <div class="banner d-flex">
                        <div class="d-flex">
                            @auth
                                @if(Auth::user()->avatar_url)<img
                                    src="{{asset('images/'.Auth::user()->avatar_url)}}" class="logo"
                                    style="width:24px !important; height:24px !important;" />@endif
                            @endauth
                            <a href="{{route('profile')}}"
                               style="color:#fff;margin-left:8px;">{{Auth::user()->name}} </a>

                            <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19"
                                 aria-label="Admin"
                                 class="_3LDKX forum-icon-fill forum-icon-fill _1zT4G"
                                 style="fill-rule: evenodd;margin-left:8px;">
                                <path
                                    d="M15.3812,6.495914 L12.6789333,8.77258837 C12.6191333,8.84477644 12.5099333,8.85722265 12.4354,8.79997005 C12.4215333,8.79001308 12.4094,8.77756686 12.3998667,8.76429089 L9.78686667,6.14327115 C9.67766667,5.99225704 9.46186667,5.95491839 9.305,6.05863687 C9.26946667,6.08186981 9.23913333,6.11091099 9.21573333,6.14493065 L6.60013333,8.81075677 C6.5464,8.88626383 6.43893333,8.90534803 6.3592,8.85390366 C6.34446667,8.84394669 6.33146667,8.83233022 6.32106667,8.81905425 L3.61966667,6.50587098 C3.5018,6.36149485 3.28426667,6.33577266 3.13346667,6.44861837 C3.0494,6.51167921 3,6.60792997 3,6.70998895 L4,14 L15,14 L16,6.70169148 C16,6.51831719 15.8448667,6.36979232 15.6533333,6.36979232 C15.5476,6.36979232 15.4470667,6.41625821 15.3812,6.495914 Z"></path>
                            </svg>

                        </div>
                    </div>
                    <p class="mt-4">{{$newPost->title}}</p>
                    <div class="row post-created-inner">
                        <div class="col-9"><pre class="new-post-txt" style="color:white;font-family: 'Roboto';font-size: 14px;">{{$newPost->description}}</pre>
                            @if($newPost->files)
                                @foreach(explode('/',$newPost->files) as $file)
                                    <div class="mySlides">
                                        <video controls src="{{asset('uploads/'.$file)}}" height=200px width=200px style="display: block"
                                               alt="slide">
                                        </video>
                                    </div>
                                @endforeach
                            @endif
                            @if($newPost->images)
                                <div class="row post-slider position-relative">

                                    @foreach(explode('/',$newPost->images) as $image)
                                        <div class="mySlides">
                                            <img src="{{asset('images/'.$image)}}" height=200px width=200px
                                                 alt="slide">
                                        </div>
                                    @endforeach
                                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                                    <a class="next" onclick="plusSlides(1)">❯</a>
                                </div>

                                <div class="row mySlides-thumbnail">
                                    @foreach(explode('/',$newPost->images) as $image)
                                        <div>
                                            <img class="demo cursor" src="{{asset('images/'.$image)}}"
                                                 style="width:100px"
                                                 onclick="currentSlide({{ $loop->index }})" alt="Image not Available">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>



                        <div class="col-3 resources-forum-right">
                            <div class="resources-forum-box">
                                0 comments
                            </div>
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <h5>Do you like this? Share with your friends!</h5>
                                            <div class="mt-5">
                                                <ul class="share_links">
                                                    <li class="bg_fb"><a href="#" class="share_icon" rel="tooltip"
                                                                         title="Facebook"><i class="fa fa-facebook"></i></a>
                                                    </li>

                                                    <li class="bg_insta"><a href="#" class="share_icon" rel="tooltip"
                                                                            title="Instagram"><i
                                                                class=" fa fa-instagram"></i></a></li>

                                                    <li class="bg_whatsapp"><a href="#" class="share_icon" rel="tooltip"
                                                                               title="Whatsapp"><i
                                                                class="fa fa-whatsapp"
                                                                aria-hidden="true"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="resources-forum-box">
                                <p>Similar Posts</p>
                                <a href="#">Welcome to the Business Forums!</a>
                                <a href="#">Welcome to the Social Forums!</a>
                                <a href="#">Welcome to the Improvements and Inquiries Forum! (Start Here)</a>
                            </div>
                            <div class="resources-forum-box">
                                <p>Categories</p>
                                <a href="#">
                                    Resources
                                </a>
                                <div><a href="" class=" d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19">
                                            <path
                                                d="M1.87401173,9.0171571 L11.9171573,9.0171571 L11.9171573,2.2 C11.9171573,2.08954305 12.0067003,2 12.1171573,2 L12.7171573,2 C12.8276142,2 12.9171573,2.08954305 12.9171573,2.2 L12.9171573,9.2171571 L12.9171573,9.8171571 C12.9171573,9.92761405 12.8276142,10.0171571 12.7171573,10.0171571 L1.78872997,10.0171571 L4.7254834,12.9539105 C4.80358826,13.0320154 4.80358826,13.1586484 4.7254834,13.2367532 L4.30121933,13.6610173 C4.22311447,13.7391222 4.09648148,13.7391222 4.01837662,13.6610173 L0.0585786438,9.70121933 C0.0195262146,9.6621669 -7.90478794e-14,9.61098244 -7.81597009e-14,9.55979797 C-1.00364161e-13,9.50861351 0.0195262146,9.45742905 0.0585786438,9.41837662 L4.01837662,5.45857864 C4.09648148,5.38047379 4.22311447,5.38047379 4.30121933,5.45857864 L4.7254834,5.88284271 C4.80358826,5.96094757 4.80358826,6.08758057 4.7254834,6.16568542 L1.87401173,9.0171571 Z"
                                                transform="translate(6.458579, 7.859798) scale(-1, 1) translate(-6.458579, -7.859798) "></path>
                                        </svg>
                                        <div><span>FAQ (Start Here!), Improv</span></div>
                                    </a></div>
                                <div><a href="#">
                                        <div> Businesses</div>
                                    </a>
                                </div>
                                <div><a href="#">
                                        <span> Social</span>
                                    </a>
                                    <div class="_14Bsb"></div>
                                </div>
                                <div><a href="#">
                                        <div class="_3Rzd4"><span class="_1QEV9"> Community Watch</span></div>
                                    </a>
                                </div>
                                <a href="#" class="button-color">See all categories</a>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        <script src="{{asset('js/main.js')}}"></script>
        <script id="rendered-js">
            $(document).ready(function () {
                $('.dropdown-item').on('click', function () {
                    if ($(this).attr('href')) {
                        alert('redirect to ' + $(this).attr('href'));
                        window.location.replace($(this).attr('href'));

                    }

                });
            });
        </script>
@endsection
