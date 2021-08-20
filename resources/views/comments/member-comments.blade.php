<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>sanctuaryforhumanity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/reset.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/editor.css')}}"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{asset('js/editor.js')}}"></script>
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
<body translate="no">
<div class="main-container position-relative pt-0">
    <div class="profile-banner align-items-center">
        <div class="account-form comments-container">
            <h2 class="mb-3">Forum Comments</h2>
            @foreach($memberComments as $comment)
                <div class="green-box">
                    <div class="comment-inner-container mb-3">
                        <p>
                            {{$comment->posts->title}}
                        </p>
                        <span class="green-border"></span>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex">
                                <p>
                                    {{count($comment->posts->likes)}}
                                </p>
                                <div>
                                    <i class="fa fa-heart ml-3"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex">
                            <img class="mt-1 ava" src="{{asset('images/'.$user->avatar_url)}}" width="40px"
                                 height="40px">
                            <div class="d-flex ml-3 flex-column">
                                <p class="mb-0"> {{$user->name}}</p>

                            </div>

                        </div>
                        <div class="d-flex">
                            <p>
                                {{date_format(date_create($comment->posts->created_at),'M d y')}}
                            </p>

                        </div>

                    </div>
                    <div class="d-flex flex-column">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


</body>
</html>
