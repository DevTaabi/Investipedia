@extends("frontend/user")
@section("main-user-content")
    <div id="main-user-content">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissable" style="margin-top: 2%">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{Session::get('success')}}
            </div>
        @endif
        <div class="col-lg-12" id="profile">


            <div class="col-lg-4">
                <div class="panel panel-yellow" style="margin-top: 20%">
                    <div class="panel-heading">
                        @if($user1['currentimage'] != null)
                            <img  src="{{url('images/account/'.$user1['currentimage'])}}" height="320px" width="280px"/>
                        @endif
                    </div>
                    <div class="panel-body">

                        <a href="{{route('settings')}}" title="Change Profile"> <button type="button" class="btn  btn-warning" style="margin-left: 20%"> <p class="fa fa-photo"> </p>  Change Profile Picture</button></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="panel panel-yellow" style="margin-top: 10%">
                    <div class="panel-body">
                        @if($user2 != null)
                            <div class="col-lg-4">
                                <img src="{{url('userico.png')}}"
                                     style="width: 150px;height: 200px;">
                            </div>
                            @endif
                            @if($Companies != null)
                        <div class="col-lg-4">
                            <img src="{{url('company.png')}}" style="width: 150px;height: 200px">
                        </div>
                            @endif
                        <div class="well col-md-8 details"  >


                            <h4>{{$user1['email']}}</h4>
                            @if($user2 != null)
                                <h2 style="color: #0A93F1">{{$user2['username']}}</h2>
                                <h3>{{$user2['phone_number']}}</h3>
                                <h4>{{$user2['gender']}}</h4>
                                <h4 style="color: #0A93F1">{{$user2['country']}}</h4>
                            @endif
                            @if($Companies != null)
                                <h1 style="color: #0A93F1">{{$Companies['company_name']}}</h1>
                                <h3 >Owner: {{$Companies['owner_name']}}</h3>
                                <h3>{{$Companies['phone_number']}}</h3>
                                <h3>Type: {{$Companies['company_type']}}</h3>
                                <h3 style="color: #0A93F1">{{$Companies['description']}}</h3>

                            @endif


                            <a href="{{route('settings')}}"> <button type="button" class="btn  btn-default">
                                    <i class="fa fa-cog fa-fw"></i> Edit Profile
                                </button></a>


                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection