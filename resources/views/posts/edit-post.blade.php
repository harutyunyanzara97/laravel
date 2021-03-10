@extends('layouts.app')

@section('content')

    <div class="network-container">

        <div class="network-section">
            <div class="network-info">
                <div class="breadcrumb">
                    <a href="{{route('network')}}">
                        The Network
                    </a>
                    <a href="{{route('showPosts', $category->id)}}">
                        {{$category->name}}
                    </a>
                    <a href="#">
                        Create post
                    </a>
                </div>
                <div class="input-row">
                    <input type="text" placeholder="Search"/>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         class="_2_hbq desktop-header-search-icon-fill button-hover-fill"
                         data-hook="search-icon">
                        <path fill-rule="evenodd"
                              d="M19.854 19.146c.195.196.195.512 0 .708-.196.195-.512.195-.708 0l-3.708-3.709C14.118 17.3 12.391 18 10.5 18 6.358 18 3 14.642 3 10.5 3 6.358 6.358 3 10.5 3c4.142 0 7.5 3.358 7.5 7.5 0 1.891-.7 3.619-1.855 4.938l3.709 3.708zM17 10.5C17 6.91 14.09 4 10.5 4S4 6.91 4 10.5 6.91 17 10.5 17s6.5-2.91 6.5-6.5z"></path>
                    </svg>
                </div>
            </div>

            <div class="main-container resources-forum mt-0">

                <div class="resources-forum-left">
                    <div class="banner d-flex">
                        <div class="d-flex">
                            @auth
                                @if(Auth::user()->avatar_url)<img src="{{asset('images/'.Auth::user()->avatar_url)}}"
                                                                  class="img-fluid logo " width=24px
                                                                  height="24px"/>@endif

                                <a href="{{route('profile')}}"
                                   style="color:#fff;margin-left:8px;">{{Auth::user()->name}} </a>
                            @endauth
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19"
                                 aria-label="Admin"
                                 class="_3LDKX forum-icon-fill forum-icon-fill _1zT4G"
                                 style="fill-rule: evenodd;margin-left:8px;
                                ">
                                <path
                                    d="M15.3812,6.495914 L12.6789333,8.77258837 C12.6191333,8.84477644 12.5099333,8.85722265 12.4354,8.79997005 C12.4215333,8.79001308 12.4094,8.77756686 12.3998667,8.76429089 L9.78686667,6.14327115 C9.67766667,5.99225704 9.46186667,5.95491839 9.305,6.05863687 C9.26946667,6.08186981 9.23913333,6.11091099 9.21573333,6.14493065 L6.60013333,8.81075677 C6.5464,8.88626383 6.43893333,8.90534803 6.3592,8.85390366 C6.34446667,8.84394669 6.33146667,8.83233022 6.32106667,8.81905425 L3.61966667,6.50587098 C3.5018,6.36149485 3.28426667,6.33577266 3.13346667,6.44861837 C3.0494,6.51167921 3,6.60792997 3,6.70998895 L4,14 L15,14 L16,6.70169148 C16,6.51831719 15.8448667,6.36979232 15.6533333,6.36979232 C15.5476,6.36979232 15.4470667,6.41625821 15.3812,6.495914 Z"></path>
                            </svg>
                        </div>
                    </div>
                    @auth
                        <form method="post" id="myForm" enctype="multipart/form-data" action="{{url('/update-post')}}">
                            @csrf
                            <input type="hidden" value="{{$modal_post->id}}" name="id">
                            <input type="text" name="title" class="textEditt post-create @error('title') is-invalid @enderror"
                                   placeholder="Give this post a title" value="{{$modal_post->title}}" autocomplete="Off">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="">
                                <textarea name="description" class="textEdit @error('description') is-invalid @enderror"
                                          placeholder="Write your post here.Add photos,videos and more to get your message across.">{{$modal_post->description}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="image-upload post">
                                <div class="avatar-upload postAv">
                                    <div class="avatar-edit">

                                        <label for="imageUpload">
                                            <div class="_1qOTu css-mm44dn css-1402lio">
                                                <svg width="30" height="19" viewBox="0 0 19 19">
                                                    <g fill-rule="evenodd">
                                                        <path
                                                            d="M2 6a1 1 0 0 1 1-1h2.75l.668-1.424A1 1 0 0 1 7.323 3h4.354a1 1 0 0 1 .905.576L13.25 5H16a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6zm1 0v8h13V6h-3.5l-1.018-2H7.518L6.5 6H3zm6.5 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0-1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <input type="file" id="imageUpload" name="photo[]" multiple/>
                                        </label>
                                    </div>
                                    <div id="selectedFiles"></div>
                                </div>

                                <input id="upload" type="file" name="video[]" onchange="readURL(this);"
                                       style="display: none" class="form-control">


                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                </div>
                                <div class="d-flex justify-content-between w-70">
                                    <button type="reset" class="publish_cancel">Cancel</button>
                                    <button class="publish_btn" type="submit">Publish</button>
                                </div>
                            </div>

                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    </main>
    </div>
    <script id="rendered-js">
        $(document).ready(function () {
            $('.dropdown-item').on('click', function () {
                if ($(this).attr('href')) {
                    // alert('redirect to ' + $(this).attr('href'));
                    window.location.replace($(this).attr('href'));

                }

            });
        });
        //# sourceURL=pen.js
    </script>
    <script>

        var selDiv = "";

        document.addEventListener("DOMContentLoaded", init, false);

        function init() {
            document.querySelector('#imageUpload').addEventListener('change', handleFileSelect, false);
            selDiv = document.querySelector("#selectedFiles");
        }

        function handleFileSelect(e) {

            if (!e.target.files || !window.FileReader) return;

            selDiv.innerHTML = "";

            let files = e.target.files;
            let filesArr = Array.prototype.slice.call(files);
            filesArr.forEach(function (f) {
                if (!f.type.match("image.*")) {
                    return;
                }

                let reader = new FileReader();
                reader.onload = function (e) {
                    let html = "<img src=\"" + e.target.result + "\">";
                    selDiv.innerHTML += html;
                }
                reader.readAsDataURL(f);
            });

        }
    </script>
    <script>
        updateList = function () {


            var input = document.getElementById('imageUpload');
            var output = document.getElementById('imagePreview');
            console.log(input)
            var children = "";
            for (var i = 0; i < input.files.length; ++i) {
                let url = $('#imageUpload')[i]
                console.log(input.files[i].url, '55555555555555555');
                // children += '<img src="'+ url + input.files.item(i).name + '" width="200px" height="200px">';
            }
            output.innerHTML = children;
        }
    </script>
@endsection
