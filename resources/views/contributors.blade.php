@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style1.css')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css">

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
                    Quarantine friendly emergency housing equipped with enough garden space to feed your family for the year
                </li>
                <li>
                    A social platform that gives you total control over your information and the ability to make money based
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
        @auth
            <div class="d-flex justify-content-center contribute">
        <button type="button"  data-toggle="modal"
                @if($card) data-target="#stripeModal" @else
                data-target="#messageModal" @endif class="donate-btn ml-3 payment-info">Donate</button>
            </div>
        <div class="modal fade" id="stripeModal" tabindex="-1" role="dialog" aria-labelledby="ModalInfo">
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

                                    <form id="payment-form" action="{{ route('stripe.post') }}" method="post"
                                          data-cc-on-file="false"
                                          data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" class="require-validation">
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
                                                    autocomplete='off' class='form-control card-number' name="number"
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
                                                                                                type='text' name="cvc"
                                                                                                @if($card)value="{{$card->cvc}}"@endif>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Expiration Month</label> <input
                                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                                    type='text' name="month" @if($card)value="{{$card->month}}"@endif>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Expiration Year</label> <input
                                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
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
        </div>
        <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p>Please add a payment method in your profile, to share your support to the post creator.</p>
                        <div class="d-flex go-profile-section justify-content-center"><a class="go-profile" href="{{route('profile')}}">Go to profile</a>
                    </div>
                    <div class="modal-body">

                    </div>
                        <div class="d-flex justify-content-center mt-4 go-profile-section">
                            <div class="modal-footer">
                                <button type="reset" class="pull-right publish_btn mt-0" data-dismiss="modal">Cancel</button>
                                <button class="publish_btn" data-dismiss="modal">Publish</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        @endauth
        </div>
    </div>
<script src="{{asset('js/main.js')}}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js"></script>
@endsection



