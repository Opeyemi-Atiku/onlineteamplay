<!DOCTYPE html>
<html lang="en-US">


<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>{{ $ticket[0]->title }}</title>

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
			<div class="col-md-8 mid-column" id="centerGrid" style="max-height: 500px; overflow-y: auto;">
				<div class="row">
					@if(count($ticket) > 0)    
						<div class="col-md-12 inputField">
							<small class="pull-right" style="color: orange;">Created {{ $ticket[0]->created_at->diffforhumans() }}</small>
							<h3 style="color: orange;">{{ $ticket[0]->title }}</h3>
							<p>{{ $ticket[0]->description }}</p>
							
						</div>
					@endif
					
				</div>
				<hr>
				@if($ticket_responses->count() > 0)
					@foreach($ticket_responses as $response)
						<div class="row">
							<div class="col-md-12 inputField">
								<small class="pull-right orange">{{ $response->created_at->diffforhumans() }}</small>
								<p style="color: orange;">{{ $response->user->username }}</p>
								<p>{{ $response->message }}</p>
							</div>
						</div>
					@endforeach
				@else
					<div class="row">
						<div class="col-md-12 inputField">
							<p>This issue will be attended to shortly</p>
						</div>
					</div>
				@endif
				<br><hr><br>
				<form role="form" action="/reply-to-ticket" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					
					<input type="hidden" name="ticket_id" value="{{ $ticket_id }}">
					<div class="form-group">
						<label for="description">Send us a reply:</label>
						<textarea name="reply" class="inputField" id="description" style="color: white;"></textarea>
					</div>
					<div class="form-group">
						<label for="attachment">Attach File(optional):</label>
						<input type="file" name="attachment" class="inputField" id="attachment">
					</div>

					<button type="submit" class="btn btn-warning" style="background: orange;">send</button>
				</form>
					

				
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