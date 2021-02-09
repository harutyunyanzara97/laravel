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
<div class="main-container position-relative">
    <div class="profile-banner align-items-center">
        <div class="account-form comments-container">
            <h2 class="mb-3">Forum Post</h2>
            <div class="green-box">
                <div class="comment-inner-container">
                    <p>
                        Welcome to the Resources Forum!
                    </p>
                    <span class="green-border"></span>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mt-3"> 2 comments

                        </p>
                        <div class="d-flex">
                            <p>
                                0
                            </p>
                            <p>a</p>
                        </div>
                    </div>

                </div>

                <div class="d-flex align-items-center justify-content-between">
                    <p class="mt-3"> happycodertest

                    </p>
                    <div class="d-flex">
                        <p>
                            4 days ago

                        </p>
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

                                <button type="button" class="dropdown-item" data-toggle="modal"
                                        data-target="#rightSideModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                              d="M16.679 5.602l1.702 1.704c.826.827.826 2.172 0 3l-8.17 8.18L4 20l1.512-6.218 8.17-8.18c.799-.802 2.196-.803 2.997 0zM8.661 16.046l1.312 1.314 5.652-5.658-3.336-3.341-5.652 5.659 1.317 1.319 3.193-3.193c.195-.195.512-.195.707 0 .195.196.195.512 0 .708L8.66 16.046zm7.645-5.026L17.7 9.624c.45-.451.45-1.186 0-1.637l-1.702-1.704c-.437-.437-1.197-.436-1.634 0L12.97 7.679l3.336 3.34zm-10.88 7.554l3.569-.83-2.741-2.745-.828 3.575z"></path>
                                    </svg>
                                    Edit Category
                                </button>
                                <a class="dropdown-item" href="https://google.com/">
                                    <svg data-hook="lock-empty-icon" xmlns="http://www.w3.org/2000/svg" width="19"
                                         height="19"
                                         viewBox="0 0 19 19">
                                        <path id="a"
                                              d="M14 8h.002a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1V9A1 1 0 0 1 5 8V6.496a4.5 4.5 0 0 1 9 0V8zM5 9v7h9V9H5zm4.5-6A3.5 3.5 0 0 0 6 6.5V8h7V6.5A3.5 3.5 0 0 0 9.5 3z"></path>
                                    </svg>
                                    Set Permissions</a>
                                <a class="dropdown-item" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                              d="M17 17c0 1.657-1.343 3-3 3H9c-1.657 0-3-1.343-3-3V7H5V6h13v1h-1v10zM9 9h1v7H9V9zm4 0h1v7h-1V9zm-6 8c0 1.105.895 2 2 2h5c1.105 0 2-.895 2-2V7H7v10zm6-11V5h-3v1H9V5c0-.552.448-1 1-1h3c.552 0 1 .448 1 1v1h-1z"></path>
                                    </svg>
                                    Delete Category</a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-item">
                                    <svg width="19px" height="19px" viewBox="0 0 19 19" version="1.1"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.9553,8.6584 C17.0183,9.2294 17.0143,9.8044 16.9463,10.3744 C16.9203,10.5934 16.7283,10.7544 16.5073,10.7414 L16.4133,10.7414 C15.7273,10.7394 15.1103,11.1604 14.8623,11.8014 C14.6153,12.4414 14.7893,13.1684 15.2993,13.6274 C15.4633,13.7754 15.4833,14.0254 15.3443,14.1974 C14.9873,14.6424 14.5803,15.0444 14.1313,15.3954 C13.9603,15.5274 13.7163,15.5074 13.5693,15.3494 C13.0903,14.8494 12.3603,14.6834 11.7123,14.9264 C11.0713,15.1934 10.6623,15.8304 10.6873,16.5254 C10.6953,16.7444 10.5313,16.9324 10.3123,16.9544 C10.0393,16.9844 9.7643,17.0004 9.4893,17.0004 C9.2003,16.9994 8.9123,16.9834 8.6253,16.9504 C8.4063,16.9244 8.2443,16.7324 8.2573,16.5114 C8.2973,15.8094 7.8913,15.1584 7.2433,14.8854 C6.5933,14.6344 5.8553,14.8004 5.3743,15.3054 C5.2263,15.4694 4.9763,15.4894 4.8043,15.3514 C4.3643,14.9974 3.9663,14.5944 3.6173,14.1504 C3.4843,13.9794 3.5043,13.7354 3.6633,13.5884 C4.1763,13.1184 4.3433,12.3794 4.0823,11.7344 C3.8303,11.1054 3.2173,10.6964 2.5393,10.7034 C2.3103,10.7094 2.1073,10.5564 2.0483,10.3354 C1.9843,9.7684 1.9843,9.1964 2.0483,8.6294 C2.0693,8.4104 2.2613,8.2474 2.4813,8.2624 C3.1803,8.2844 3.8233,7.8844 4.1133,7.2484 C4.3853,6.5984 4.2173,5.8474 3.6943,5.3744 C3.5303,5.2264 3.5103,4.9764 3.6493,4.8054 C4.0063,4.3604 4.4133,3.9574 4.8623,3.6054 C5.0333,3.4744 5.2773,3.4944 5.4243,3.6534 C5.9033,4.1524 6.6333,4.3184 7.2813,4.0764 C7.9253,3.8104 8.3363,3.1724 8.3113,2.4764 C8.3043,2.2574 8.4683,2.0704 8.6863,2.0474 C9.2473,1.9844 9.8133,1.9844 10.3733,2.0474 C10.5933,2.0724 10.7543,2.2654 10.7423,2.4864 C10.7013,3.1874 11.1073,3.8384 11.7543,4.1124 C12.4063,4.3654 13.1463,4.1994 13.6283,3.6924 C13.7763,3.5294 14.0263,3.5094 14.1983,3.6474 C14.6383,4.0004 15.0373,4.4024 15.3863,4.8464 C15.5203,5.0174 15.5003,5.2614 15.3403,5.4084 C14.8313,5.8704 14.6613,6.5994 14.9123,7.2404 C15.1643,7.8804 15.7863,8.2984 16.4733,8.2894 C16.7003,8.2854 16.9003,8.4384 16.9553,8.6584 Z M15.9933,9.7754 C16.0013,9.6004 16.0023,9.4254 15.9963,9.2514 C15.0913,9.0954 14.3273,8.4844 13.9823,7.6064 C13.6513,6.7654 13.7813,5.8154 14.2883,5.0964 C14.1753,4.9724 14.0563,4.8534 13.9343,4.7404 C13.4803,5.0544 12.9353,5.2294 12.3773,5.2294 C12.0393,5.2294 11.7083,5.1674 11.3653,5.0334 C10.5113,4.6724 9.9183,3.8964 9.7733,3.0044 C9.6923,3.0024 9.6113,3.0004 9.5303,3.0004 C9.4433,3.0004 9.3573,3.0024 9.2693,3.0054 C9.1093,3.8864 8.5053,4.6524 7.6313,5.0124 C7.3243,5.1284 7.0023,5.1854 6.6743,5.1854 C6.1193,5.1854 5.5763,5.0134 5.1183,4.6974 C4.9903,4.8144 4.8663,4.9364 4.7473,5.0634 C5.2723,5.8024 5.3923,6.7804 5.0233,7.6644 C4.6523,8.4754 3.9103,9.0474 3.0063,9.2134 C2.9983,9.3884 2.9983,9.5644 3.0053,9.7404 C3.9023,9.8924 4.6633,10.4954 5.0093,11.3594 C5.3513,12.2074 5.2273,13.1694 4.7143,13.8984 C4.8273,14.0224 4.9453,14.1424 5.0683,14.2574 C5.5213,13.9434 6.0663,13.7694 6.6243,13.7694 C6.9593,13.7694 7.2883,13.8314 7.6323,13.9624 C8.4873,14.3244 9.0813,15.1004 9.2253,15.9954 C9.3133,15.9984 9.4013,16.0004 9.4893,16.0004 C9.5693,16.0004 9.6483,15.9984 9.7283,15.9954 C9.8893,15.1174 10.4903,14.3514 11.3613,13.9904 C11.6693,13.8754 11.9923,13.8164 12.3203,13.8164 C12.8753,13.8164 13.4183,13.9884 13.8753,14.3044 C14.0043,14.1874 14.1273,14.0654 14.2463,13.9384 C13.7383,13.2224 13.6063,12.2784 13.9303,11.4394 C14.2783,10.5424 15.0593,9.9214 15.9933,9.7754 Z M9.5,12 C8.11928813,12 7,10.8807119 7,9.5 C7,8.11928813 8.11928813,7 9.5,7 C10.8807119,7 12,8.11928813 12,9.5 C12,10.8807119 10.8807119,12 9.5,12 Z M9.5,11 C10.3284271,11 11,10.3284271 11,9.5 C11,8.67157288 10.3284271,8 9.5,8 C8.67157288,8 8,8.67157288 8,9.5 C8,10.3284271 8.67157288,11 9.5,11 Z"></path>
                                    </svg>
                                    Manage Categories
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
