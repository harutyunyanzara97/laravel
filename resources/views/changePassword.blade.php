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
    <div class="profile-banner">
        <div class="account-form comments-container">
    <h2>Change password</h2>
    <div class="max-w--440">
        <form action="{{url('/toChangePassword')}}" method="post">
            @csrf
            <div class="d-flex justify-content-center mb-4">
                <div class="w-100">
                    <div class="form-group">
                        <label for="Current password" class="fs-normal-12">Current password</label>
                        <input type="password" class="form-control h--50 fs-14-black text-left"
                               name="current_password" id="Current password" placeholder="*******">
                    </div>
                    <div class="form-group">
                        <label for="New password" class="fs-normal-12">New password</label>
                        <input type="password" class="form-control h--50 fs-14-black text-left"
                               name="new_password" id="New password" placeholder="New password">
                    </div>
                    <div class="form-group">
                        <label for="Confirm password" class="fs-normal-12">Confirm password</label>
                        <input type="password" class="form-control h--50 fs-14-black text-left"
                               name="confirm_password" id="Confirm password"
                               placeholder="Confirm password">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn-red-bordered mt-4 br-5 m-l--20 publish_btn">Cancel</button>
                <button class="btn-red mt-4 br-5 m-l--20 publish_btn" type="submit">Save</button>
            </div>
        </form>

    </div>

</div>
    </div>
</div>
</body>
</html>
