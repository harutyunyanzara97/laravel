{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <title>Document</title>--}}

{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--    <script src="{{ mix('/js/app.js') }}" defer></script>--}}


{{--</head>--}}
{{--<body >--}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <chat-component :user="{{ Auth::user() }}"></chat-component>
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-12">--}}
{{--                <chats></chats>--}}
            </div>
{{--        </div>--}}
{{--    </div>--}}
@endsection
{{--<chats :user="{{ Auth::user() }}" ></chats>--}}




{{--</body>--}}
{{--</html>--}}
{{--<script>--}}
{{--    import ExampleComponent from "../../js/components/ExampleComponent";--}}
{{--    export default {--}}
{{--        components: {ExampleComponent}--}}
{{--    }--}}
{{--</script>--}}
