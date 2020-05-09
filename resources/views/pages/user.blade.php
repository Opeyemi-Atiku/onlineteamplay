<!DOCTYPE html>
<html lang="en-US">


    <head>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>{{ $user[0]->name }}</title>
    
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <!-- Favicon -->
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
       
    
    </head>
<body class="single-match-page single-team-page custom-profile">

	@include('includes.header')

	


	<!-- main slider -->
	<div class="container-fluid main-slider no-padding" style="background-image: url('/images/fifa1.jpeg') !important;">
		<div class="slider" style="background: url('/images/fifa1.jpg') !important; background-size: cover !important; background-position: center; background-repeat: no-repeat;"> 
			<div class="container">
				<div class="team-a team-b">
					<div class="team-img">
						<a href="profile.html"><img src="/images/{{ $user[0]->avatar }}">
							<p class="text-center">{{ $user[0]->gamertag }}</p>
						</a>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="top-divider"></div>

	<!-- page content wrapper -->
	<section class="content-wrapper container-fluid no-padding">
		
		<div class="container no-padding">
			<div class="main-content col-lg-8">
				<!-- content title -->
				<div class="main-content-title">
					<h3><i class="fa fa-bullhorn"></i>introduction</h3>
				</div>
				<div class="blog-content">
					
					<blockquote>{{ $user[0]->bio }}</blockquote>
					<br><br><br>

					@if (session()->has('success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert" style="z-index: 99999; color: white !important;">
							<strong>Success</strong> {!! session()->get('success') !!}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif
					@if(session()->has('success'))
						<p style="color: green; font-size: 16px;">{!! session()->get('success') !!}</p>

					@endif

					@if(!Auth::guest())
						@if(Auth::user()->username != $user[0]->username)
							<div class="row">
								<form method="post" action="/send-user-message">
									<div class="form-group">
										{{ csrf_field() }}
										<input type="hidden" name="sender_id" value="{{ Auth::user()->id }}">
										<input type="hidden" name="receiver_id" value="{{ $user[0]->id }}">
										<label for="exampleTextarea" style="font-size: 17px; color: white; font-weight: lighter;">Send message to user</label>
										<textarea class="form-control" style="font-size: 12px;
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
										" id="exampleTextarea" rows="3" required name="message"></textarea>
										@if ($errors->has('message'))
											<span class="help-block"  style="color: #ff8800;">
												<strong>{{ $errors->first('message') }}</strong>
											</span>
										@endif
									</div>
									<button class="btn btn-warning" style="background: orange;">Send</button>
								</form>	
							</div>
						@endif
					@endif
				</div>
				
			</div>
			<div class="sidebar col-lg-4">
						
						<!-- content title -->
						<div class="main-content-title">
							<h3><i class="fa fa-info-circle"></i> About</h3>
						</div>

						<ul class="about-profile-list">
							<li style="font-size: 16px !important;">
								<strong>Name:</strong> {{ $user[0]->name }}
                            </li>
                            
                            <li style="font-size: 16px !important;">
                                <strong>Gamertag:</strong> {{ $user[0]->username }}
                            </li>

							<li style="font-size: 16px !important;">
								@if($user[0]->team != '')
									<strong>Team:</strong> <a href="/team/{{ $user[0]->league }}/{{ $user[0]->team }}"><img src="/images/logos/{{ $user[0]->team }}.png" height="30" width="30"> {{ $user[0]->team }}</a>
								@else
									<strong>Team:</strong> No team (Free agent)
								@endif

							</li>
							@if($user[0]->role == 'manager')
								<li style="font-size: 16px !important;">
									<strong><i class="fa fa-star"></i> Manager</strong>
								</li>
							@endif

							<li style="font-size: 16px !important;">
                                <strong>Position:</strong> {{ $user[0]->position == ''? 'None' : $user[0]->position }}
							</li>
							

							<li style="font-size: 16px !important;">
                                <strong>League:</strong> {{ $user[0]->league != ''? $user[0]->league.' league' : 'No league' }}
							</li>
							

							

							

							<li style="font-size: 16px !important;">
								<strong>joined:</strong> {{ $user[0]->created_at->diffforhumans() }}
							</li>

						</ul>

						<!-- content title -->
						<div class="main-content-title">
							<h3><i class="fa fa-crosshairs"></i> Records</h3>
						</div>

						<ul class="about-profile-list">
							@foreach($records as $record)
								<li>
									<div class="row">
										<div class="col-md-4">
											<div class="about-profile-img-wrapper">
												<img src="/images/logos/{{ $record->team }}.png" height="60" width="60">
											</div>
											<p class="orange">{{ $record->team }}</p>
										</div>
										<div class="col-md-8" style="font-size: 17px;"><br>
											<span><i class="fa fa-futbol" style="color: orange;"></i> Goals: {{ $record->goal }}</span>&nbsp;&nbsp;
											<span><i class="fa fa-users" style="color: orange;"></i> Assists: 16</span><br><br>
											<span><i class="fa fa-hands-helping" style="background: yellow; color: yellow;"></i> Yellow: {{ $record->yellow }}</span>&nbsp;&nbsp;&nbsp;&nbsp;
											<span><i class="fa fa-hands-helping" style="background: red; color: red;"></i> Red: {{ $record->yellow }}</span><br><br>
											<span><i class="fa fa-male"> MOTM: {{ $record->motm }}</i></span>&nbsp;&nbsp;&nbsp;
											@if($record->user->position == 'GK')
												<span><i class="fa fa-file"> Clean Sheets</i> {{ $record->clean_sheets }}</span>
											@endif
										</div>
											
									</div>
										
								</li>
							@endforeach
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


<!-- Mirrored from skywarriorthemes.com/arcane/html/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jul 2018 10:43:46 GMT -->
</html>