<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from skywarriorthemes.com/arcane/html/forum.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jul 2018 10:44:16 GMT -->
<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Submit Score</title>

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

	<!-- jQuery -->
	<script src="/js/jquery-3.1.1.js"></script>
	<script src="/js/jquery-3.1.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	
	<style>
		.inputField2 {
			font-size: 16px;
			padding: 1%;
			width: 5%;
			margin-bottom: 15px;
			color: #ccc;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			background-color: #26262f !important;
			-webkit-box-shadow: 0 1px rgba(255, 255, 255, .1), inset 0 1px 2px rgba(0, 0, 0, .6);
			-moz-box-shadow: 0 1px rgba(255, 255, 255, .1), inset 0 1px 2px rgba(0, 0, 0, .6);
			box-shadow: 0 1px rgba(255, 255, 255, .1), inset 0 1px 2px rgba(0, 0, 0, .6);
			border: 1px solid rgba(0, 0, 0, .9);
		}
	</style>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body class="blog-style teams-page forum">

	<!-- top header -->
	<!-- main navigation -->
	
    @include('includes.header')
	<!-- main slider -->
	<div class="container-fluid no-padding" style="background-image:url('fifa1.jpg') !important">
		<div class="slider col-lg-12" style="background: url('/images/fifa1.jpg') !important; background-size: cover !important; background-position: center; background-repeat: no-repeat;">
			<h1>Submit Score</h1>
			<strong><a href="">Homepage-slider</a> <span>/ Submit Score</span></strong>
		</div>
	</div>

	<section class="content-wrapper container-fluid no-padding">
			<div class="col-md-4">
                @include('includes.shoutbox') 
			</div>
			<div class="col-md-8">
				<div class="row inputField">
					<span id="inp">

						<?php
							$msg = "";
							if(count($score) > 0) {
							$msg = "Awaiting other manager's score";
						}
						?>
						{{$msg}} <br><br> <img src="/images/logos/{{ $fixs->home }}.png" height="30" width="30"> {{$fixs->home}} <input type="text" name="home" size="1" class="inputField2"> VS <img src="/images/logos/{{ $fixs->away }}.png" height="30" width="30"> {{$fixs->away}} <input type="text" name="away" size="1" class="inputField2"><br>
						
						@if(count($score) > 0)
							<a href="/enter_stat/{{$fixs->fixture_id}}">Enter Stat</a><br>
						@endif
						<input type="submit" name="submit" value="Submit Score" onClick="submit()" class="btn btn-warning" style="background: orange !important;"><br>
					<span>
				</div>
					
				
			</div>
			<span id="sc" class="hidden">
					
			</span>
			@if(Auth::User()->team == $fixs->home) 
				<?php
					$place = 'home';
				?>
			@else
				<?php
					$place = 'away';
				?>
			@endif
			<script>
				function submit() {
					var home = $(':input[name="home"]').val();
					var away = $(':input[name="away"]').val();
					if(home == "" || away == "") {
						alert('Score Field required');
					}
					else if(isNaN(home) || isNaN(away)) {
						alert('Invalid Input');
					}
					else {
						$.ajax({
								url : '/score',
								method : 'get',
								data : {
									fixture_id : '{{$fixs->fixture_id}}',
									home_score: $(':input[name="home"]').val(),
									away_score: $(':input[name="away"]').val(),
									home: '{{$fixs->home}}',
									away: '{{$fixs->away}}'
								},
								success : function(data) {
									if(data == 'Score Submitted' || data ==
										'Score matched and submitted') {
										alert(data);
										window.location.href = '/enter_stat/{{$fixs->fixture_id}}';
									}
									else{
										alert(data);
									}
									
								}
							})
					}

				}

				
			</script>
	</section>
	<div class="container-fluid copyright">
		<div class="container">
			<p>&copy; <script>document.write(new Date().getFullYear());</script> Made by <a href="">Website name</a> </p>
			<div class="footer-social">
				<a href=""><i class="fa fa-rss"></i></a>
				<a href=""><i class="fa fa-youtube"></i></a>
				<a href=""><i class="fa fa-twitch"></i></a>
				<a href=""><i class="fa fa-steam"></i></a>
				<a href=""><i class="fa fa-google-plus"></i></a>
				<a href=""><i class="fa fa-twitter"></i></a>
				<a href=""><i class="fa fa-facebook"></i></a>
			</div>

		</div>
	</div>

	<div class="container back-to-top-wrapper">
		<a href="#" class="back-to-top" id="scroll"></a>
	</div>

	<script src="js/jquery.webticker.min.js"></script>
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