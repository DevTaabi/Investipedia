@extends("admin/layouts/admin_layout")
@section("main-content")
    <div id="main-content">


        <div class="panel panel-dark">
            <div class="panel-heading">
                <h3 class="panel-title">Keywords Pannel</h3>
            </div>
            <div class="panel-body">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissable" style="margin-top: 2%">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{Session::get('success')}}
                    </div>
                @endif
                <div class="col-md-12">
                @if($editkeyword == null )
                    <!--Table Wrapper Finish-->
                        <div class="login-box">
                            <div class="login-content">
                                <div class="login-user-icon">
                                    <span class="glyphicon glyphicon-stats"></span>
                                    <!--<img src="images/login.png" alt="Logo"/>-->
                                </div>
                                <h3>Add new keywords</h3>
                            </div>

                            <div class="login-form ">

                                <form id="form-register" action="{{route('addword')}}" method="post" role="form" class="form-horizontal ls_form">


                                    <div class="form-group">
                                        <input class="form-control {{ $errors->has('keyword') ? ' has-error' : '' }}" name="keyword" placeholder="Keyword i.e. bad or good" type="text">
                                        <span class="input-group-addon"><i class="fa fa-pencil-square"></i></span>
                                        @if ($errors->has('keyword'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('keyword') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control {{ $errors->has('weight') ? ' has-error' : '' }}" name="weight" placeholder="Weightage Range (-5,5)" type="text">
                                        <span class="input-group-addon"><i class="fa fa-signal"></i></span>
                                        @if ($errors->has('weight'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    {{csrf_field()}}
                                    <input type="submit" value="submit" name="submit" class="btn ls-dark-btn ladda-button" data-style="slide-down">
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="login-box">
                            <div class="login-content">
                                <div class="login-user-icon">
                                    <span class="glyphicon glyphicon-stats"></span>
                                    <!--<img src="images/login.png" alt="Logo"/>-->
                                </div>
                                <h3>Edit keywords</h3>
                            </div>

                            <div class="login-form ">

                                <form id="form-register" action="{{route('updateword',$editkeyword->id)}}" method="post" role="form" class="form-horizontal ls_form">


                                    <div class="form-group">
                                        <input class="form-control {{ $errors->has('keyword') ? ' has-error' : '' }}" name="keyword" placeholder="Keyword i.e. bad or good" type="text" value="{{$editkeyword->keyword}}">
                                        <span class="input-group-addon"><i class="fa fa-pencil-square"></i></span>
                                        @if ($errors->has('keyword'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('keyword') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control {{ $errors->has('weight') ? ' has-error' : '' }}" name="weight" placeholder="Weightage i.e 2,-2,3" type="text" value="{{$editkeyword->weight}}">
                                        <span class="input-group-addon"><i class="fa fa-signal"></i></span>
                                        @if ($errors->has('weight'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    {{csrf_field()}}
                                    <input type="submit" value="submit" name="submit" class="btn ls-dark-btn ladda-button" data-style="slide-down">
                                </form>
                            </div>
                        </div>

                @endif
                    <!--Table Wrapper Start-->
                    <div class="table-responsive ls-table">
                        <table class="table table-bordered table-striped">
                            <thead style="background-color:skyblue">
                            <tr>
                                <th>#</th>
                                <th>Keyword</th>
                                <th>Weight</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($keywords as $key=>$keyword)


                                <tr>
                                    <td>{{$key+1}}</td>

                                    <td>{{$keyword->keyword}}</td>
                                    <td>{{$keyword->weight}}</td>
                                    <td class="text-center">
                                        <a href="{{route('editword',$keyword->id)}}"><button class="btn btn-xs btn-success" title="Edit keyword"><i class="fa fa-pencil-square-o"></i></button></a>
                                        <a href="{{route('deleteword',$keyword->id)}}"><button
                                                    onclick="return confirm('Are you sure you want to delete this keyword?');"
                                                    class="btn btn-xs btn-danger" title="Delete Keyword"><i class="fa fa-times-circle"></i></button></a>
                                    </td>
                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">
                {{$keywords->links() }}

            </div>
        </div>

    </div>
@endsection








