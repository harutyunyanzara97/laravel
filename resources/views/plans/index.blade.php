<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>sanctuaryforhumanity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/reset.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style1.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Plans</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($plans as $plan)
                            <li class="list-group-item clearfix" style="background: #4e6636b8;color: rgb(155, 203, 108);transition: .4s ease 0s;">
                                <div class="pull-left">
                                    <h5>{{ $plan->name }}</h5>
                                    <h5>${{ number_format($plan->cost, 2) }} monthly</h5>
                                    <h5>{{ $plan->description }}</h5>
                                    <button data-path="{{ route('show', $plan->slug) }}" class="btn btn-outline-dark pull-right cardButton" data-toggle="modal" data-target="#ModalInfo">Choose</button>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalInfo" tabindex="-1" role="dialog" aria-labelledby="ModalInfo">
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content pb-5 pt-4">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src="{{asset('img/cross-icon.png')}}" alt=""></span>
                </button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
</body>
    <script>
    $('.cardButton').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).data('path'),
            method: "get",
            data: {_token: $('meta[name="csrf-token"]').attr('content')},
            success: (response) => {
                console.log(response);
                $('#ModalInfo div.modal-body').html(response);
            }
        })
    });

</script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client.
    var stripe = Stripe('pk_test_51IDT1rLV6S2YaGRAadUEI9mxO2j2wbfh5Jc69TSDKj7Cdo1sxfpn1XNyPJdmIPS0axoc3VyAWiC3y5QkSDlIuLnF00sP8sZ7Ge');
    console.log(stripe);
    // Create an instance of Elements.
    var elements = stripe.elements();
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    var card = elements.create('card', {style: style});
    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        stripe.createToken(card).then(function (result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'token');
        hiddenInput.setAttribute('value', 'token');
        form.appendChild(hiddenInput);
        // Submit the form
        form.submit();
    }
</script>





