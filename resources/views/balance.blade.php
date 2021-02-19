<style>
    #stripe {
        height: 70%;
        margin: auto;
        overflow: hidden;
    }
    #stripe .modal-content {
        padding: 20px;
        border-radius: 5px;
        height: 100%;
    }

    #stripe .card input {
        margin: 0 !important;
        width: 85%;
    }

    #stripe .modal-dialog {
        /* height: auto; */
        margin: auto;
        /* position: absolute; */
        left: 0;
        right: 0;
        max-width: 500px;
        height: 50%;
        bottom: 0;
        top: 0;
        border-radius: 10px;
    }
    #stripe .modal-dialog h2 {
        font-size: 24px;
    }

    #stripe .modal-body {
        padding: 15px 0;
    }

    #stripe .modal-header {
        padding: 0;
    }

    #stripe .card-body {
        padding: 15px 0;
    }

    .payment-submit {
        background: rgb(78, 102, 54);
        border: none;
        cursor: pointer;
    }

    #stripe .modal-header .close {
        position: absolute;
        right: 10px;
        top: -5px;
    }
    #stripe .input-group {
        border:1px solid #d6d6d6;
    }
    #payment-form {
        height: 100px;
    }
</style>
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
                    <button data-toggle="modal" @if($card) data-target="#stripe" @else
                    data-target="#messageModal" @endif class="donate-btn ml-3 payment-info">Replenish
                    </button>
                    <button data-toggle="modal" @if($card) data-target="#withdraw" @else
                    data-target="#messageModal" @endif class="donate-btn ml-3 payment-info">Withdraw</button>
                </div>
        </div>
        <div class="network-banner">
            <div class="d-flex justify-content-center">
                <div class="menu-box">

                <div class="navbar-collapse collapse" id="collapsingNavbar">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"
                       style="color:#fff; background: rgba(155, 203, 108, 0.73);">My payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"
                       style="color: #fff">Payed to me</a>
                </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
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
                        @foreach($transactions as $transaction)
                            <tr style="color:rgb(255, 255, 255);display: flex;
                                             justify-content: space-between;">

                                <td>{{$transaction->seller->name}}</td>
                                <td>{{$transaction->amount}}</td>
                                <td>Me</td>
                                <td>{{$transaction->date}}</td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
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

                        @foreach($seller_transactions as $seller_transaction)
                            <tr style="color:rgb(255, 255, 255);display: flex;
                                             justify-content: space-between;">

                                <td>Me</td>
                                <td>{{$seller_transaction->amount}}</td>
                                <td>{{$seller_transaction->user->name}}</td>
                                <td>{{$transaction->date}}</td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
                </div>
            </div>
        </div>
    <div class="modal fade" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="ModalInfo">
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content pb-5 pt-4">
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="card-errors" role="alert"></div>
                    <div class="card">
                        <div class="card-body">

                            <form id="payment-form" action="{{ route('stripe.post') }}" method="post"
                                  data-cc-on-file="false"
                                  data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                  class="require-validation">
                                @csrf
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Price of post</label>
                                        <input type="number" class="form-control"  name="price">
                                    </div>
                                </div>
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Name on Card</label> <input
                                            class='form-control' size='4' type='text' name="name"
                                            @if($card)value="{{$card->name}}"@endif>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label'>Card Number</label> <input
                                            autocomplete='off' class='form-control card-number'
                                            name="number"
                                            size='20'
                                            type='text' @if($card)value="{{$card->card_number}}"@endif>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                                        class='form-control card-cvc'
                                                                                        placeholder='ex. 311'
                                                                                        size='4'
                                                                                        type='text'
                                                                                        name="cvc"
                                                                                        @if($card)value="{{$card->cvc}}"@endif>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label> <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text' name="month"
                                            @if($card)value="{{$card->month}}"@endif>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label> <input
                                            class='form-control card-expiry-year' placeholder='YYYY'
                                            size='4'
                                            type='text' name="year" @if($card)value="{{$card->year}}"@endif>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>Please correct the errors and try
                                            again.
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn payment-submit"
                                                type="submit">Add payment
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="modal fade" id="stripe" tabindex="-1" role="dialog" aria-labelledby="ModalInfo">
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content pb-5 pt-4">
                    <div class="modal-header border-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div id="card-errors" role="alert"></div>
                        <div class="card">
                            <div class="card-body">

                                <form id="payment-form" action="{{ route('stripe.post') }}" method="post"
                                      data-cc-on-file="false"
                                      data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                      class="require-validation">
                                    @csrf
                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Price of post</label>
                                            <input type="number" class="form-control" id="price" name="price">
                                        </div>
                                    </div>
                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Name on Card</label> <input
                                                class='form-control' size='4' type='text' name="name"
                                                @if($card)value="{{$card->name}}"@endif>
                                        </div>
                                    </div>

                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group card required'>
                                            <label class='control-label'>Card Number</label> <input
                                                autocomplete='off' class='form-control card-number'
                                                name="number"
                                                size='20'
                                                type='text' @if($card)value="{{$card->card_number}}"@endif>
                                        </div>
                                    </div>

                                    <div class='form-row row'>
                                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                                            <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                                            class='form-control card-cvc'
                                                                                            placeholder='ex. 311'
                                                                                            size='4'
                                                                                            type='text'
                                                                                            name="cvc"
                                                                                            @if($card)value="{{$card->cvc}}"@endif>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Month</label> <input
                                                class='form-control card-expiry-month' placeholder='MM' size='2'
                                                type='text' name="month"
                                                @if($card)value="{{$card->month}}"@endif>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Year</label> <input
                                                class='form-control card-expiry-year' placeholder='YYYY'
                                                size='4'
                                                type='text' name="year" @if($card)value="{{$card->year}}"@endif>
                                        </div>
                                    </div>

                                    <div class='form-row row'>
                                        <div class='col-md-12 error form-group hide'>
                                            <div class='alert-danger alert'>Please correct the errors and try
                                                again.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button class="btn payment-submit"
                                                    type="submit">Add payment
                                            </button>
                                        </div>
                                    </div>

                                </form>
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
                    <p>Please add a payment method in your profile, to share your support to the post
                        creator.</p>
                    <div class="d-flex go-profile-section justify-content-center"><a class="go-profile"
                                                                                     href="{{route('profile')}}">Go
                            to profile</a>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="d-flex justify-content-center mt-4 go-profile-section">
                        <div class="modal-footer">
                            <button type="reset" class="pull-right publish_btn mt-0" data-dismiss="modal">
                                Cancel
                            </button>
                            <button class="publish_btn" data-dismiss="modal">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endauth
    </div>

</div>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function () {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function (e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function (i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>

