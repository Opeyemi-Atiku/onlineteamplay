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
    
	


	>
    <link rel="stylesheet" href="/css/new.css">
    <style>
		.inputField {
			font-size: 16px;
			padding: 1%;
			width: 100%;
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
		}
	</style>
</head>
<body>
	<!-- top header -->
	@include('includes.header')

	

	<!-- news ticker -->
	

	<!-- page content wrapper -->
	<section class="content-wrapper container-fluid no-padding">
		
	
		<!-- columns wrapper -->
		<section class="container main">

			<!-- left column -->
			<div class="col-md-4 left-column" style="height: 500px;">
				

				@include('includes.shoutbox')
				
				
				
			</div>

			<!-- middle column -->
			<div class="col-md-8 mid-column" id="centerGrid" style="overflow: auto;">
				
                        <div class="col-md-12 register-form-wrapper">
                            <div class="main-content-title">
                                <h3>Edit Profile</h3>
                            </div>
                            
                            <form method="POST" action="/edit" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <p>
                                    <label>Gamertag:</label>
                                    <input type="text" name="gamertag" required autofocus value="{{ Auth::user()->username }}" class="register">
                                    @if ($errors->has('gamertag'))
                                        <span class="help-block" style="color: #ff8800;">
                                            <strong>{{ $errors->first('gamertag') }}</strong>
                                        </span>
                                    @endif
                                </p>
                                <p>
                                    <label>Name:</label>
                                    <input type="text" name="name" required class="register" value="{{ Auth::user()->name }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block" style="color: #ff8800;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </p>
                                <p>
                                    <label>Email:</label>
                                    <input type="email" name="email" required value="{{ Auth::user()->email }}" class="register">
                                    @if ($errors->has('email'))
                                        <span class="help-block" style="color: #ff8800;">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </p>
                                <p>
                                    <label>Bio:</label>
                                    <textarea name="bio" required placeholder="Short description about yourself" class="inputField">{{ Auth::user()->bio }}</textarea>
                                    @if ($errors->has('email'))
                                        <span class="help-block" style="color: #ff8800;">
                                            <strong>{{ $errors->first('bio') }}</strong>
                                        </span>
                                    @endif
                                </p>
                                
                
                                <p>
                                    <label>Change Avatar:</label>
                                    <input type="file" name="avatar" class="register">
                                    @if ($errors->has('avatar'))
                                        <span class="help-block" style="color: #ff8800;">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </span>
                                    @endif
                                </p>
                                
                                
                                
                                
                                <p class="submit">
                                    <button type="submit" class="button-medium aButton">EDIT</button>
                                </p>
                                
                            </form>
							<hr>
							<div class="main-content-title">
                                <h3>Change Password</h3>
                            </div>
                            <form method="POST" action="/edit_pass" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <p>
                                    <label>Old Password:</label>
                                    <input type="text" name="old_password" required class="register">
                                    @if ($errors->has('old_password'))
                                        <span class="help-block" style="color: #ff8800;">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </p>
                                <p>
                                    <label>New Password:</label>
                                    <input type="password" name="new_password" required class="register">
                                    @if ($errors->has('new_password'))
                                        <span class="help-block" style="color: #ff8800;">
                                            <strong>{{ $errors->first('new_password') }}</strong>
                                        </span>
                                    @endif
                                </p>
                                <p>
                                    <label>Re-enter New Password:</label>
                                    <input type="password" name="password_confirmation" required class="register">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block" style="color: #ff8800;">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </p>
                                
                
                                
                                
                                
                                
                                <p class="submit">
                                    <button type="submit" class="button-medium aButton">Change Password</button>
                                </p>
                                
                            </form>
                        </div>
                    
				
				
					

				
			</div>

			
		</section>

		<!-- video section -->
	

		

	
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
@if(session()->has('success'))
    <script>
        $(document).ready(function () {
            alert("{!! session()->get('success') !!}");
        });
    </script>
@endif


</html>