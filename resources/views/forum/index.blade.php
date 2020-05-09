<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from skywarriorthemes.com/arcane/html/forum.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jul 2018 10:44:16 GMT -->
<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Forum</title>

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
<body class="blog-style teams-page forum">

	<!-- top header -->
	<!-- main navigation -->
	
    @include('includes.header')
	<!-- main slider -->
	<div class="container-fluid no-padding" style="background-image:url('fifa1.jpg') !important">
		<div class="slider col-lg-12" style="background: url('/images/fifa1.jpg') !important; background-size: cover !important; background-position: center; background-repeat: no-repeat;">
			<h1>Forums</h1>
			<strong><a href="">Homepage-slider</a> <span>/ Forums</span></strong>
		</div>
	</div>

	
	<!-- page content wrapper -->
	<section class="content-wrapper container-fluid no-padding">
		<section class="container main">

			<div class="col-md-4 col-sm-12 col-xs-12 left-column" style="height: 500px;">

				@include('includes.shoutbox')
				
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12 mid-column" id="centerGrid">
				<section class="container forum-wrapper">
					<ul class="forums-list">
						<li class="forums-header">
							<ul class="forum-titles">
								<li class="forum-info">Forum</li>
								<li class="reply-count">Posts</li>
								<li class="forum-freshness">Last Updated</li>
							</ul>
							
						</li>
						
						<li class="forum-body">
							@foreach($cats as $cat)
							<ul class="forum-single">
								<li class="forum-info">
									<i class="fa fa-comments-o"></i>
									<div>
										<a href="/forum/{{$cat->id}}">{{$cat->category}}</a>
									</div>
								</li>
								<li class="reply-count">{{ count($cat->post)}}</li>
								<li class="forum-freshness">
									<?php
									  if(count($cat->post) ==  0) {
									  	$fresh = "No post yet";
									  	$user = "";
									  	$img = "";
									  }
									  else{
									  	$no = count($cat->post) - 1;
										$fresh = $cat->post[$no]->created_at->diffForHumans();
										$user = $cat->post[$no]->user->username;
										$img = "/images/".$cat->post[$no]->user->avatar;
									  }
										
									?>
									<p>{{$fresh}}</p>
									<p><span><a href="/user/{{$user}}"><img src="{{$img}}"> {{$user}}</a></span></p>
								</li>
							</ul>
							@endforeach
						</li>

						<li class="forum-footer">
							<div class="tr">&nbsp;</div>
						</li>
					</ul>
				</section>
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