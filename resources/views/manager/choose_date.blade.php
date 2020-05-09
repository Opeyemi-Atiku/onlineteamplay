<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from skywarriorthemes.com/arcane/html/forum.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jul 2018 10:44:16 GMT -->
<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Choose date</title>

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
	<script src="/js/jquery-ui.js"></script>
	<script src="/js/bootstrap.min.js"></script>


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
			.inputField2 {
				font-size: 16px;
				padding: 1%;
				width: 10%;
				margin-bottom: 15px;
				color: #ccc;
				-webkit-border-radius: 3px;
				-moz-border-radius: 3px;
				border-radius: 3px;
				background-color: #26262f !important;
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
			<h1>Choose Date</h1>
			<strong><a href="">Homepage-slider</a> <span>/ Choose match date</span></strong>
		</div>
	</div>

	<section class="content-wrapper container-fluid no-padding">
			<div class="col-md-4">
                @include('includes.shoutbox') 
			</div>
			@if($game != 0)
				@if($fixs != "")
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12 inputField">
									<?php
									$i = 0;
									$k = 0;
								?>
								<script>
									var msg = "";
									
								</script>
								@for($i = 0; $i < count($fixs); $i++)
									
									{{$fixs[$i]->home}} VS {{$fixs[$i]->away}} 
									<input type="text" name="chec" id='{{$fixs[$i]->id}}' class="inputField2"><br><br>
									<script>
										$( function() {
											$( "#{{$fixs[$i]->id}}" ).datepicker({
																	dateFormat: 'yy-mm-dd',
																	minDate: 0,
																	maxDate: '+1w'
																});
										  } );
									</script>
								@endfor
								@if(count($fixs) > 2)
									<script>
										function cont(id1, id2, id3) {
											if($(':input[name="chec"]').val() == "") {
												msg = 'Date Required';
												
												alert(msg);
											}
											else {
												if($('#'+id1).val() === $('#'+id2).val() || $('#'+id1).val() === $('#'+id3).val() || $('#'+id2).val() === $('#'+id3).val()) {
													msg = 'Date must not be the same';
													
													alert(msg);
												}
						
												else {
													var weekday = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
													   var a = new Date($('#{{$fixs[0]->id}}').val());
													   var b = new Date($('#{{$fixs[1]->id}}').val());
													   var c = new Date($('#{{$fixs[2]->id}}').val());
													$.ajax({
														url: '/games_week',
														method: 'get',
														data: {
															fixture_id : '{{$fixs[0]->id}}',
															home: '{{$fixs[0]->home}}',
															away: '{{$fixs[0]->away}}',
															date: $('#{{$fixs[0]->id}}').val(),
															day: weekday[a.getDay()]
														},
														success: function(data) {
															
														}
													});
													$.ajax({
														url: '/games_week',
														method: 'get',
														data: {
															fixture_id : '{{$fixs[1]->id}}',
															home: '{{$fixs[1]->home}}',
															away: '{{$fixs[1]->away}}',
															date: $('#{{$fixs[1]->id}}').val(),
															day: weekday[b.getDay()]
														},
														success: function(data) {
															
														}
													});
													$.ajax({
														url: '/games_week',
														method: 'get',
														data: {
															fixture_id : '{{$fixs[2]->id}}',
															home: '{{$fixs[2]->home}}',
															away: '{{$fixs[2]->away}}',
															date: $('#{{$fixs[2]->id}}').val(),
															day: weekday[c.getDay()]
														},
														success: function(data) {
															window.location.reload();
														}
													});
													
												}
											}
											
										}
									</script>
									<button type="submit" name="submit" onclick="cont('{{$fixs[0]->id}}', '{{$fixs[1]->id}}', '{{$fixs[2]->id}}')" class="btn btn-warning" style="background: orange !important;">Submit</button>
								@else
								<script>
									function cont_2(id1, id2) {
											if($(':input[name="chec"]').val() == "") {
												msg = 'Date Required';
												
												alert(msg);
											}
											else {
												if($('#'+id1).val() === $('#'+id2).val()) {
													msg = 'Date must not be the same';
													
													alert(msg);
												}
						
												else {
													var weekday = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
													   var a = new Date($('#{{$fixs[0]->id}}').val());
													   var b = new Date($('#{{$fixs[1]->id}}').val());
													$.ajax({
														url: '/games_week',
														method: 'get',
														data: {
															fixture_id : '{{$fixs[0]->id}}',
															home: '{{$fixs[0]->home}}',
															away: '{{$fixs[0]->away}}',
															date: $('#{{$fixs[0]->id}}').val(),
															day: weekday[a.getDay()]
														},
														success: function(data) {
															
														}
													});
													$.ajax({
														url: '/games_week',
														method: 'get',
														data: {
															fixture_id : '{{$fixs[1]->id}}',
															home: '{{$fixs[1]->home}}',
															away: '{{$fixs[1]->away}}',
															date: $('#{{$fixs[1]->id}}').val(),
															day: weekday[b.getDay()]
														},
														success: function(data) {
															window.location.reload();
														}
													});
												}
											}
										}
								</script>
									<button type="submit" name="submit" onclick="cont_2('{{$fixs[0]->id}}', '{{$fixs[1]->id}}')" class="btn btn-warning" style="background: orange !important;">Submit</button>
								@endif
							</div>
						</div>
							
					</div>
				@else
					<div class="col-md-8" style="padding-top: 25px; text-align: center;">
						<div class="row inputField orange" style="margin-left: 8px;">
							Match for the week already fixed
						</div>
						
					</div>
				@endif
			@else
				<div class="col-md-8" style="padding-top: 25px; text-align: center;">
					<div class="row inputField orange" style="margin-left: 8px;">
						No fixture present
					</div>
				</div>
			@endif
			
	</section>
	<div class="container-fluid copyright">
		<div class="container">
			<p>&copy; <script>document.write(new Date().getFullYear());</script> Made by <a href="">Website name</a> </p>
			<div class="footer-social">
				<a href=""><i class="fa fa-rss"></i></a>
				<a href=""><i class="fa fa-youtube"></i></a>
				<a href=""><i class="fa fa-twitch"></i></a>
				<a href=""><i class="fa fa-steam"></i></a>
				<a href=""><i class="fa fa-google-plus"></i></a>
				<a href=""><i class="fa fa-twitter"></i></a>
				<a href=""><i class="fa fa-facebook"></i></a>
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