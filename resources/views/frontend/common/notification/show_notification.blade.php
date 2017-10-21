@if($notifications->data['comment'] != null)
    <a href="{{ route('displaypost',$notifications->data['comment']['post_id']) }}">
    <div class="col-lg-6">

        <i class="fa fa-comment fa-fw"></i>
        <img src="{{url('images/account/'.$notifications->data['user']['currentimage'])}}" height="20px" width="20"/>

        {{$notifications->data['user']['email']}} commented on your Post
        @inject('title','App\Post')
        {{$title->where('id',$notifications->data['comment']['post_id'])->pluck('title')}}
        <span class="pull-right text-muted small">{{$notifications->created_at->diffForHumans()}}</span>
    </div>
</a>
<li class="divider"></li>
    @endif

@if($notifications->data['comment'] == null)
    <a href="{{ route('displaypost',$notifications->data['likes']['post_id']) }}">
        <div>

            <i class="fa fa-thumbs-up fa-fw"></i>
            <img src="{{url('images/account/'.$notifications->data['user']['currentimage'])}}" height="20px" width="20"/>

            {{$notifications->data['user']['email']}} likes your Post
            @inject('title','App\Post')
            {{$title->where('id',$notifications->data['likes']['post_id'])->pluck('title')}}
            <span class="pull-right text-muted small">{{$notifications->created_at->diffForHumans()}}</span>
        </div>
    </a>
    <li class="divider"></li>
@endif