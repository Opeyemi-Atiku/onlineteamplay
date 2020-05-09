<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from skywarriorthemes.com/arcane/html/forum.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jul 2018 10:44:16 GMT -->
<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Submit Score</title>

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
	<script src="/js/jquery-ui.js"></script>
	
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

		#countdown {
		    text-align: center;
		}
		#countdown p {
		    display: inline-block;
		    padding: 10px;
		    background: #151515;
		    margin: 0 0 20px;
		    border-radius: 3px;
		    color: white;
		    min-width: 2.6rem;
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
			<h1>Next match</h1>
			<strong><a href="">Homepage-slider</a> <span>/ Next match</span></strong>
		</div>
	</div>

	<section class="content-wrapper container-fluid no-padding">
			<div class="col-md-4">
                @include('includes.shoutbox') 
			</div>
			@if($match2 > 0)
				@if($check > 0)
				<div class="col-md-8">
					<div class="row inputField">
						<span id="match">
							{{$msg1}}
							@if($msg2 != "")
								<a href="/user/{{ $manag->username }}">{{$manag->username}}</a> {{$msg2}} Or change your day to the corresponding manager from the edit button below
							@else
								<br>
								<div id="countdown">
								<p class="days">00</p>
								<p class="timeRefDays">days</p>
								<p class="hours">00</p>
								<p class="timeRefHours">hours</p>
								<p class="minutes">00</p>
								<p class="timeRefMinutes">minutes</p>
								<p class="seconds">00</p>
								<p class="timeRefSeconds">seconds</p>
								</div>
								<span id="hideMsg"></span>
							@endif <br>

							<img src="/images/logos/{{ $match->home }}.png" height="30" width="30"> {{$match->home}}  VS <img src="/images/logos/{{ $match->away }}.png" height="30" width="30"> {{$match->away}} <br>
							Day: {{$match->day}} {{$match->date}}<br>
							Other Manager's Day: {{$other->day}} {{$other->date}}<br>
							Time: 7:30 PM<br>
							Note: If match is not played an hour after the time allocated, the match will be void<br>
							<a href='/submit_score' id="submit_score" class="btn btn-warning hidden" style="background: orange !important;">Submit Score</a>
							@if($msg2 != "")
								<button type="submit" name="submit" onClick='cont()' class="btn btn-warning" style="background: orange !important;">Change Day</button>
							@endif
						<span>
					</div>
						
				
				</div>
				<div class="col-md-8">
					<div class="row">
						<span id="edit" class="hidden">
							{{$match->home}} VS {{$match->away}} 
							<input type="text" name="chec" id='date' class="inputField2">
							<br>
							<script>
								
								$( function() {
									$( "#date" ).datepicker({
										dateFormat: 'yy-mm-dd',
										minDate: 0,
										maxDate: '+1w'
									});
								} );
								</script>
							<button type="submit" name="submit" onClick="edit('{{$other->date}}', '{{$match->id}}')" class="btn btn-warning" style="background: orange !important;">submit</button>
						</span>
					</div>
						
				</div>
				<script>
					function cont() {
						$('#match').addClass('hidden');
						$('#edit').removeClass('hidden');
					}

					function edit(date, id) {
						if($('#date').val() == "") {
							alert('Date cant be empty');
						}
						else{
							if($('#date').val() != date) {
								alert("Date still does not match other manager's day. Select " + date)
							} 
							else {
								var weekday = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
								var a = new Date($('#date').val());
								$.ajax({
									url: '/edit_day',
									method: 'get',
									data: {
										date: date,
										day : weekday[a.getDay()],
										id: id
									},
									success: function() {
										window.location.reload();
									}
								})
							}
						}
					}

					
				</script>
				<script>
					
					(function (e) {
					e.fn.countdown = function (t, n) {
						function i() {
						eventDate = Date.parse(r.date) / 1e3;
						currentDate = Math.floor((new Date()).getTime() / 1e3);
						if (eventDate <= currentDate) {
							$('#submit_score').removeClass('hidden');
							
							var today = new Date();
							var enddate = new Date('{{$match->date}} 20:30:00');
							if(today >= enddate) {
								$('#submit_score').addClass('hidden');
								$('#countdown').addClass('hidden');
								$.ajax({
									url: '/void',
									method: 'get',
									data: {
										fixture_id: '{{$match->fixture_id}}'
									},
									success: function(data) {
										alert(data);
										window.location.reload();
									}
								});
								
							}
							else{
								a = calcDate(enddate,today);
								document.getElementById('hideMsg').innerHTML = a;
							}
							
							
							n.call(this);
							clearInterval(interval);
							
						}
						seconds = eventDate - currentDate;
						days = Math.floor(seconds / 86400);
						seconds -= days * 60 * 60 * 24;
						hours = Math.floor(seconds / 3600);
						seconds -= hours * 60 * 60;
						minutes = Math.floor(seconds / 60);
						seconds -= minutes * 60;
						days == 1 ? thisEl.find(".timeRefDays").text("day") : thisEl.find(".timeRefDays").text("days");
						hours == 1 ? thisEl.find(".timeRefHours").text("hour") : thisEl.find(".timeRefHours").text("hours");
						minutes == 1 ? thisEl.find(".timeRefMinutes").text("minute") : thisEl.find(".timeRefMinutes").text("minutes");
						seconds == 1 ? thisEl.find(".timeRefSeconds").text("second") : thisEl.find(".timeRefSeconds").text("seconds");
						if (r["format"] == "on") {
							days = String(days).length >= 2 ? days : "0" + days;
							hours = String(hours).length >= 2 ? hours : "0" + hours;
							minutes = String(minutes).length >= 2 ? minutes : "0" + minutes;
							seconds = String(seconds).length >= 2 ? seconds : "0" + seconds
						}
						if (!isNaN(eventDate)) {
							thisEl.find(".days").text(days);
							thisEl.find(".hours").text(hours);
							thisEl.find(".minutes").text(minutes);
							thisEl.find(".seconds").text(seconds)
						} else {
							alert("Invalid date. Example: 30 Tuesday 2017 15:50:00");
							clearInterval(interval)
						}
						}
						var thisEl = e(this);
						var r = {
						date: null,
						format: null
						};
						t && e.extend(r, t);
						i();
						interval = setInterval(i, 1e3)
					}
					})(jQuery);
					$(document).ready(function () {
					function e() {
						var e = new Date;
						e.setDate(e.getDate() + 60);
						dd = e.getDate();
						mm = e.getMonth() + 1;
						y = e.getFullYear();
						futureFormattedDate = mm + "/" + dd + "/" + y;
						return futureFormattedDate
					}
					$("#countdown").countdown({
						date: "{{$match->date}} 19:30:00", // Change this to your desired date to countdown to
						format: "on"
					});
					});

				</script>
				<script>
					function calcDate(date1,date2) {
					var datadiff = Math.abs(date1 - date2) / 1000;

					// calculate (and subtract) whole days
					var days = Math.floor(datadiff / 86400);
					datadiff -= days * 86400;

					// calculate (and subtract) whole hours
					var hours = Math.floor(datadiff / 3600) % 24;
					datadiff -= hours * 3600;

					// calculate (and subtract) whole minutes
					var minutes = Math.floor(datadiff / 60) % 60;
					datadiff -= minutes * 60;

					// what's left is seconds
					var seconds = Math.floor(datadiff % 60);  
					var message = " ";
					message += hours + " hours ";
					message += minutes + " minutes \n";
					message += seconds + " seconds \n";
					
					return message
					}
				</script>
			
			@else 
				<div class="col-md-8">
					<div class="row inputField orange">
						{{$match->home}}  VS {{$match->away}} <br>
						My Date: {{$match->day}} {{$match->date}}<br>
						Other Manager's Date: Not Fixed<br>
					</div>
				</div>
			@endif
		@else
			<div class="col-md-8">
				<div class="row inputField orange">
					Match of the week not set
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