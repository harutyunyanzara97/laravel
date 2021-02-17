<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>sanctuaryforhumanity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/reset.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style1.css')}}"/>
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
    <div class="profile-banner">
        <div class="account-form comments-container">
            <h2 class="mb-3">Forum Post</h2>
            @foreach($myPosts as $myPost)
            <div class="green-box mb-3">
{{--                <div class="comment-inner-container">--}}
{{--                    <p>--}}
{{--                        Welcome to the Resources Forum!--}}
{{--                    </p>--}}
{{--                    <span class="green-border"></span>--}}
{{--                    <div class="d-flex align-items-center justify-content-between">--}}
{{--                        <p class="mt-3"> 2 comments--}}

{{--                        </p>--}}
{{--                        <div class="d-flex">--}}
{{--                            <p>--}}
{{--                                0--}}
{{--                            </p>--}}
{{--                            <p>a</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex">
                        <img  class="mt-1 ava" src="{{asset('images/'.$user->avatar_url)}}" width="40px" height="40px">
                        <div class="d-flex ml-3 flex-column">
                            <p class="mb-0"> {{$user->name}}</p>
                            <p>
                                {{date_format(date_create($myPost->created_at),'M d y')}}
                            </p>
                        </div>

                    </div>

                    <div class="d-flex">
                        <div class="follow-details">
                            <button type="button" class="btn dropdown-toggle p-0"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" role="img" width="24" height="24"
                                     viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                          d="M22.444 13.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463.821.01 1.482.679 1.482 1.5-.016.844-.712 1.515-1.556 1.5zm0-6.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463C23.34 4.01 24 4.68 24 5.5c-.016.844-.712 1.515-1.556 1.5zm.112 10c.82.03 1.464.716 1.444 1.537-.02.82-.697 1.473-1.519 1.463-.82-.01-1.48-.679-1.481-1.5.017-.843.713-1.514 1.556-1.5z"></path>
                                </svg>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('deletePost',$myPost->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                              d="M17 17c0 1.657-1.343 3-3 3H9c-1.657 0-3-1.343-3-3V7H5V6h13v1h-1v10zM9 9h1v7H9V9zm4 0h1v7h-1V9zm-6 8c0 1.105.895 2 2 2h5c1.105 0 2-.895 2-2V7H7v10zm6-11V5h-3v1H9V5c0-.552.448-1 1-1h3c.552 0 1 .448 1 1v1h-1z"></path>
                                    </svg>
                                    Delete Post</a>
                                <div class="dropdown-divider"></div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="d-flex ml-3 flex-column">
                    <a href="{{route('comments',$myPost->id)}}" class="text-white mb-3">{{$myPost->title}}</a>
                    <a href="{{route('comments',$myPost->id)}}" class="text-white mb-3" style="word-break: break-all;">{{$myPost->description}}</a>
                    <a href="{{route('comments',$myPost->id)}}" class="text-white mb-3">{{count($myPost->comments)}} comments</a>
                </div>

            </div>
            @endforeach

        </div>
    </div>
    <div class="d-flex pagination">
        {{ $myPosts->links() }}
    </div>
</div>


</body>
</html>
