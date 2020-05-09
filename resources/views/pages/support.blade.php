<!DOCTYPE html>
<html lang="en-US">


<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Support</title>

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
                padding: 1%;
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
			<div class="col-md-8 mid-column" id="centerGrid" style="height: 480px; font-size: 18px !important; overflow-y: auto;">
				
                <ul class="nav nav-tabs">
                    <li class="active"><a class="btn btn-default but" data-toggle="tab" href="#home" style="font-size: 16px;">Create Ticket</a></li>
                    <li><a data-toggle="tab" class="btn but" href="#menu1" style="font-size: 16px;">Tickets</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active" style="padding: 15px;">
                        <h4>Having any issue? <span style="color: orange;">CREATE A TICKET</span></h4><br>
                        <form role="form" action="/create-ticket" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input name="title" class="inputField" id="title" style="color: white;">
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="inputField" id="description" style="color: white;"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-warning" style="background: orange;">Create</button>
                        </form>
                    </div>

                    <div id="menu1" class="tab-pane fade" style="padding: 15px;">
                        <div class="row">
                            @if(count($tickets) > 0)    
                                @foreach($tickets as $ticket)
                                    <a href="/ticket/{{ $ticket->id }}">
                                        <div class="col-md-4 inputField">
                                            <h4 style="color: orange;">{{ $ticket->title }}</h4>
                                            <p>{{ substr($ticket->description, 0, 40) }}...</p>
                                            <small class="pull-left" style="color: orange;">Status: {{ $ticket->open? 'Open' : 'Closed' }}</small>
                                            <small class="pull-right" style="color: orange;">Created {{ $ticket->created_at->diffforhumans() }}</small>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <p class="inputField">You have not created any ticket</p>
                            @endif
                        </div>
                        
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

@if (session()->has('success'))
    <script>
        $(document).ready(function () {
            alert("{!! session()->get('success') !!}");
        });
    </script>
@endif


</html>