@extends("frontend/user")
@section("main-user-content")
    <div id="main-user-content" xmlns="http://www.w3.org/1999/html" >
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable" style="margin-top: 2%">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{Session::get('message')}}
            </div>
        @endif
        <div class="input-group custom-search-form" style="margin-left: 4%;">
                    <span class="input-group-btn">
                        <form action="{{route('search')}}" method="post" role="form">
                            <div class="form-group">
                                <select name="category" class="form-control" style="width:200px">
                                    <option value="All">All</option>
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
                            <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                            </button>
                        </form>


                            </span>
        </div>
        <!-- /input-group -->


        @include('frontend.Login.Add_post')

    </div>
    @include('frontend.login.show_all_posts')

@endsection