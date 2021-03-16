@extends('layouts.app')

@section('content')
</head>

<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
<div class="position-relative">

    <main>
        <div class="members-section row">
            @foreach($users as $user)
                <div class="col-lg-4">
                    <div class="members-box">
                        <div class="member-item">
                            <a href="{{route('member-profile',$user->id)}}">
                            @if($user->avatar_url)<img src="{{asset('images/'.$user->avatar_url)}}" class="img-fluid"
                                                       alt="member" title="member"> @else
                                <div style="min-height: 150px";></div>
                            @endif
                            </a>
                        </div>
                        <div class="d-flex justify-content-center">
                        <a href="{{route('member-profile',$user->id)}}" class="member-name">{{$user->name}}</a>
                        </div>
                      <button type="button" id="followButton" class="{{Auth::user()->followings->contains($user->id) ? 'followed' : 'followings' }}"  data-id="{{$user->id}}">@if(Auth::user()->followings->contains($user->id))Followed @else Follow @endif </button>
                    </div>
                </div>

            @endforeach
                <div class="d-flex pagination">
                    {{ $users->links() }}
                </div>
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
    $(document).on('click', '#followButton', function (event) {
        event.preventDefault();
        let follow = $(this);
        let toFollowId = $(this).attr('data-id');
        {
            $.ajax({
                type: "post",
                url: '/followUser',
                data: {_token: $('meta[name="csrf-token"]').attr('content'), id: toFollowId},
                success: function (r) {

                    if( r==1 ) {
                        follow.html('Followed');

                    } else if( r==2 ) {
                        follow.html('Follow');

                    }

                }
            })
        }
    })

</script>
@endsection
