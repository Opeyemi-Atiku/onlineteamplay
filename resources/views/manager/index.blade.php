<!DOCTYPE html>
<html lang="en-US">


<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Arcane | Create Your Own gaming Community</title>

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<!-- <link rel="shortcut icon" href="/favicon.ico"> -->

	<!-- Bootstrap Core CSS, FontAwesome, Fonts -->
	<link href="/css/bootstrap.css" rel="stylesheet">

	<link href="/css/font-awesome.min.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="/css/style.css" rel="stylesheet">

	<!-- Fixes and mobile -->
	<link href="/css/bootstrap-fixes.css" rel="stylesheet">

	<!-- LayerSlider stylesheet -->
	<link rel="stylesheet" href="/css/layerslider.css" type="text/css">
	
	<!-- Important Owl stylesheet -->
	<link rel="stylesheet" href="/css/owl.carousel.css">
	 
	<!-- Default Theme -->
    <link rel="stylesheet" href="/css/owl.theme.css">
    <link rel="stylesheet" href="/css/dashboard.css">
	 

	<!-- jQuery -->
	<script src="/js/jquery-3.1.1.js"></script>
	<script src="/js/jquery-3.1.1.min.js"></script>
	<script src="/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="/js/owl.carousel.js"></script>
	
	
	<!-- External libraries: jQuery & GreenSock -->
    <script src="/js/greensock.js" type="text/javascript"></script>
    
	


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- top header -->
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
					<i class="fa fa-home"></i> <span>Manager</span>
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
					<li><a href="forum.html" class="no-dropdown"><i class="header-menu-icon fa fa-home"></i><span class="header-menu-text">Homepage</span></a></li>
					
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="header-menu-icon fa fa-home"></i><span class="header-menu-text">LEAGUE TABLE</span><i class="dropdown-icon fa fa-angle-down"></i></a>
						<ul class="dropdown-menu dropdown-regular no-padding">
		                  <li><a href="/table/premier">Premier League</a></li>
		                  <li><a href="/table/super">Super League</a></li>
		                  
		                </ul>
		            </li>
					
					
					<li><a href="forum.html" class="no-dropdown"><i class="header-menu-icon fa fa-users"></i><span class="header-menu-text">Forums</span></a></li>
					
					
				
				</ul> 
			</div> 
		</div> 
	</nav>

	

	<!-- news ticker -->
	

	<!-- page content wrapper -->
	<section class="content-wrapper container-fluid no-padding">
		
	
		<!-- columns wrapper -->
		<section class="container main">

			<!-- left column -->
			<div class="col-md-4 left-column" style="height: 500px;">
				

				<!-- content title -->
				<div class="main-content-title">
					<h3><i class="fa fa-newspaper-o"></i> SHOUTBOX</h3>
				</div>
				<div class="row">

					<div class="col-md-11" style="height: 270px; overflow-y: auto; margin-top: 30px;">
						@for($i=0; $i<4; $i++)
							<p style="margin: 5px;"><small style="color: green;">Admin</small> &nbsp;&nbsp;&nbsp; June 07, 2018 - 1-19pm &nbsp;&nbsp;test</p><br>
						@endfor
						@for($i=0; $i<4; $i++)
							<p style="margin: 5px;"><small style="color: orange;">Moderator</small> &nbsp;&nbsp;&nbsp; June 07, 2018 - 1-19pm &nbsp;&nbsp;test</p><br>
						@endfor
						@for($i=0; $i<4; $i++)
							<p style="margin: 5px;"><small style="color: yellow;">User</small> &nbsp;&nbsp;&nbsp; June 07, 2018 - 1-19pm &nbsp;&nbsp;test</p><br>
						@endfor
					</div>
					
				</div>
				<div class="row" style="margin-top: 40px;">
					<h3><input type="text" placeholder="type here.." style="font-size: 12px;
						padding: 2%;
						width: 80%;
						margin-bottom: 15px;
						color: #ccc;
						-webkit-border-radius: 3px;
						-moz-border-radius: 3px;
						border-radius: 3px;
						background-color: #26262f;
						-webkit-box-shadow: 0 1px rgba(255, 255, 255, .1), inset 0 1px 2px rgba(0, 0, 0, .6);
						-moz-box-shadow: 0 1px rgba(255, 255, 255, .1), inset 0 1px 2px rgba(0, 0, 0, .6);
						box-shadow: 0 1px rgba(255, 255, 255, .1), inset 0 1px 2px rgba(0, 0, 0, .6);
						border: 1px solid rgba(0, 0, 0, .9);
					"></h3>
				</div>
				
				
				
			</div>

			<!-- middle column -->
			<div class="col-md-8 mid-column" id="centerGrid">
				
				
				
					

				
			</div>

			
		</section>

		<!-- video section -->
	

		

	
	</section>



	<div class="container-fluid copyright">
		<div class="container">
			<p>&copy; 2016 <a href="/">Website Name</a> </p>
			<div class="footer-social">
				<a href="#"><i class="fa fa-rss"></i></a>
				<a href="#"><i class="fa fa-youtube"></i></a>
				<a href="#"><i class="fa fa-twitch"></i></a>
				<a href="#"><i class="fa fa-steam"></i></a>
				<a href="#"><i class="fa fa-google-plus"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
			</div>

		</div>
	</div>

	<div class="container back-to-top-wrapper">
		<a href="#" class="back-to-top" id="scroll"></a>
	</div>

	<script src="/js/jquery.webticker.min.js"></script>

	<!-- LayerSlider script files -->
	<script src="/js/layerslider.transitions.js" type="text/javascript"></script>
	<script src="/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
</body>
<script type="text/javascript">
 
    // Running the code when the document is ready
    $(document).ready(function(){
 
        // Calling LayerSlider on the target element
        $('#layerslider').layerSlider({
 			
 			responsive : true,
 			skinsPath: 'layerslider/skins/'

        });
        
        // Calling WebTicker on the target element
        var ticker = $('#webticker');
        ticker.webTicker();
        
        // Back to top scroll script
        $('#scroll').click(function(){ 
    	$("html, body").animate({ scrollTop: 0 }, 900); 
    	return false; 
		});
		
		$("#owl-demo").owlCarousel({
			autoPlay: 3000, //Set AutoPlay to 3 seconds
		 	items : 5
		});
		
		 
    });
 
</script>


</html>