@extends("frontend/user")
@section("main-user-content")
    <div id="main-user-content">
        <!-- .row -->
        <section style="margin-left: 2%" class="row">
            <div class="col-lg-8 col-md-8">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @if($post->user->currentimage != null)
                                        <img src="{{url('images/account/'.$post->user->currentimage)}}" height="50px" width="50"/>
                                    @endif
                                    {{$post->user->email}}
                                    <br>
                                    {{$post->created_at->diffForHumans()}}

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <h4>{{ $post->body }}</h4>

                                    @if($post->path != null)<img src="{{url('images/post/'.$post->path)}}" height="200px" width="300"/>
                                    @endif
                                    <br>
                                    <br>
                                    @if($post->rate != null)
                                        <div class="progress-bar progress-bar-info progress-bar-striped active" aria-valuetransitiongoal="20" style="width:{{$post->rate}}%;"
                                             aria-valuenow="{{$post->rate}}" aria-valuemin="0" aria-valuemax="100">Rate : {{$post->rate}}%</div>
                                    @endif
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                </div>
                            </div>

                            {{--@if($post->user->role == 0)--}}
                            {{--{{$post->user->regular->username}}--}}
                            {{--@elseif($post->user->role == 1)--}}
                            {{--{{$post->company->user->company_name}}--}}
                            {{--@endif--}}
                            {{--<p>{{$post->created_at->format('M j, Y')}}</p>--}}


                            <div>
                                <a href="{{route('like',$post->id)}}"><p class="fa fa-thumbs-o-up"></p>
                                    {{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You Liked' : 'Like' : 'Like'  }}
                                </a> |
                                <a href="{{route('dislike',$post->id)}}"><p class="fa fa-thumbs-o-down"></p>
                                    {{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You Disliked' : 'Dislike' : 'Dislike'  }}
                                </a> |
                            {{--<a href="#" class="like"><p class="fa fa-heart"> </p>Love</a> |--}}
                            {{--<a href="#" class="like"><p class="fa fa-star"> </p>Better</a> |--}}
                            {{--<a href="#" class="like"><p class="fa fa-check-circle"></p>Fine</a>--}}
                            @if(Auth::user() == $post->user)
                                <!-- Button trigger modal -->
                                    <a  data-toggle="modal" data-target="#myModal">
                                        <p class="fa fa-edit"> Edit Post </p>
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Edit post</h4>
                                                </div>
                                                <div class="modal-body">
                                                    @include('frontend.login.edit_post')
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    |<a href="{{route('post.delete',['post_id' => $post->id])}}" title="Delete Your Post">
                                        <span class="glyphicon glyphicon-trash"> Delete Post</span></a>
                                @endif

                                <br>
                                <p>
                                    @inject('count','App\Like')
                                    {{$count->where('post_id',$post->id)->pluck('like')->count()}} Likes
                                </p>
                                <form class="form-inline" action="{{route('addcomment',$post->id)}}" method="post">
                                    <div class="form-group">
                                        <input type="text" name="comment" class="form-control" placeholder="Add comment" >
                                    </div>
                                    {{csrf_field()}}
                                    <input type="submit" class="btn btn-primary" type="button" value="Comment" title="Add Comment">

                                </form>
                                <br>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a style="color:Black" href="#{{$post->id}}" data-parent="#accordion" data-toggle="collapse">
                                                <p class="fa fa-wechat" ></p>
                                                @inject('count','App\Comment')
                                                {{$count->where('post_id',$post->id)->pluck('comment')->count()}} Comments
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="{{$post->id}}">
                                        <div class="panel-body">

                                            @foreach($comments as $comment)
                                                @if($comment['post_id']== $post->id)
                                                    <div style="background-color:white; border-bottom:1px solid #F1F5F6; ">
                                                        @if($comment->user->currentimage != null)
                                                            <img src="{{url('images/account/'.$comment->user->currentimage)}}" height="45px" width="50"/>
                                                        @endif
                                                        {{$comment->user->email}} |         {{$comment->comment}} |      <button type="button" class="btn btn-info btn-circle" style="float: right">
                                                            {{$comment->commment_rate}}%
                                                        </button>

                                                        @if(Auth::user() == $comment->user)
                                                        <!-- Button trigger modal -->
                                                            <a  data-toggle="modal" data-target="#mycmntModal">
                                                                <p class="fa fa-edit"> Edit Comment </p>
                                                            </a>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="mycmntModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                            <h4 class="modal-title" id="mycmntModalLabel">Edit post</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form class="form-inline" action="{{route('editcomment',$comment->id)}}" method="post">
                                                                                <div class="form-group">
                                                                                    <input type="text" name="comment" class="form-control" value="{{$comment->comment}}" style="width:350px ">
                                                                                </div>
                                                                                {{csrf_field()}}
                                                                                <input type="submit" class="btn btn-primary" type="button" value="Comment" title="Add Comment">

                                                                            </form>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!-- /.modal -->

                                                            |<a href="{{route('comment.delete',['comment_id' => $comment->id])}}" title="Delete Your Comment">
                                                                <span class="glyphicon glyphicon-trash"></span>
                                                            </a>
                                                        @endif
                                                    </div>

                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>

                    </div>
                    <!-- /.col-lg-4 -->



            </div>
        </section>


        </div>
@endsection