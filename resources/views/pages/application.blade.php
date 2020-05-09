<!DOCTYPE html>
<html lang="en-US">


<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Become a manager</title>

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
	 

	<!-- jQuery -->
	<script src="/js/jquery-3.1.1.js"></script>
	<script src="/js/jquery-3.1.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/owl.carousel.js"></script>
	
	
	<!-- External libraries: jQuery & GreenSock -->
    <script src="/js/greensock.js" type="text/javascript"></script>
    
	


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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
			<div class="col-md-8 mid-column" id="centerGrid" style="font-size: 18px !important;">
				<div class="row">
				<h3 style="color: orange;">So you want to become a manager?</h3>
				<p>Please read carefully what is takes to become a manager below before deciding if this is for you.</p>
				<ol style="font-size: 14px;">
					<li> You must be be available atleast 4 days per week or have an assistant manager in place that can manage the days you are not available.</li>
					<li> You must always have 5 players including yourself available for matches.</li>
					<li> Matches will try to be set for your checked days, however if this is not apprpriate you must contact the oposition manager and re-arrange the fixture for another day on that week.</li>
					<li> Contracts you send to players will have a minimum of 1 week and players cannot become free agents until their contract has expired.</li>
					<li> Managers found to be cheating, inputting wrong results on purpose or general misuse will be sacked immediately.</li>
					<li> You will have a rough requirement to meet when managing certain teams. For example Man City predicted 1st-2nd and Wolves predicted 17th-20th</li>
					<li> Faiulre to meet these requirements at the end of the season will result in you being offered a downgrade or sacked.</li>
					<li> If you achieve your goal or over achieve throughout the season you can stay at the same team or be offered an upgrade.</li>
					<li> You will also be rewarded on loyalty and how organised you are as a team.</li>
					<li> If you have proven to be a trustworthy manager for some time but have not met your objective you may still be offered an upgrade for being a loyal and organised manager. </li>
					<li> If you are sacked for any reason other than didn't meet your objective you cannot apply to manage again for a minimum of 12 weeks.</li>
					<li> If you choose to leave the manager role of a team before the season finishes, you will NOT be able to manage again for a full season.</li>
				</ol>
				<p style="font-size: 14px;">With the introduction of Screenshots, recording clips and streaming all from your console, cheating should no longer 
				be able to take place. Please take full advantage of all of these features when setting up games to help moderators sort things quickly. 

				If you still want to become a manager after reading the above rules then please feel free to apply 
				from the list of teams available below. Good Luck</p>
				<br>

	

				


				</div>
                <ul class="nav nav-tabs">
                    <li class="active"><a class="btn btn-default but" data-toggle="tab" href="#home" style="font-size: 16px;">Premier League</a></li>
                    <li><a data-toggle="tab" class="btn but" href="#menu1" style="font-size: 16px;">Super League</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active" style="padding: 15px;">
                        <form role="form" action="/apply" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="team">Choose Team:</label>
                                <select name="team" class="inputField" id="team" style="color: white;">
                                    @foreach($premiers as $premier)
                                        <option value="{{ $premier->team_name }}" style="color: white;">{{ $premier->team_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="league" value="premier">
                            
                            <button type="submit" class="btn btn-warning" style="background: orange;">Apply</button>
                        </form>
                    </div>
                    <div id="menu1" class="tab-pane fade" style="padding: 15px;">
                      
                        <form role="form" action="/apply" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="team2">Choose Team:</label>
                                <select name="team" class="inputField" id="team2">
                                    @foreach($supers as $super)
                                        <option value="{{ $super->team_name }}">{{ $super->team_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="league" value="super">
                            <button type="submit" value="Apply" class="btn btn-warning" style="background: orange;">Apply</button>
                        </form>
                    </div>
                </div>
				
					

				
			</div>

			
		</section>

		<!-- video section -->
        <script>
            $('.but').click(function () {
                $('.but').removeClass('btn-default');
                $(this).addClass('btn-default');
            });
            
        </script>
        @if(session()->has('error'))
            <script>
                $(document).ready(function () {
                    alert("{!! session()->get('error') !!}");
                });
            </script>
		@endif

	
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


</html>