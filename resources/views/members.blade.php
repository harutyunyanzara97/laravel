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
                            @auth
                            @if(Auth::user()->is_admin === 1)
                            <div class="follow-details">
                                <button type="button" class="dropdown-toggle p-0"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" role="img" width="24"
                                         height="24"
                                         viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                              d="M22.444 13.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463.821.01 1.482.679 1.482 1.5-.016.844-.712 1.515-1.556 1.5zm0-6.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463C23.34 4.01 24 4.68 24 5.5c-.016.844-.712 1.515-1.556 1.5zm.112 10c.82.03 1.464.716 1.444 1.537-.02.82-.697 1.473-1.519 1.463-.82-.01-1.48-.679-1.481-1.5.017-.843.713-1.514 1.556-1.5z"></path>
                                    </svg>
                                </button>

                                    <div class="dropdown-menu">
                                            <a class="dropdown-item align-items-center @if($user->notify===1) unset-moderators @else set-moderators @endif" style="color:white" data-id="{{$user->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                     height="24"
                                                     viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                          d="M16.679 5.602l1.702 1.704c.826.827.826 2.172 0 3l-8.17 8.18L4 20l1.512-6.218 8.17-8.18c.799-.802 2.196-.803 2.997 0zM8.661 16.046l1.312 1.314 5.652-5.658-3.336-3.341-5.652 5.659 1.317 1.319 3.193-3.193c.195-.195.512-.195.707 0 .195.196.195.512 0 .708L8.66 16.046zm7.645-5.026L17.7 9.624c.45-.451.45-1.186 0-1.637l-1.702-1.704c-.437-.437-1.197-.436-1.634 0L12.97 7.679l3.336 3.34zm-10.88 7.554l3.569-.83-2.741-2.745-.828 3.575z"></path>
                                                </svg>
                                                @if($user->notify===1) Unset moderator @else Set as a moderator @endif</a>
                                            </button>
                                        <a class="dropdown-item align-items-center"
                                           href="{{route('deleteUser',$user->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                 height="24"
                                                 viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                      d="M17 17c0 1.657-1.343 3-3 3H9c-1.657 0-3-1.343-3-3V7H5V6h13v1h-1v10zM9 9h1v7H9V9zm4 0h1v7h-1V9zm-6 8c0 1.105.895 2 2 2h5c1.105 0 2-.895 2-2V7H7v10zm6-11V5h-3v1H9V5c0-.552.448-1 1-1h3c.552 0 1 .448 1 1v1h-1z"></path>
                                            </svg>
                                            Delete user</a>
                                        <div class="dropdown-divider"></div>
                                    </div>

                            </div>
                                @endif
                                @endauth
                        </div>
                        @auth
                      <button type="button" id="followButton" class="{{Auth::user()->followings->contains($user->id) ? 'followed' : 'followings' }}"  data-id="{{$user->id}}">@if(Auth::user()->followings->contains($user->id))Followed @else Follow @endif </button>
                            @endauth
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
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
    $(document).on('click', '.set-moderators', function (event) {
        event.preventDefault();
        let moder=$(this).attr('data-id');
        $.ajax({
            type: "post",
            url: '/moderator',
            data: {_token: $('meta[name="csrf-token"]').attr('content'), id: moder},
            success: function (r) {
                Swal.fire(r);
            }
            })
    })
    $(document).on('click', '.unset-moderators', function (event) {
        event.preventDefault();
        let moder=$(this).attr('data-id');
        $.ajax({
            type: "post",
            url: '/unsetModerator',
            data: {_token: $('meta[name="csrf-token"]').attr('content'), id: moder},
            success: function (r) {
                Swal.fire(r);
            }
        })
    })
</script>
@endsection
