<!DOCTYPE html>
<html lang="en-US">


<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sign In</title>

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

	<!-- Custom CSS -->
	<link href="/css/bootstrap-fixes.css" rel="stylesheet">

	<!-- jQuery -->
	<script src="js/jquery-3.1.1.js"></script>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body class="tournaments-page register">

        <!-- top header -->
        @include('includes.header')
    
        <!-- main navigation -->
        

	<!-- main slider -->
	<div class="container-fluid no-padding">
		<div class="slider col-lg-12" style="background: url('/images/fifa1.jpg') !important; background-size: cover !important; background-position: center; background-repeat: no-repeat;">
			<h1>Login</h1>
			<strong><a href="#">Home</a> <span>/ Login</span></strong>
		</div>
	</div>

	



	<!-- page content wrapper -->
	<section class="content-wrapper container-fluid no-padding">
		<section class="container">
			<div class="col-lg-7 col-md-12 register-form-wrapper">
			<!-- content title -->
			<div class="main-content-title">
				<h3>SIGN IN</h3>
			</div>
			
			<form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                @include('includes.success')
                @include('includes.error')
                <p>
                    <label>Gamertag:</label>
                    <input type="text" name="username" value="{{ old('username') }}" required autofocus class="register">
                    @if ($errors->has('username'))
                        <span class="help-block"  style="color: #ff8800;">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </p>
                
				<p>
					<label>Password:</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="register" required>
                    @if ($errors->has('password'))
                        <span class="help-block"  style="color: #ff8800;">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </p>

          
                    <label style="display: inline; margin-right: 66px;">Remember Me:</label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    
                
                
                
				
			
				
				
				
				<p class="submit">
					<button type="submit" class="button-medium" target="_blank">SIGN IN</button>
				</p>
				
			</form>
			</div>
		</section>
	</section>

	

	<div class="container-fluid copyright">
		<div class="container">
			<p>&copy; {{ date('Y')}} <a href="/">Onlineteamplay</a> </p>
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
</body>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		var ticker = $('#webticker');
		ticker.webTicker();
		
		 // Back to top scroll script
        $('#scroll').click(function(){ 
    	$("html, body").animate({ scrollTop: 0 }, 900); 
    	return false; 
		});
	});
</script>



</html>