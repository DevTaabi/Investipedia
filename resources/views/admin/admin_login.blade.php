@extends("admin/layouts/plain_layout")
@section("main-content")
    <div id="main-content">
        <div class="col-md-12">
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable" style="margin-top: 2%">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="login-box">
                <div class="login-content">
                    <div class="login-user-icon">
                        <i class="glyphicon glyphicon-user"></i>

                    </div>
                    <h3>Admin Login</h3>
                </div>

                <div class="login-form">
                    <form id="form-login" action="{{route('signin')}}" method="post" class="form-horizontal ls_form">
                        <div class="input-group ls-group-input">
                            <input class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" placeholder="Email" name="email" type="text">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="input-group ls-group-input">

                            <input placeholder="Password" name="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" value="" type="password">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif

                        </div>

                        <div class="input-group ls-group-input login-btn-box">
                            {{csrf_field()}}
                            <input class="btn ls-dark-btn ladda-button col-md-12 col-sm-12 col-xs-12" type="submit" value="submit" title="Login">
                                <span class="ladda-label"><i class="fa fa-key"></i></span>


                            <a class="forgot-password" href="javascript:void(0)">Forgot password</a>
                        </div>
                    </form>
                </div>

                {{--Forget Password Box--}}
                {{--<div class="forgot-pass-box">--}}
                    {{--<form action="#" class="form-horizontal ls_form">--}}
                        {{--<div class="input-group ls-group-input">--}}
                            {{--<input class="form-control" placeholder="someone@mail.com" type="text">--}}
                            {{--<span class="input-group-addon"><i class="fa fa-envelope"></i></span>--}}
                        {{--</div>--}}
                        {{--<div class="input-group ls-group-input login-btn-box">--}}
                            {{--<button class="btn ls-dark-btn col-md-12 col-sm-12 col-xs-12">--}}
                                {{--<i class="fa fa-rocket"></i> Send--}}
                            {{--</button>--}}

                            {{--<a class="login-view" href="javascript:void(0)">Login</a> &amp; <a class="" href="registration.html">Registration</a>--}}

                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}

            </div>
        </div>


    </div>
@endsection



