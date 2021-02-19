<div class="network-banner">
    <table class="postTable">
        <thead class="w-100" style="display: flex;
                                            justify-content: space-between;">
        <tr style="width: 100%;
                                    display: flex;
                                    justify-content: space-around;">
            <th></th>

            <th class="comment-banner">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     stroke="none"
                     class="forum-icon-fill"><title>Posts</title>
                    <path fill-rule="evenodd"
                          d="M6 5h12c1.104 0 2 .896 2 2v8c0 1.104-.896 2-2 2h-4.36l-4.884 2.93c-.079.047-.168.07-.256.07-.086 0-.17-.021-.247-.065C8.097 19.846 8 19.68 8 19.5V17H6c-1.104 0-2-.896-2-2V7c0-1.104.896-2 2-2zm13 10V7c0-.553-.447-1-1-1H6c-.553 0-1 .447-1 1v8c0 .553.447 1 1 1h3v2.621L13.36 16H18c.553 0 1-.447 1-1z"></path>
                </svg>
            </th>
            <th class="comment-banner">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" viewBox="0 0 17 15" stroke="none"
                     class="forum-icon-fill" style="margin-bottom:25px;">
                    <title>Likes</title>
                    <path fill-rule="evenodd"
                          d="M350,217.365a4.312,4.312,0,0,0-8-2.28,4.309,4.309,0,0,0-8,2.28,4.375,4.375,0,0,0,1.487,3.286l6.12,6.184A0.567,0.567,0,0,0,342,227a0.553,0.553,0,0,0,.4-0.165l6.12-6.184A4.375,4.375,0,0,0,350,217.365Z"
                          transform="translate(-333.5 -212.5)"></path>
                </svg>
            </th>
            <th><img src="{{asset('images/icon1.png')}}" width="30px" height="30px" class="ml-3"></th>
            <th style="color: rgb(255, 255, 255);">Recent activity</th>

        </tr>
        </thead>
        <tbody>

                <tr style="color:rgb(255, 255, 255);display: flex;
                                             justify-content: space-between;">
                    <td>
                        <div class="d-flex">
                            <div class="network-banner-details">

                                <a href="{{route()}}" class="whiteText"
                                   style="color: rgb(235 238 233);">

                                </a>

                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
{{--                    <td><span><div class="avaImg">@auth @if(Auth::user()->avatar_url)<img--}}
{{--                                    src="{{asset('images/'.Auth::user()->avatar_url)}}"--}}
{{--                                    class="ava">@endif @endauth</div></span>{{date_format(date_create($post->created_at),'M d y')}}--}}
{{--                        @auth--}}
{{--                            <div class="follow-details">--}}
{{--                                <button type="button" class="dropdown-toggle p-0"--}}
{{--                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" role="img" width="24"--}}
{{--                                         height="24"--}}
{{--                                         viewBox="0 0 24 24">--}}
{{--                                        <path fill-rule="evenodd"--}}
{{--                                              d="M22.444 13.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463.821.01 1.482.679 1.482 1.5-.016.844-.712 1.515-1.556 1.5zm0-6.5c-.82-.03-1.464-.716-1.444-1.537.02-.82.697-1.473 1.518-1.463C23.34 4.01 24 4.68 24 5.5c-.016.844-.712 1.515-1.556 1.5zm.112 10c.82.03 1.464.716 1.444 1.537-.02.82-.697 1.473-1.519 1.463-.82-.01-1.48-.679-1.481-1.5.017-.843.713-1.514 1.556-1.5z"></path>--}}
{{--                                    </svg>--}}
{{--                                </button>--}}
{{--                                @auth--}}
{{--                                    <div class="dropdown-menu">--}}

{{--                                        <a class="dropdown-item align-items-center"--}}
{{--                                           href="{{route('deletePost',$post->id)}}">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                 viewBox="0 0 24 24">--}}
{{--                                                <path fill-rule="evenodd"--}}
{{--                                                      d="M17 17c0 1.657-1.343 3-3 3H9c-1.657 0-3-1.343-3-3V7H5V6h13v1h-1v10zM9 9h1v7H9V9zm4 0h1v7h-1V9zm-6 8c0 1.105.895 2 2 2h5c1.105 0 2-.895 2-2V7H7v10zm6-11V5h-3v1H9V5c0-.552.448-1 1-1h3c.552 0 1 .448 1 1v1h-1z"></path>--}}
{{--                                            </svg>--}}
{{--                                            Delete Post</a>--}}
{{--                                        <div class="dropdown-divider"></div>--}}
{{--                                    </div>--}}
{{--                                @endauth--}}
{{--                            </div>@endauth--}}
{{--                    </td>--}}
                </tr>
            <p>No posts here</p>

        </tbody>
    </table>
</div>
