<div class="navbar-wrapper container-fluid">

        
    <div class="logo col-lg-4 col-md-4">
        <h1 style="color: #ff8800;">Onlineteamplay</h1>
    </div>
    <div class="logo col-lg-4 col-md-4">
        <a class="brand" href="/"><img height="70" width="70" src="/images/ea.png" alt=""> &nbsp;&nbsp;&nbsp; <img alt="logo" src="/images/konami.png"></a>
    </div>
    <div class="login-info">
        @if(Auth::check())
        @if(Auth::user()->team != '')<a href="/team/{{ Auth::user()->league }}/{{ Auth::user()->team }}"><img src="/images/logos/{{ Auth::user()->team }}.png" height="31" width="29" style="margin-top: 10px;"></a>@endif
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
                <li><a href="/" class="no-dropdown"><i class="header-menu-icon fa fa-home"></i><span class="header-menu-text">Homepage</span></a></li>
                
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="header-menu-icon fa fa-table"></i><span class="header-menu-text">LEAGUE TABLE</span><i class="dropdown-icon fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu dropdown-regular no-padding">
                      <li><a href="/table/premier">Premier League</a></li>
                      <li><a href="/table/super">Super League</a></li>
                      
                    </ul>
                </li>
                <li><a href="/members" class="no-dropdown"><i class="header-menu-icon fa fa-users"></i><span class="header-menu-text">Members Area</span></a></li>
                
                
                <li><a href="/forum" class="no-dropdown"><i class="header-menu-icon fa fa-comment"></i><span class="header-menu-text">Forum</span></a></li>
                @if(!Auth::guest())
                    @if(Auth::user()->role == 'manager')
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="header-menu-icon fa fa-male"></i><span class="header-menu-text">MANAGER OPTIONS</span><i class="dropdown-icon fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu dropdown-regular no-padding">
                              <li><a href="/choose_date">choose date for match</a></li>
                              <li><a href="/next_match">Next match</a></li>
                              <!-- <li><a href="/submit_score">Submit Score</a></li> -->
                              <li><a href="/void_match">Void Matches</a></li>
                              <li><a href="/free-agents">Free Agents</a></li>
                              <li><a href="/my-players/{{Auth::user()->id}}">My Players</a></li>
                              
                            </ul>
                        </li>
                    @endif

                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="header-menu-icon fa fa-user"></i><span class="header-menu-text">My account</span><i class="dropdown-icon fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu dropdown-regular no-padding">
                            <li><a href="/user/{{ Auth::user()->username }}">My Profile</a></li>
                            <li><a href="/edit-profile">Edit Profile</a></li>
                            
                        </ul>
                    </li>

                    
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="header-menu-icon fa fa-cog"></i><span class="header-menu-text">OTHERS</span><i class="dropdown-icon fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu dropdown-regular no-padding">
                            @if(Auth::user()->role != 'manager')
                                <li><a href="/become-a-manager">Become a manager</a></li>
                            @endif
                            <li><a href="/free-agents">Free Agents</a></li>
                            <li><a href="/support">Support</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="/inbox" class="no-dropdown">
                            <i class="header-menu-icon fa fa-envelope"></i>
                            <span class="header-menu-text">Inbox
                                @if($new_messages > 0) 
                                    <b style="color: orange;">
                                        ({{ $new_messages }})
                                    </b>
                                @endif
                            </span>
                        </a>
                    </li>
                    
                @endif
                
                
                
            
            </ul> 
        </div> 
    </div> 
</nav>

@yield('content')