@extends("frontend/user")
@section("main-user-content")
    <div id="main-user-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" style="margin-top: 2%">
                    <div class="panel-body">
                        <h3 style="font-weight: bold;color:white;background-color: #0A93F1">
                            <p class="fa fa-photo fa-fw"> </p> Profile Pictures</h3>

                        <div class="row">
                            @foreach($photos as $photo)
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <img src="{{url('images/account/'.$photo->image)}}" height="250px" width="280"/>

                                    </div>
                                    <div class="panel-footer">
                                        <p style="text-align: center">
                                            <a href="{{route('setDp',$photo->user_id)}}"><button
                                                        onclick="return confirm('Are you sure you want change your profile picture?');"
                                                        class="btn btn-info" type="button">Set as profile picture</button></a>
                                            <a href="{{route('Delldp',$photo->id)}}"><button
                                                        onclick="return confirm('Are you sure you want to delete this picture?');"
                                                        class="btn  btn-info" type="button">Delete</button></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                                @endforeach


                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection