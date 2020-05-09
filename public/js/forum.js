
function post() {
	$('#post').toggleClass();
	var body = $('body');
	body.scrollTop(100000000000);
	// $('body').animate({ scrollTop: $('#post').last().offset().top }, 500);
}

function postInput() {
	if($('#title').val() == '') {
		alert('title field empty');
	}
	else if($('#body').val() == '') {
		alert('Body field empty');
	}
	else{
		$.ajax({
			url: '/postInput',
			method: 'get',
			data: {
				forum_id: $id,
				title: $('#title').val(),
				body:  $('#body').val(),
			},
			beforeSend: function (request) {
		    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
		  	},
			success: function(data) {
				window.location.reload();
			},
		})
	}
}

function title2() {
	$title2 = $('#title2').val();
	console.log($title2);
}
