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
                        <h3 class="panel-title">Users</h3>
                    </div>
                    <div class="panel-body">
                        <!--Table Wrapper Start-->
                        <div class="table-responsive ls-table">
                            <table class="table table-bordered table-striped">
                                <thead style="background-color:skyblue">
                                <tr>
                                    <th>#</th>
                                    <th>User_Id</th>
                                    <th>User Name</th>
                                    <th>Name</th>
                                    <th>Mobile Number</th>
                                    <th>Gender</th>
                                    <th>Country</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($regulars as $key=>$regular)


                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$regular->user_id}}</td>

                                        <td>{{$regular->name}}</td>
                                        <td>{{$regular->username}}</td>
                                        <td>{{$regular->phone_number}}</td>
                                        <td>{{$regular->gender}}</td>
                                        <td>{{$regular->country}}</td>
                                        <td class="text-center">
                                            <a href="{{route('view',$regular->user_id)}}"><button class="btn btn-xs btn-success" title="View User"><i class="fa fa-eye"></i></button></a>
                                            <a href="{{route('block',$regular->user_id)}}"><button
                                                        onclick="return confirm('Are you sure you want to block this user?');"
                                                        class="btn btn-xs btn-danger" title="Block the user"><i class="fa fa-plus-square"></i></button></a>
                                            <a href="{{route('unblock',$regular->user_id)}}"><button
                                                        onclick="return confirm('Are you sure you want to unblock this user?');"
                                                        class="btn btn-xs btn-info" title="Unblock the user"><i class="fa fa-minus-square"></i></button></a>
                                            <a href="{{route('delete',$regular->user_id)}}"><button
                                                        onclick="return confirm('Are you sure you want to permanently delete this user?');"
                                                        class="btn btn-xs btn-danger" title="Delete the user"><i class="fa fa-times-circle"></i></button></a>
                                        </td>
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