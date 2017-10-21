@extends("frontend/user")
@section("main-user-content")
    <div id="main-user-content">
        <div class="row">
            <p>

            </p>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <h3>Likes</h3></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col.lg.6">
                            @foreach($likes as $users)
                                    @inject('email','App\User')
                                    <h5>
                                        {{$email->where('id',$users->user_id)->value('email')}}
                                    </h5>
                                @endforeach
                            </div>


                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection