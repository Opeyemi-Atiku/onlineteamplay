<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from skywarriorthemes.com/arcane/html/forum.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jul 2018 10:44:16 GMT -->
<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>My Players</title>

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
			<h1>Forums</h1>
			<strong><a href="index-2.html">Homepage-slider</a> <span>/ My Players</span></strong>
		</div>
	</div>

	
	<!-- page content wrapper -->
		<section class="content-wrapper container-fluid no-padding">
			<section class="container main">
	
				<div class="col-md-3">
	                @include('includes.shoutbox') 
				</div>
				<div class="col-md-9">
				@if(count($users) != 0)
					<div class="container main-wrapper">
	
						<div class="all-members">
							<a href="#">All Players <span>{{count($users)}}</span></a>
						</div>
						<br><br><br>
						<script>
							$('document').ready(function() {
								
							})
							function release(id) {
								if(confirm('Are you sure you want to release this Player?')) {
									$.ajax({
										url: '/release/'+id,
										method: 'get',
										data: {
										},
										success: function(data) {
											window.location.reload();
										}
									})
								}
								else {
									alert('Player not released')
								}
								
								
							}

							function chan(id) {
									$.ajax({
									url: '/position',
									method: 'get',
									data: {
										'user_id': id,
										'position': $('#0'+id).val()
									},
									success: function(data) {
										$('#1'+id).html($('#0'+id).val());
									}
								})
							}
						</script>
						<ul class="teams-list">
							@foreach($users as $user)
							<li class="single-team" style="font-size: 15px !important;">
								<div class="team-avatar"><img src="/images/{{$user->avatar}}" width="40px" height="20px"></div>
								<div class="team-info">
									<a href="/user/{{$user->username}}" class="team-title">{{$user->username}}</a>
									<span class="members">active {{$user->created_at->diffForHumans()}}</span><br>
									@if($user->position == '')
									<span class="members">positon: <span id="1{{$user->id}}">Null</span>
										<select name="positon" id="0{{$user->id}}" onChange='chan({{$user->id}})'>
											<option value="GK">GK</option>
											<option value="RB">RB</option>
											<option value="CB">CB</option>
											<option value="LB">LB</option>
											<option value="CDM">CDM</option>
											<option value="RM">RM</option>
											<option value="LM">LM</option>
											<option value="CM">CM</option>
											<option value="CAM">CAM</option>
											<option value="RW">RW</option>
											<option value="LW">LW</option>
											<option value="LS">LS</option>
											<option value="RS">RS</option>
											<option value="ST">ST</option>
										</select>
									</span><br><br>
								@else
								<span class="members">positon: <span id="1{{$user->id}}">{{$user->position}}</span></span>
									<select name="positon" id="0{{$user->id}}" onChange='chan({{$user->id}})'>
											<option value="GK">GK</option>
											<option value="RB">RB</option>
											<option value="CB">CB</option>
											<option value="LB">LB</option>
											<option value="CDM">CDM</option>
											<option value="RM">RM</option>
											<option value="LM">LM</option>
											<option value="CM">CM</option>
											<option value="CAM">CAM</option>
											<option value="RW">RW</option>
											<option value="LW">LW</option>
											<option value="LS">LS</option>
											<option value="RS">RS</option>
											<option value="ST">ST</option>
										</select>
									</span><br><br>
								@endif
								<input type="submit" name="update" id="{{$user->id}}" onClick="release({{$user->id}})" class="btn btn-warning" style="background: orange !important;"  value="Release">
							</div>
						</li>
						@endforeach
					</ul>
				</div>		
			</section>
			
			@else 
			<h1>You currently have no Player in your team</h1>
			@endif
		</div>
	</section>

	<div class="container-fluid copyright">
		<div class="container">
			<p>&copy; <script>document.write(new Date().getFullYear());</script> Made by <a href="http://skywarriorthemes.com/">Website name</a> </p>
			<div class="footer-social">
				<a href="index-2.html"><i class="fa fa-rss"></i></a>
				<a href="index-2.html"><i class="fa fa-youtube"></i></a>
				<a href="index-2.html"><i class="fa fa-twitch"></i></a>
				<a href="index-2.html"><i class="fa fa-steam"></i></a>
				<a href="index-2.html"><i class="fa fa-google-plus"></i></a>
				<a href="index-2.html"><i class="fa fa-twitter"></i></a>
				<a href="index-2.html"><i class="fa fa-facebook"></i></a>
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