@extends("admin/layouts/admin_layout")
@section("main-content")
<div id="main-content">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissable" style="margin-top: 2%">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{Session::get('success')}}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Companies Extracts</h3>
                </div>
                <div class="panel-body">
                    <!--Table Wrapper Start-->
                    <div class="table-responsive ls-table">
                        <table class="table table-bordered table-striped">
                            <thead style="background-color:skyblue">
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Verified</th>
                                <th>Registration Extract</th>
                                <th>Validation</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $key=>$company)


                                <tr>
                                    <td>{{$key+1}}</td>

                                    <td>{{$company->email}}</td>
                                    <td>{{$company->verified}}</td>
                                    @inject('file','App\Company')
                                    <td><a href="{{url('extracts/'.$file->where('user_id',$company->id)->value('path'))}}">{{$file->where('user_id',$company->id)->pluck('path')}}</a>
                                    </td>

                                    <td class="text-center">
                                   <a href="{{route('verify',$company->id)}}">
                                        <button class="btn btn-xs btn-warning"><p class="fa fa-check-square-o"></p>
                                            Verified</button></a>
                                    </td>
                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Action Table</h3>
                </div>
                <div class="panel-body">
                    <!--Table Wrapper Start-->
                    <div class="table-responsive ls-table">
                        <table class="table table-bordered table-striped">
                            <thead style="background-color:skyblue">
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Verified</th>
                                <th>Blocked</th>
                                <th>Date & Time</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key=>$user)


                                <tr>
                                    <td>{{$key+1}}</td>

                                    <td>{{$user->email}}</td>
                                    @if($user->role == 0)
                                        <td>{{$user->role}} (User)</td>
                                        @endif
                                    @if($user->role == 1)
                                        <td>{{$user->role}} (Company)</td>
                                    @endif
                                    @if($user->role == 2)
                                        <td>{{$user->role}} (Admin)</td>
                                    @endif

                                    <td>{{$user->verified}}</td>
                                    @if($user->blocked == 1 )
                                    <td style="color: red">{{$user->blocked}}: Blocked</td>
                                        @else
                                        <td>{{$user->blocked}}</td>
                                    @endif

                                    <td>{{$user->created_at}}</td>
                                    {{--<td class="text-center">--}}
                                         {{--<button class="btn btn-xs btn-success"><i class="fa fa-eye"></i></button>--}}
                                        {{--<button class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o"></i></button>--}}
                                        {{--<button class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></button>--}}
                                    {{--</td>--}}
                                </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!--Table Wrapper Finish-->
                    {{--<div class="text-center">--}}
                        {{--<div class="ls-button-group demo-btn ls-table-pagination">--}}
                            {{--<ul class="pagination ls-pagination">--}}
                                {{--<li><a href="#"><i class="fa fa-arrow-left"></i> </a></li>--}}
                                {{--<li><a href="#">1</a></li>--}}
                                {{--<li><a href="#">2</a></li>--}}
                                {{--<li><a href="#">3</a></li>--}}
                                {{--<li><a href="#">4</a></li>--}}
                                {{--<li><a href="#">5</a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-arrow-right"></i></a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>


        </div>
    </div>

</div>
@endsection