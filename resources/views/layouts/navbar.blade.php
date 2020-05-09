<div class="navbar-wrapper container-fluid">

        
    <div class="logo col-lg-4 col-md-4">
        <h1 style="color: #ff8800;">Website Name</h1>
    </div>
    <div class="logo col-lg-4 col-md-4">
        <a class="brand" href="/"><img height="70" width="70" src="/images/ea.png" alt=""> &nbsp;&nbsp;&nbsp; <img alt="logo" src="/images/konami.png"></a>
    </div>
    <div class="login-info">
        @if(Auth::check())
            <a class="register-btn" href="/home">
                <i class="fa fa-home"></i> <span>Dashboard</span>
            </a>
            <a class="register-btn" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i> <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @else
            <a class="register-btn" href="/register">
                <i class="fa fa-pencil-square-o"></i> <span>Register</span>
            </a> 
            <i>or</i> 
            <a class="login-btn" href="/login">
                <i class="fa fa-lock"></i> <span>Sign in</span>
            </a>
        @endif
    </div>
</div>

<!-- main navigation -->
<nav class="navbar navbar-inverse container-fluid header-navigation-wrapper">
    <div class="container"> 
        <div class="navbar-header"> 
            <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#header-menu" aria-expanded="false"> 
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
        </div>
        <div class="collapse navbar-collapse" id="header-menu">
            <ul class="nav navbar-nav header-menu-navigation">
                <li><a href="/home" class="no-dropdown"><i class="header-menu-icon fa fa-home"></i><span class="header-menu-text">Homepage</span></a></li>
                
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="header-menu-icon fa fa-home"></i><span class="header-menu-text">LEAGUE TABLE</span><i class="dropdown-icon fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu dropdown-regular no-padding">
                      <li><a href="/table/premier">Premier League</a></li>
                      <li><a href="/table/super">Super League</a></li>
                      
                    </ul>
                </li>
                
                
                <li><a href="/forum" class="no-dropdown"><i class="header-menu-icon fa fa-users"></i><span class="header-menu-text">Forums</span></a></li>
                @if(!Auth::guest())
                    @if(Auth::user()->role == 'manager')
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="header-menu-icon fa fa-home"></i><span class="header-menu-text">MANAGER OPTIONS</span><i class="dropdown-icon fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu dropdown-regular no-padding">
                              <li><a href="">Submit Score</a></li>
                              <li><a href="">Free Agents</a></li>
                              <li><a href="">My Players</a></li>
                              
                            </ul>
                        </li>
                    @endif
                    <li><a href="/user/{{ Auth::user()->username }}" class="no-dropdown"><i class="header-menu-icon fa fa-user"></i><span class="header-menu-text">My profile</span></a></li>
                    <li><a href="/edit-profile" class="no-dropdown"><i class="header-menu-icon fa fa-edit"></i><span class="header-menu-text">Edit Profile</span></a></li>
                    <li><a href="/inbox" class="no-dropdown"><i class="header-menu-icon fa fa-message"></i><span class="header-menu-text">Inbox 
                        <b style="color: orange;">(0)</b></span></a></li>
                @endif
                
                
                
            
            </ul> 
        </div> 
    </div> 
</nav>

@yield('content')