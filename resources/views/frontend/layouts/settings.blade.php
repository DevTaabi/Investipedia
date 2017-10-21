@extends("frontend/user")
@section("main-user-content")
    <div id="main-user-content">
        <div class="row">

            <div class="col-lg-12">
                <h3 style="font-weight: bold;color:white;background-color: #0A93F1">
                    <p class="fa fa-cog fa-fw"> </p> Settings</h3>
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissable" style="margin-top: 2%">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{Session::get('success')}}
                    </div>
                @endif
                @if(Session::has('failure'))
                    <div class="alert alert-danger alert-dismissable" style="margin-top: 2%">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{Session::get('failure')}}
                    </div>
                @endif
                <div class="panel panel-default" style="margin-top: 2%">
                    <div class="col-lg-6" style="margin-top:2%">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                Change Your Profile Picture
                            </div>
                            <div class="panel-body">
                                <form action="{{route('upload')}}" method="post" role="form" enctype="multipart/form-data">
                                    <input type="file" name="image">

                                    {{--<button type="button" class="btn btn-outline btn-default">Choose Profile Picture--}}
                                    {{--<input type="file" name="image" style="display:none;" id="post-img"--}}
                                    {{--{{ $errors->has('image') ? ' has-error' : '' }}></button>--}}
                                    {{--@if ($errors->has('image'))--}}
                                    {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('image') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                    {{--<img src="" id="post-img-tag" width="120px" />--}}

                                    {{--<script type="text/javascript">--}}
                                    {{--function readURL(input) {--}}
                                    {{--if (input.files && input.files[0]) {--}}
                                    {{--var reader = new FileReader();--}}

                                    {{--reader.onload = function (e) {--}}
                                    {{--$('#post-img-tag').attr('src', e.target.result);--}}
                                    {{--}--}}
                                    {{--reader.readAsDataURL(input.files[0]);--}}
                                    {{--}--}}
                                    {{--}--}}
                                    {{--$("#post-img").change(function(){--}}
                                    {{--readURL(this);--}}
                                    {{--});--}}
                                    {{--</script>--}}
                                    <input class="btn btn-default" type="submit" name="submit"
                                           value="Save Profile" title="Uplaod"
                                           style="margin-top: 2%;font-size: medium;font-weight: bold">
                                    {{csrf_field()}}
                                </form>

                                <h3 style="color: #0A93F1">{{$user1->email}}</h3>
                                <div  class="col-md-6">
                                    @if($user1['currentimage'] != null)
                                        <img style="height:450px;width:420px" src="{{url('images/account/'.$user1['currentimage'])}}"/>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                    <div class="col-lg-6" style="margin-top:2%" >
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                Edit Your Info
                            </div>
                            <div class="panel-body">
                                @if($user2 != null)
                                <form action="{{ route('update-user',$user2->user_id) }}" method="post" role="form">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input placeholder="Enter Name" name="name" class="form-control" value="{{$user2->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input placeholder="Enter Username" name="username" class="form-control" value="{{$user2->username}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input placeholder="Enter Email" name="email" class="form-control" value="{{$user1->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input placeholder="Enter Phone Number" name="phone_number" class="form-control" value="{{$user2->phone_number}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender"  class="form-control" value="{{$user2->gender}}">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select name="country" class="form-control" value="{{$user2->country}}">
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Sudia Arabia">Sudia Arabia</option>
                                            <option value="America">America</option>
                                            <option value="India">India</option>
                                        </select>
                                    </div>
                                    {{csrf_field()}}
                                    <input class="btn btn-outline btn-info" name="submit" type="submit" value="Save">
                                    {{--<input type="hidden" name="_token" value="{{session::token()}}">--}}
                                </form>
                                    @endif

                                @if($user3 != null)
                                        <form action="{{ route('update-company',$user3->user_id) }}" method="post" role="form">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input placeholder="Name" name="company_name" class="form-control" value="{{$user3->company_name}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Owner Name</label>
                                                <input placeholder="Owner name" name="owner_name" class="form-control" value="{{$user3->owner_name}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input placeholder="Enter Email" name="email" class="form-control" value="{{$user1->email}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input placeholder="Enter Phone Number" name="phone_number" class="form-control" value="{{$user3->phone_number}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select name="company_type"  class="form-control" value="{{$user3->company_type}}">
                                                    <option value="Individual">Individual</option>
                                                    <option value="Combined">Combined</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select name="country" class="form-control" value="{{$user3->country}}">
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Sudia Arabia">Sudia Arabia</option>
                                                    <option value="America">America</option>
                                                    <option value="India">India</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input placeholder="Enter Phone Number" name="description" class="form-control" value="{{$user3->description}}">
                                            </div>
                                            {{csrf_field()}}
                                            <input class="btn btn-outline btn-info" name="submit" type="submit" value="Save">
                                            {{--<input type="hidden" name="_token" value="{{session::token()}}">--}}
                                        </form>

                                    @endif

                            </div>
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                Change Password
                            </div>
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">Click Here to change password</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <form action="{{route('changepassword')}}" method="post" role="form">
                                                    <div class="form-group">
                                                        <label>Enter Old Password</label>
                                                        <input type="password" placeholder="Old Password" name="oldPassword" class="form-control" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Enter New Password</label>
                                                        <input type="password" placeholder="New Password" name="newPassword" class="form-control" >
                                                    </div>

                                                    {{csrf_field()}}
                                                    <input class="btn btn-outline btn-info" name="submit" type="submit" value="Save">
                                                    {{--<input type="hidden" name="_token" value="{{session::token()}}">--}}
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                </div>
            </div>
        </div>


    </div>


@endsection