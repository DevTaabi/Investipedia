@extends('Layouts.master')

@section('title')
    welcome
@endsection

@section('content')


    <div class="row" id="back">

        <div class="col-lg-6">
            <img style="margin-top: 10%;width: 400px; height:400px"
                 src="{{url('globe.png')}}">

        </div>
        <div class="col-lg-6">

            <div class="panel panel-info">
                <div class="panel-heading" style="background-color:#2196F3;color:#fff;">
                    <h3>Sign Up As An Individual</h3>
                </div>
                <div class="panel-body">
                    <form action="{{route('signup')}}" method="post" role="form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Enter Name</label>
                                    <input placeholder="Enter Name" name="name" class="form-control" value="{{Request::old('name')}}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div></div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label>Enter Username</label>
                                    <input placeholder="Enter Username" name="username" class="form-control" value="{{Request::old('username')}}">
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div></div>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>Enter Email</label>
                            <input placeholder="user@mail.com" name="email" class="form-control" value="{{Request::old('email')}}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label>Enter Phone Number</label>
                            <input placeholder="Enter Phone Number" name="phone_number" class="form-control" value="{{Request::old('phone_number')}}">
                            @if ($errors->has('phone_number'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender"  class="form-control" value="{{Request::old('gender')}}">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select name="country" class="form-control" value="{{Request::old('country')}}">
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Sudia Arabia">Sudia Arabia</option>
                                        <option value="America">America</option>
                                        <option value="India">India</option>
                                    </select>
                                </div></div>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label>Enter  Password</label>
                            <input name="password"  type="password" placeholder="At least 6 characters long" class="form-control" value="{{Request::old('password')}}">
                            @if ($errors->has('company_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        {{csrf_field()}}
                        <input class="btn btn-outline btn-info"  style="background-color:#2196F3;color:#fff;" name="submit" type="submit" value="Submit" title="Sign Up For A Regular User">
                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection