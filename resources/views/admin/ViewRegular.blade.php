@extends("admin/layouts/admin_layout")
@section("main-content")
    <div id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-dark">
                    <div class="panel-heading">
                        @if($user != null)
                        <h3 class="panel-title">User Name : {{$user->username}}</h3>@endif
                            @if($company != null)
                                <h3 class="panel-title">Company Name: {{$company['company_name']}}</h3>@endif


                    </div>
                    <div class="panel-body">
                        @if($user != null)
                            <h2>User Name: {{$user['username']}}</h2>
                            <h3>Phone No: {{$user['phone_number']}}</h3>
                            <h4>Gender: {{$user['gender']}}</h4>
                            <h4>Country: {{$user['country']}}</h4>
                        @endif
                        @if($company != null)
                            <h3>Owner Name: {{$company['owner_name']}}</h3>
                            <h3>Owner Name: {{$company['owner_name']}}</h3>
                            <h3>Phone Number: {{$company['phone_number']}}</h3>
                            <h3>Company Type: {{$company['company_type']}}</h3>
                            <h3>Description: {{$company['description']}}</h3>

                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-dark">
                    <div class="panel-heading">
                        @if($user != null)
                            <h3 class="panel-title">Posts By : {{$user->username}}</h3>@endif
                        @if($company != null)
                            <h3 class="panel-title">Posts By : {{$company['company_name']}}</h3>@endif
                    </div>
                    <div class="panel-body">
                        @foreach($posts as $post)
                            <div  class="panel panel-dark">
                                <div style="background-color:white;" class="panel-body">

                                    <div class="info">
                                        <h4 style="color: #AB4A5D;">{{$post->user->email}}</h4><h4> added a new Post</h4>on {{$post->created_at}}
                                    </div>

                                    <article class="post">
                                        <p>{{ $post->body }}</p>

                                        @if($post->path != null)<img src="{{url('images/post/'.$post->path)}}" height="200px" width="450"/>
                                        @endif

                                    </article>

                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection