@extends('layouts.app')

@section('content')
</head>

<link rel="stylesheet" type="text/css" href="{{asset('css/style1.css')}}"/>
<div class="position-relative">

    <main>
        <div class="members-section row">
            @foreach($users as $user)
                <div class="col-4">
                    <div class="members-box ">
                        <div class="member-item">
                            @if($user->avatar_url)<img src="{{asset('images/'.$user->avatar_url)}}" class="img-fluid "
                                                       alt="member" title="member">@endif
                        </div>
                        <a href="{{route('member-profile',$user->id)}}" class="member-name">{{$user->name}}</a>
                        <button type="button" class="member-following" data-id="{{$user->id}}">Follow</button>
                    </div>
                </div>

            @endforeach
        </div>
    </main>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script>
    $(document).on('click', '.member-following', function (event) {
        event.preventDefault();
        let follow = $(this);
        let toFollowId = $(this).attr('data-id');
        let user_id = $(this).attr('data-path');
        $.ajax({
            type: "get",
            url: '/followUser',
            data: {_token: $('meta[name="csrf-token"]').attr('content'), id: toFollowId, postId: user_id},
            success: function (r) {
                follow.html('Followed');
                if (follow.text = 'Following') {
                    follow.removeClass('.member-following').addClass('followed');
                }
            }

        })
    })
    $(document).on('click', '.followed', function (event) {
        event.preventDefault();
        let unfollow = $(this);
        let followeId = $(this).attr('data-id');
        $.ajax({
            type: "get",
            url: '/unfollowUser',
            data: {_token: $('meta[name="csrf-token"]').attr('content'), id: followeId},
            success: function (r) {
                unfollow.html('follow');
                if (unfollow.text = 'member-following') {
                    unfollow.removeClass('followed').addClass('member-following');
                }
            }

        })
    })

</script>
@endsection
