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
                    <h3>Sign Up As A Company</h3>
                </div>
                <div class="panel-body">
                    <form action="{{route('companysignup')}}" method="post" role="form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}">
                                    <label>Enter Company Name</label>
                                    <input placeholder="Enter Name"  name="company_name" class="form-control" value="{{Request::old('company_name')}}" >
                                    @if ($errors->has('company_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                    @endif
                                </div></div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('owner_name') ? ' has-error' : '' }}">
                                    <label>Enter Owner Name</label>
                                    <input placeholder="Enter Owner Name" name="owner_name" class="form-control" value="{{Request::old('owner_name')}}">
                                    @if ($errors->has('owner_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('owner_name') }}</strong>
                                    </span>
                                    @endif
                                </div></div>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>Enter Owner Email</label>
                            <input placeholder="Enter Owner Email" name="email" class="form-control" value="{{Request::old('email')}}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label>Enter short description about your company</label>
                            <textarea type="text" name="description" rows="1" class="form-control" value="{{Request::old('description')}}"></textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company Type</label>
                                    <select name="company_type" class="form-control" value="{{Request::old('company_type')}}">
                                        <option value="Combined">Combined</option>
                                        <option value="Individual">Individual</option>
                                        <option value="None">None</option>
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

                        <div class="form-group">
                            <label>Attach Registration Extract</label>
                            <input type="file" name="path">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                    <label>Enter Phone Number</label>
                                    <input placeholder="Enter Phone Number"  name="phone_number" class="form-control" value="{{Request::old('phone_number')}}">
                                    @if ($errors->has('phone_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('password1') ? ' has-error' : '' }}">
                                    <label>Enter  Password</label>
                                    <input type="password" name="password1"  placeholder="Enter Password" class="form-control" value="{{Request::old('password1')}}">
                                    @if ($errors->has('password1'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        {{csrf_field()}}
                        <input class="btn btn-outline btn-info"  style="background-color:#2196F3;color:#fff;"  type="submit" value="Submit" title="Sign Up For A Company Owner">

                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection