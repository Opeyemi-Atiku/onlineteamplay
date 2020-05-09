<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from skywarriorthemes.com/arcane/html/forum.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jul 2018 10:44:16 GMT -->
<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Submit Stat</title>

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
	
	<style>
		.inputField {
			font-size: 16px;
			padding: 1%;
			width: 40%;
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
			<h1>Submit Score</h1>
			<strong><a href="">Homepage-slider</a> <span>/ Submit Score</span></strong>
		</div>
	</div>

	<section class="content-wrapper container-fluid no-padding">
			<div class="col-md-3">
                @include('includes.shoutbox') 
			</div>
			<div class="col-md-9">
				@if(count($check) > 0)
					Stat already submitted, awaiting other manager's input
				@else
					@if($score > 0)
					<div class="col-md-3">
						<span id="sc">
						
						</span>
					</div>
					<div class="col-md-3">
						<span id="as">
						
						</span>
					</div>
					
					@endif
					<div class="col-md-3">
						Man of the match: <select name='manofmatch' id='man' class='inputField'>
											<option value='' selected>Not my team</option>
											@foreach($users as $user)
												<option value='{{$user->id}}'>{{$user->username}}</option>
											@endforeach
										</select> <br><br>
					</div>
					<div class="col-md-3">
						No of Yellow card: <input type="text" name="ycard" size="1" class="inputField"><br><br>
							<span id="yellow"></span><br><br>
						No of Red card: <input type="text" name="rcard" size="1" class="inputField"><br><br>
							<span id="red"></span><br><br>
					</div>
					 <input type="submit" name="submit" onClick="submit2()" class="btn btn-warning" style="background: orange !important;">
					 @if($score > 0)
					 <script>
					 	var v = '{{$score}}';
						var goal = '';
						var assist = '';
						for(i = 0; i < v; i++) {
							goal += 'Goal ' + [i+1] + "<select name='nogoal' id='pos' class='inputField'><option value='' selected>Select one</option>@foreach($users as $user)<option value='{{$user->id}}'>{{$user->username}}</option>@endforeach</select> <br><br>";

							assist += 'Assist ' + [i+1] + "<select name='noassist' id='pos' class='inputField'><option value='' selected>Select one</option>@foreach($users as $user)<option value='{{$user->id}}'>{{$user->username}}</option>@endforeach</select> <br><br>";
						}
						document.getElementById("sc").innerHTML = goal;
						document.getElementById("as").innerHTML = assist;
					 </script>
					 @endif
					<script>
						$('document').ready(function() {
						$(':input[name="ycard"]')
						.bind('keypress keydown keyup change', function() {
							var ycard = $(':input[name="ycard"]').val();
							var rcard = $(':input[name="rcard"]').val();

							var v = '';

							if(ycard != '') {
								if(!isNaN(ycard)) {
									var v = ycard;
									var yellow = '';
									for(i = 0; i < v; i++) {
										yellow += 'Yellow Card ' + [i+1] + "<select name='noyellow' id='pos' class='inputField'><option value='' selected>Select one</option>@foreach($users as $user)<option value='{{$user->id}}'>{{$user->username}}</option>@endforeach</select> <br><br>";
									}
									document.getElementById("yellow").innerHTML = yellow;
								}
								else{
									$('#yellow').text('Invalid Input');
								}
							}
							
						});

						$(':input[name="rcard"]')
						.bind('keypress keydown keyup change', function() {
							var rcard = $(':input[name="rcard"]').val();

							var v = '';

							if(rcard != '') {
								if(!isNaN(rcard)) {
									var v = rcard;
									var red = '';
									for(i = 0; i < v; i++) {
										red += 'Red Card ' + [i+1] + "<select name='nored' id='pos' class='inputField'><option value='' selected>Select one</option>@foreach($users as $user)<option value='{{$user->id}}'>{{$user->username}}</option>@endforeach</select> <br><br>";
									}
									document.getElementById("red").innerHTML = red;
								}
								else{
									$('#red').text('Invalid Input');
								}
								
							}
							
						});
					})
						function submit2() {
							var msg = "";
							var saveg = "";
							var savea = "";
							var savey = "";
							var saver = "";
							var savem = "";
							$(':input[name="nogoal"]').each(function() {
								if($(this).val() == "") {
									msg = 'goal scorer required';
								}
								else {
									saveg += $(this).val() + ' ';
								}
							})
							
							$(':input[name="noassist"]').each(function() {
								if($(this).val() == "") {
									msg = 'Assist required';
								}
								else {
									savea += $(this).val() + ' ';
								}
							})
							
							if($(':input[name="ycard"]').val() > 0) {
								$(':input[name="noyellow"]').each(function() {
									if($(this).val() == "") {
										msg = 'Yellow Card required';
									}
									else {
										savey += $(this).val() + ' ';
									}
								})
							}
							else {
								savey = 0;
							}

							if($(':input[name="manofmatch"]').val() == "") {
								savem = 0;
							}
							else {
								savem = $(':input[name="manofmatch"]').val();
							}

							if($(':input[name="rcard"]').val() > 0) {
								$(':input[name="nored"]').each(function() {
									if($(this).val() == "") {
										msg = 'Red Card required';
									}
									else {
										saver += $(this).val() + ' ';
									}
								})
							}
							else {
								saver = 0;
							}
							
							if(msg == "") {
								if(saveg == "") {
									saveg = 0;
									savea = 0;
								} 
									$.ajax({
										url : '/stat',
										method : 'get',
										data : {
											fixture_id : '{{$fixture_id}}',
											goal : saveg,
											assist : savea,
											man_of_match : savem,
											yellow_card : savey,
											red_card : saver
										},
										success: function(data) {
											window.location.href = '/';
										}
									})
							}
							else {
								alert(msg);
							}
						}
					</script>
				@endif
				
			</div>
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