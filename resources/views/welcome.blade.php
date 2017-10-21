@extends('Layouts.master')

@section('title')
    welcome
@endsection

@section('content')
    <div class="row" >
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable" style="margin-top: 2%">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{Session::get('message')}}
            </div>
        @endif
        <div class="col-md-6">
            <img style="margin-top:20%;width: 450px;height: 280px"
                 src="{{url('sociall.png')}}">
        </div>



        <div class="col-md-6" style="margin-top:80px ;">
            <div class="panel panel-info">
                <div class="panel-heading"  style="background-color:#2196F3;color:#fff;">
                    <h1>Login</h1>


                </div>
                <div class="panel-body">
                    <form  action="{{route('signin')}}" method="post" role="form">

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>Enter Email : </label>

                            <input placeholder="Enter Email" name="email" type="text" class="form-control" value="{{Request::old('email')}}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif

                        </div>


                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label>Enter  Password :</label>
                            <input placeholder="Enter Password" type="password" name="password" class="form-control" value="{{Request::old('password')}}">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif

                        </div>

                        {{csrf_field()}}
                        <input class="btn btn-outline btn-info" style="background-color: #2196F3" type="submit" value="submit" title="Login">


                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection