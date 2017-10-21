@extends("admin/layouts/admin_layout")
@section("main-content")
    <div id="main-content">


        <div class="panel panel-dark">
            <div class="panel-heading">
                <h3 class="panel-title">Add new Admin</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="login-box">
                        <div class="login-content">
                            <div class="login-user-icon">
                                <i class="glyphicon glyphicon-user"></i>
                                <!--<img src="images/login.png" alt="Logo"/>-->
                            </div>
                            <h3>Add Admin</h3>
                        </div>

                        <div class="login-form ">

                            <form id="form-register" action="{{route('adminsignup')}}" method="post" role="form" class="form-horizontal ls_form">


                                <div class="form-group">
                                    <input class="form-control" name="email" placeholder="someone@mail.com" type="text" value="{{Request::old('email')}}">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="name" placeholder="Name" type="text" value="{{Request::old('name')}}">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="authority" placeholder="Authority" type="text" value="{{Request::old('authority')}}">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    @if ($errors->has('authority'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('authority') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <input placeholder="Password" name="password" class="form-control"  type="password" value="{{Request::old('password')}}">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{csrf_field()}}
                                    <input type="submit" value="submit" name="submit" class="btn ls-dark-btn ladda-button" data-style="slide-down">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection








