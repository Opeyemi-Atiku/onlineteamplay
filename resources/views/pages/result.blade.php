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
						<a href="/team/{{ $league }}/{{ $result->home }}"><img src="/images/fixtures_images/{{ $result->home }}.png" style="height: 170px !important;"></a>
						<div class="team-result"><span>{{ $result->home_score }}</span></div>
					</div>
					<a href="/team/{{ $league }}/{{ $result->home }}" class="team-title"><span>{{ $result->home }}</span></a>
					<div class="clearfix"></div>
				</div>
				<span class="versus">vs</span>
				<div class="team-a team-b">
					<div class="team-img">
						<a href="/team/{{ $league }}/{{ $result->away }}"><img src="/images/fixtures_images/{{ $result->away }}.png" style="height: 170px !important;"></a>
						<div class="team-result"><span>{{ $result->away_score }}</span></div>
					</div>
					<a href="/team/{{ $league }}/{{ $result->away }}" class="team-title"><span>{{ $result->away }}</span></a>
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

	<!-- page content wrapper -->
	<section class="content-wrapper container-fluid no-padding">
		
		<div class="container">
			<div class="main-content col-md-6">
				<!-- content title -->
				<div class="main-content-title">
					<h3><img src="/images/fixtures_images/{{ $result->home }}.png" height="35" width="35"> {{ $result->home }}</h3>
				</div>
				<div class="blog-content">
				<?php  
					$home_goals = array_count_values(explode(' ', $home_stat->goal));
					$home_assists = array_count_values(explode(' ', $home_stat->assist));
					$home_reds = array_count_values(explode(' ', $home_stat->red_card));
					$home_yellows = array_count_values(explode(' ', $home_stat->yellow_card));
					
					


				?>

					<table class="table" style="color: grey !important; font-size: 17px !important">
						<thead>
							<tr>
								<th><i class="fa fa-user orange"></i> Players</th>
								<th><i class="fa fa-male orange"></i> Position</th>
								<th><i class="fa fa-futbol orange"></i> Goals</th>
								<th><i class="fa fa-users orange"></i> Assists</th>
								<th><i class="fa fa-file orange"></i> Clean Sheet</th>
								<th><i class="fa fa-hands-helping" style="background: yellow; color: yellow;"></i> Yellow Card</th>
								<th><i class="fa fa-hands-helping" style="background: red; color: red;"></i> Red Card</th>
								<th title="Man Of The Match"><i class="fa fa-star orange"></i> MOTM</th>
							</tr>
						</thead>
						<tbody>
							@foreach($home_players as $player)
									<tr>
										<td><a href="/user/{{ $player->username }}">{{ $player->username }}</a></td>
										<td>{{ $player->position }}</td>
										<td>
											@foreach($home_goals as $player_id => $value)
												@if($player_id != 0)
													@if($player_id == $player->id)
														{{ $value }}
													@endif
												@else
													{{ '' }}
												@endif
											@endforeach
										</td>
										
										<td>
											@foreach($home_assists as $player_id => $value)
											
												@if($player_id != 0)
													@if($player_id == $player->id)
														{{ $value }}
													@else
														{{ '' }}
													@endif
												@else 
													{{ '' }}
												@endif
											@endforeach
										</td>

										<td>
											@if($player->position == 'GK')
												@if($result->away_score == 0)
													1
												@else
													{{ '' }}
												@endif
											@else
												{{ '' }}
											@endif
										</td>


										
										<td>
											@foreach($home_yellows as $player_id => $value)
											
												@if($player_id != 0)
													@if($player_id == $player->id)
														{{ $value }}
													@else
														{{ '' }}
													@endif
												@else 
													{{ '' }}
												@endif
											@endforeach
										</td>


										<td>
											@foreach($home_reds as $player_id => $value)
											
												@if($player_id != 0)
													@if($player_id == $player->id)
														{{ $value }}
													@else
														{{ '' }}
													@endif
												@else 
													{{ '' }}
												@endif
											@endforeach
										</td>


										@if($home_stat->man_of_match == $player->id)
											<td>1</td>
										@else 
											<td></td>
										@endif
									</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

			<div class="main-content col-md-6">
				<!-- content title -->
				<div class="main-content-title">
					<h3><img src="/images/fixtures_images/{{ $result->away }}.png" height="35" width="35"> {{ $result->away }}</h3>
				</div>
				<div class="blog-content">

				<?php  
					$away_goals = array_count_values(explode(' ', $away_stat->goal));
					$away_assists = array_count_values(explode(' ', $away_stat->assist));
					$away_reds = array_count_values(explode(' ', $away_stat->red_card));
					$away_yellows = array_count_values(explode(' ', $away_stat->yellow_card));

					


				?>
					<table class="table" style="color: grey !important; font-size: 17px !important">
						<thead>
							<tr>
								<th><i class="fa fa-user orange"></i> Players</th>
								<th><i class="fa fa-male orange"></i> Position</th>
								<th><i class="fa fa-futbol orange"></i> Goals</th>
								<th><i class="fa fa-users orange"></i> Assists</th>
								<th><i class="fa fa-file orange"></i> Clean Sheet</th>
								<th><i class="fa fa-hands-helping" style="background: yellow; color: yellow;"></i> Yellow Card</th>
								<th><i class="fa fa-hands-helping" style="background: red; color: red;"></i> Red Card</th>
								<th title="Man Of The Match"><i class="fa fa-star orange"></i> MOTM</th>
							</tr>
						</thead>
						<tbody>
							@foreach($away_players as $player)
								<tr>
									<td><a href="/user/{{ $player->username }}">{{ $player->username }}</a></td>
									<td>{{ $player->position }}</td>
									<td>
										@foreach($away_goals as $player_id => $value)
										
											@if($player_id > 0)
												@if($player_id == $player->id)
													{{ $value }}
												@else
													{{ '' }}
												@endif
											@else 
											{{ '' }}
											@endif
											
										@endforeach
									</td>
									<td>
										@foreach($away_assists as $player_id => $value)
										
											@if($player_id != 0)
												@if($player_id == $player->id)
													{{ $value }}
												@else
													{{ '' }}
												@endif
											@else 
												{{ '' }}
											@endif
										@endforeach
									</td>
									<td>
										@if($player->position == 'GK')
											@if($result->home_score == 0)
												1
											@else
												{{ '' }}
											@endif
										@else
											{{ '' }}
										@endif
									</td>


									<td>
										@foreach($away_yellows as $player_id => $value)
										
											@if($player_id != 0)
												@if($player_id == $player->id)
													{{ $value }}
												@else
													{{ '' }}
												@endif
											@else 
												{{ '' }}
											@endif
										@endforeach
									</td>


									<td>
										@foreach($away_reds as $player_id => $value)
										
											@if($player_id != 0)
												@if($player_id == $player->id)
													{{ $value }}
												@else
													{{ '' }}
												@endif
											@else 
												{{ '' }}
											@endif
										@endforeach
									</td>

									<td>
										@if($away_stat->man_of_match == $player->id)
											1
										@else 
											{{ '' }}
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
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