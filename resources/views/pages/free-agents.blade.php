<!DOCTYPE html>
<html lang="en-US">


<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Free Agents</title>

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
			<div class="col-md-8 mid-column" id="centerGrid">
                <div class="col-md-9 col-md-offset-2">
                	@include('includes.success')
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-size: 17px;">#</th>
                                    <th style="text-align: center; font-size: 17px;">Gamertag</th>
                                    @if(!Auth::guest())
										@if(Auth::user()->role == 'manager')
                                        	<th style="text-align: center; font-size: 17px;">Offer Contract</th>
										@endif
                                    @endif
                                    
                                </tr>
                            </thead>
                            <tbody  style="text-align: center; height: 20px !important; overflow-y: auto; font-size: 16px;">
                                @for($i=0; $i<$free_agents->count(); $i++)
                                    <tr>
                                        <td style="width: 10% !important;">{{ $i+1 }}</td>
                                        <td style="width: 60% !important;"><a href="/user/{{ $free_agents[$i]->username }}">{{ $free_agents[$i]->username }}</a></td>
                                        @if(!Auth::guest())
											@if(Auth::user()->role == 'manager')
                                            	<td><a href="#" onclick="setContract('{{ Auth::user()->id }}', '{{ $free_agents[$i]->id }}', '{{ $free_agents[$i]->username }}')"><i class="fa fa-briefcase"></i></a></td>
											@endif
                                        @endif
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
			
						<!-- Modal -->
						<div class="modal fade" id="contractModal" role="dialog">
							<div class="modal-dialog modal-sm">
								<div class="modal-content inputField">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title"></h4>
										</div>
									<div class="modal-body">
										<p>Choose contract timeframe.</p>
										<select id="week" class="form-control inputField">
											<option value="1">1 week</option>
											@for($i = 2; $i < 15; $i++)
												<option value="{{ $i }}">{{ $i }} weeks</option>
											@endfor
										</select>
										<button class="btn btn-warning"
										id="sender"
										managerId=""
										userId ="" 
										gamertag=""
										onclick="offerContract()"
										style="background: orange;"><i class="fa fa-briefcase"></i></button>
									</div>
								</div>
							</div>
						</div>
                        <script>

							function setContract(managerId, id, gamertag) {
								var sender = $('#sender');
								sender.attr('managerId', managerId);
								sender.attr('userId', id);
								sender.attr('gamertag', gamertag);

								$('#contractModal').modal('show');

							}
							
                            function offerContract() {
								var sender = $('#sender');
								var gamertag = sender.attr('gamertag');
                                if(confirm('Offer contract to '+gamertag+'?')) {
									
									var managerId = sender.attr('managerId');
									var id = sender.attr('userId');
									var gamertag = sender.attr('gamertag', gamertag);

									var week = $('#week').val();
									$('#contractModal').modal('hide');
                                    window.location.href='/offer-contract/'+managerId+'/'+id+'/'+week;
                                  ;
                                }
                                else {
                                    alert('Operation Cancelled');
									$('#contractModal').modal('hide');
                                }
                            }
                        </script>

                    </div>
                </div>    
                    
				
				
					

				
			</div>

			
		</section>

		
	

		

	
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