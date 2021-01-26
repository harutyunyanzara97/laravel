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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css">
</head>
<body>
<div class="container text-center">
    <div class="signup">

        <div class="content w-100">
            <!-- Modal Header -->
            <div class="header">
                <h4 class="modal-title" id="gridSystemModalLabel">Sign Up
                </h4>
                <div class="d-flex login-container">
                    <p>
                        Already a member?
                    </p>
                    <button type="button"><a href="{{route('login')}}">Log In</a></button>

                </div>
            </div>
            <main class="sign-up-container">
                <div class="d-flex align-items-center flex-wrap">
                    <div class="flex-1  w-100">
                        <form action="{{url('/storeUser')}}" method="post" class="pt-2">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control pr-input" id="email" name="email"
                                       placeholder="Email">
                            </div>
                            <div class="form-group">

                                <input type="password" class="form-control pr-input" name="password" id="Password"
                                       placeholder="Password">
                            </div>
                            <div class="text-center mt-4 relative">
                                <button type="submit" class="sign-up-btn">Sign Up</button>
                                <div class="chat abs">
                                    <img src="img/supportChat.png" alt="">
                                </div>
                            </div>
                            <div class="position-relative or-row">
                                <p>or sign up with</p>
                            </div>
                            <div id="login-buttons" class="social-login-container svg-style horizontal ">
                                <button id="fb-login" class="social-login fb visible" type="button"
                                        onclick="wixSm.invokeLogin('facebook')">
                                    <div>
                                        <svg class="login-svg" width="28px" height="28px"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 266.89 266.89"
                                             aria-label="Sign up with Facebook">
                                            <g>
                                                <rect style="fill:#3b5998;" width="266.89" height="266.89" rx="14.73"
                                                      ry="14.73"></rect>
                                                <path style="fill:#fff;"
                                                      d="M184.15,266.89V163.54h34.69L224,123.26H184.15V97.54c0-11.66,3.24-19.61,20-19.61h21.33v-36a285.42,285.42,0,0,0-31.08-1.59c-30.75,0-51.81,18.77-51.81,53.24v29.71H107.77v40.28h34.78V266.89Z"></path>

                                            </g>
                                        </svg>
                                    </div>
                                </button>
                                <button  class="social-login ggl visible" type="button"
                                        onclick="wixSm.invokeLogin('google')">
                                    <div>
                                        <svg class="login-svg" xmlns="http://www.w3.org/2000/svg" width="28px"
                                             height="28px" viewBox="0 0 512 512" aria-label="Sign up with Google">
                                            <path style="fill:#FBBB00;" d="M113.47,309.408L95.648,375.94l-65.139,1.378C11.042,341.211,0,299.9,0,256
	c0-42.451,10.324-82.483,28.624-117.732h0.014l57.992,10.632l25.404,57.644c-5.317,15.501-8.215,32.141-8.215,49.456
	C103.821,274.792,107.225,292.797,113.47,309.408z"></path>
                                            <path style="fill:#518EF8;" d="M507.527,208.176C510.467,223.662,512,239.655,512,256c0,18.328-1.927,36.206-5.598,53.451
	c-12.462,58.683-45.025,109.925-90.134,146.187l-0.014-0.014l-73.044-3.727l-10.338-64.535
	c29.932-17.554,53.324-45.025,65.646-77.911h-136.89V208.176h138.887L507.527,208.176L507.527,208.176z"></path>
                                            <path style="fill:#28B446;" d="M416.253,455.624l0.014,0.014C372.396,490.901,316.666,512,256,512
	c-97.491,0-182.252-54.491-225.491-134.681l82.961-67.91c21.619,57.698,77.278,98.771,142.53,98.771
	c28.047,0,54.323-7.582,76.87-20.818L416.253,455.624z"></path>
                                            <path style="fill:#F14336;" d="M419.404,58.936l-82.933,67.896c-23.335-14.586-50.919-23.012-80.471-23.012
	c-66.729,0-123.429,42.957-143.965,102.724l-83.397-68.276h-0.014C71.23,56.123,157.06,0,256,0
	C318.115,0,375.068,22.126,419.404,58.936z"></path>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </form>
                        <div class="position-relative read-container">
                            <div class="custom-control custom-checkbox sign-in-checkbox mt-3 p0">
                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                <label class="custom-control-label" for="customCheck2">Join this site’s community.</label>
                            </div>
                            <div id="read-more">
                                <div class="read-more-article">
                                    <p class="moretext">
                                        Connect with members of our site. Leave comments, follow people and more. Your nickname,
                                        profile image, and public activity will be visible on our site. </p>
                                </div>
                                <a class="moreless-button" href="#">Read more</a>
                            </div>
                        </div>
                    </div>

                </div>

            </main>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

</body>

</html>
