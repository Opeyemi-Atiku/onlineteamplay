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
	
 

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
<!-- top header -->
	@include('includes.header')
	

	<div id="layerslider" style="width: 1900px; height: 530px;">
    	
    	<div class="ls-slide">
    		<img src="/images/fifa2.jpg" class="ls-bg" alt="slideback">
    		
    		<h1 class="ls-l" data-ls="parallaxlevel: 5;" alt="Image layer" style="top:15%; left:50%; font-size: 50px; color: whitesmoke;">Welcome to the playground, player</h1>

    		<!-- <h1 class="ls-l" data-ls="parallaxlevel: -1;"  alt="Image layer" style="top:15%; left:50%;">Welcome to the playground, player!</h1> -->

    		<div class="ls-l slider-text text-center" style="left:50%; top:35%;">
				With arcane you will be able to <span>Create A Real Gaming Community</span> where users can create teams, fight matches and manage tournaments. What are you waiting for? Start today!
			</div>

		

			<img src="/images/dividers.png" class="ls-l" data-ls="fadein: true" alt="Image layer" style="top:70%; left:50%;">
    	</div>


	</div>

	<!-- news ticker -->
	

	<!-- page content wrapper -->
	<section class="content-wrapper container-fluid no-padding">
		
	
		<!-- columns wrapper -->
		<section class="container main">

			<!-- left column -->
			<div class="col-md-4 left-column">
				
		
				@include('includes.shoutbox')
				
				
				
			</div>
		
			<!-- middle column -->
			<div class="col-md-4 mid-column">
				<div class="row">
					<div class="col-md-12">
						<h2>Welcome to OTP (onlineteamplay)</h2>
						<p>OTP is an online Fifa community for Xbox One that predominantly uses the gamemode online teamplay.
						Our aim is to provide a fully automated online resource that will keep track of league tables, fixtures and results 
						as well as keeping track of individual performances.
						With our 13/14 week seasons we are continuously moving forward and updating as we go making sure there is no delay between seasons.
						</p>
					</div>
				</div>
				<div class="row">
						<div class="col-md-12">
							<h2>What are you waiting for?</h2>
							<p>If you have not done so already please <a href="/register" style="color: orange;">REGISTER</a> today and get your career started. 
							Once registered you will be able to take advantage of our forums, get trials and sign for your dream team or become the boss
							yourself with our manager centre.</p>
						</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h2>Need help getting started?</h2>
						<p>Please visit our support centre where a moderator will be able to answer any queries.</p>
						<br><br>
					</div>
				</div>
				
					
		
				
			</div>
		
			<!-- right column -->
			<div class="col-md-4 right-column">
				<div class="row">
					<div class="col-md-12">
						


						<div class="main-content-title">
							<h3><i class="fa fa-futbol"></i>Top Scorers</h3>
						</div>
						<div class="row">
							@foreach($top_scorers as $player)
								<a href="/user/{{ $player->username }}">
									<div class="col-md-12">
										<div class="inputField">
											<img src="/images/{{ $player->avatar }}" height="80" width="84"> &nbsp; {{ $player->username }} 
											<span class="pull-right orange" style="font-size: 15px;"><i class="fa fa-futbol"></i> Goals: {{ $player->goal }}</span>
										</div>
									</div>
								</a>
							@endforeach
						</div>
						
		
					</div>
				</div>
				<!-- content title -->
				
		
				<!-- content title -->
			
		
				
			</div>
		</section>

		<!-- video section -->
	

		

	
	</section>

	<section class="content-wrapper container-fluid no-padding">

		<!-- left column -->
		<div class="col-md-4 right-column">

			


			<!-- content title -->
			<div class="main-content-title">
				<h3 class="next-match-title"> next matches</h3>
			</div>

			<!-- next match slider -->
			<div id="sidebar-carousel" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">

					<!-- single match -->
					<div class="item active" style="background: url('/images/fifa1.jpg') !important;">
						<div class="next-match-wrap">
							<div class="team-image">
								<img src="/images/fixtures_images/{{ $pfixtures[0]->home }}.png" height="155">
							</div>
							<div class="team-image">
								<img src="/images/fixtures_images/{{ $pfixtures[0]->away }}.png" height="155">
							</div>
							<div class="clearfix"></div>
							<div class="team-names">
								<div class="home-team">
									<span>{{ $pfixtures[0]->home }}</span>
								</div>
								<div class="versus">
									VS
								</div>
								<div class="away-team">
									<span>{{ $pfixtures[0]->away }}</span>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="match-date">
								November 22, 2018 <span>11:45 am</span>
							</div>
						</div>
					</div>
					@for($i=0; $i<$pfixtures->count(); $i++)
						<div class="item" style="background: url('/images/fifa1.jpg') !important;">
							<div class="next-match-wrap">
								<div class="team-image">
									<img src="/images/fixtures_images/{{ $pfixtures[$i]->home }}.png" height="155">
								</div>
								<div class="team-image">
									<img src="/images/fixtures_images/{{ $pfixtures[$i]->away }}.png" height="155">
								</div>
								<div class="clearfix"></div>
								<div class="team-names">
									<div class="home-team">
										<span>{{ $pfixtures[$i]->home }}</span>
									</div>
									<div class="versus">
										VS
									</div>
									<div class="away-team">
										<span>{{ $pfixtures[$i]->away }}</span>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="match-date">
									November 22, 2018 <span>11:45 am</span>
								</div>
							</div>
						</div>
					@endfor


					

					<!-- single match -->
					@foreach($sfixtures as $sfixture)
						<div class="item"  style="background: url('/images/fifa1.jpg') !important;">
							<div class="next-match-wrap">
								<div class="team-image">
									<img src="/images/fixtures_images/{{ $sfixture->home }}.png" height="155">
								</div>
								<div class="team-image">
									<img src="/images/fixtures_images/{{ $sfixture->away }}.png" height="155">
								</div>
								<div class="clearfix"></div>
								<div class="team-names">
									<div class="home-team">
										<span>{{ $sfixture->home }}</span>
									</div>
									<div class="versus">
										VS
									</div>
									<div class="away-team">
										<span>{{ $sfixture->away }}</span>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="match-date">
									September 4, 2021 <span>11:45 am</span>
								</div>
							</div>
						</div>
					@endforeach
					
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#sidebar-carousel" role="button" data-slide="prev">
				<span class="fa fa-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#sidebar-carousel" role="button" data-slide="next">
				<span class="fa fa-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
				</a>
			</div>

			
			
				

		</div>




		

		<!-- middle column -->
		<div class="col-md-4 mid-column">

			<!-- content title -->
			<div class="main-content-title">
				<h3><i class="fa fa-crosshairs"></i> latest matches </h3>
			</div>

			<!-- matches -->
			<div class="tab-content-wrapper">
				

				<div class="tab-content">
				<div id="h" class="tab-pane fade in active">

					<!-- matches list -->
					<ul class="match-list">

						<!-- single match -->
						@foreach($premier_results as $result)
							<li class="single-match-wrapper">
								<a href="/result/premier/{{ $result->id }}">
									<span class="result win" style="color: white !important; font-size: 15px !important;">{{ $result->home_score }}:{{ $result->away_score }}</span>
									<div class="single-match">
										<img src="/images/fixtures_images/{{ $result->home }}.png" height="50" width="50">
										<span class="vs">vs</span>
										<img src="/images/fixtures_images/{{ $result->away }}.png" height="50" width="50">
									</div>
									<span class="date" style="color: white !important; font-size: 15px !important;">October 4, 2018, 1:58 pm</span>
								</a>
							</li>
						@endforeach
						@foreach($super_results as $result)
							<li class="single-match-wrapper">
								<a href="/result/super/{{ $result->id }}">
									<span class="result win" style="color: white !important; font-size: 15px !important;">0:0</span>
									<div class="single-match">
										<img src="/images/fixtures_images/{{ $result->home }}.png" height="50" width="50">
										<span class="vs">vs</span>
										<img src="/images/fixtures_images/{{ $result->away }}.png" height="50" width="50">
									</div>
									<span class="date" style="color: white !important; font-size: 15px !important;">October 4, 2018, 1:58 pm</span>
								</a>
							</li>
						@endforeach
						@if($premier_results->count() < 1 && $super_results->count() < 1)
							<li class="single-match-wrapper">
								<h5 class="orange">No match has been played</h5>
							</li>
						@endif

						

						
					</ul>
				</div>
				
				</div>
			</div>

		</div>

		<!-- right column -->
		<div class="col-md-4 left-column">

			

			<!-- content title -->
			<div class="main-content-title">
				<h3><i class="fa fa-users"></i>Top Assisters</h3>
			</div>
			<div class="row">
				@foreach($top_assisters as $player)
					<a href="/user/{{ $player->username }}">
						<div class="col-md-12">
							<div class="inputField">
								<img src="/images/{{ $player->avatar }}" height="80" width="84"> &nbsp; {{ $player->username }} 
								<span class="pull-right orange" style="font-size: 15px;"><i class="fa fa-hands-helping"></i> Assists: {{ $player->assist }}</span>
							</div>
						</div>
					</a>
				@endforeach
			</div>

		</div>
	</section>

	@if(session()->has('error'))
		<script>
			$(document).ready(function () {
				alert("{!! session()->get('error') !!}");
			});
		</script>
		<?php Session::forget('error'); ?>;
	@endif

	@if(session()->has('success'))
	<script>
		$(document).ready(function () {
			alert("{!! session()->get('success') !!}");
		});
	</script>
	<?php Session::forget('success'); ?>;
	@endif

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
	<script src="/js/shout.js"></script>
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