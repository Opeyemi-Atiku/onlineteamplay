<!DOCTYPE html>
<html lang="en-US">


<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">
	@if($league == 'premier')
		
			<title>{{ $team[0]->team_name }}</title>
		
			<title>Team Name</title>
	@else
		<title>{{ $team[0]->team_name }}</title>
	@endif

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="shortcut icon" href="/images/favicon.ico">

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
	<style>
		.inputField {
			font-size: 16px;
			padding: 2%;
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
<body class="single-match-page single-team-page">

	@include('includes.header')
	
		


	<!-- main slider -->
	<div class="container-fluid main-slider no-padding">
		<div class="slider" style="background: url('/images/fifa1.jpg') !important; background-size: cover !important; background-position: center; background-repeat: no-repeat;">
			<div class="container">
				<div class="team-a team-b">
					<div class="team-title" style="width: 170px !important; text-align: center;"><h4>{{ $team[0]->team_name }}</h4></div>
					<div class="team-img">
						@if($league == 'premier')
							<a href="#"><img src="/images/logos/{{ $team[0]->logo }}"></a>
						@else 
							<a href="#"><img src="/images/logos/{{ $team[0]->logo }}"></a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="top-divider"></div>

	<!-- page content wrapper -->
	<section class="content-wrapper container-fluid no-padding">
		
		<div class="container-fluid no-padding">
			<ul class="nav nav-tabs team-nav">
				<li class="active">
					<a href="#team" data-toggle="tab">
						<i class="fa fa-flag"></i>&nbsp;Team Page
					</a>
				</li>
				
				<li>
					<a data-toggle="tab" href="#matches-tab">
						<i class="fa fa-futbol"></i> Squad
					</a>
                </li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active container" id="team">
					<div class="main-content col-lg-8">
						<!-- content title -->
						<div class="main-content-title">
							<h3>about us</h3>
						</div>
						<div class="blog-content">
							<blockquote><p>Nunc tincidunt nec quam nec mattis. Quisque tincidunt ligula nec sem accumsan fermentum. Nullam a volutpat enim. Vestibulum sapien mi, dignissim quis suscipit tempor, interdum sit amet orci.</p></blockquote>
							
						</div>
						<div class="row" style="padding: 5px;">
							<div class="main-content">
							<!-- content title -->
								<div class="main-content-title">
									<h3><i class="fa fa-users"></i>Players</h3>
								</div>
								<div class="blog-content">
									<div class="row">
										@foreach($teams_users as $user)
											<a href="/user/{{ $user->user->username }}">
												<div class="col-md-4">
													<div class="inputField">
														<img src="/images/{{ $user->user->avatar }}" height="50" width="50"> &nbsp; {{ $user->user->username }}<span class="pull-right orange">{{ $user->user->position }}</span>
													</div>
												</div>
											</a>
										@endforeach
									</div>
									
								</div>
							</div>

						</div>
						
					</div>
					<div class="sidebar col-lg-4">
						
						<div class="team-info-wrapper">
							<div class="team-info-members">
								<i class="fa fa-users"></i>
                                <strong> {{ $teams_users->count() }}&nbsp;{{ $teams_users->count() > 1 ? 'Members': 'Member' }}</strong>
                                
                            </div>
                            
							
						</div>
                        <div class="col-md-12">
                            <!-- content title -->
                            <div class="main-content-title">
                                <h3><i class="fa fa-newspaper-o"></i> RECORD HOLDERS</h3>
                            </div>
                            <div class="row blog-content" style="height: 100px !important; padding: 5px !important; padding-left: -10px !important; width: 100% !important; margin-left: 0px;">
								<a href="#">
									<div class="col-md-12">
										<div class="">
											<img src="/images/user.jpg" height="80" width="84"> &nbsp; {{ $top_scorer->username }} 
											<span class="pull-right orange" style="font-size: 15px;"><i class="fa fa-futbol"></i> Goals: {{ $top_scorer->goal }}</span>
										</div>
									</div>
								</a>

								
                            </div>
                            <div class="row blog-content" style="height: 100px !important; padding: 5px !important; padding-left: -10px !important; width: 100% !important; margin-left: 0px;">
                                <a href="#">
									<div class="col-md-12">
										<div class="">
											<img src="/images/user.jpg" height="80" width="84"> &nbsp; {{ $top_assister->username }} 
											<span class="pull-right orange" style="font-size: 15px;"><i class="fa fa-hands-helping"></i> Assists: {{ $top_assister->assist }}</span>
										</div>
									</div>
								</a>
                            </div>
                            
                        </div>
                
                                

						
		
					</div>
				</div>

				

				<div class="tab-pane" id="matches-tab">
					<div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <table class="table"  id="squadTable">
                                <thead>
                                    <tr>
                                        <th>Position</th>
                                        <th>Player(s)</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
									@foreach($teams_users as $user)
										<tr>
											<td>{{ $user->user->position }}</td>
											<td><a href="/user/{{ $user->user->username }}">{{ $user->user->username }}</a></td>
										</tr>
										
									@endforeach
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
				</div>
				
			</div>
		</div>
		
	</section>


	<div class="container-fluid copyright">
		<div class="container">
			<p>&copy; {{ date('Y') }} <a href="//">Website name</a> </p>
			

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