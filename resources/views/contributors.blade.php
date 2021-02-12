@extends('layouts.app')

@section('content')
</head>

<link rel="stylesheet" type="text/css" href="{{asset('css/style1.css')}}"/>


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
        <button type="button" class="donate-btn">Donate</button>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js"></script>
@endsection



