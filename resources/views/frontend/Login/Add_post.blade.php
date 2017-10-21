<div class="row">

    <div class="col-lg-10 col-md-10">
        <div class="panel panel-defualt" style="margin-top:1%;margin-left:4.5%">
            <div class="panel-body">
                <form action="{{route('createpost')}}" method="post" enctype="multipart/form-data">
                    {{--<button class="btn btn-default btn-circle" type="button" title="Add Link"><i class="fa fa-link"></i>--}}
                    {{--</button>--}}
                    {{--<button class="btn btn-default btn-circle" type="button" title="Add File"><i class="fa fa-file"></i>--}}
                    {{--</button>--}}
                    {{--<button class="btn btn-default" type="button" title="Choose Video to Upload"><span class="glyphicon glyphicon-facetime-video"  > </span> Video/Video Album</button>--}}
                    <label class="btn btn-default"  title="Choose Photo to Upload">
                        <span class="glyphicon glyphicon-picture" > </span> Upload Photo
                        <input type="file" name="path" id="post-img" style="display: none;"></label>
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
                        <br>
                        <input type="text" class="form-control" name="title" placeholder="Give a Title to your post">

                        @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ "Please! write title to add a Post" }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
                        <label><h3>Create Post</h3></label>
                        <textarea rows="3" class="form-control" name="body" placeholder="What's on your mind?"></textarea>

                        @if ($errors->has('body'))
                            <span class="help-block">
                                        <strong>{{ "Please! write Something to add a Post" }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" class="form-control" >
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

            </div>

        </div>
    </div>
    <!-- /.col-lg-4 -->
</div>