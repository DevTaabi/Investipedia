<div class="navbar-default sidebar" role="navigation"  >
    <div class="sidebar-nav navbar-collapse" >
        <ul class="nav in" id="side-menu" >

            <li>
                <a href="{{route('profile')}}" title="Username">
                    <button id="btn-me" type="button" class="btn btn-outline btn-default">
                        <i class="fa fa-user fa-fw"></i><br> Profile</button>
                </a>
            </li>
            <li>
                <a href="{{route('news-feed')}} " title="News Feed">
                    <button id="btn-me" type="button" class="btn btn-outline btn-default">
                        <i class="fa fa-newspaper-o fa-fw"></i> <br>News feed
                    </button></a>
            </li>

            <li>
                <a href="{{url('/allnotifiactions')}}" title="All notifications">
                    <button id="btn-me" type="button" class="btn btn-outline btn-default">
                        <p class="fa fa-bell"> </p><br> All Notification </button>
                </a>
            </li>
            <li>
                <a href="{{url('/allposts')}}" title="All Posts">
                    <button id="btn-me" type="button" class="btn btn-outline btn-default">
                        <p class="fa fa-credit-card"> </p><br>Posts</button>
                </a>
            </li>
            <li>
                <a href="{{url('/photos')}}" title="Watch Your Photos">
                    <button id="btn-me" type="button" class="btn btn-outline btn-default">
                        <i class="fa fa-photo fa-fw"></i> <br>Profile Pictures</button>
                </a>
            </li>
            <li>
                <a href="{{route('settings')}}" title="Change Settings">
                    <button id="btn-me" type="button" class="btn btn-outline btn-default">
                        <i class="fa fa-cog fa-fw"></i> </i> <br> Settings </button>
                </a>
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>