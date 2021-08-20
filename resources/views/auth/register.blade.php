
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
                    <button type="button" ><a href="{{route('login')}}"  class="sign-up-now">Log In</a></button>

                </div>
            </div>
            <main class="sign-up-container">
                <div class="d-flex align-items-center flex-wrap">
                    <div class="flex-1  w-100">
                        <form method="POST" class="pt-2" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control pr-input  @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name"
                                       placeholder="Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email"  id="email" name="email" class="form-control pr-input  @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email"
                                       placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                @if($errors->has('password'))
                                    <div class="error">{{ $errors->first('password') }}</div>
                                @endif
                                <input type="password" class="form-control pr-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                                       placeholder="Password">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                            </div>
                            <div class="text-center mt-4 relative">
                                <button type="submit" class="sign-up-btn">Sign Up</button>
                                <div class="chat abs">
                                    <img src="img/supportChat.png" alt="">
                                </div>
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
