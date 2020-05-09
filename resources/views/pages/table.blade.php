<!DOCTYPE html>
<html lang="en-US">


<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>{{ $league }} league</title>

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<!-- <link rel="shortcut icon" href="//favicon.ico"> -->

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
    <link rel="stylesheet" href="/css/fontawesome.css">
	


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   

</head>
<body class="single-match-page single-team-page">

	<!-- top header -->
	@include('includes.header')
		


	<!-- main slider -->
	<div class="container-fluid main-slider no-padding">
		<div class="slider" style="background: url('/images/fifa1.jpg') !important; background-size: cover !important; background-position: center; background-repeat: no-repeat;">
			<div class="container">
				<div class="team-a team-b">
					<div class="team-title">
						@if($league == 'premier')
							<h1>Premier League</h1>
						@else 
							<h1>Super League</h1>
						@endif
					</div>
					<div class="team-img">
						@if($league == 'premier')
							<a href="/profile.html"><img src="/images/premier-league.png"></a>
						@else
						<a href="/profile.html"><img src="/images/super-league.png"></a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="top-divider" style="margin-bottom: 20px !important;"></div>

	<!-- page content wrapper -->
	<section class="content-wrapper container-fluid no-padding">
		<div class="row" style="">
            <div class="col-md-4">
                @include('includes.shoutbox')
			</div>
			
			@if($league == 'premier')
				<div class="col-md-8">
					<h2 style=" color: grey; font-size: 28px !important;">P<span style="text-transform: lowercase;">remier</span> L<span style="text-transform: lowercase;">eague</span> </h2>
					<p style="color: grey;">Standings</p>
					<table class="table" style="color: grey !important; font-size: 17px !important">
						<thead>
							<tr>
								<th>#</th>
								<th>Team</th>
								<th>GP</th>
								<th>W</th>
								<th>D</th>
								<th>L</th>
								<th>GF</th>
								<th>GA</th>
								<th>GD</th>
								<th>PTS</th>
							</tr>
						</thead>

						<?php $i = 1; ?>

						<tbody>
							@foreach($teams as $team)
								<tr>
									<td>{{ $i++ }}</td>
									<td><a href="/team/premier/{{ $team->team_name }}"><img src="/images/logos/{{ $team->logo }}" height="30" width="30"> &nbsp;{{ $team->team_name }}</a></td>
									<td>{{ $team->GP }}</td>
									<td>{{ $team->W }}</td>
									<td>{{ $team->D }}</td>
									<td>{{ $team->L }}</td>
									<td>{{ $team->GF }}</td>
									<td>{{ $team->GA }}</td>
									<td>{{ $team->GD }}</td>
									<td>{{ $team->PTS }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			@else
				<div class="col-md-8">
					<h2 style=" color: grey; font-size: 28px !important;">S<span style="text-transform: lowercase;">uper</span> L<span style="text-transform: lowercase;">eague</span> </h2>
					<p style="color: grey;">Standings</p>
					<table class="table" style="color: grey !important; font-size: 17px !important">
						<thead>
							<tr>
								<th>#</th>
								<th>Team</th>
								<th>GP</th>
								<th>W</th>
								<th>D</th>
								<th>L</th>
								<th>GF</th>
								<th>GA</th>
								<th>GD</th>
								<th>PTS</th>
							</tr>
						</thead>

						<?php $i = 1; ?>

						<tbody>
							@foreach($teams as $team)
								<tr>
									<td>{{ $i++ }}</td>
									<td><a href="/team/super/{{ $team->team_name }}"><img src="/images/logos/{{ $team->logo }}" height="30" width="30"> &nbsp;{{ $team->team_name }}</a></td>
									<td>{{ $team->GP }}</td>
									<td>{{ $team->W }}</td>
									<td>{{ $team->D }}</td>
									<td>{{ $team->L }}</td>
									<td>{{ $team->GF }}</td>
									<td>{{ $team->GA }}</td>
									<td>{{ $team->GD }}</td>
									<td>{{ $team->PTS }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			@endif
        </div>
		 
		
	</section>


	<div class="container-fluid copyright">
		<div class="container">
			<p>&copy; {{ date('Y') }} <a href="/">Website name</a> </p>
			

		</div>
	</div>

	<div class="container back-to-top-wrapper">
		<a href="/#" class="back-to-top" id="scroll"></a>
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