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
<form action="{{ url('subscription') }}" method="post" id="payment-form">
    @csrf
    <div class="text-center p-22-32">
        <h3 class="title-24">{{$plan->name}} - ${{ number_format($plan->cost, 2) }}/month</h3>
        <p class="fs-18-gray">USD$ {{ number_format($plan->cost, 2) }}/per month</p>
        <p class="fs-18-gray mb-5">loremipsum@gmail.com</p>
        <div class="form-group relative">
            <img src="{{asset('img/cart-icon.png')}}" alt="" class="abs img-icon">
            <div class="card-body">
                <div id="card-element">
                </div>

                <div id="card-errors" role="alert"></div>
                <input type="hidden" name="plan" value="{{ $plan->id }}" />
            </div>
        </div>
        <button class="btn-red w-100 br-5 h--45 mt-3">Subscribe</button>
    </div>
</form>
</body>

<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('pk_test_51IDT1rLV6S2YaGRAadUEI9mxO2j2wbfh5Jc69TSDKj7Cdo1sxfpn1XNyPJdmIPS0axoc3VyAWiC3y5QkSDlIuLnF00sP8sZ7Ge');
    var elements = stripe.elements();
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
    card.mount('#card-element');
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });
    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>
