<div class="col-md-12">@if($post->path != null)<img src="{{url('images/post/'.$post->path)}}" height="50px" width="60"/>
    @endif</div>
<br>
<form action="{{ route('editpost',$post->id) }}" method="post" enctype="multipart/form-data">
    {{--<label class="btn btn-default"  title="Choose Photo to Upload">--}}
        {{--<span class="glyphicon glyphicon-picture" > </span>         --}}
        <input type="file" name="path" id="post-img"  value="{{$post->path}}"></label>
       Upload Photo
    <img src="" id="post-img-tag" width="120px" />

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#post-img-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#post-img").change(function(){
            readURL(this);
        });
    </script>

    <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
        <label><h3>Edit Post</h3></label>
        <textarea rows="3" class="form-control" name="body" placeholder="What's on your mind?" >{{$post->body}}</textarea>

        @if ($errors->has('body'))
            <span class="help-block">
                                        <strong>{{ "Please! write Something to update a Post" }}</strong>
                                    </span>
        @endif
    </div>

    <div class="form-group">
        <label>Category</label>
        <select name="category" class="form-control" value="{{$post->category}}">
            <option value="LifeStyle">LifeStyle</option>
            <option value="Health">Health</option>
            <option value="Sports">Sports</option>
            <option value="Politics">Politics</option>
            <option value="Science">Science</option>
            <option value="Technology">Technology</option>
            <option value="Culture">Culture</option>
            <option value="Humor">Humor</option>
            <option value="Art">Art</option>
            <option value="Travel">Travel</option>
            <option value="Adventure">Adventure</option>
            <option value="Photography">Photography</option>
            <option value="InnerVoice">InnerVoice</option>
        </select>
    </div>

    {{csrf_field()}}
    <input type="submit" class="btn btn-info" type="button" value="Submit" title="Add Post">
</form>


<div class="panel-footer">
    @if(count($errors)>0)
        <div class="row">
            <div class="col-md-4 error" >
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
