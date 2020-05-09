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
			<div class="container">
				<div class="team-a">
					<div class="team-img">
						<a href="single-team-page.html"><img src="images/as-210x178.jpg"></a>
						<div class="team-result"><span>0</span></div>
					</div>
					<a href="single-team-page.html" class="team-title"><span>Natus Vincere</span></a>
					<div class="clearfix"></div>
				</div>
				<span class="versus">vs</span>
				<div class="team-a team-b">
					<div class="team-img">
						<a href="single-team-page.html"><img src="images/Avatar_Large-210x178.png"></a>
						<div class="team-result"><span>0</span></div>
					</div>
					<a href="single-team-page.html" class="team-title"><span>team gg</span></a>
				</div>
				<div class="tournament-meta">
					<div class="tournament-info">
						<strong>ESL Open Cup</strong>
						<i class="fa fa-calendar"></i>
						<span>November 17, 2015 10:00 pm</span>
					</div>
				</div>
			</div>
		</div>
		<div class="top-divider"></div>
	</div>

	<!-- page content wrapper -->
	<section class="content-wrapper container-fluid no-padding">
		
		<div class="container">
			<div class="main-content col-lg-6">
				<!-- content title -->
				<div class="main-content-title">
					<h3><i class="fa fa-bullhorn"></i> match description</h3>
				</div>
				<div class="blog-content">
					<p>Maecenas ut erat scelerisque tortor vestibulum pretium. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed iaculis dui vitae nisl lobortis eu vehicula lacus dignissim.</p>	
					<blockquote><p>Donec quis nisi nec nulla malesuada scelerisque vitae ac turpis. In eget elit eu risus gravida adipiscing.</p></blockquote>
					<p>Morbi vel ipsum vel augue mattis ultricies non et mauris. Phasellus rhoncus euismod massa. Etiam euismod tristique venenatis. Curabitur lorem mauris, dictum et tempus eu, feugiat pharetra sapien. Donec vel turpis orci, ut congue tortor. Aenean sed interdum quam. Vivamus laoreet posuere pharetra. In lobortis tellus non augue tempor eleifend. Vestibulum ut dignissim tellus. Morbi ornare, enim a semper venenatis, odio justo luctus enim, consectetur sodales justo est id leo.</p>
						
				</div>
			</div>

			<div class="sidebar col-lg-6">
				<!-- content title -->
				<div class="main-content-title">
					<h3><i class="fa fa-picture-o"></i> maps</h3>
				</div>

				<ul class="sidebar-maps">
					<li>
						<strong>Office</strong>
						<div class="score">
							<span>11:4</span>
							<span>7:8</span>
						</div>
						<div class="clearfix"></div>
					</li>
				</ul>

			
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