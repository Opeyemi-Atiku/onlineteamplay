


<!DOCTYPE html><html class=''>
<head>
    
    
    <link href="/css/bootstrap.css" rel="stylesheet">

	<script src="/js/jquery-3.1.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>

	<link rel='stylesheet prefetch' href='/css/reset.min.css'>
	<link rel='stylesheet prefetch' href='/css/font-awesome.min.css'>
	<link rel="stylesheet" type="text/css" href="/css/chat.css">
	<link rel="stylesheet" type="text/css" href="/css/fontawesome.css">
	<style>
		.contract {
			background: white;
			font-size: 18px;
			font-weight: lighter !important;
			border: 2px solid black;
			border-radius: 7px;
		}
		.contract p {
			font-weight: lighter !important;
		}
		.card {
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.4);
			transition: 0.3s;
			margin:6%;
			background: white;
		}

		.card:hover {
			box-shadow: 0 8px 16px 0 rgba(0,0,0,0.8);
			
		}

		.card-body {
			padding:8px;
		}
	</style>
</head>
<body>


	<div id="frame">
		<div id="sidepanel">
			<div id="profile">
				<div class="wrap">
					<img id="profile-img" src="/images/{{ Auth::user()->avatar }}" class="online" alt="" height="40"/>
					<p>{{ Auth::user()->name }}</p>
					
				</div>
			</div>
			<!-- <div id="search">
				<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
				<input type="text" placeholder="Search contacts..." onkeyup="searchUser()" id="gamertag"/>
			</div> -->
			<hr>
			<div id="contacts">
				<ul>
					
					@foreach($senders as $sender)
						<li class="contact" onclick="fetchMessages('{{ $sender->user->name }}', 'images/{{ $sender->user->avatar }}', '{{ $sender->user_id }}', '{{ $sender->receiver_id }}')">
							<div class="wrap">
								@if($sender->new > 1)<span class="contact-status" style="font-size: 18px !important; background: red; width: 23px; padding-left: 4px; height: 23px; color: white;">{{ $sender->new }}</span>@endif
								<img src="/images/{{ $sender->user->avatar }}" alt=""  height="45"/>
								<div class="meta">
									
									<p class="name">{{ $sender->user->name }}</p>
									<p class="preview"> &nbsp;</p>
								</div>
							</div>
						</li>
					@endforeach

				</ul>
			</div>
		</div>
		<div class="content">
			<div class="contact-profile">
				<img src="" alt="" id="partnerImage"/>
				<p id="partnerName"></p>
				
				<a class="btn btn-default pull-right" href="/home" style="text-decoration: none !important; font-size: 16px; margin-top: 12px;">Dashboard</a> 
				@if(Auth::user()->free == true AND Auth::user()->role == 'user')
					<a class="btn btn-default pull-right" title="View all contracts" href="#" onclick="contract()" style="text-decoration: none !important; font-size: 16px; margin-top: 12px; margin-right: 20px;"><i class="fa fa-briefcase"></i></a> 
				@endif
			</div>
			<div class="messages">
				<ul id="messages">
					
					
				</ul>
				<div class="row hidden" id="contracts">
					@foreach($contracts as $contract)
						<div class="col-md-6" id="{{ preg_replace('/\s+/', '', $contract->team) }}">
							<div class="card" style="width: 20rem;">
								<img class="card-img-top img-responsive" src="/images/contract4.jpg" alt="Sans &amp; Sans-Serif">
								<div class="card-body">
									<!-- <h4 class="card-title">Contract</h4> -->
									<p class="card-text" style="font-size: 20px !important; font-weight: lighter !important;">{{ $contract->manager->username }} has offered you a {{ $contract->week > 1? $contract->week.' weeks' : $contract->week.' week'}} contract to join {{ $contract->team }}</p>
									<div class="row" style="margin-top: 10px;">
										<div class="col-md-4">
											<button class="btn btn-success" onclick="accept('{{ $contract->team }}', '{{ $contract->id }}')"><i class="fa fa-thumbs-up"></i> Accept</button>
										</div>
										<div class="col-md-4 col-md-offset-4">
											<button class="btn btn-danger" onclick="reject('{{ $contract->team }}', '{{ $contract->id }}')"><i class="fa fa-thumbs-down"></i> Reject</button>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					@endforeach
					
				</div>
			</div>
			<div class="message-input hidden" id="inputField" style=" background: white;">
				<div class="wrap">
					<input type="text" id="messageField" placeholder="Write your message..." />
					<i class="fa fa-paperclip attachment" aria-hidden="true" style="color: white;"></i>
					<button class="submit" id="send" userId="{{ Auth::user()->id }}" image="/images/{{ Auth::user()->avatar }}" receiverId=""><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
	</div>
<script src="/js/chat.js"></script>
</body></html>