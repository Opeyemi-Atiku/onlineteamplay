$(".messages").animate({ scrollTop: $(document).height() }, "fast");

function contract() {
	$('#inputField').addClass('hidden');
	$('#partnerName').text(null);
	$('#partnerImage').attr('src', null);
	$('#messages').html(null);
	$('#contracts').removeClass('hidden');
}

function accept(team, contract_id) {
	if(confirm('Sure to join team?')) {
		var team_name = team.split(' ').join('');
		
		$.get('/handle-contract/accept/'+contract_id, function success() {
			
			$('#'+team_name).remove();
			alert('You are now a member of '+team);
		});
		

		
	}
	else {
		alert('Operation Cancelled');
	}
}

function reject(team, contract_id) {
	if(confirm('Sure to reject contract?')) {
		$.get('/handle-contract/reject/'+contract_id, function success() {
			
			$('#'+team_name).remove();
			alert('You have successfully turned down the contract');
		});
	}
	else {
		alert('Operation Cancelled');
	}
}

function fetchMessages(name, image, senderId, receiverId) {
	$('#contracts').addClass('hidden');
	$('#inputField').removeClass('hidden');
	$('#partnerName').text(name);
	$('#partnerImage').attr('src', image);
	
	$('.submit').attr('receiverId', senderId);

	$.get('/fetch-messages/'+receiverId+'/'+senderId, function success (data) {
		var returnedMessages = '';
		for(var i=0; i < data.length; i++) {
			if(data[i].sender_id != receiverId) {
				returnedMessages += `
				<li class="replies">
					<p>`+data[i].message+`</p>
				</li>
				
				
				`;
				
				
				
			}
			else {
				returnedMessages += `
				<li class="sent">
					<p>`+data[i].message+`</p>
				</li>
				
				
				`;
			}
			// $('.message-input input').val(null);

			$(".messages").animate({ scrollTop: $('#messages').height() }, "fast");

			$('#messages').html(returnedMessages);
			
				
		}
	});
}

function searchUser() {

	var users = '';
	var gamertag = $('#gamertag').val();
	console.log(gamertag);
	if(gamertag.length > 0) {
		$.get('/search-user/'+gamertag, function success(data) {
			console.log(data);
			for(var i=0; i < data.length; i++) {

			}
		});
	}
		
	
		
}


$('.contact').click(function () {
	$('.contact').removeClass('active');
	$(this).addClass('active');
	// var sendButton = $('#sendButton');
	// sendButton.attr('receiverId', $(this).attr('userId'));
});



$("#profile-img").click(function() {
	$("#status-options").toggleClass("active");
});

$(".expand-button").click(function() {
  $("#profile").toggleClass("expanded");
	$("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function() {
	$("#profile-img").removeClass();
	$("#status-online").removeClass("active");
	$("#status-away").removeClass("active");
	$("#status-busy").removeClass("active");
	$("#status-offline").removeClass("active");
	$(this).addClass("active");
	
	if($("#status-online").hasClass("active")) {
		$("#profile-img").addClass("online");
	} else if ($("#status-away").hasClass("active")) {
		$("#profile-img").addClass("away");
	} else if ($("#status-busy").hasClass("active")) {
		$("#profile-img").addClass("busy");
	} else if ($("#status-offline").hasClass("active")) {
		$("#profile-img").addClass("offline");
	} else {
		$("#profile-img").removeClass();
	};
	
	$("#status-options").removeClass("active");
});

function newMessage() {
	message = $(".message-input input").val();
	if($.trim(message) == '') {
		return false;
	}
	var data = {
		sender_id: $('#send').attr('userId'),
		receiver_id: $('#send').attr('receiverId'),
		message: message
	}
	var image = $('#send').attr('image');
		$.post('/send-message', data, function success(data) {
			console.log('done');
			

			$('<li class="sent"><p>' + message + '</p></li>').appendTo($('.messages ul'));
			$('.message-input input').val(null);
			// $('.contact.active .preview').html('<span>You: </span>' + message);
			$(".messages").animate({ scrollTop: $(document).height() }, "fast");
		});
			
};

$('.submit').click(function() {

  newMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});