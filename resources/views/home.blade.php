<!DOCTYPE html>
<html lang="en-US">


<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>{{ Auth::user()->username }}</title>

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
	
	
	<link rel="stylesheet" href="/css/fontawesome.css">
	 

	<!-- jQuery -->
	<script src="/js/jquery-3.1.1.js"></script>
	<script src="/js/jquery-3.1.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/owl.carousel.js"></script>
	
	
	<!-- External libraries: jQuery & GreenSock -->
    <script src="/js/greensock.js" type="text/javascript"></script>
    
	

	<style>
		.fa {
			color: orange;
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
				

				<!-- content title -->
				@include('includes.shoutbox')
				
				
				
			</div>

			<!-- middle column -->
			<div class="col-md-8 mid-column" id="centerGrid">
				<div class="row">
					<div class="col-md-4 col-md-offset-1">
						<img src="/images/{{ Auth()->user()->avatar }}" style="width: 100%;" alt="">
						<br><br>
						<div class="row" style="padding-left: 12px;">
							<p style="font-size: 15px;"><i class="fa fa-user"></i> Gamertag: {{ Auth::user()->username }}</p>
							<p style="font-size: 15px;"><i class="fa fa-envelope"></i> Email: {{ Auth::user()->email }}</p>
							@if(Auth::user()->team != '')
								<p style="font-size: 15px;">
									<i class="fa fa-users"></i> 
									<a href="/team/{{ Auth::user()->league }}/{{ Auth::user()->team }}">
										
										Team: <img src="/images/logos/{{ Auth::user()->team }}.png" height="30" width="30"> 
										{{ Auth::user()->team }}
									</a>
								</p>
							@else 
								<p style="font-size: 15px;">
									<i class="fa fa-users"></i> Team: None
								</p>
							@endif

							<p style="font-size: 15px;"><i class="fa fa-male"></i> Position: {{ Auth::user()->position == ''? 'None' : Auth::user()->position }}</p>
							<p style="font-size: 17px;"><i class="fa fa-trophy"></i> League: {{ Auth::user()->league == ''? 'None' : Auth::user()->league.' league' }}</p>
							@if(Auth()->user()->role == 'manager')
								<p style="font-size: 23px;"><i class="fa fa-star"></i> Manager</p>
							@endif
							<hr>
							<p><i class="fa fa-calender"></i> Joined {{ Auth::user()->created_at->diffforhumans() }}</p>
						</div>
					</div>


					<div class="col-md-5 col-md-offset-1" style="font-size: 15px;">
						<div class="row">
							<div class="main-content-title">
								<h3><i class="fa fa-file"></i> Season's Stats</h3>
							</div>

							<table class="table">
								<thead>
									<tr>
										<th>Category</th>
										<th>No</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><i class="fa fa-futbol" style="color: orange;"></i> Goals</td>
										<td>{{ count($seasonstat) < 1 ? 0 :  $seasonstat->goals}}</td>
									</tr>
									<tr>
										<td><i class="fa fa-users" style="color: orange;"></i> Assists</td>
										<td>{{ count($seasonstat) < 1 ? 0 :  $seasonstat->assists}}</td>
									</tr>
									<tr>
										<td><i class="fa fa-hands-helping" style="background: yellow; color: yellow;"></i> Yellow</td>
										<td>{{ count($seasonstat) < 1 ? 0 :  $seasonstat->yellow}}</td></td>
									</tr>
									<tr>
										<td><i class="fa fa-hands-helping" style="background: red; color: red;"></i> Red</td>
										<td>{{ count($seasonstat) < 1 ? 0 :  $seasonstat->red}}</td></td>
									</tr>
									<tr>
										<td><i class="fa fa-male"></i> MOTM</td>
										<td>{{ count($seasonstat) < 1 ? 0 :  $seasonstat->motm}}</td></td>
									</tr>
								
								</tbody>
							</table>


						</div>
						
						<div class="row">
							<div class="main-content-title">
								<h3><i class="fa fa-file"></i> Total Stats</h3>
							</div>
							<table class="table">
								<thead>
									<tr>
										<th>Category</th>
										<th>No</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><i class="fa fa-futbol" style="color: orange;"></i> Goals</td>
										<td>{{ Auth::user()->goal }}</td>
									</tr>
									<tr>
										<td><i class="fa fa-users" style="color: orange;"></i> Assists</td>
										<td>{{ Auth::user()->assist }}</td>
									</tr>
									<tr>
										<td><i class="fa fa-hands-helping" style="background: yellow; color: yellow;"></i> Yellow</td>
										<td>{{ Auth::user()->yellow }}</td>
									</tr>
									<tr>
										<td><i class="fa fa-hands-helping" style="background: red; color: red;"></i> Red</td>
										<td>{{ Auth::user()->red }}</td>
									</tr>
									<tr>
										<td><i class="fa fa-male"></i> MOTM</td>
										<td>{{ Auth::user()->motm }}</td>
									</tr>
								</tbody>
							</table>


		
						</div>
					</div>
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