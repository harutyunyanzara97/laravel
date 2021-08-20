@foreach($posts as $post)
<div class="postbar">
    <div class="post-inner">
        <div class="wrapped-section" style="width:400px">
            <div class="desc-post" style="margin-bottom:13px">
                <p style="color:white;font-size:14px">{{$post->title}}</p>
                <pre class="mt-5 mb-5" style="color:white">
                                            {{$post->description}}
                            </pre>
                @if($post->images)
                <div>
                    <img src={{asset('images/'.$post->images)}} width=100px height=100px>
                </div>
                @endif

{{--                @auth--}}
{{--                    <button class="ml-3 payment-info-post" data-toggle="modal"--}}
{{--                            @if($cards) data-target="#stripeModal" @else--}}
{{--                            data-target="#messageModal" @endif><img--}}
{{--                            src="{{asset('images/icon1.png')}}" width="30px" height="30px">--}}
{{--                    </button>@endauth--}}
                <a role="reset" class="btn white-btn cancel-btn"
                >Cancel</a>
            </div>
        </div>
    </div>
    <div class="modal" id="stripeModal" tabindex="-1" role="dialog" aria-labelledby="ModalInfo" aria-hidden="true" style="height: 75%;margin-left:20px">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content pb-5 pt-4" style="z-index:2;position: relative">
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
                                <div class="group d-flex flex-column flex-wrap">

                                    @auth
                                        <form id="payment-form" action="{{ url('/pay') }}" method="post"
                                              class="require-validation">
                                            @csrf

                                            <input type="hidden" value="{{$post->user->id}}" name="id">
                                            <input type="hidden" value="{{$post->user}}" name="postUser">
                                            <input type="hidden" value="{{$post->id}}" name="postId">
                                            <div class='form-row row'>
                                                <input type="number" class="form-control" id="price" name="price"
                                                       placeholder="Please enter the price">
                                            </div>

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
                                        </form>
                                    @endauth

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button class="btn" id="payment-submit"
                                                    type="submit">Pay
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
