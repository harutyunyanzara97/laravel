@extends('layouts.app')

@section('content')
    <div class="position-relative">
        <div class="main-banner">
            <h2>Welcome to the Sanctuary for Humanity</h2>
            <p class="home-description-line">
                This is an Anonymous Social Platform to Connect to Individuals, Businesses, and Community Resources.

            </p>
        </div>
        <div class="main-section">
            <div class="middle-content" contenteditable="true">
                <p>
                    Welcome to the beta test for the Sanctuary for Humanity.
                </p>
                <p>
                    With this platform we hope to:
                </p>
                <ul>
                    <li>
                        Fund quarantine-friendly emergency housing with enough garden space to feed your family for the
                        year>
                    </li>
                    <li>
                        Provide options to make money from home by providing contributions to the site in the form of
                        posts
                        and comments
                    </li>
                    <li>
                        Make it easier for businesses to get started by bringing together partners and giving you the
                        tools
                        you need to start a business or boost an existing one
                    </li>
                    <li>
                        Connect you to resources and events in your community, and to help you create/build your
                        community
                        and culture
                    </li>
                    <li>
                        Create and implement programs to provide amenities, offering more and more as the program gains
                        momentum
                    </li>
                </ul>
                <p>
                    Ultimately it is the goal of this program not only to give every individual everything they need to
                    be
                    successful, but to prevent every individual from being exploited by giving them more options and a
                    place
                    to go.
                </p>
            </div>
            @auth
                @if(Auth::user()->is_admin==="1")
                    <button id="edit_content" class="publish_btn">Edit</button>
                @endif
            @endauth
        </div>
    </div>
    <script>
        window.onload = function() {
            if(localStorage.getItem('middle-content')) {
                document.querySelector('.middle-content').innerHTML = localStorage.getItem('middle-content');
            }
        }

        let editBtn = document.querySelector('#edit_content');
        let content = document.querySelector('.middle-content');

        editBtn.addEventListener('click', () => {
            content.contentEditable = !content.isContentEditable;
            if(content.contentEditable === 'false') {
                localStorage.setItem('middle-content', content.innerHTML);
            }
        });
    </script>
@endsection
