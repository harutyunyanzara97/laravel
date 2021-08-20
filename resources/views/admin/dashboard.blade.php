@extends('layouts.app')

@section('content')
</head>

<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
<div class="position-relative">
    {{--    <div class="avatar">--}}
    {{--        <img src="{{asset('images/'.$admin->avatar_url)}}"--}}
    {{--    </div>--}}
    <main>

        <div class="members-section row">

            <div class="col-12 d-flex justify-content-center">

                <div class="resources-forum-right">
                    <a href="" class="comment-btn" data-toggle="modal"
                       data-target="#rightSideModal">
                        Create new category
                    </a>
                </div>
            </div>


        </div>
    </main>
</div>
<div class="modal fade left" id="rightSideModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-right modal-notify modal-success" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div>
                <p class="heading lead">Create Category</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div id="accordion">
                    <div class="card position-static">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">Category Info
                                </button>
                            </h5>


                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <form method="post" id="createcat" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body p-0">
                                    <div>
                                        <div class="tooltip">Name
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" role="img" class="icon-fill">
                                                <path
                                                    d="M12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 Z M12,4.88888889 C8.07264178,4.88888889 4.88888889,8.07264178 4.88888889,12 C4.88888889,15.9273582 8.07264178,19.1111111 12,19.1111111 C15.9273582,19.1111111 19.1111111,15.9273582 19.1111111,12 C19.1111111,8.07264178 15.9273582,4.88888889 12,4.88888889 Z M12.7838529,10.4646465 L12.7838529,14.7124624 L13.2929293,14.7372503 L13.2929293,15.5555556 L11.1111111,15.5555556 L11.1111111,14.7709045 L11.3086109,14.7525481 C11.4933507,14.7353636 11.6400629,14.5975733 11.6738544,14.4213422 L11.6812046,14.3437006 C11.6879039,14.3128522 11.6879039,13.3839213 11.6812046,11.5569081 C11.6796087,11.3991695 11.6102745,11.3203002 11.473202,11.3203002 C11.4690281,11.3190832 11.3483311,11.3190832 11.1111111,11.3203002 L11.1111111,10.4646465 L12.7838529,10.4646465 Z M12.020202,7.55555556 C12.5222791,7.55555556 12.9292929,7.96256942 12.9292929,8.46464646 C12.9292929,8.96672351 12.5222791,9.37373737 12.020202,9.37373737 C11.518125,9.37373737 11.1111111,8.96672351 11.1111111,8.46464646 C11.1111111,7.96256942 11.518125,7.55555556 12.020202,7.55555556 Z"
                                                    id="🎨-Color"></path>
                                            </svg>
                                            <span class="tooltiptext">The category name appears in your forum home page  and in the navigation menu.</span>
                                        </div>
                                        <input type="text" name="name" class="catname" style="color:black"
                                        >
                                    </div>
                                    <div>
                                        <div class="tooltip">Description
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" role="img" class="icon-fill">
                                                <path
                                                    d="M12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 Z M12,4.88888889 C8.07264178,4.88888889 4.88888889,8.07264178 4.88888889,12 C4.88888889,15.9273582 8.07264178,19.1111111 12,19.1111111 C15.9273582,19.1111111 19.1111111,15.9273582 19.1111111,12 C19.1111111,8.07264178 15.9273582,4.88888889 12,4.88888889 Z M12.7838529,10.4646465 L12.7838529,14.7124624 L13.2929293,14.7372503 L13.2929293,15.5555556 L11.1111111,15.5555556 L11.1111111,14.7709045 L11.3086109,14.7525481 C11.4933507,14.7353636 11.6400629,14.5975733 11.6738544,14.4213422 L11.6812046,14.3437006 C11.6879039,14.3128522 11.6879039,13.3839213 11.6812046,11.5569081 C11.6796087,11.3991695 11.6102745,11.3203002 11.473202,11.3203002 C11.4690281,11.3190832 11.3483311,11.3190832 11.1111111,11.3203002 L11.1111111,10.4646465 L12.7838529,10.4646465 Z M12.020202,7.55555556 C12.5222791,7.55555556 12.9292929,7.96256942 12.9292929,8.46464646 C12.9292929,8.96672351 12.5222791,9.37373737 12.020202,9.37373737 C11.518125,9.37373737 11.1111111,8.96672351 11.1111111,8.46464646 C11.1111111,7.96256942 11.518125,7.55555556 12.020202,7.55555556 Z"
                                                    id="🎨-Color"></path>
                                            </svg>
                                            <span class="tooltiptext">The category name appears in your forum home page  and in the navigation menu.</span>
                                        </div>
                                        <input type="text" name="description" class="description" style="color:black">
                                    </div>
                                </div>
                                <div class="container p-0">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file" id="imageUpload" name="img_url" onchange="readURL(this)">
                                            <label for="imageUpload" style="color:black;width:auto;">
                                                <p>Upload image</p>
                                            </label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview"

                                                 alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="tooltip">What type of posts can members create?


                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" role="img" class="icon-fill">
                                            <path
                                                d="M12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 Z M12,4.88888889 C8.07264178,4.88888889 4.88888889,8.07264178 4.88888889,12 C4.88888889,15.9273582 8.07264178,19.1111111 12,19.1111111 C15.9273582,19.1111111 19.1111111,15.9273582 19.1111111,12 C19.1111111,8.07264178 15.9273582,4.88888889 12,4.88888889 Z M12.7838529,10.4646465 L12.7838529,14.7124624 L13.2929293,14.7372503 L13.2929293,15.5555556 L11.1111111,15.5555556 L11.1111111,14.7709045 L11.3086109,14.7525481 C11.4933507,14.7353636 11.6400629,14.5975733 11.6738544,14.4213422 L11.6812046,14.3437006 C11.6879039,14.3128522 11.6879039,13.3839213 11.6812046,11.5569081 C11.6796087,11.3991695 11.6102745,11.3203002 11.473202,11.3203002 C11.4690281,11.3190832 11.3483311,11.3190832 11.1111111,11.3203002 L11.1111111,10.4646465 L12.7838529,10.4646465 Z M12.020202,7.55555556 C12.5222791,7.55555556 12.9292929,7.96256942 12.9292929,8.46464646 C12.9292929,8.96672351 12.5222791,9.37373737 12.020202,9.37373737 C11.518125,9.37373737 11.1111111,8.96672351 11.1111111,8.46464646 C11.1111111,7.96256942 11.518125,7.55555556 12.020202,7.55555556 Z"
                                                id="🎨-Color"></path>
                                        </svg>
                                        <span class="tooltiptext">The category name appears in your forum home page  and in the navigation menu.</span>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center catModal">
                                    <button type="submit" class="btn green-btn">Create<i
                                            class="fa fa-paper-plane ml-1"></i></button>
                                    <a role="button" class="btn white-btn closeModal"
                                       data-dismiss="modal">Cancel</a>
                                </div>
                            </form>
                            {{--                            <form action="#" class="radio-form mt-5">--}}
                            {{--                                <p class="mb-0">--}}
                            {{--                                    <input type="radio" id="radio1" name="radio-group" checked>--}}
                            {{--                                    <label for="radio1">Discussions & Questions</label>--}}
                            {{--                                </p>--}}
                            {{--                                <p class="mb-0">--}}
                            {{--                                    <input type="radio" id="radio2" name="radio-group">--}}
                            {{--                                    <label for="radio2">Discussions</label>--}}
                            {{--                                </p>--}}
                            {{--                                <p class="mb-0">--}}
                            {{--                                    <input type="radio" id="radio3" name="radio-group">--}}
                            {{--                                    <label for="radio3">Questions</label>--}}
                            {{--                                </p>--}}
                            {{--                            </form>--}}
                        </div>

                    </div>
                    <div class="card">
                        {{--                        <div class="card-header" id="headingTwo">--}}
                        {{--                            <h5 class="mb-0">--}}
                        {{--                                <button class="btn-link" data-toggle="collapse" data-target="#collapseTwo"--}}
                        {{--                                        aria-expanded="true" aria-controls="collapseTwo">Category Permissions--}}
                        {{--                                </button>--}}

                        {{--                            </h5>--}}
                        {{--                        </div>--}}
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordion">
                            <div class="card-body">
                                <div>
                                    <div class="tooltip mt-4">What type of posts can members create?

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" role="img" class="icon-fill">
                                            <path
                                                d="M12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 Z M12,4.88888889 C8.07264178,4.88888889 4.88888889,8.07264178 4.88888889,12 C4.88888889,15.9273582 8.07264178,19.1111111 12,19.1111111 C15.9273582,19.1111111 19.1111111,15.9273582 19.1111111,12 C19.1111111,8.07264178 15.9273582,4.88888889 12,4.88888889 Z M12.7838529,10.4646465 L12.7838529,14.7124624 L13.2929293,14.7372503 L13.2929293,15.5555556 L11.1111111,15.5555556 L11.1111111,14.7709045 L11.3086109,14.7525481 C11.4933507,14.7353636 11.6400629,14.5975733 11.6738544,14.4213422 L11.6812046,14.3437006 C11.6879039,14.3128522 11.6879039,13.3839213 11.6812046,11.5569081 C11.6796087,11.3991695 11.6102745,11.3203002 11.473202,11.3203002 C11.4690281,11.3190832 11.3483311,11.3190832 11.1111111,11.3203002 L11.1111111,10.4646465 L12.7838529,10.4646465 Z M12.020202,7.55555556 C12.5222791,7.55555556 12.9292929,7.96256942 12.9292929,8.46464646 C12.9292929,8.96672351 12.5222791,9.37373737 12.020202,9.37373737 C11.518125,9.37373737 11.1111111,8.96672351 11.1111111,8.46464646 C11.1111111,7.96256942 11.518125,7.55555556 12.020202,7.55555556 Z"
                                                id="🎨-Color"></path>
                                        </svg>
                                        <span class="tooltiptext">The category name appears in your forum home page  and in the navigation menu.</span>
                                    </div>
                                </div>
                                {{--                                <form action="#" class="radio-form mt-5">--}}
                                {{--                                    <p class="mb-0">--}}
                                {{--                                        <input type="radio" id="radio4" name="radio-group" checked>--}}
                                {{--                                        <label for="radio4">Discussions & Questions</label>--}}
                                {{--                                    </p>--}}
                                {{--                                    <p class="mb-0">--}}
                                {{--                                        <input type="radio" id="radio5" name="radio-group">--}}
                                {{--                                        <label for="radio5">Discussions</label>--}}
                                {{--                                    </p>--}}
                                {{--                                    <p class="mb-0">--}}
                                {{--                                        <input type="radio" id="radio6" name="radio-group">--}}
                                {{--                                        <label for="radio6">Questions</label>--}}
                                {{--                                    </p>--}}
                                {{--                                </form>--}}
                                <div>
                                    <div class="tooltip">Who can access this category?

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" role="img" class="icon-fill">
                                            <path
                                                d="M12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 Z M12,4.88888889 C8.07264178,4.88888889 4.88888889,8.07264178 4.88888889,12 C4.88888889,15.9273582 8.07264178,19.1111111 12,19.1111111 C15.9273582,19.1111111 19.1111111,15.9273582 19.1111111,12 C19.1111111,8.07264178 15.9273582,4.88888889 12,4.88888889 Z M12.7838529,10.4646465 L12.7838529,14.7124624 L13.2929293,14.7372503 L13.2929293,15.5555556 L11.1111111,15.5555556 L11.1111111,14.7709045 L11.3086109,14.7525481 C11.4933507,14.7353636 11.6400629,14.5975733 11.6738544,14.4213422 L11.6812046,14.3437006 C11.6879039,14.3128522 11.6879039,13.3839213 11.6812046,11.5569081 C11.6796087,11.3991695 11.6102745,11.3203002 11.473202,11.3203002 C11.4690281,11.3190832 11.3483311,11.3190832 11.1111111,11.3203002 L11.1111111,10.4646465 L12.7838529,10.4646465 Z M12.020202,7.55555556 C12.5222791,7.55555556 12.9292929,7.96256942 12.9292929,8.46464646 C12.9292929,8.96672351 12.5222791,9.37373737 12.020202,9.37373737 C11.518125,9.37373737 11.1111111,8.96672351 11.1111111,8.46464646 C11.1111111,7.96256942 11.518125,7.55555556 12.020202,7.55555556 Z"
                                                id="🎨-Color"></path>
                                        </svg>
                                        <span class="tooltiptext">The category name appears in your forum home page  and in the navigation menu.</span>
                                    </div>
                                </div>
                                {{--                                <form action="#" class="radio-form mt-5">--}}
                                {{--                                    <p class="mb-0">--}}
                                {{--                                        <input type="radio" id="radio7" name="radio-group" checked>--}}
                                {{--                                        <label for="radio7">Discussions & Questions</label>--}}
                                {{--                                    </p>--}}
                                {{--                                    <p class="mb-0">--}}
                                {{--                                        <input type="radio" id="radio8" name="radio-group">--}}
                                {{--                                        <label for="radio8">Discussions</label>--}}
                                {{--                                    </p>--}}
                                {{--                                    <p class="mb-0">--}}
                                {{--                                        <input type="radio" id="radio9" name="radio-group">--}}
                                {{--                                        <label for="radio9">Questions</label>--}}
                                {{--                                    </p>--}}
                                {{--                                </form>--}}

                                {{--                                <form action="#" class="radio-form mt-5">--}}
                                {{--                                    <p class="mb-0">--}}
                                {{--                                        <input type="radio" id="radio10" name="radio-group" checked>--}}
                                {{--                                        <label for="radio10">Discussions & Questions</label>--}}
                                {{--                                    </p>--}}
                                {{--                                    <p class="mb-0">--}}
                                {{--                                        <input type="radio" id="radio11" name="radio-group">--}}
                                {{--                                        <label for="radio11">Discussions</label>--}}
                                {{--                                    </p>--}}
                                {{--                                    <p class="mb-0">--}}
                                {{--                                        <input type="radio" id="radio12" name="radio-group">--}}
                                {{--                                        <label for="radio12">Questions</label>--}}
                                {{--                                    </p>--}}
                                {{--                                </form>--}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!--Footer-->


        </div>
        <!--/.Content-->
    </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
{{--<script src="{{asset('js/main.js')}}"></script>--}}
<script>
    $("#createcat").on("submit", function (e) {

        e.preventDefault();
        let id = $('.cat_id').val();
        let name = $('.catname').val();
        let description = $('.description').val();
// let about = $("textarea#txtEditor").val();
// console.log(about);
// let formData={};
        let formdata = new FormData($(this)[0]);
        formdata.append('id', id);
        formdata.append('name', name);
        formdata.append('description', description);


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{{route('createCategory')}}',
            type: 'POST',
            data: formdata,
// dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                window.location='/network';
                console.log(response);
                {{--$('#name-' + response.id).text(response.name);--}}
                {{--$('#desc-' + response.id).text(response.description);--}}
                {{--$('#img-' + response.id).prop('src','{{asset('images/' + ${response.img_url})}}');--}}
            }, error: function (error) {
                console.log(error)
            }
        });

    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageUpload").change(function () {
        $('.edit-photos').remove();
        $('.edit-btn').css('display','block');
        readURL(this);
    });
</script>
@endsection
