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

	<!-- jQuery -->
	<script src="/js/jquery-3.1.1.js"></script>
	<script src="/js/jquery-3.1.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>

	
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
	<script>
		$id = {{$id}};
	</script>
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
				  if(count($posts) ==  0) {
				  	$fresh1 = "";
				  	$user1 = "No One";
				  	$img = "";
				  }
				  else{
				  	$no = count($posts) - 1;
					$fresh1 = $posts[$no]->created_at->diffForHumans();
					$user1 = $posts[$no]->user->username;
					$img = "/images/".$posts[$no]->user->avatar;
				  }
					
				?>
				<div class="forum-notice">
					<p>This forum contains {{count($posts)}} topics, and was last updated by <a href="/user/{{$user1}}"><img src="{{$img}}"> {{$user1}} </a>{{$fresh1}}</p>
				</div>

				<ul class="forums-list">
					<!-- content title -->
					<li class="forums-header">
						<ul class="forum-titles">
							<li class="forum-info">Topic</li>
							<li class="reply-count">Comments</li>
							<li class="forum-freshness">Last Updated</li>
						</ul>
						
					</li>
					
					<li class="forum-body">
						@if(count($posts) > 0)
							@foreach($posts as $post)
								<ul class="forum-single">
									<li class="forum-info">
										<i class="fa fa-comments-o"></i>
										<div>
											<a href="/forum/details/{{ $post->id }}">{{ $post->title }}</a>
											<p>Started by: <span><a href="/user/{{$post->user->username}}"><img src="/images/{{$post->user->avatar}}"> {{$post->user->username}}</a></span></p>
										</div>
										
									</li>
									<li class="reply-count">{{count($post->comment)}}</li>
									<li class="forum-freshness">
										<?php
										  if(count($post->comment) ==  0) {
										  	$fresh = "No Comment";
										  	$user = "";
										  	$img = "";
										  }
										  else{
										  	$no = count($post->comment) - 1;
											$fresh = $post->comment[$no]->created_at->diffForHumans();
											$user = $post->comment[$no]->user->username;
											$img = "/images/".$post->comment[$no]->user->avatar;
										  }
											
										?>
										<p>{{$fresh}}</p>
										<p><span><a href="/user/{{$user}}"><img src="{{$img}}"> {{$user}}</a></span></p>
									</li>
								</ul>
							@endforeach
						@else
						<ul class="forum-single">
								<li class="forum-info">
									<i class="fa fa-comments-o"></i>
									<div>
										<a href="">No Recent post</a>
									</div>
								</li>
							</ul>
						@endif
						
					</li>

					<li class="forum-footer">
						<div class="tr">&nbsp;</div>
					</li>
				</ul>

				<script>
					$('document').ready(function() {
						
						$('#team_name').keypress( function() {
							$Search = $('#team_name').val();
							console.log($Search);
							if($Search != '') {
								$.get('/search_topic/'+$Search, function success(data) {
									console.log(data);
								});
							}
						})
					})
				</script>

				<!-- <form class="search-teams">
					<input type="text" autocomplete="off" name="team_name" id="team_name" placeholder="">
					<input type="button" id="members_search_submit" name="members_search_submit" value="Search" class="button-medium">
				</form>
 -->
				<p>{{$posts->links()}}</p>
				@if(Auth::guest())
					<div class="forum-notice notice-caution">
						<p>You must be logged in to create new topics</p>
					</div>
				@else
					<div class="forum-notice notice-caution" style="cursor: pointer;">
						<p onClick="post()">Start a new topic</p>
					</div>

					<div id="post" class="panel-body hidden">
	                   <div class="col-md-12">
		                    <div class="form-group">
								<label for="title">Title</label>
								<input id="title" name="title" placeholder="Enter post title" class="form-control inputField">
							</div>
		                    <div class="form-group">
								<label for="post-body">Body</label>
								<textarea id="body" name="body" placeholder="Enter post" rows="8" class="form-control inputField"></textarea>
							</div>
		                    <input type="submit" onClick="postInput()" name="submit" class="btn btn-success pull-right" style="background: orange;">
	                    </div> 
	                </div>
				@endif
				</section>
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
	<script src="/js/forum.js"></script>
</body>
</html>