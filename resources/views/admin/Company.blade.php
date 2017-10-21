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
                        <h3 class="panel-title">Companies</h3>
                    </div>
                    <div class="panel-body">
                        <!--Table Wrapper Start-->
                        <div class="table-responsive ls-table">
                            <table class="table table-bordered table-striped">
                                <thead style="background-color:skyblue">
                                <tr>
                                    <th>#</th>
                                    <th>User_Id</th>
                                    <th>Company Name</th>
                                    <th>Owner Name</th>
                                    <th>Country</th>
                                    <th>Mobile Number</th>
                                    <th>Company Type</th>
                                    <th>Description</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Companies as $key=>$company)


                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$company->user_id}}</td>
                                        <td>{{$company->company_name}}</td>

                                        <td>{{$company->owner_name}}</td>
                                        <td>{{$company->country}}</td>
                                        <td>{{$company->phone_number}}</td>
                                        <td>{{$company->company_type}}</td>
                                        <td>{{$company->description}}</td>
                                        <td class="text-center">
                                            <a href="{{route('view',$company->user_id)}}"><button class="btn btn-xs btn-success" title="View User"><i class="fa fa-eye"></i></button></a>
                                            <a href="{{route('block',$company->user_id)}}"><button
                                                        onclick="return confirm('Are you sure you want to block this company?');"
                                                        class="btn btn-xs btn-danger" title="Block the user"><i class="fa fa-plus-square"></i></button></a>
                                            <a href="{{route('unblock',$company->user_id)}}"><button
                                                        onclick="return confirm('Are you sure you want to unblock this company?');"
                                                        class="btn btn-xs btn-info" title="Unblock the user"><i class="fa fa-minus-square"></i></button></a>
                                            <a href="{{route('delete',$company->user_id)}}"><button
                                                        onclick="return confirm('Are you sure you want to permanently delete this company');"
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