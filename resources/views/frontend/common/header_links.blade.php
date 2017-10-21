<ul class="nav navbar-top-links navbar-right">

    <!-- /.dropdown -->
    <li>@if(Auth::user()->currentimage != null)
            <a style="color:white;font-weight: bold;background-color:#0A93F1;"
               href="{{route('profile')}}">
            <img src="{{url('images/account/'.Auth::user()->currentimage)}}" height="30px" width="30"/>
                @if(Auth::user()->role == 0)
                    @inject('username','App\Regular')
                    {{$username->where('user_id',Auth::user()->id)->value('username')}}
                @endif
                @if(Auth::user()->role == 1)
                    @inject('company_name','App\Company')
                    {{$company_name->where('user_id',Auth::user()->id)->value('company_name')}}
                @endif
            </a>
        @endif</li>

    <li class="dropdown" id="markasread" onclick="MarkNotificationAsRead('{{count(auth()->user()->unreadnotifications)}}')">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <button type="button" class="btn btn-default ">
                <span class="glyphicon glyphicon-globe"></span> Notifications
                <span class="badge">{{count(auth()->user()->unreadnotifications)}}</span>
                </button>
        </a>
        <ul class="dropdown-menu dropdown-alerts">
            <li>
                {{--{{auth()->user()->unreadnotifications}}--}}
                @forelse(auth()->user()->unreadnotifications as $notifications)
                    @include('frontend.common.notification.'.snake_case(class_basename($notifications->type)))
                @empty
                    <a href="#">No Unread Notifications</a>
                @endforelse
            </li>


        </ul>
        <!-- /.dropdown-alerts -->
    </li>
    <!-- /.dropdown -->

    <li class="dropdown">

        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <button type="button" class="btn btn-default">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </button>

        </a>
        <ul class="dropdown-menu dropdown-user" style="color: white">

            <li><a href="{{route('profile')}}" title="Profile"><i class="fa fa-user fa-fw"></i>
                   @include('frontend.common.showUsername')
                </a>
            </li>
            <li><a href="{{route('settings')}}" title="Settings"><i class="fa fa-gear fa-fw"></i> Edit Profile</a>
            </li>
            <li class="divider"></li>
            <li><a href="{{route('logout')}}" title="Logout From your account"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
