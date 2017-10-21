@extends("frontend/user")
@section("main-user-content")
    <div id="main-user-content">
            <h3 style="margin-left:4%;font-weight: bold;color:white;background-color: #0A93F1">
                <p class="fa fa-credit-card"> </p> Your Posts</h3>

        @include('frontend.Login.show_all_posts')

    </div>


@endsection