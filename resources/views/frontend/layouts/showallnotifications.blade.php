@extends("frontend/user")
@section("main-user-content")
    <div id="main-user-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" style="margin-top: 2%">
                    <div class="panel-body">
                        <h3 style="font-weight: bold;color:white;background-color: #0A93F1">
                            <p class="fa fa-bell"> </p> Your Notifications</h3>
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            @foreach(Auth::user()->notifications()->paginate(5) as $notifications)

                                                @if($notifications->data['likes'] == null)
                                                    <a href="{{ route('displaypost',$notifications->data['comment']['post_id']) }}">
                                                        <div class="col-lg-12">

                                                            <i class="fa fa-comment fa-fw"></i>
                                                            <img src="{{url('images/account/'.$notifications->data['user']['currentimage'])}}" height="20px" width="20"/>

                                                            {{$notifications->data['user']['email']}} commented on your Post
                                                            @inject('title','App\Post')
                                                            {{$title->where('id',$notifications->data['comment']['post_id'])->value('title')}}
                                                            <span class="pull-right text-muted small">{{$notifications->created_at->diffForHumans()}}</span>
                                                            <hr>
                                                        </div>

                                                    </a>
                                                    <hr>
                                                @endif



                                                @if($notifications->data['comment'] == null)
                                                    <a href="{{ route('displaypost',$notifications->data['likes']['post_id']) }}">
                                                        <div>

                                                            <i class="fa fa-thumbs-up  fa-fw"></i>
                                                            <img src="{{url('images/account/'.$notifications->data['user']['currentimage'])}}" height="20px" width="20"/>

                                                            {{$notifications->data['user']['email']}} likes your Post
                                                            @inject('title','App\Post')
                                                            {{$title->where('id',$notifications->data['likes']['post_id'])->value('title')}}
                                                            <span class="pull-right text-muted small">{{$notifications->created_at->diffForHumans()}}</span>
                                                        </div>
                                                    </a>
                                                        <hr>
                                                @endif

                                            @endforeach
                                        </div>

                                        <div class="panel-footer">

                                        </div>
                                    </div>
                                </div>
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection