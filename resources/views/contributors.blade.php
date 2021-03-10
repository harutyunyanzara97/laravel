@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css">
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

    #payment-submit {
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
    #donation .card input.group-radio{
        margin: 0 !important;
        width: 13px;
        top: 0;
        left: 0 !important;
        /* right: 10px !important; */
        margin-right: 12px !important;
        position: relative;
    }

    label.radio-row {
        display: flex;
        align-items: center;
        position: relative;
        justify-content: start;
        width: 265px;
    }

    #selectedFiless {
        display: flex;
    }

    #selectedFiless img {
        max-width: 210px;
        max-height: 125px;
        float: left;
        margin-bottom: 10px;
    }

    #donation {
        margin: auto;
        height: 64%;
        overflow: hidden;
    }

    #payment-submitt {
        background: rgb(78, 102, 54);
        border: none;
        cursor: pointer;
    }
</style>


    <div class="contributors-container">
        <div class="main-banner contributors-heading">
            <h2> A special thank you to our contributors and sponsors!
            </h2>
        </div>
        <div class="contributors-middle-content">
            <p class="text-center">
                Want to become a contributor?

            </p>
            <p class="text-center">
                Your donation will go towards the development of:

            </p>
            <ul>
                <li>
                    Quarantine friendly emergency housing equipped with enough garden space to feed your family for the
                    year
                </li>
                <li>
                    A social platform that gives you total control over your information and the ability to make money
                    based
                    off of a positive history
                </li>
                <li>
                    Hiring a team to help this program reach its potential
                </li>
                <li>
                    The implementation of new features and amenities
                </li>
            </ul>

        </div>
        @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('error') }}</p>
            </div>@endif
            <div class="d-flex justify-content-center contribute">
                <button type="button" @guest data-toggle="modal" data-target="#stripe"
                        class="donate-btn ml-3 payment-info" @else data-toggle="modal" data-target="@if($card) #donation @else #messageModal @endif"
                        class="donate-btn ml-3 payment-info" @endguest >Donate
                </button>
            </div>
        <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p class="contributed">Please add a payment method in your profile.</p>
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

        <div class="modal fade" id="donation" tabindex="-1" role="dialog" aria-labelledby="ModalInfo"
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
                                            <form id="payment-form-donate" action="{{ route('stripe.donate') }}" method="post"
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
                                                        <button class="btn" id="payment-submitt"
                                                                type="submit">Donate
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

                                        <form id="payment-form" action="{{ route('stripe.donate') }}" method="post"
                                              data-cc-on-file="false"
                                              data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                              class="require-validation">
                                            @csrf
                                            <div class='form-row row'>
                                                <div class='col-xs-12 form-group required'>
                                                    <label class='control-label'>Price of donation</label>
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
                                                    <button class="btn" id="payment-submit"
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

    <script src="{{asset('js/main.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js"></script>
    <script>
        $('#payment-submitt').click(function () {
            let form = $('#payment-form-donate');
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
                    $('#donation').modal('hide');
                    $('.modal-backdrop').css('display','none')
                },
                error: function (err) {
                    $('#donation #card-errors').html(`<p style="color:red"> ${err.responseJSON.message}</p>`);

                }

            });
        });
    </script>
@endsection



