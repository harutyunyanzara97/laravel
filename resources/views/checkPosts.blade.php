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
            <h2 class="mb-3">Posts</h2>
            @foreach($posts as $post)
                <div class="green-box mb-3">
                    <div class="comment-inner-container checking mb-3">

                            <a style="color:white;text-decoration: none" href="{{route('comments',$post->id)}}">
                                {{$post->title}}
                            </a>


                        <span class="green-border"></span>
                        <div class="d-flex align-items-center justify-content-center">
                                <button class="publish_btn accept" data-id="{{$post->id}}" style="color:green">Accept</button>
                                <button class="publish_btn decline" data-id="{{$post->id}}" style="color:red">Decline</button>
                        </div>

                    </div>




                </div>
            @endforeach

        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

<script>
    $('.accept').on('click', function (event) {
        event.preventDefault();
        let id=$(this).data('id');
        $.ajax({
            url: '/accept',
            method: "post",
            data: {_token: $('meta[name="csrf-token"]').attr('content'),id:id},
            success: (response) => {
              Swal.fire(response);
                $(this).parent().parent().parent().remove();
            }
        })
    });
    $('.decline').on('click', function (event) {
        event.preventDefault();
        let id=$(this).data('id');
        $.ajax({
            url: '/decline',
            method: "post",
            data: {_token: $('meta[name="csrf-token"]').attr('content'),id:id},
            success: (response) => {
                Swal.fire(response);
                $(this).parent().parent().parent().remove();

            }
        })
    });
    </script>
</body>
</html>
