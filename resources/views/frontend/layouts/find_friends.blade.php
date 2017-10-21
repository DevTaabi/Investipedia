@extends("frontend/user")
@section("main-user-content")
    <div id="main-user-content">
        <div class="row">
            <p>

            </p>
        </div>
        <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4>Review Your Friends Suggestion</h4>
                </div>
                <div class="panel-body">
                    @foreach($users as $user)
                    <blockquote>
                        <p>{{$user->email}}</p>
                        <a href="{{route('addfollower',$user->id)}}"><button class="btn btn-outline btn-danger" type="button">Follow</button></a>
                        {{--<button class="btn btn-outline btn-warning" type="button">Ignore</button>--}}
                    </blockquote>
                        @endforeach

                </div>
                <div class="panel-footer">
                    {{--<p style="text-align: center">--}}
                        {{--<button class="btn btn-outline btn-danger" type="button">See All</button>--}}
                    {{--</p>--}}
                </div>
            </div>
            <!-- /.col-lg-4 -->
        </div>
            <div class="col-lg-4">
                {{--<div class="panel panel-danger">--}}
                    {{--<div class="panel-heading">--}}
                        {{--<h4>Add Friends</h4>--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--<a class="btn btn-block btn-social btn-google-plus">--}}
                            {{--<i class="fa fa-google-plus"></i> Add Friend by Google--}}
                        {{--</a>--}}
                        {{--<a class="btn btn-block btn-social btn-linkedin">--}}
                            {{--<i class="fa fa-linkedin"></i> Add Friend by  LinkedIn--}}
                        {{--</a>--}}
                        {{--<a class="btn btn-block btn-social btn-facebook">--}}
                            {{--<i class="fa fa-facebook"></i> Add Friend by Facebook--}}
                        {{--</a>--}}
                        {{--<a class="btn btn-block btn-social btn-github">--}}
                            {{--<i class="fa fa-github"></i>  Add Friend by GitHub--}}
                        {{--</a>--}}
                        {{--<a class="btn btn-block btn-social btn-twitter">--}}
                            {{--<i class="fa fa-twitter"></i> Add Friend by Twitter--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="panel-footer">--}}

                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                {{--<div class="panel panel-red">--}}
                    {{--<div class="panel-heading">--}}
                        {{--<h4>Respond to Friend Requests</h4>--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--<blockquote>--}}
                            {{--<p>Username</p>--}}
                            {{--<button class="btn btn-outline btn-danger" type="button">Confirm</button>--}}
                            {{--<button class="btn btn-outline btn-warning" type="button">Delete Request</button>--}}
                        {{--</blockquote>--}}
                        {{--<blockquote>--}}
                            {{--<p>Username</p>--}}
                            {{--<button class="btn btn-outline btn-danger" type="button">Confirm</button>--}}
                            {{--<button class="btn btn-outline btn-warning" type="button">Delete Request</button>--}}
                        {{--</blockquote>--}}

                    {{--</div>--}}
                    {{--<div class="panel-footer">--}}
                        {{--<p style="text-align: center">--}}
                            {{--<button class="btn btn-outline btn-danger" type="button">See All</button>--}}
                            {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <!-- /.col-lg-4 -->
            </div>
            <div class="col-lg-4">
                {{--<div class="panel panel-danger">--}}
                    {{--<div class="panel-heading">--}}
                        {{--<h4>Search For Friends</h4>--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Find by Username</label>--}}
                            {{--<input placeholder="Enter Username" class="form-control">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Find by Home Town</label>--}}
                            {{--<input placeholder="Enter Home Town" class="form-control">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Find by Phone Number</label>--}}
                            {{--<input placeholder="Enter Phone Number" class="form-control">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Find by Mutual Friends </label>--}}
                            {{--<input placeholder="Search Mutual Friends" class="form-control">--}}
                             {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" value="">Username 1--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" value="">Username 2--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" value="">Username 3--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="panel-footer">--}}

                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>

@endsection