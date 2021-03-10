
@auth
    <div class="main-container position-relative pt-0">
        <div class="account-form comments-container">
            <h2 class="mb-3">My balance</h2>
        </div>
        <div class="d-flex align-items-center justify-content-between  balance">
            <div class="green-box mb-3">

                <p style="color:#fff">Your balance is {{$balance}} $</p>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <button data-toggle="modal" @if($card) data-target="#stripeMod" @else
                data-target="#messageModal" @endif class="donate-btn ml-3 payment-info">Replenish
                </button>
                <button data-toggle="modal" @if($card) data-target="#payout" @else
                data-target="#messageModal" @endif class="donate-btn ml-3 payment-info">Withdraw
                </button>
            </div>
        </div>
        <div class="network-banner">
            <div class="d-flex justify-content-center">
                <div class="menu-box">

                    <div class="navbar-collapse collapse" id="collapsingNavbar">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                   role="tab" aria-controls="pills-home" aria-selected="true"
                                   style="color:#fff; background: rgba(155, 203, 108, 0.73);">My payments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                   role="tab" aria-controls="pills-profile" aria-selected="false"
                                   style="color: #fff">Payed to me</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                 aria-labelledby="pills-home-tab">
                                <table class="postTable" style="color:#fff">
                                    <thead class="w-100" style="display: flex;
                                            justify-content: space-between;">
                                    <tr style="width: 100%;
                                    display: flex;
                                    justify-content: space-around;">
                                        <th>Seller</th>
                                        <th>Amount</th>
                                        <th>Buyer</th>
                                        <th>Date</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if($transactions)
                                    @foreach($transactions as $transaction)
                                        <tr style="color:rgb(255, 255, 255);display: flex;
                                             justify-content: space-between;">
                                            @if($transaction->seller)<td>{{$transaction->seller->name}}</td> @else <td>Company</td>@endif
                                            <td>{{$transaction->amount}}</td>
                                            <td>Me</td>
                                            <td>{{$transaction->date}}</td>
                                        </tr>
                                    @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                 aria-labelledby="pills-profile-tab">
                                <table class="postTable" style="color:#fff">
                                    <thead class="w-100" style="display: flex;
                                            justify-content: space-between;">
                                    <tr style="width: 100%;
                                    display: flex;
                                    justify-content: space-around;">
                                        <th>Seller</th>
                                        <th>Amount</th>
                                        <th>Buyer</th>
                                        <th>Date</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if($seller_transactions)
                                    @foreach($seller_transactions as $seller_transaction)
                                        <tr style="color:rgb(255, 255, 255);display: flex;
                                             justify-content: space-between;">

                                            <td>Me</td>
                                            <td>{{$seller_transaction->amount}}</td>
                                            <td>{{$seller_transaction->user->name}}</td>
                                            <td>{{$transaction->date}}</td>

                                        </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="stripeMod" tabindex="-1" role="dialog" aria-labelledby="ModalInfo"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content pb-5 pt-4">
                    <div class="modal-header border-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div>
                            <div id="card-errors" role="alert"></div>
                            <div class="card">
                                <div class="card-body">
                                    {{--                                    <form>--}}
                                    <div class="group d-flex flex-column flex-wrap">

                                        @auth
                                            <form id="payment-forms" action="{{ route('stripe.post') }}" method="post"
                                                  class="require-validation">
                                                @csrf

                                                <div class='form-row row'>
                                                    <input type="number" class="form-control" id="price" name="price"
                                                           placeholder="Please enter the price">
                                                </div>
                                                @if($cards)
                                                    @foreach($cards as $card)
                                                        <label class="radio-row">
                                                            <div>
                                                                {{--                                                    <input type="hidden" name="customer_id" value="{{$card->customer}}" >--}}
                                                                <input type="hidden" name="card_id"
                                                                       value="{{$card->card_id}}">
                                                                <input type="radio" name="payment-source"
                                                                       class="group-radio"
                                                                       value="saved-card-1">
                                                            </div>

                                                            <div id="saved-card">**** ****
                                                                **** {{substr($card->card_number, -4)}}</div>
                                                        </label>
                                                    @endforeach
                                                @endif
                                                <div class="outcome">
                                                    <div class="error"></div>
                                                    <div class="success-saved-card">
                                                        Success! Your are using saved card <span
                                                            class="saved-card"></span>
                                                    </div>
                                                    <div class="success-new-card">
                                                        Success! The Stripe token for your new card is <span
                                                            class="token"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <button class="btn" id="payment-submit"
                                                                type="submit">Pay
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="payout" tabindex="-1" role="dialog" aria-labelledby="ModalInfo"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content pb-5 pt-4">
                    <div class="modal-header border-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div>
                            <div id="card-errors" role="alert"></div>
                            <div class="card">
                                <div class="card-body">
                                    {{--                                    <form>--}}
                                    <div class="group d-flex flex-column flex-wrap">

                                        @auth
                                            <form id="payment-form-payout" action="{{ route('stripe.payout') }}" method="post"
                                                  class="require-validation">
                                                @csrf

                                                <div class='form-row row'>
                                                    <input type="number" class="form-control" id="price" name="price"
                                                           placeholder="Please enter the price">
                                                </div>
                                                @if($cards)
                                                    @foreach($cards as $card)
                                                        <label class="radio-row">
                                                            <div>
                                                                {{--                                                    <input type="hidden" name="customer_id" value="{{$card->customer}}" >--}}
                                                                <input type="hidden" name="card_id"
                                                                       value="{{$card->card_id}}">
                                                                <input type="radio" name="payment-source"
                                                                       class="group-radio"
                                                                       value="saved-card-1">
                                                            </div>

                                                            <div id="saved-card">**** ****
                                                                **** {{substr($card->card_number, -4)}}</div>
                                                        </label>
                                                    @endforeach
                                                @endif
                                                <div class="outcome">
                                                    <div class="error"></div>
                                                    <div class="success-saved-card">
                                                        Success! Your are using saved card <span
                                                            class="saved-card"></span>
                                                    </div>
                                                    <div class="success-new-card">
                                                        Success! The Stripe token for your new card is <span
                                                            class="token"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <button class="btn payment-withdraw" id="payment-submitt"
                                                                type="submit">Withdraw
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <p>Please add a payment method in your profile.</p>
                                    <div class="d-flex go-profile-section justify-content-center"><a class="go-profile" href="{{route('profile')}}">Go
                                            to profile</a>
                                    </div>

                                    <div class="modal-body">

                                    </div>
                                    <div class="d-flex justify-content-center mt-4 go-profile-section">
                                        <div class="modal-footer">
                                            <button type="reset" class="pull-right publish_btn mt-0" data-dismiss="modal">Cancel
                                            </button>
                                            <button class="publish_btn" data-dismiss="modal">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
@endauth
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>


<!--<script src="js/jquery.min.js"></script>-->
<!--<script src="js/bootstrap.js"></script>-->
<script src="{{asset('js/main.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="{{asset('js/comments.js')}}"></script>
<script id="rendered-js">
    $(document).ready(function () {
        $('.dropdown-item').on('click', function () {
            if ($(this).attr('href')) {
                // alert('redirect to ' + $(this).attr('href'));
                window.location.replace($(this).attr('href'));

            }

        });
    });
    $(document).on('click', '.like', function (event) {
        event.preventDefault();
        let likeMe = $(this);
        let toLikeId = $(this).attr('data-id');
        let post_id = $(this).attr('data-path');
        $.ajax({
            type: "get",
            url: '/insertLike',
            data: {_token: $('meta[name="csrf-token"]').attr('content'), id: toLikeId, postId: post_id},
            success: function (r) {
                likeMe.html('Liked');
                if (likeMe.text = 'Liked') {
                    likeMe.removeClass('like').addClass('Liked');
                }
            }

        })
    })
    $(document).on('click', '.Liked', function (event) {
        event.preventDefault();
        let dislike = $(this);
        let likeId = $(this).attr('data-id');
        $.ajax({
            type: "get",
            url: '/dislike',
            data: {_token: $('meta[name="csrf-token"]').attr('content'), id: likeId},
            success: function (r) {
                dislike.html('like');
                if (dislike.text = 'like') {
                    dislike.removeClass('Liked').addClass('like');
                }
            }

        })
    })
    //# sourceURL=pen.js
</script>
<script>
    $(document).on('click', '.post-following', function (event) {
        event.preventDefault();
        let follow = $(this);
        let toFollowId = $(this).attr('data-id');
        let post_id = $(this).attr('data-path');
        $.ajax({
            type: "get",
            url: '/followPost',
            data: {_token: $('meta[name="csrf-token"]').attr('content'), id: toFollowId, postId: post_id},
            success: function (r) {
                follow.html('Followed');
                if (follow.text = 'Following') {
                    follow.removeClass('.member-following').addClass('followedPost');
                }
            }

        })
    })
    $(document).on('click', '.followedPost', function (event) {
        event.preventDefault();
        let unfollow = $(this);
        let followeId = $(this).attr('data-id');
        $.ajax({
            type: "get",
            url: '/unfollowPost',
            data: {_token: $('meta[name="csrf-token"]').attr('content'), id: followeId},
            success: function (r) {
                unfollow.html('follow');
                if (unfollow.text = 'post-following') {
                    unfollow.removeClass('followedPost').addClass('post-following');
                }
            }

        })
    })

</script>
<script>
    $(document).on('click', '.replyMe', function (event) {
        event.preventDefault();
        let id = $(this).attr('data-id');
        let postId = $(this).attr('data-path');
        $(this).closest('.comments').next().append(`<form action="{{url('reply')}}" class="replyForm" method="post" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="id">
                                 <input type="hidden" value=${id} name="id">
                                         <input type="hidden" value=${postId} name="post_id">
                        <div class="">
                            <input type="text" name="reply" class="txt" placeholder="Write a comment" autocomplete="off">
                        </div>
                             <div class="image-upload post">
                                 <div class="avatar-upload">
                                     <div class="avatar-edit">

                                         <label for="imageUpload"><div class="_1qOTu css-mm44dn css-1402lio"><svg width="30" height="19" viewBox="0 0 19 19"><g fill-rule="evenodd"><path d="M2 6a1 1 0 0 1 1-1h2.75l.668-1.424A1 1 0 0 1 7.323 3h4.354a1 1 0 0 1 .905.576L13.25 5H16a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6zm1 0v8h13V6h-3.5l-1.018-2H7.518L6.5 6H3zm6.5 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0-1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path></g></svg></div>
                                             <input type='file' id="imageUpload" name="photo[]">
                                         </label>
                                     </div>
                                     <div class="avatar-preview">
                                         <div id="imagePreview">
                                         </div>
                                     </div>
                                 </div>
            <input id="upload" type="file" name="video[]" onchange="readURL(this);" style="display: none"  class="form-control">
            </div>
           <div class="d-flex justify-content-between">
                                        <div class="d-flex justify-content-between w-70 mt-4">
                                            <button type="reset" class="pull-right publish_btn mt-0">Cancel
                                            </button>
                                            <button class="publish_btn" @guest data-toggle="modal"
                                                    data-target=".login-modal" @else type="submit" @endguest>Publish
                                            </button>
                                        </div>
                                    </div>
        </form>`);

    });

</script>
<script>
    var selDiv = "";

    document.addEventListener("DOMContentLoaded", init, false);

    function init() {
        document.querySelector('#imageUploadd').addEventListener('change', handleFileSelect, false);
        selDiv = document.querySelector("#selectedFiless");
    }

    function handleFileSelect(e) {

        if (!e.target.files || !window.FileReader) return;

        selDiv.innerHTML = "";

        let files = e.target.files;
        let filesArr = Array.prototype.slice.call(files);
        filesArr.forEach(function (f) {
            if (!f.type.match("image.*")) {
                return;
            }

            let reader = new FileReader();
            reader.onload = function (e) {
                let html = "<img src=\"" + e.target.result + "\">";
                selDiv.innerHTML += html;
            }
            reader.readAsDataURL(f);
        });

    }
</script>
<script>
    function fbShare(url, title, descr, image) {
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer' + 'target=_blank');
    }
</script>
<script>
    $('.countComments').on('click', () => {
        $('.txt').css('display', 'inline-block').focus();
    })
</script>

<script>
    $('#payment-submit').click(function () {
        let form = $('#payment-forms');
        let formdata = new FormData(form[0]);
        let card = '';
        // if($('input[type=radio]').is(":checked")){
        //     cat_id = $('input[type=radio]').data('card_id');
        // }
        $('input[type=radio]').each(function () {
            if ($(this).is(':checked')) {
                card = $(this).prev().val();
            }
        })
        formdata.append('card', card);

        $.ajax({
            type: "post",
            url: form.attr('action'),
            data: formdata,
            processData: false,
            contentType: false,

            success: function (response) {
                Swal.fire(response);
                $('#stripeMod').modal('hide');
                $('.modal-backdrop').css('display','none')
            },
            error: function (err) {
                $('#stripeMod #card-errors').html(`<p style="color:red"> ${err.responseJSON.message}</p>`);

            }

        });
    });
</script>
        <script>
            $('#payment-submitt').click(function () {
                let form = $('#payment-form-payout');
                let formdata = new FormData(form[0]);
                let card = '';
                // if($('input[type=radio]').is(":checked")){
                //     cat_id = $('input[type=radio]').data('card_id');
                // }
                $('input[type=radio]').each(function () {
                    if ($(this).is(':checked')) {
                        card = $(this).prev().val();
                    }
                })
                formdata.append('card', card);

                $.ajax({
                    type: "post",
                    url: form.attr('action'),
                    data: formdata,
                    processData: false,
                    contentType: false,

                    success: function (response) {
                        console.log(response);
                        Swal.fire(response);
                        $('#payout').modal('hide');
                        $('.modal-backdrop').css('display','none');
                    },
                    error: function (err) {
                        $('#payout #card-errors').html(`<p style="color:red"> ${err.responseJSON.message}</p>`);

                    }

                });
            });
        </script>
<script>
    $(document).on('click', '.reply_to_reply', function (event) {
        event.preventDefault();
        let id = $(this).attr('data-id');
        $(this).closest('.comments').prev().append(`<form action="{{url('answer')}}" class="replyForm" method="post" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="id">
                                 <input type="hidden" value=${id} name="id">
                        <div class="">
                            <input type="text" name="answer" class="txt" placeholder="Write a comment" autocomplete="off">
                        </div>
                             <div class="image-upload post">
                                 <div class="avatar-upload">
                                     <div class="avatar-edit">

                                         <label for="imageUpload"><div class="_1qOTu css-mm44dn css-1402lio"><svg width="30" height="19" viewBox="0 0 19 19"><g fill-rule="evenodd"><path d="M2 6a1 1 0 0 1 1-1h2.75l.668-1.424A1 1 0 0 1 7.323 3h4.354a1 1 0 0 1 .905.576L13.25 5H16a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6zm1 0v8h13V6h-3.5l-1.018-2H7.518L6.5 6H3zm6.5 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0-1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path></g></svg></div>
                                             <input type='file' id="imageUpload" name="photo[]">
                                         </label>
                                     </div>
                                     <div class="avatar-preview">
                                         <div id="imagePreview">
                                         </div>
                                     </div>
                                 </div>
            <input id="upload" type="file" name="video[]" onchange="readURL(this);" style="display: none"  class="form-control">
            </div>
           <div class="d-flex justify-content-between">
                                        <div class="d-flex justify-content-between w-70 mt-4">
                                            <button type="reset" class="pull-right publish_btn mt-0">Cancel
                                            </button>
                                            <button class="publish_btn" @guest data-toggle="modal"
                                                    data-target=".login-modal" @else type="submit" @endguest>Publish
                                            </button>
                                        </div>
                                    </div>
        </form>`);

    });
    $(document).on('click', '.answer', function (event) {
        event.preventDefault();
        let id = $(this).attr('data-id');
        $(this).closest('.comments').prev().append(`<form action="{{url('answer')}}" class="replyForm" method="post" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="id">
                                 <input type="hidden" value=${id} name="id">
                        <div class="">
                            <input type="text" name="answer" class="txt" placeholder="Write a comment" autocomplete="off">
                        </div>
                             <div class="image-upload post">
                                 <div class="avatar-upload">
                                     <div class="avatar-edit">

                                         <label for="imageUpload"><div class="_1qOTu css-mm44dn css-1402lio"><svg width="30" height="19" viewBox="0 0 19 19"><g fill-rule="evenodd"><path d="M2 6a1 1 0 0 1 1-1h2.75l.668-1.424A1 1 0 0 1 7.323 3h4.354a1 1 0 0 1 .905.576L13.25 5H16a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6zm1 0v8h13V6h-3.5l-1.018-2H7.518L6.5 6H3zm6.5 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0-1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path></g></svg></div>
                                             <input type='file' id="imageUpload" name="photo[]">
                                         </label>
                                     </div>
                                     <div class="avatar-preview">
                                         <div id="imagePreview">
                                         </div>
                                     </div>
                                 </div>
            <input id="upload" type="file" name="video[]" onchange="readURL(this);" style="display: none"  class="form-control">
            </div>
           <div class="d-flex justify-content-between">
                                        <div class="d-flex justify-content-between w-70 mt-4">
                                            <button type="reset" class="pull-right publish_btn mt-0">Cancel
                                            </button>
                                            <button class="publish_btn" @guest data-toggle="modal"
                                                    data-target=".login-modal" @else type="submit" @endguest>Publish
                                            </button>
                                        </div>
                                    </div>
        </form>`);

    });

</script>
</div>
