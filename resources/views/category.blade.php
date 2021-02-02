<div class="modal show right" id="rightSideModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false" style="display: block">
    <div class="modal-dialog modal-full-height modal-right modal-notify modal-success" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div>
                <p class="heading lead">Edit Category</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">Category Info
                                </button>
                            </h5>


                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <form action="{{url('update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="cat_id" value="{{$modal_category->id}}">
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
                                        <input type="text" name="name" value="{{$modal_category->name}}">
                                    </div>
                                    <div>
                                        <div class="tooltip">Page title
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" role="img" class="icon-fill">
                                                <path
                                                    d="M12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 Z M12,4.88888889 C8.07264178,4.88888889 4.88888889,8.07264178 4.88888889,12 C4.88888889,15.9273582 8.07264178,19.1111111 12,19.1111111 C15.9273582,19.1111111 19.1111111,15.9273582 19.1111111,12 C19.1111111,8.07264178 15.9273582,4.88888889 12,4.88888889 Z M12.7838529,10.4646465 L12.7838529,14.7124624 L13.2929293,14.7372503 L13.2929293,15.5555556 L11.1111111,15.5555556 L11.1111111,14.7709045 L11.3086109,14.7525481 C11.4933507,14.7353636 11.6400629,14.5975733 11.6738544,14.4213422 L11.6812046,14.3437006 C11.6879039,14.3128522 11.6879039,13.3839213 11.6812046,11.5569081 C11.6796087,11.3991695 11.6102745,11.3203002 11.473202,11.3203002 C11.4690281,11.3190832 11.3483311,11.3190832 11.1111111,11.3203002 L11.1111111,10.4646465 L12.7838529,10.4646465 Z M12.020202,7.55555556 C12.5222791,7.55555556 12.9292929,7.96256942 12.9292929,8.46464646 C12.9292929,8.96672351 12.5222791,9.37373737 12.020202,9.37373737 C11.518125,9.37373737 11.1111111,8.96672351 11.1111111,8.46464646 C11.1111111,7.96256942 11.518125,7.55555556 12.020202,7.55555556 Z"
                                                    id="🎨-Color"></path>
                                            </svg>
                                            <span class="tooltiptext">The category name appears in your forum home page  and in the navigation menu.</span>
                                        </div>
                                        <input type="text" name="page_title" value="{{$modal_category->page_title}}">
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
                                        <input type="text" name="description"
                                               value="{{$modal_category->description}}">
                                    </div>
                                </div>
                                <div class="container p-0">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file" id="imageUpload" name="photo[]" onchange="readURL(this)">
                                            <label for="imageUpload">
                                                <svg width="19px" height="19px" viewBox="0 0 19 19" version="1.1"
                                                     xmlns="http://www.w3.org/2000/svg" class="_55Vto">
                                                    <path
                                                        d="M3,7.8 L3,3.2 C3,3.08954305 3.08954305,3 3.2,3 L3.8,3 C3.91045695,3 4,3.08954305 4,3.2 L4,5.79219722 C5.19002477,4.10459307 7.17019471,3 9.41185475,3 C13.0503869,3 16,5.91014913 16,9.5 C16,9.668236 15.9935219,9.83497919 15.9807983,10 L14.9637136,10 C14.9787551,9.83531898 14.9864392,9.66854485 14.9864392,9.5 C14.9864392,6.46243388 12.4906127,4 9.41185475,4 C7.24552793,4 5.3678131,5.21916205 4.44511245,7 L7.8,7 C7.91045695,7 8,7.08954305 8,7.2 L8,7.8 C8,7.91045695 7.91045695,8 7.8,8 L3.2,8 C3.08954305,8 3,7.91045695 3,7.8 Z M16,11.2 L16,15.8 C16,15.9104569 15.9104569,16 15.8,16 L15.2,16 C15.0895431,16 15,15.9104569 15,15.8 L15,13.2078028 C13.8099752,14.8954069 11.8298053,16 9.58814525,16 C5.9496131,16 3,13.0898509 3,9.5 C3,9.331764 3.00647814,9.16502081 3.01920172,9 L4.03628637,9 C4.02124492,9.16468102 4.01356081,9.33145515 4.01356081,9.5 C4.01356081,12.5375661 6.50938727,15 9.58814525,15 C11.7544721,15 13.6321869,13.780838 14.5548875,12 L11.2,12 C11.0895431,12 11,11.9104569 11,11.8 L11,11.2 C11,11.0895431 11.0895431,11 11.2,11 L15.8,11 C15.9104569,11 16,11.0895431 16,11.2 Z"
                                                        id="path-1"></path>
                                                </svg>
                                                Change Image</label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview"
                                                 style="background-image: url({{asset('images/'.$modal_category->img_url)}}"
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
                                <div class="modal-footer justify-content-center">
                                    <button type="submit" class="btn green-btn"> Update<i
                                            class="fa fa-paper-plane ml-1"></i></button>
                                    <a role="button" class="btn white-btn closeModal"
                                       data-dismiss="modal">Cancel</a>
                                </div>
                            </form>
                            <form action="#" class="radio-form mt-5">
                                <p class="mb-0">
                                    <input type="radio" id="radio1" name="radio-group" checked>
                                    <label for="radio1">Discussions & Questions</label>
                                </p>
                                <p class="mb-0">
                                    <input type="radio" id="radio2" name="radio-group">
                                    <label for="radio2">Discussions</label>
                                </p>
                                <p class="mb-0">
                                    <input type="radio" id="radio3" name="radio-group">
                                    <label for="radio3">Questions</label>
                                </p>
                            </form>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn-link" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="true" aria-controls="collapseTwo">Category Permissions
                                </button>

                            </h5>
                        </div>
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
                                <form action="#" class="radio-form mt-5">
                                    <p class="mb-0">
                                        <input type="radio" id="radio4" name="radio-group" checked>
                                        <label for="radio4">Discussions & Questions</label>
                                    </p>
                                    <p class="mb-0">
                                        <input type="radio" id="radio5" name="radio-group">
                                        <label for="radio5">Discussions</label>
                                    </p>
                                    <p class="mb-0">
                                        <input type="radio" id="radio6" name="radio-group">
                                        <label for="radio6">Questions</label>
                                    </p>
                                </form>
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
                                <form action="#" class="radio-form mt-5">
                                    <p class="mb-0">
                                        <input type="radio" id="radio7" name="radio-group" checked>
                                        <label for="radio7">Discussions & Questions</label>
                                    </p>
                                    <p class="mb-0">
                                        <input type="radio" id="radio8" name="radio-group">
                                        <label for="radio8">Discussions</label>
                                    </p>
                                    <p class="mb-0">
                                        <input type="radio" id="radio9" name="radio-group">
                                        <label for="radio9">Questions</label>
                                    </p>
                                </form>

                                <form action="#" class="radio-form mt-5">
                                    <p class="mb-0">
                                        <input type="radio" id="radio10" name="radio-group" checked>
                                        <label for="radio10">Discussions & Questions</label>
                                    </p>
                                    <p class="mb-0">
                                        <input type="radio" id="radio11" name="radio-group">
                                        <label for="radio11">Discussions</label>
                                    </p>
                                    <p class="mb-0">
                                        <input type="radio" id="radio12" name="radio-group">
                                        <label for="radio12">Questions</label>
                                    </p>
                                </form>
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
