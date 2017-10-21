<!-- .row -->
<section style="margin-left: 2%" class="row">
    <div class="col-lg-10 col-md-10">
        @if($likes == null)
            return View::make('error.503');
            @endif
        @foreach($posts as $post)
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-1">
                                    @if($post->user->currentimage != null)
                                        <img src="{{url('images/account/'.$post->user->currentimage)}}" height="60px" width="60px"/>
                                    @endif
                                </div>
                                <div class="col-lg-11">
                                    @if($post->user->role == 0)
                                        @inject('username','App\Regular')
                                        <p style="color:#0A93F1;font-weight: bold;">{{$username->where('user_id',$post->user->id)->value('username')}}</p>
                                    @endif
                                    @if($post->user->role == 1)
                                        @inject('company_name','App\Company')
                                        <p style="color:#0A93F1;font-weight: bold;">{{$company_name->where('user_id',$post->user->id)->value('company_name')}}</P>
                                    @endif
                                    <br/>
                                    <p style="margin-left:0.5%;margin-top:-2.5%;font-size:12px ">{{$post->created_at->diffForHumans()}}</p>

                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <h3>{{$post->body }}</h3>

                            @if($post->path != null)<img src="{{url('images/post/'.$post->path)}}" height="350px" width="550"/>
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
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}

                        {{--</div>--}}
                    {{--</div>--}}


                    <div>
                        <a style="font-size: 14px" href="{{route('like',$post->id)}}"><p class="fa fa-thumbs-o-up"></p>
                            {{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You Liked' : 'Like' : 'Like'  }}
                        </a> |
                        <a style="font-size: 14px" href="{{route('dislike',$post->id)}}"><p class="fa fa-thumbs-o-down"></p>
                            {{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You Disliked' : 'Dislike' : 'Dislike'  }}
                        </a> |
                    @if(Auth::user() == $post->user)
                        <!-- Button trigger modal -->
                            <a style="font-size: 14px" data-toggle="modal" data-target="#myModal">
                                <p class="fa fa-edit" >Edit Post </p>
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
                            |<a style="font-size: 14px" href="{{route('post.delete',['post_id' => $post->id])}}"
                                onclick="return confirm('Are you sure you want to delete your post?');" title="Delete Your Post">
                                <span class="glyphicon glyphicon-trash"></span></a>
                        @endif

                        <br>
                        <p>

                           {{--<a href="{{route('getusersoflike',$post->id)}}"  target="_blank">--}}
                               @inject('count','App\Like')
                               {{$count->where('post_id',$post->id)->pluck('like')->count()}} Likes
                           {{--</a>--}}

                        </p>
                        <form class="form-inline" action="{{route('addcomment',$post->id)}}" method="post">
                            <div class="form-group">
                                <input type="text" rows="2" name="comment" class="form-control {{ $errors->has('comment') ? ' has-error' : '' }}" placeholder="Add comment">

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ "Try again! write Something." }}</strong>
                                    </span>
                                @endif
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
                                        @if($comment['post_id'] == $post->id)
                                            <div style="background-color:white; border-bottom:1px solid #F1F5F6; ">
                                                <div class="row">
                                                    <div class="col-lg-1">
                                                @if($comment->user->currentimage != null)
                                                    <img src="{{url('images/account/'.$comment->user->currentimage)}}" height="45px" width="50"/>
                                                @endif
                                                        </div>
                                                    <div class="col-lg-11">
                                                        @if($comment->user->role == 0)
                                                        @inject('username','App\Regular')
                                                        <p style="color:#0A93F1;font-weight: bold;">{{$username->where('user_id',$comment->user->id)->value('username')}}</p>
                                                    @endif
                                                    @if($comment->user->role == 1)
                                                        @inject('company_name','App\Company')
                                                        <p style="color:#0A93F1;font-weight: bold;">{{$company_name->where('user_id',$comment->user->id)->value('company_name')}}</P>
                                                    @endif
                                                            </div>
                                                    <div class="col-md-7"> {{$comment->comment}}
                                                        @if($comment->commment_rate != 0)
                                                      <button type="button" class="btn btn-info btn-circle" style="float:right">
                                                    {{$comment->commment_rate}}%
                                                          @endif
                                                          <hr>
                                                  </button></div>
                                                        </div>

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

                                                    |<a href="{{route('comment.delete',['comment_id' => $comment->id])}}"
                                                        onclick="return confirm('Are you sure you want delete your comment?');" title="Delete Your Comment">
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
        @endforeach
        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">
                {{$posts->links() }}

            </div>
        </div>
    </div>
</section>