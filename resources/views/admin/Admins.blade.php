@extends("admin/layouts/admin_layout")
@section("main-content")
    <div id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Admins</h3>
                    </div>
                    <div class="panel-body">
                        <!--Table Wrapper Start-->
                        <div class="table-responsive ls-table">
                            <table class="table table-bordered table-striped">
                                <thead style="background-color:skyblue">
                                <tr >
                                    <th >#</th>
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
                                        <td>{{$user->role}} (Admin)</td>
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

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection