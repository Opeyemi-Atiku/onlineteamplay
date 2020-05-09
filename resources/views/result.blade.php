<!DOCTYPE html>
<html lang="en-US">

<head>

<!-- Meta -->
<meta charset="utf-8">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="">
<meta name="author" content="">

<title>Onlineteamplay</title>

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Favicon -->
<!-- <link rel="shortcut icon" href="/favicon.ico"> -->

<!-- Bootstrap Core CSS, FontAwesome, Fonts -->
<link href="/css/bootstrap.css" rel="stylesheet">

<link href="/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/fontawesome.css">

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
 

<!-- jQuery -->
<script src="/js/jquery-3.1.1.js"></script>
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/owl.carousel.js"></script>


<!-- External libraries: jQuery & GreenSock -->
<script src="/js/greensock.js" type="text/javascript"></script>



</head>
<body class="single-match-page">

@include('includes.header')



	<!-- main slider -->
	<div class="container-fluid no-padding">
		<div class="slider">
			<div class="container" style="background-image: url('/images/fifa1.jpeg') !important;">
				<div class="team-a">
					<div class="team-img">
						<a href="/team/{{ $league }}/{{ $result[0]->home }}"><img src="/images/fixtures_images/{{ $result[0]->home }}.png" style="height: 170px !important;"></a>
						<div class="team-result"><span>0</span></div>
					</div>
					<a href="/team/{{ $league }}/{{ $result[0]->home }}" class="team-title"><span>{{ $result[0]->home }}</span></a>
					<div class="clearfix"></div>
				</div>
				<span class="versus">vs</span>
				<div class="team-a team-b">
					<div class="team-img">
						<a href="/team/{{ $league }}/{{ $result[0]->away }}"><img src="/images/fixtures_images/{{ $result[0]->away }}.png" style="height: 170px !important;"></a>
						<div class="team-result"><span>0</span></div>
					</div>
					<a href="/team/{{ $league }}/{{ $result[0]->away }}" class="team-title"><span>{{ $result[0]->away }}</span></a>
				</div>
				<div class="tournament-meta">
					<div class="tournament-info">
						<strong>{{ $league }} league</strong>
						<i class="fa fa-calendar"></i>
						<span>November 17, 2015 10:00 pm</span>
					</div>
				</div>
			</div>
		</div>
		<div class="top-divider"></div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="main-content-title">
				<h3><i class="fa fa-star"></i> MOTM</h3>
				<h3><img src="/images/fixtures_images/{{ $result[0]->home }}.png" height="35" width="35"> Player <small class="orange">pos</small></h3>
			</div>
		</div>
	</div>
	<!-- page content wrapper -->
	<section class="content-wrapper container-fluid no-padding">
		
		<div class="container">
			<div class="main-content col-lg-6">
				<!-- content title -->
				<div class="main-content-title">
					<h3><img src="/images/fixtures_images/{{ $result[0]->home }}.png" height="35" width="35"> {{ $result[0]->home }}</h3>
				</div>
				<div class="blog-content">
					<div class="main-content-title">
						<h3><i class="fa fa-futbol"></i> Goals - 8</h3>
					</div>
					<div class="row">
						@for($i=1; $i < 5; $i++)
							<a href="#">
								<div class="col-md-6">
									<div class="inputField">
										<img src="/images/user.jpg" height="50" width="50"> &nbsp; Player {{ $i }} (<i class="fa fa-futbol"></i> 2)<span class="pull-right orange">pos</span>
									</div>
								</div>
							</a>
						@endfor
					</div>

					<!-- Assists -->

					<div class="main-content-title">
						<h3><i class="fa fa-users"></i> Assists - 8</h3>
					</div>
					<div class="row">
						@for($i=1; $i < 5; $i++)
							<a href="#">
								<div class="col-md-6">
									<div class="inputField">
										<img src="/images/user.jpg" height="50" width="50"> &nbsp; Player {{ $i }} (<i class="fa fa-users"></i> 2)<span class="pull-right orange">pos</span>
									</div>
								</div>
							</a>
						@endfor
					</div>

					<!-- Yellow card -->
					<div class="main-content-title">
						<h3><i class="fa fa-hands-helping" style="background: yellow; color: yellow;"></i>Yellow Card- 8</h3>
					</div>
					<div class="row">
						@for($i=1; $i < 5; $i++)
							<a href="#">
								<div class="col-md-6">
									<div class="inputField">
										<img src="/images/user.jpg" height="50" width="50"> &nbsp; Player {{ $i }} (<i class="fa fa-hands-helping" style="background: yellow; color: yellow;"></i> 2)<span class="pull-right orange">pos</span>
									</div>
								</div>
							</a>
						@endfor
					</div>

					<!-- Red card -->
					<div class="main-content-title">
						<h3><i class="fa fa-hands-helping" style="background: red; color: red;"></i>Red Card- 8</h3>
					</div>
					<div class="row">
						@for($i=1; $i < 5; $i++)
							<a href="#">
								<div class="col-md-6">
									<div class="inputField">
										<img src="/images/user.jpg" height="50" width="50"> &nbsp; Player {{ $i }} (<i class="fa fa-hands-helping" style="background: red; color: red;"></i> 2)<span class="pull-right orange">pos</span>
									</div>
								</div>
							</a>
						@endfor
					</div>

					<!-- Clean stylesheet -->
					<div class="main-content-title">
						<h3><i class="fa fa-file"></i>Clean Sheet</h3>
					</div>
					<div class="row">
						@for($i=1; $i < 5; $i++)
							<a href="#">
								<div class="col-md-6">
									<div class="inputField">
										<img src="/images/user.jpg" height="50" width="50"> &nbsp; Defender {{ $i }}<span class="pull-right orange">pos</span>
									</div>
								</div>
							</a>
						@endfor
					</div>
				</div>
			</div>

			<div class="main-content col-lg-6">
				<!-- content title -->
				<div class="main-content-title">
					<h3><img src="/images/fixtures_images/{{ $result[0]->away }}.png" height="35" width="35"> {{ $result[0]->away }}</h3>
				</div>
				<div class="blog-content">
					<div class="main-content-title">
						<h3><i class="fa fa-futbol"></i> Goals - 8</h3>
					</div>
					<div class="row">
						@for($i=1; $i < 5; $i++)
							<a href="#">
								<div class="col-md-6">
									<div class="inputField">
										<img src="/images/user.jpg" height="50" width="50"> &nbsp; Player {{ $i }} (<i class="fa fa-futbol"></i> 2)<span class="pull-right orange">pos</span>
									</div>
								</div>
							</a>
						@endfor
					</div>

					<!-- Assists -->

					<div class="main-content-title">
						<h3><i class="fa fa-users"></i> Assists - 8</h3>
					</div>
					<div class="row">
						@for($i=1; $i < 5; $i++)
							<a href="#">
								<div class="col-md-6">
									<div class="inputField">
										<img src="/images/user.jpg" height="50" width="50"> &nbsp; Player {{ $i }} (<i class="fa fa-users"></i> 2)<span class="pull-right orange">pos</span>
									</div>
								</div>
							</a>
						@endfor
					</div>

					<!-- Yellow card -->
					<div class="main-content-title">
						<h3><i class="fa fa-hands-helping" style="background: yellow; color: yellow;"></i>Yellow Card- 8</h3>
					</div>
					<div class="row">
						@for($i=1; $i < 5; $i++)
							<a href="#">
								<div class="col-md-6">
									<div class="inputField">
										<img src="/images/user.jpg" height="50" width="50"> &nbsp; Player {{ $i }} (<i class="fa fa-hands-helping" style="background: yellow; color: yellow;"></i> 2)<span class="pull-right orange">pos</span>
									</div>
								</div>
							</a>
						@endfor
					</div>

					<!-- Red card -->
					<div class="main-content-title">
						<h3><i class="fa fa-hands-helping" style="background: red; color: red;"></i>Red Card- 8</h3>
					</div>
					<div class="row">
						@for($i=1; $i < 5; $i++)
							<a href="#">
								<div class="col-md-6">
									<div class="inputField">
										<img src="/images/user.jpg" height="50" width="50"> &nbsp; Player {{ $i }} (<i class="fa fa-hands-helping" style="background: red; color: red;"></i> 2)<span class="pull-right orange">pos</span>
									</div>
								</div>
							</a>
						@endfor
					</div>

					<!-- Clean stylesheet -->
					<div class="main-content-title">
						<h3><i class="fa fa-file"></i>Clean Sheet</h3>
					</div>
					<div class="row">
						@for($i=1; $i < 5; $i++)
							<a href="#">
								<div class="col-md-6">
									<div class="inputField">
										<img src="/images/user.jpg" height="50" width="50"> &nbsp; Defender {{ $i }}<span class="pull-right orange">pos</span>
									</div>
								</div>
							</a>
						@endfor
					</div>
				</div>
			</div>
	</div>
		
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