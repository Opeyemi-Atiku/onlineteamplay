<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from skywarriorthemes.com/arcane/html/general-forum.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jul 2018 10:48:43 GMT -->
<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>{{$cat[0]->category}}</title>

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
	<link rel="stylesheet" href="/css/fontawesome.css">

	<!-- jQuery -->
	<script src="/js/jquery-3.1.1.js"></script>
	<script src="/js/jquery-3.1.1.min.js"></script>
	<script src="/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	


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
			background-color: #26262f !important;
			-webkit-box-shadow: 0 1px rgba(255, 255, 255, .1), inset 0 1px 2px rgba(0, 0, 0, .6);
			-moz-box-shadow: 0 1px rgba(255, 255, 255, .1), inset 0 1px 2px rgba(0, 0, 0, .6);
			box-shadow: 0 1px rgba(255, 255, 255, .1), inset 0 1px 2px rgba(0, 0, 0, .6);
			border: 1px solid rgba(0, 0, 0, .9);
		}
	</style>

</head>
<body class="blog-style teams-page forum forum-general">
	@include('includes.header')
	
	<div class="container-fluid no-padding" style="background-image:url('fifa1.jpg') !important">
		<div class="slider col-lg-12" style="background: url('/images/fifa1.jpg') !important; background-size: cover !important; background-position: center; background-repeat: no-repeat;">
			<h1>Forums</h1>
			<strong><a href="">Forum</a> <span>/ General</span></strong>
		</div>
	</div>

	<section class="content-wrapper container-fluid no-padding">
		<section class="container main">
			<div class="col-md-4 left-column" style="height: 500px;">

				@include('includes.shoutbox')
				
			</div>
			<div class="col-md-8 mid-column" id="centerGrid">
				<section class="container forum-wrapper">
				<?php
				  if(count($post[0]->comment) ==  0) {
				  	$fresh1 = "";
				  	$user1 = "No One";
				  	$img = "";
				  }
				  else{
				  	$no = count($post[0]->comment) - 1;
					$fresh1 = $post[0]->comment[$no]->created_at->diffForHumans();
					$user1 = $post[0]->comment[$no]->user->username;
					$img = "/images/".$post[0]->comment[$no]->user->avatar;
				  }
					
				?>
				<div class="forum-notice">
					<p>This topic contains {{count($post[0]->comment)}} comments, and was last updated by <a href=""><img src="{{$img}}"> {{$user1}} </a> {{$fresh1}}</p>
				</div>

				<ul class="forums-list">
					<!-- content title -->
					<li class="forums-header">
						<ul class="forum-titles">
							<li class="reply-author">Author</li>
							<li class="reply-content">Posts</li>
						</ul>
						
					</li>
					
					<li class="forum-body">
						<div class="reply-header"><span>{{$post[0]->created_at->format('M d, Y')}} at {{$post[0]->created_at->format('H:i:s')}}</span></div>

						<ul class="forum-single" style="border-top:0!important;">
							<li class="reply-author">
								<a href="/user/{{$post[0]->user->username}}"> <img src="/images/{{$post[0]->user->avatar}}" alt="avatar"></a>
								<br>
								<a href="/user/{{$post[0]->user->username}}">{{$post[0]->user->username}}</a>
								<br>
								<p class="author-role">{{$post[0]->user->role}}</p>
							</li>
							<li class="reply-content">
								<p>{{$post[0]->body}}</p>
							</li>
						</ul>
						@foreach($post[0]->comment as $comment)
						<div class="reply-header"><span>{{$comment->created_at->format('M d, Y')}} at {{$comment->created_at->format('H:i:s')}}</span></div>

						<ul class="forum-single">
							<li class="reply-author">
								<a href="/user/{{$comment->user->username}}"> <img src="/images/{{$comment->user->avatar}}"></a>
								<br>
								<a href="/user/{{$comment->user->username}}">{{$comment->user->username}}</a>
								<br>
								<p class="author-role">{{$comment->user->role}}</p>
							</li>
							<script>
								$('document').ready(function() {
									
								})

								function inputRepl(id) {
									if($('#0'+id).val() != '') {
											$.ajax({
												url: '/inputReply',
												method: 'get',
												data: {
													post_id: '{{$post[0]->id}}',
													comment_id: id,
													body: $('#0'+id).val(),
												},
												beforeSend: function (request) {
									            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
									          	},
												success: function(data) {
													window.location.reload();
												},
											})
										}
										else{
											alert('input field is empty');
										}
								}
							</script>
							<li class="reply-content">
								<blockquote><p>{{$comment->body}}</p></blockquote>
									@foreach($comment->reply as $reply)
									<p>{{$reply->user->username}}: {{$reply->body}}</p>
									@endforeach
									<a onClick='display({{$comment->id}})'>Reply</a>
									<div id="{{$comment->id}}" class="row hidden">
										<p id="error2" class="hidden" style="color: red;">* input field is empty</p>
										<div class="form-group">
											<p id="c_{{$comment->id}}" class="hidden">{{$comment->id}}</p>
					                        <textarea  name="reply" id="0{{$comment->id}}" placeholder="Enter reply" class="form-control inputField"></textarea>
					                    </div>
					                    <button onClick="inputRepl({{$comment->id}})" id="sub" name="sub" class="btn btn-warning pull-right" style="background: orange;">Reply</button>
				                	</div>
							</li>

						</ul>
						@endforeach	
					</li>

					<li class="forum-footer">
						<div class="tr">&nbsp;</div>
					</li>
				</ul>
				<script>
					function display(id) {
						$('#'+id).toggleClass();
					}
				</script>

				<!-- <div class="pagination-count">Viewing 3 topics - 1 through 3 (of 3 total)</div> -->

				@if(Auth::guest())
					<div class="forum-notice notice-caution">
						<p>You must be logged in to comment on this post</p>
					</div>
				@else
				<script>
					$('document').ready(function() {
						$('#submit').click(function() {
							if($('#body').val() != '') {
								$.ajax({
									url: '/inputComment',
									method: 'get',
									data: {
										post_id: '{{$post[0]->id}}',
										forum_id: '{{$post[0]->forum_id}}',
										body: $('#body').val(),
									},
									success: function(data) {
										window.location.reload();
									},
								})
							}
							else{
								$('#error').removeClass();
							}
							
						});
					})
				</script>

				<!-- <div class="alert alert-dismissable alert-success show">
					<button type="button" class="close" data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					</button>
					<strong>
						Input Empty
					</strong>
				</div> -->
				<br>
				<div  class="row">
			        <div class="col-md-12">
				        <div class="sidebar-module">
				        	<p id="error" class="hidden" style="color: red;">* input field is empty</p>		               
				        	<div class="form-group">
		                        <textarea  name="body" id="body" placeholder="Enter comment" class="form-control inputField" style="width: 100%;"></textarea>
		                    </div>
		                    <button id="submit" name="submit" class="btn btn-warning pull-right" style="background: orange;">Comment</button>
				        </div>
			        </div>
			        @endif
			       <section class="container forum-wrapper">
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

</body>
</html>