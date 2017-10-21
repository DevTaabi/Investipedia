<header>
    <nav class="navbar navbar-default mynavbar" style="background-color: #2196F3; height:70px">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}" >
                    <img src="{{url('n.png')}}" style="margin-top: -9%">

                </a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar" >

                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right" style="margin-top:0.5% ">
                    <a href="{{url('/home')}}" title="Login to Your Account"><button  type="submit" class="btn btn-default ">Login</button></a>
                    <a href="{{url('/owner-signup')}}" title="If you want add your products to get reviews form public then you need to create account as company owner. Request for a company account.">
                        <button type="submit" class="btn btn-default ">Company Account</button></a>
                    <a href="{{url('/user-signup')}}" title="If you want to get and add reviews about products then you need to create account. Create an account.">
                        <button type="submit" class="btn btn-default ">Signup</button></a>


                </ul>
            </div>
        </div>

    </nav>
</header>